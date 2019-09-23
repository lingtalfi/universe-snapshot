[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\DocBuilder\Light_ApplicationConfigurator\Light_ApplicationConfiguratorDocBuilder class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Light_ApplicationConfigurator/Light_ApplicationConfiguratorDocBuilder.md)


Light_ApplicationConfiguratorDocBuilder::buildDoc
================



Light_ApplicationConfiguratorDocBuilder::buildDoc — Launch this function to generate the documentation for the Light_ApplicationConfigurator planet.




Description
================


public static [Light_ApplicationConfiguratorDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Light_ApplicationConfigurator/Light_ApplicationConfiguratorDocBuilder/buildDoc.md)($htmlMode = false) : void




Launch this function to generate the documentation for the Light_ApplicationConfigurator planet.
(based on the LingGitPhpPlanetDocBuilder doc builder.

If htmlMode is false (the default),
this method will generate all files in md format in the following directory:

- /myphp/universe/Light_ApplicationConfigurator/doc



If htmlMode is true,
then html files will be generated (instead of md files).
You can then browse the result at: http://jindoc/api



This method will also show the documentation report.




Parameters
================


- htmlMode

    


Return values
================

Returns void.


Exceptions thrown
================

- [DocBuilderException](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Exception/DocBuilderException.md).&nbsp;







Source Code
===========
See the source code for method [Light_ApplicationConfiguratorDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/DocBuilder/Light_ApplicationConfigurator/Light_ApplicationConfiguratorDocBuilder.php#L44-L199)


See Also
================

The [Light_ApplicationConfiguratorDocBuilder](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Light_ApplicationConfigurator/Light_ApplicationConfiguratorDocBuilder.md) class.


