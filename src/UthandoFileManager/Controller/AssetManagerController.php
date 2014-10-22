<?php

namespace UthandoFileManager\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AssetManagerController extends AbstractActionController
{
    public function indexAction()
    {
        $this->layout('uthando-file-manager/layout/asset-manager');
        $session = $this->getServiceLocator()->get('UthandoSessionManager\SessionManager');

        return [
            'sid' => $session->getId()
        ];
    }

    public function fileTreeAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);

        return $viewModel;
    }

    public function uploadAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        return $viewModel;
    }

    public function saveImageAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        return $viewModel;
    }

    public function newFolderAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        return $viewModel;
    }

    public function deleteFileAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        return $viewModel;
    }

    public function deleteFolderAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        return $viewModel;
    }
} 