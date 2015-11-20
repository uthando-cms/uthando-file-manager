<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoFileManager\Form
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoFileManager\Form;


use UthandoFileManager\Options\FileManagerOptions;
use Zend\Form\Fieldset;
use Zend\Hydrator\ClassMethods;
use Zend\InputFilter\InputFilterProviderInterface;

class SettingsFieldSet extends Fieldset implements InputFilterProviderInterface
{
    public function __construct($name = null, array $options = [])
    {
        parent::__construct($name, $options);

        $this->setObject(new FileManagerOptions())
            ->setHydrator(new ClassMethods());
    }

    public function init()
    {
        $this->add([
            'name'			=> 'case_sensitive',
            'type'			=> 'checkbox',
            'options'		=> [
                'label'			=> 'Case Sensitive',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0',
                'required' 		=> false,
                'column-size' => 'md-4 col-md-offset-2',
            ],
        ]);

        $this->add([
            'name' => 'default_file_type',
            'type' => 'text',
            'options' => [
                'label' => 'Default File Type',
                'column-size' => 'md-4',
                'label_attributes' => [
                    'class' => 'col-md-2',
                ],
            ],
        ]);

        $this->add([
            'name' => 'default_file_type',
            'type' => 'text',
            'options' => [
                'label' => 'Default File Type',
                'column-size' => 'md-4',
                'label_attributes' => [
                    'class' => 'col-md-2',
                ],
            ],
        ]);

        $this->add([
            'name'			=> 'convert_to_default',
            'type'			=> 'checkbox',
            'options'		=> [
                'label'			=> 'Convert To Default',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0',
                'required' 		=> false,
                'column-size' => 'md-4 col-md-offset-2',
            ],
        ]);

        $this->add([
            'name' => 'max_width',
            'type' => 'number',
            'options' => [
                'label' => 'Max Width',
                'column-size' => 'md-4',
                'label_attributes' => [
                    'class' => 'col-md-2',
                ],
            ],
        ]);

        $this->add([
            'name' => 'max_height',
            'type' => 'number',
            'options' => [
                'label' => 'Max Height',
                'column-size' => 'md-4',
                'label_attributes' => [
                    'class' => 'col-md-2',
                ],
            ],
        ]);

        $this->add([
            'name'			=> 'use_max',
            'type'			=> 'checkbox',
            'options'		=> [
                'label'			=> 'Use Max',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0',
                'required' 		=> false,
                'column-size' => 'md-4 col-md-offset-2',
            ],
        ]);

        $this->add([
            'name' => 'min_width',
            'type' => 'number',
            'options' => [
                'label' => 'Min Width',
                'column-size' => 'md-4',
                'label_attributes' => [
                    'class' => 'col-md-2',
                ],
            ],
        ]);

        $this->add([
            'name' => 'min_height',
            'type' => 'number',
            'options' => [
                'label' => 'Min Height',
                'column-size' => 'md-4',
                'label_attributes' => [
                    'class' => 'col-md-2',
                ],
            ],
        ]);

        $this->add([
            'name'			=> 'use_min',
            'type'			=> 'checkbox',
            'options'		=> [
                'label'			=> 'Use Min',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0',
                'required' 		=> false,
                'column-size' => 'md-4 col-md-offset-2',
            ],
        ]);

        $this->add([
            'name'			=> 'resize_over_sized',
            'type'			=> 'checkbox',
            'options'		=> [
                'label'			=> 'Resize Over Sized',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0',
                'required' 		=> false,
                'column-size' => 'md-4 col-md-offset-2',
            ],
        ]);

        $this->add([
            'name' => 'default_file_permissions',
            'type' => 'text',
            'options' => [
                'label' => 'Default File Permissions',
                'column-size' => 'md-4',
                'label_attributes' => [
                    'class' => 'col-md-2',
                ],
            ],
        ]);

        $this->add([
            'name' => 'destination',
            'type' => 'text',
            'options' => [
                'label' => 'Destination',
                'column-size' => 'md-4',
                'label_attributes' => [
                    'class' => 'col-md-2',
                ],
            ],
        ]);

        $this->add([
            'name'			=> 'overwrite',
            'type'			=> 'checkbox',
            'options'		=> [
                'label'			=> 'Overwrite',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0',
                'required' 		=> false,
                'column-size' => 'md-4 col-md-offset-2',
            ],
        ]);

        $this->add([
            'name'			=> 'create_thumbnail',
            'type'			=> 'checkbox',
            'options'		=> [
                'label'			=> 'Create Thumbnail',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0',
                'required' 		=> false,
                'column-size' => 'md-4 col-md-offset-2',
            ],
        ]);

        $this->add([
            'name' => 'thumbnail_directory',
            'type' => 'text',
            'options' => [
                'label' => 'Thumbnail Directory',
                'column-size' => 'md-4',
                'label_attributes' => [
                    'class' => 'col-md-2',
                ],
            ],
        ]);

        $this->add([
            'name' => 'thumbnail_width',
            'type' => 'number',
            'options' => [
                'label' => 'Thumbnail Width',
                'column-size' => 'md-4',
                'label_attributes' => [
                    'class' => 'col-md-2',
                ],
            ],
        ]);

        $this->add([
            'name' => 'thumbnail_height',
            'type' => 'number',
            'options' => [
                'label' => 'Thumbnail Height',
                'column-size' => 'md-4',
                'label_attributes' => [
                    'class' => 'col-md-2',
                ],
            ],
        ]);
    }

    public function getInputFilterSpecification()
    {
        return [];
    }
}
