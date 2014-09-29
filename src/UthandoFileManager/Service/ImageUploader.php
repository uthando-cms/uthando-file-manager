<?php

namespace UthandoFileManager\Service;

use UthandoFileManager\Model\Image as ImageModel;
use UthandoFileManager\UthandoFileManagerException;

class ImageUploader extends Uploader
{
    protected $serviceAlias = 'UthandoFileManagerImage';

    /**
     * @param ImageModel $image
     * @param null $params
     * @return string
     */
    public function uploadImage(ImageModel $image, $params = null)
    {
        /* @var $em \Zend\EventManager\EventManager */
        $em = $this->getEventManager();

        $argv = compact('image', 'params');
        $argv = $em->prepareArgs($argv);

        $em->trigger('pre.fileupload', $this, $argv);

        try {

            $options = $this->getOptions();

            if (!$image["error"] === UPLOAD_ERR_OK) {
                throw new UthandoFileManagerException($this->error([$image['error']]));
            }

            $file = new \SplFileInfo($options->getDestination() . '/' . $image->getFileName());

            if (false === is_writable($options->getDestination())) {
                throw new UthandoFileManagerException(
                    $this->error(self::DIR_NOT_WRITABLE, $this->getOptions()->getDestination())
                );
            }

            if (false === $options->getOverwrite() && $file->isFile()) {
                throw new UthandoFileManagerException($this->error(self::FILE_EXISTS, $file->__toString()));
            }

            $results = [];

            if (true === $options->getUseMax()) {
                if ($image->getWidth() > $options->getMaxWidth()) {
                    $results['wide'] = $this->error(self::MIN_WIDTH, $options->getMinWidth());
                }

                if ($image->getHeight() > $options->getMaxHeight()) {
                    $results['tall'] = $this->error(self::MAX_HEIGHT, $options->getMaxHeight());
                }
            }

            if (true === $options->getUseMin()) {
                if ($image->getWidth() < $options->getMinWidth()) {
                    $results['narrow'] = $this->error(self::MIN_WIDTH, $options->getMinWidth());
                }

                if ($image->getHeight() < $options->getMaxHeight()) {
                    $results['short'] = $this->error(self::MIN_HEIGHT, $options->getMaxHeight());
                }
            }

            if (isset($results['narrow']) || isset($results['short'])) {
                $errorMsg = (isset($results['short']) ? $results['short'] . PHP_EOL : '');
                $errorMsg .= (isset($results['narrow']) ? $results['narrow'] . PHP_EOL : '');
                throw new UthandoFileManagerException($errorMsg);
            }

            if (isset($results['wide']) || isset($results['tall'])) {
                if (false === $options->getResizeOverSized()) {
                    $errorMsg = (isset($results['tall']) ? $this->error(self::NO_RESIZE, $results['tall']) . PHP_EOL : '');
                    $errorMsg .= (isset($results['wide']) ? $this->error(self::NO_RESIZE, $results['wide']) . PHP_EOL : '');
                    throw new UthandoFileManagerException($errorMsg);
                } else {
                    $image = $this->resizeImage($image);
                }
            }

            move_uploaded_file($image->getTempName(), $file->__toString());
        } catch (UthandoFileManagerException $e) {
            return $e->getMessage();
        }

        $argv = compact('image', 'params');
        $argv = $em->prepareArgs($argv);

        $em->trigger('post.fileupload', $this, $argv);

        return 'Upload Success: ' . $file->getFilename();
    }

    /**
     * @param ImageModel $image
     * @return ImageModel
     * @throws UthandoFileManagerException
     */
    public function resizeImage(ImageModel $image)
    {
        $options = $this->getOptions();

        $oldX = $image->getWidth();
        $oldY = $image->getHeight();

        switch ($image->getMimeType()) {
            case IMAGETYPE_JPEG:
                $imageIn = imageCreateFromJpeg($image->getTempName());
                break;
            case IMAGETYPE_PNG:
                $imageIn = imageCreateFromPng($image->getTempName());
                break;
            case IMAGETYPE_GIF:
                $imageIn = imageCreateFromGif($image->getTempName());
                break;
            default:
                throw new UthandoFileManagerException($this->error(self::MIME_NOT_SUPPORTED, $image->getMimeType()));
        }

        if ($image->getWidth() > $options->getMaxWidth()) {
            $image->setHeight(round(($options->getMaxWidth() * $image->getHeight()) / $image->getWidth()));
            $image->setWidth($options->getMaxWidth());
        }

        if ($image->getHeight() > $options->getMaxHeight()) {
            $image->setWidth(round(($image->getWidth() * $options->getMaxHeight()) / $image->getHeight()));
            $image->setHeight($options->getMaxHeight());
        }

        $imageOut = imageCreateTrueColor($image->getWidth(), $image->getHeight());

        imageCopyResampled(
            $imageOut, $imageIn,
            0, 0, 0, 0,
            $image->getWidth(), $image->getHeight(),
            $oldX, $oldY
        );

        switch ($image->getMimeType()) {
            case IMAGETYPE_JPEG:
                imageJpeg($imageOut, $image->getTempName());
                break;
            case IMAGETYPE_PNG:
                imagePng($imageOut, $image->getTempName());
                break;
            case IMAGETYPE_GIF:
                imageGif($imageOut, $image->getTempName());
                break;
        }

        imageDestroy($imageIn);
        imageDestroy($imageOut);

        return $image;
    }
} 