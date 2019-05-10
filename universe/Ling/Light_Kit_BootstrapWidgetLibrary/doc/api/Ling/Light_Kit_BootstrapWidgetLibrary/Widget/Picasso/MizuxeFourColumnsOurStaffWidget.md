[Back to the Ling/Light_Kit_BootstrapWidgetLibrary api](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary.md)



The MizuxeFourColumnsOurStaffWidget class
================
2019-04-26 --> 2019-05-10






Introduction
============

The MizuxeFourColumnsOurStaffWidget class.



Class synopsis
==============


class <span class="pl-k">MizuxeFourColumnsOurStaffWidget</span> extends PicassoWidget implements UniversalTemplateEngineInterface {

- Inherited properties
    - protected array [PicassoWidget::$libraries](#property-libraries) ;
    - protected array [PicassoWidget::$attr](#property-attr) ;

- Inherited methods
    - public PicassoWidget::__construct() : void
    - public PicassoWidget::getLibraries() : array
    - public PicassoWidget::renderFile(string $filePath, array $variables = []) : false | string
    - public PicassoWidget::prepare(array $widgetConf, Ling\HtmlPageTools\Copilot\HtmlPageCopilot $copilot) : void
    - protected PicassoWidget::getAttributesHtml(bool $excludeClass = true) : string
    - protected PicassoWidget::getCssClass() : string
    - protected PicassoWidget::registerLibrary(string $libraryName, array $css, array $js) : void
    - public ZephyrTemplateEngine::render(string $resourceId, array $variables = []) : false | string
    - public ZephyrTemplateEngine::getErrors() : array
    - public ZephyrTemplateEngine::setDirectory(string $directory) : void
    - protected ZephyrTemplateEngine::interpret(string $___path, array $z) : false | string
    - private ZephyrTemplateEngine::addError(string $msg) : void

}






Methods
==============

- PicassoWidget::__construct &ndash; Builds the PicassoWidget instance.
- PicassoWidget::getLibraries &ndash; Returns the libraries of this instance.
- PicassoWidget::renderFile &ndash; Parses the file identified and returns its interpreted content (by injecting the variables in it).
- PicassoWidget::prepare &ndash; Prepares the widget according to the given widget configuration.
- PicassoWidget::getAttributesHtml &ndash; Returns the string of html attributes defined in the widget attributes (attr property in the widget configuration array).
- PicassoWidget::getCssClass &ndash; 
- PicassoWidget::registerLibrary &ndash; Registers an (external) library that this widget uses.
- ZephyrTemplateEngine::render &ndash; Parses the template identified by $resourceId and returns the interpreted template (the template with the variables injected in it).
- ZephyrTemplateEngine::getErrors &ndash; Returns the errors of this instance.
- ZephyrTemplateEngine::setDirectory &ndash; Sets the directory.
- ZephyrTemplateEngine::interpret &ndash; and returns the resulting html code.
- ZephyrTemplateEngine::addError &ndash; Adds an error to this instance.





Location
=============
Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\MizuxeFourColumnsOurStaffWidget


SeeAlso
==============
Previous class: [MainNavWidget](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/Widget/Picasso/MainNavWidget.md)<br>Next class: [MizuxeNewsletterSignupHeaderWidget](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/Widget/Picasso/MizuxeNewsletterSignupHeaderWidget.md)<br>