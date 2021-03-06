[Back to the Ling/Light_Kit_BootstrapWidgetLibrary api](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary.md)



The PhotoGalleryWidget class
================
2019-04-26 --> 2020-06-04






Introduction
============

The PhotoGalleryWidget class.



Class synopsis
==============


class <span class="pl-k">PhotoGalleryWidget</span> extends [PicassoWidget](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget.md) implements [UniversalTemplateEngineInterface](https://github.com/lingtalfi/UniversalTemplateEngine/blob/master/UniversalTemplateEngineInterface.php) {

- Inherited properties
    - protected array [PicassoWidget::$libraries](#property-libraries) ;
    - protected array [PicassoWidget::$attr](#property-attr) ;
    - protected [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) [PicassoWidget::$copilot](#property-copilot) ;

- Methods
    - public [prepare](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/Widget/Picasso/PhotoGalleryWidget/prepare.md)(array &$widgetConf, [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) $copilot) : void

- Inherited methods
    - public PicassoWidget::__construct() : void
    - public PicassoWidget::getLibraries() : array
    - public PicassoWidget::setCopilot([Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) $copilot) : void
    - public PicassoWidget::renderFile(string $filePath, ?array $variables = []) : false | string
    - protected PicassoWidget::getAttributesHtml(?bool $excludeClass = true) : string
    - protected PicassoWidget::getCssClass() : string
    - protected PicassoWidget::registerLibrary(string $libraryName, array $css, array $js) : void
    - public ZephyrTemplateEngine::render(string $resourceId, ?array $variables = []) : false | string
    - public ZephyrTemplateEngine::getErrors() : array
    - public ZephyrTemplateEngine::setDirectory(string $directory) : void
    - protected ZephyrTemplateEngine::interpret(string $___path, array $z) : false | string
    - private ZephyrTemplateEngine::addError(string $msg) : void

}






Methods
==============

- [PhotoGalleryWidget::prepare](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/Widget/Picasso/PhotoGalleryWidget/prepare.md) &ndash; Prepares the widget according to the given widget configuration.
- PicassoWidget::__construct &ndash; Builds the PicassoWidget instance.
- PicassoWidget::getLibraries &ndash; Returns the libraries of this instance.
- PicassoWidget::setCopilot &ndash; Sets the copilot.
- PicassoWidget::renderFile &ndash; Parses the file identified and returns its interpreted content (by injecting the variables in it).
- PicassoWidget::getAttributesHtml &ndash; Returns the string of html attributes defined in the widget attributes (attr property in the [widget configuration array](https://github.com/lingtalfi/Kit_PicassoWidget#the-picasso-widget-array)).
- PicassoWidget::getCssClass &ndash; 
- PicassoWidget::registerLibrary &ndash; Registers an (external) library that this widget uses.
- ZephyrTemplateEngine::render &ndash; Parses the template identified by $resourceId and returns the interpreted template (the template with the variables injected in it).
- ZephyrTemplateEngine::getErrors &ndash; Returns the errors of this instance.
- ZephyrTemplateEngine::setDirectory &ndash; Sets the directory.
- ZephyrTemplateEngine::interpret &ndash; and returns the resulting html code.
- ZephyrTemplateEngine::addError &ndash; Adds an error to this instance.





Location
=============
Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\PhotoGalleryWidget<br>
See the source code of [Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\PhotoGalleryWidget](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/Widget/Picasso/PhotoGalleryWidget.php)



SeeAlso
==============
Previous class: [PeopleGridWidget](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/Widget/Picasso/PeopleGridWidget.md)<br>Next class: [PortfolioGridHeaderWithDescriptionWidget](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/Widget/Picasso/PortfolioGridHeaderWithDescriptionWidget.md)<br>
