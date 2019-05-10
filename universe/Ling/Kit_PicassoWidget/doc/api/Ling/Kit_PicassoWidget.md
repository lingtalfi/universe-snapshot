Ling/Kit_PicassoWidget
================
2019-04-24 --> 2019-05-10




Table of contents
===========

- [PicassoWidgetException](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Exception/PicassoWidgetException.md) &ndash; The PicassoWidgetException class.
- [VariableDescriptionDocWriterUtil](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil.md) &ndash; The VariableDescriptionDocWriterUtil class.
    - [VariableDescriptionDocWriterUtil::__construct](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/__construct.md) &ndash; Builds the VariableDescriptionDocWriterUtil instance.
    - [VariableDescriptionDocWriterUtil::setVariablesDescriptionDir](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/setVariablesDescriptionDir.md) &ndash; Sets the variablesDescriptionDir.
    - [VariableDescriptionDocWriterUtil::setImgBaseDir](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/setImgBaseDir.md) &ndash; Sets the imgBaseDir.
    - [VariableDescriptionDocWriterUtil::setImgBaseUrl](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/setImgBaseUrl.md) &ndash; Sets the imgBaseUrl.
    - [VariableDescriptionDocWriterUtil::setWidgetsBaseDir](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/setWidgetsBaseDir.md) &ndash; Sets the widgetsBaseDir.
    - [VariableDescriptionDocWriterUtil::setDocumentDate](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/setDocumentDate.md) &ndash; Sets the documentDate.
    - [VariableDescriptionDocWriterUtil::setDocumentTitle](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/setDocumentTitle.md) &ndash; Sets the documentTitle.
    - [VariableDescriptionDocWriterUtil::writeDoc](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/writeDoc.md) &ndash; Writes the widget documentation to the given file, and returns whether the writing of the file was successful.
- [VariableDescriptionFileGeneratorUtil](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionFileGeneratorUtil.md) &ndash; The VariableDescriptionFileGeneratorUtil class.
    - [VariableDescriptionFileGeneratorUtil::generate](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionFileGeneratorUtil/generate.md) &ndash; Reads a [page configuration array](https://github.com/lingtalfi/Kit#the-kit-configuration-array), and writes a base variable description file for all picasso widgets found.
- [PicassoWidget](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget.md) &ndash; The PicassoWidget class.
    - [PicassoWidget::__construct](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/__construct.md) &ndash; Builds the PicassoWidget instance.
    - [PicassoWidget::getLibraries](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/getLibraries.md) &ndash; Returns the libraries of this instance.
    - [PicassoWidget::renderFile](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/renderFile.md) &ndash; Parses the file identified and returns its interpreted content (by injecting the variables in it).
    - [PicassoWidget::prepare](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/prepare.md) &ndash; Prepares the widget according to the given widget configuration.
    - ZephyrTemplateEngine::render &ndash; Parses the template identified by $resourceId and returns the interpreted template (the template with the variables injected in it).
    - ZephyrTemplateEngine::getErrors &ndash; Returns the errors of this instance.
    - ZephyrTemplateEngine::setDirectory &ndash; Sets the directory.
- [WidgetConfAwarePicassoWidget](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/WidgetConfAwarePicassoWidget.md) &ndash; The WidgetConfAwarePicassoWidget class.
    - [WidgetConfAwarePicassoWidget::__construct](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/WidgetConfAwarePicassoWidget/__construct.md) &ndash; Builds the WidgetConfAwarePicassoWidget instance.
    - [WidgetConfAwarePicassoWidget::setWidgetConf](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/WidgetConfAwarePicassoWidget/setWidgetConf.md) &ndash; Sets the widget configuration.
    - [WidgetConfAwarePicassoWidget::getWidgetConf](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/WidgetConfAwarePicassoWidget/getWidgetConf.md) &ndash; Returns the widget configuration.
    - [PicassoWidget::getLibraries](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/getLibraries.md) &ndash; Returns the libraries of this instance.
    - [PicassoWidget::renderFile](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/renderFile.md) &ndash; Parses the file identified and returns its interpreted content (by injecting the variables in it).
    - [PicassoWidget::prepare](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/prepare.md) &ndash; Prepares the widget according to the given widget configuration.
    - ZephyrTemplateEngine::render &ndash; Parses the template identified by $resourceId and returns the interpreted template (the template with the variables injected in it).
    - ZephyrTemplateEngine::getErrors &ndash; Returns the errors of this instance.
    - ZephyrTemplateEngine::setDirectory &ndash; Sets the directory.
- [WidgetConfAwarePicassoWidgetInterface](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/WidgetConfAwarePicassoWidgetInterface.md) &ndash; The WidgetConfAwarePicassoWidgetInterface interface.
    - [WidgetConfAwarePicassoWidgetInterface::setWidgetConf](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/WidgetConfAwarePicassoWidgetInterface/setWidgetConf.md) &ndash; Sets the widget configuration.
    - [WidgetConfAwarePicassoWidgetInterface::getWidgetConf](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/WidgetConfAwarePicassoWidgetInterface/getWidgetConf.md) &ndash; Returns the widget configuration.
- [PicassoWidgetHandler](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler.md) &ndash; The PicassoWidgetHandler class.
    - [PicassoWidgetHandler::__construct](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/__construct.md) &ndash; Builds the PicassoWidgetHandler instance.
    - [PicassoWidgetHandler::setWidgetBaseDir](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/setWidgetBaseDir.md) &ndash; Sets the widgetBaseDir.
    - [PicassoWidgetHandler::handle](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/handle.md) &ndash; Returns the html code of the widget, according to the widget configuration.


Dependencies
============
- [Kit](https://github.com/lingtalfi/Kit)
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [DirScanner](https://github.com/lingtalfi/DirScanner)
- [HtmlPageTools](https://github.com/lingtalfi/HtmlPageTools)
- [ZephyrTemplateEngine](https://github.com/lingtalfi/ZephyrTemplateEngine)

