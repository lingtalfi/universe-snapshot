[Back to the Ling/Light_Kit_BootstrapWidgetLibrary api](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary.md)



The ChloroformWidget class
================
2019-04-26 --> 2020-06-04






Introduction
============

The ChloroformWidget class.



Class synopsis
==============


class <span class="pl-k">ChloroformWidget</span> extends [EasyLightPicassoWidget](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/EasyLightPicassoWidget.md) implements [KitPageRendererAwareInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererAwareInterface.md), [UniversalTemplateEngineInterface](https://github.com/lingtalfi/UniversalTemplateEngine/blob/master/UniversalTemplateEngineInterface.php), [WidgetConfAwarePicassoWidgetInterface](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/WidgetConfAwarePicassoWidgetInterface.md) {

- Inherited properties
    - protected [Ling\Kit\PageRenderer\KitPageRendererInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md) [EasyLightPicassoWidget::$kitPageRenderer](#property-kitPageRenderer) ;
    - protected array [WidgetConfAwarePicassoWidget::$widgetConf](#property-widgetConf) ;
    - protected array [PicassoWidget::$libraries](#property-libraries) ;
    - protected array [PicassoWidget::$attr](#property-attr) ;
    - protected [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) [PicassoWidget::$copilot](#property-copilot) ;

- Methods
    - protected [useHelium](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/Widget/Picasso/ChloroformWidget/useHelium.md)() : void

- Inherited methods
    - public EasyLightPicassoWidget::__construct() : void
    - public EasyLightPicassoWidget::setKitPageRenderer([Ling\Kit\PageRenderer\KitPageRendererInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md) $renderer) : void
    - public EasyLightPicassoWidget::getKitPageRenderer() : [KitPageRendererInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md) | null
    - protected EasyLightPicassoWidget::getContainer() : Ling\Light\ServiceContainer\LightServiceContainerInterface
    - public WidgetConfAwarePicassoWidget::setWidgetConf(array $widgetConf) : void
    - public WidgetConfAwarePicassoWidget::getWidgetConf() : array
    - public PicassoWidget::getLibraries() : array
    - public PicassoWidget::setCopilot([Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) $copilot) : void
    - public PicassoWidget::renderFile(string $filePath, ?array $variables = []) : false | string
    - public PicassoWidget::prepare(array &$widgetConf, [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) $copilot) : void
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

- [ChloroformWidget::useHelium](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/Widget/Picasso/ChloroformWidget/useHelium.md) &ndash; Registers the helium assets to the [html page copilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md).
- EasyLightPicassoWidget::__construct &ndash; Builds the EasyPicassoWidget instance.
- EasyLightPicassoWidget::setKitPageRenderer &ndash; Sets the KitPageRenderer instance.
- EasyLightPicassoWidget::getKitPageRenderer &ndash; 
- EasyLightPicassoWidget::getContainer &ndash; Returns a light service container instance.
- WidgetConfAwarePicassoWidget::setWidgetConf &ndash; Sets the widget configuration.
- WidgetConfAwarePicassoWidget::getWidgetConf &ndash; Returns the widget configuration.
- PicassoWidget::getLibraries &ndash; Returns the libraries of this instance.
- PicassoWidget::setCopilot &ndash; Sets the copilot.
- PicassoWidget::renderFile &ndash; Parses the file identified and returns its interpreted content (by injecting the variables in it).
- PicassoWidget::prepare &ndash; Prepares the widget according to the given widget configuration.
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
Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ChloroformWidget<br>
See the source code of [Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ChloroformWidget](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/Widget/Picasso/ChloroformWidget.php)



SeeAlso
==============
Previous class: [BlogenSidebarIconCardsWidget](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/Widget/Picasso/BlogenSidebarIconCardsWidget.md)<br>Next class: [ColoredBoxesWidget](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/Widget/Picasso/ColoredBoxesWidget.md)<br>
