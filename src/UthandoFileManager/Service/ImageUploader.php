<?php

namespace UthandoFileManager\Service;

use UthandoFileManager\Model\Image as ImageModel;
use UthandoFileManager\UthandoFileManagerException;

class ImageUploader extends Uploader
{
    protected $serviceAlias = 'UthandoFileManagerImage';

    /**
     * @param $data
     * @return string
     */
    public function uploadImage($data)
    {

        /* @var $model \UthandoFileManager\Model\Image */
        $model = $this->getModel();
        $form  = $this->getForm(null, $data, true, false);

        $options = $this->getOptions();

        $argv = compact('data', 'options');

        $this->getEventManager()->trigger('pre.upload', $this, $this->prepareEventArguments($argv));

        /* @var $inputFilter \UthandoFileManager\InputFilter\Image */
        $inputFilter = $form->getInputFilter();
        $inputFilter->addImageFile($options);

        if (!$form->isValid()) {
            return $form;
        }

        $formData = $form->getData();

        $hydrator = $this->getHydrator();
        $model = $hydrator->hydrate($formData['image-file'], $model);

        //change file permissions to default
        chmod($model->getTempName(), octdec($options->getDefaultFilePermissions()));

        $argv = compact('data', 'options', 'model');

        $this->getEventManager()->trigger('post.upload', $this, $this->prepareEventArguments($argv));

        return $hydrator->extract($model);
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