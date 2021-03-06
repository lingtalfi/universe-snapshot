<?php

namespace Ling\BabyYaml\Helper\InlineVariableUtil\Adaptor;
use Ling\BabyYaml\Helper\ReflectionTool;


/**
 * ClosureInlineVariableUtilAdaptor
 * @author Lingtalfi
 * 2015-04-26
 *
 */
class ClosureInlineVariableUtilAdaptor extends InlineVariableUtilAdaptor
{

    protected function getStringVersion($var, $type)
    {
        if ($var instanceof \Closure) {
            $o = new \ReflectionFunction($var);
            $args = [];
            foreach ($o->getParameters() as $p) {
                $args[] = ReflectionTool::getParameterAsString($p);
            }
            return 'closure(' . implode(', ', $args) . ')';
        }
        return false;
    }
}
