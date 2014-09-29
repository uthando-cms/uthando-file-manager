<?php

namespace UthandoFileManager\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\ProgressBar\Upload\SessionProgress;
use Zend\View\Model\JsonModel;

class UploaderController extends AbstractActionController
{
    public function uploadImageAction()
    {
        /* @var $service \UthandoFileManager\Service\Uploader */
        $service = $this->getServiceLocator()->get('UthandoFileManager\Service\ImageUploader');
    }

    public function uploadProgressAction()
    {
        $id = $this->params()->fromQuery('id', null);
        $progress = new SessionProgress();
        return new JsonModel($progress->getProgress($id));
    }
}