<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ling\Komin\Component\Console\StreamWrapper\Writable;


/**
 * WritableStreamWrapperInterface
 * @author Lingtalfi
 * 2015-03-14
 *
 */
interface WritableStreamWrapperInterface
{
    public function write($msg, $newLine = false);
}
