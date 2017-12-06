<?php declare(strict_types=1);
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @author      Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link        https://github.com/uthando-cms for the canonical source repository
 * @copyright   Copyright (c) 06/12/17 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license     see LICENSE
 */

namespace UthandoFileManager\Form;

use UthandoFileManager\Hydrator\Strategy\ArrayToIniStrategy;
use UthandoFileManager\Options\ElfinderOptions;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Form\Element\Textarea;
use Zend\Form\Fieldset;
use Zend\Hydrator\ClassMethods;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator\StringLength;

class ElfinderFieldSet extends Fieldset implements InputFilterProviderInterface
{
    public function __construct($name = null, array $options = [])
    {
        parent::__construct($name, $options);

        $hydrator = new ClassMethods();
        $hydrator->addStrategy('server_options', new ArrayToIniStrategy());
        $this->setObject(new ElfinderOptions())
            ->setHydrator($hydrator);
    }

    public function init(): void
    {
        $this->add([
            'name' => 'server_options',
            'type' => Textarea::class,
            'options' => [
                'label' => 'Server Config',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
            'attributes' => [
                'rows' => 50,
            ]
        ]);

        $object         = $this->getObject();
        $hydrator       = $this->getHydrator();
        $defaultOptions = $hydrator->extract($object);

        foreach ($defaultOptions as $key => $value) {
            if ($this->has($key)) {
                $this->get($key)->setValue($value);
            }
        }
    }

    public function getInputFilterSpecification(): array
    {
        return [
            'server_options' => [
                'required' => false,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
                'validators' => [
                    ['name' => StringLength::class, 'options' => [
                        'encoding' => 'UTF-8',
                    ]],
                ],
            ],
        ];
    }
}
