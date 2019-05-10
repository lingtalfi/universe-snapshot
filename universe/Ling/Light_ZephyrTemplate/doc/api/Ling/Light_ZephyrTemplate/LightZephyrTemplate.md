[Back to the Ling/Light_ZephyrTemplate api](https://github.com/lingtalfi/Light_ZephyrTemplate/blob/master/doc/api/Ling/Light_ZephyrTemplate.md)



The LightZephyrTemplate class
================
2019-04-09 --> 2019-04-09






Introduction
============

The LightZephyrTemplate class.



Class synopsis
==============


class <span class="pl-k">LightZephyrTemplate</span> extends [ZephyrTemplateEngine](https://github.com/lingtalfi/ZephyrTemplateEngine) implements [UniversalTemplateEngineInterface](https://github.com/lingtalfi/UniversalTemplateEngine/blob/master/UniversalTemplateEngineInterface.php) {

- Inherited methods
    - public ZephyrTemplateEngine::__construct() : void
    - public ZephyrTemplateEngine::render(string $resourceId, array $variables = []) : false | string
    - public ZephyrTemplateEngine::getErrors() : array
    - public ZephyrTemplateEngine::setDirectory(string $directory) : void
    - protected ZephyrTemplateEngine::interpret(string $___path, array $z) : false | string
    - private ZephyrTemplateEngine::addError(string $msg) : void

}






Methods
==============

- ZephyrTemplateEngine::__construct &ndash; Builds the ZephyrTemplateEngine instance.
- ZephyrTemplateEngine::render &ndash; Parses the template identified by $resourceId and returns the interpreted template (the template with the variables injected in it).
- ZephyrTemplateEngine::getErrors &ndash; Returns the errors of this instance.
- ZephyrTemplateEngine::setDirectory &ndash; Sets the directory.
- ZephyrTemplateEngine::interpret &ndash; and returns the resulting html code.
- ZephyrTemplateEngine::addError &ndash; Adds an error to this instance.





Location
=============
Ling\Light_ZephyrTemplate\LightZephyrTemplate

