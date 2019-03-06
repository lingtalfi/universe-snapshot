<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ling\Komin\Application\ElementInstallerOld\Installer;


/**
 * ElementInstallerInterface
 * @author Lingtalfi
 * 2015-04-21
 *
 */
interface ElementInstallerInterface
{

    /**
     * @return bool
     */
    public function install($resource);
}