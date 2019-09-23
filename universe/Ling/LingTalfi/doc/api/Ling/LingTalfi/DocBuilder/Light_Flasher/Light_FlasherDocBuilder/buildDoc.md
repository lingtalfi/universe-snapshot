[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\DocBuilder\Light_Flasher\Light_FlasherDocBuilder class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Light_Flasher/Light_FlasherDocBuilder.md)


Light_FlasherDocBuilder::buildDoc
================



Light_FlasherDocBuilder::buildDoc — Launch this function to generate the documentation for the Light_Flasher planet.




Description
================


public static [Light_FlasherDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Light_Flasher/Light_FlasherDocBuilder/buildDoc.md)($htmlMode = false) : void




Launch this function to generate the documentation for the Light_Flasher planet.
(based on the LingGitPhpPlanetDocBuilder doc builder.

If htmlMode is false (the default),
this method will generate all files in md format in the following directory:

- /myphp/universe/Light_Flasher/doc



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
See the source code for method [Light_FlasherDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/DocBuilder/Light_Flasher/Light_FlasherDocBuilder.php#L44-L200)


See Also
================

The [Light_FlasherDocBuilder](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Light_Flasher/Light_FlasherDocBuilder.md) class.


