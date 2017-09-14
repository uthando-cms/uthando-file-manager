<?php
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
    public function standalone()
    {
        $this->addDependencies();

        return $this->getView()->partial(
            'uthando-file-manager/file-manager/standalone'
        );
    }

    public function summernote()
    {
        $view = $this->getView();

        $this->addDependencies();

        return $view->partial(
            'uthando-file-manager/file-manager/elfinder-dialog'
        );
    }

    public function legacyUpload($params)
    {
        return $this->getView()->partial(
            'uthando-file-manager/uploader/upload-button',
            $params
        );
    }

    public function addDependencies()
    {
        $view = $this->getView();

        $view->inlineScript()
            ->appendFile($view->basePath('el-finder/js/elfinder.full.js'));

        $view->headLink()
            ->appendStylesheet($view->basePath('el-finder/css/elfinder.min.css'))
            ->appendStylesheet(
                '//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css'
            );
    }
}
