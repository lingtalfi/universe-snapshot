<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ling\BeeFramework\Component\FileSystem\Finder\Filter;


/**
 * BaseNameFinderFilter
 * @author Lingtalfi
 * 2015-04-29
 *
 */
class BaseNameFinderFilter extends AbstractPatternFinderFilter
{
    protected function getMethodName()
    {
        return "getBaseName";
    }


}
