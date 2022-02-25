<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace Pimcore\DataObject\ClassBuilder;

use Pimcore\File;
use Pimcore\Model\DataObject\Fieldcollection\Definition;

class PHPFieldCollectionClassDumper implements PHPFieldCollectionClassDumperInterface
{
    public function __construct(protected FieldCollectionClassBuilderInterface $classBuilder)
    {
    }

    public function dumpPHPClass(Definition $definition): void
    {
        $classFilePath = $definition->getPhpClassFile();
        $phpClass = $this->classBuilder->buildClass($definition);

        File::put($classFilePath, $phpClass);
    }
}
