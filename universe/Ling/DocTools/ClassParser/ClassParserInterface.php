<?php


namespace Ling\DocTools\ClassParser;


use Ling\DocTools\Exception\ClassParserException;
use Ling\DocTools\GenericParser\GenericParserInterface;
use Ling\DocTools\Info\InfoInterface;
use Ling\DocTools\Report\ReportInterface;

/**
 * The ClassParserInterface interface represents a class parser.
 *
 * A class parser will parse a class and return a @page(ClassInfo) object, which gives us info
 * about the class, such as its name,  its comment, its properties, its methods, ...
 *
 *
 * A class parser will by default interpret the @doc(docTool markup language).
 *
 * A class parser speaks markdown language only.
 * Html conversion is done by the client at a later step if necessary.
 *
 *
 */
interface ClassParserInterface extends GenericParserInterface
{

    /**
     * Returns a ClassInfo object from the given $className.
     * Note that this method overrides a method of the same name
     * defined in the parent interface @class(Ling\DocTools\GenericParser\GenericParserInterface).
     *
     *
     *
     * @seeClass Ling\DocTools\Info\ClassInfo
     * @param string $className
     * @return InfoInterface
     * @throws ClassParserException
     */
    public function parse(string $className): InfoInterface;


    /**
     * Returns the parser report.
     * The parser report is only available after the parse method has been called.
     *
     * @seeMethod parse
     * @seeClass Ling\DocTools\Report\ReportInterface
     *
     * @return ReportInterface
     */
    public function getReport();
}