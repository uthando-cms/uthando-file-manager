<?php declare(strict_types=1);
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @author      Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link        https://github.com/uthando-cms for the canonical source repository
 * @copyright   Copyright (c) 06/12/17 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license     see LICENSE
 */

namespace UthandoFileManager\Hydrator\Strategy;

use Zend\Config\Reader\Ini as IniReader;
use Zend\Config\Writer\Ini as IniWriter;
use Zend\Hydrator\Strategy\StrategyInterface;

class ArrayToIniStrategy implements StrategyInterface
{
    public function extract($value): string
    {
        if (is_array($value)) {
            $ini = new IniWriter();
            $ini->setNestSeparator('_');
            $value = $ini->processConfig($value);
        }

        return $value;
    }

    public function hydrate($value): array
    {
        if (is_string($value)) {
            $ini = new IniReader();
            $ini->setNestSeparator('_');
            $value = $ini->fromString($value);
        }

        return $value;
    }
}
