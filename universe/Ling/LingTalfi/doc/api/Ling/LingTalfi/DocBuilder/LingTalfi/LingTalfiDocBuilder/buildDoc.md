[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\DocBuilder\LingTalfi\LingTalfiDocBuilder class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/LingTalfi/LingTalfiDocBuilder.md)


LingTalfiDocBuilder::buildDoc
================



LingTalfiDocBuilder::buildDoc — Launch this function to generate the documentation for the LingTalfi planet.




Description
================


public static [LingTalfiDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/LingTalfi/LingTalfiDocBuilder/buildDoc.md)($htmlMode = false) : void




Launch this function to generate the documentation for the LingTalfi planet.
(based on the LingGitPhpPlanetDocBuilder doc builder.

If htmlMode is false (the default),
this method will generate all files in md format in the following directory:

- /myphp/universe/LingTalfi/doc

Including a README.md file, that you should manually put at the root of the DocTools planet directory.
You can then push to github.


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








See Also
================

The [LingTalfiDocBuilder](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/LingTalfi/LingTalfiDocBuilder.md) class.


