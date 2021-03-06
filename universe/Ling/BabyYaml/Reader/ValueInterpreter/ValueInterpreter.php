<?php


namespace Ling\BabyYaml\Reader\ValueInterpreter;
use Ling\BabyYaml\Helper\StringTool;


/**
 * ValueInterpreter
 * @author Lingtalfi
 * 2015-02-27
 *
 */
class ValueInterpreter implements ValueInterpreterInterface
{


    //------------------------------------------------------------------------------/
    // IMPLEMENTS ValueInterpreterInterface
    //------------------------------------------------------------------------------/
    /**
     * @return mixed
     */
    public function getValue($line)
    {
        return StringTool::autoCast($line);
    }

}
