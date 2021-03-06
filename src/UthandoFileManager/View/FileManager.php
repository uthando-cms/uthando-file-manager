<?php declare(strict_types=1);
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @author      Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link        https://github.com/uthando-cms for the canonical source repository
 * @copyright   Copyright (c) 11/09/17 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license     see LICENSE
 */

namespace UthandoFileManager\View;

use UthandoCommon\View\AbstractViewHelper;

class FileManager extends AbstractViewHelper
{
    public function standalone(): void
    {
        $this->addDependencies();

        $this->getView()->placeholder('js-scripts')->append(
            $this->getView()->partial(
                'uthando-file-manager/file-manager/standalone'
            )
        );
    }

    public function summernote(): void
    {
        $view = $this->getView();

        $this->addDependencies();

        $view->placeholder('js-scripts')->append(
            $view->partial(
                'uthando-file-manager/file-manager/elfinder-dialog'
            )
        );
    }

    public function uploadButton(string $elementId, string $elementName): void
    {
        $this->elfinderUpload($elementId, $elementName);
    }

    public function elfinderUpload(string $elementId, string $elementName): void
    {
        $this->addDependencies();

        $this->getView()->placeholder('js-scripts')->append(
            $this->getView()->partial(
                'uthando-file-manager/file-manager/upload-button', [
                'elementId' => $elementId,
                'elementName' => $elementName,
            ])
        );
    }

    public function legacyUpload(string $elementId, string $elementName): void
    {
        $this->getView()->placeholder('js-scripts')->append(
            $this->getView()->partial(
                'uthando-file-manager/uploader/upload-button', [
                'elementId' => $elementId,
                'elementName' => $elementName,
            ])
        );
    }

    public function addDependencies(): void
    {
        $view = $this->getView();
        $view->inlineScript()->appendFile($view->basePath('el-finder/js/elfinder.full.js'));
        //$view->headLink()->appendStylesheet($view->basePath('el-finder/css/elfinder.full.css'));
    }
}
