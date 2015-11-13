<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoFileManager\Hydrator
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoFileManager\Hydrator;

use UthandoFileManager\Model\Image as ImageModel;
use Zend\Hydrator\AbstractHydrator;

/**
 * Class Image
 *
 * @package UthandoFileManager\Hydrator
 */
class Image extends AbstractHydrator
{
    /**
     * Extract values from model
     *
     * @param  ImageModel $object
     * @return array
     */
    public function extract($object)
    {
        return [
            'name' => $object->getFileName(),
            'type' => $object->getType(),
            'size' => $object->getSize(),
            'tmp_name' => $object->getTempName(),
            'error' => $object->getError(),
            'size' => [
                0 => $object->getWidth(),
                1 => $object->getHeight(),
                2 => $object->getMimeType(),
            ],
        ];
    }

    /**
     * Hydrate model with the provided $data
     * from file upload.
     *
     * @param  array $data
     * @param  ImageModel $object
     * @return object
     */
    public function hydrate(array $data, $object)
    {
        $size = getImageSize($data['tmp_name']);

        $object->setFileName($data['name'])
            ->setType($data['type'])
            ->setSize($data['size'])
            ->setTempName($data['tmp_name'])
            ->setWidth($size[0])
            ->setHeight($size[1])
            ->setMimeType($size[2])
            ->setError($data['error']);
        return $object;
    }
}

