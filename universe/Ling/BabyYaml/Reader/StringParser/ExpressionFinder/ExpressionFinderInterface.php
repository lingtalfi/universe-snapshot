<?php

namespace Ling\BabyYaml\Reader\StringParser\ExpressionFinder;


/**
 * ExpressionFinderInterface
 * @author Lingtalfi
 * 2015-05-16
 *
 */
interface ExpressionFinderInterface
{

    /**
     * @return array|false,
     *                      false in case of failure
     *                      array in case of success:
     *                              0: position of the first char of the matched expression
     *                              1: position of the last char of the matched expression
     */
    public function find($s);

    /**
     * @return mixed|null, returns the found value, or null if the expression was not found
     */
    public function getValue();
}
