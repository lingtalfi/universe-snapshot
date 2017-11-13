Module generator
==================
2017-08-01


It is recommended that you do the following steps:

```txt

- create your schema with mysqlWorkBench


- create the following structure:
   - class-modules
   ----- My
   --------- assets
   ------------- db
   ----------------- my.mwb
   ----------------- my.sql         ( result of exporting my.mwb )
   --------- doc
   ------------- my-database.md     ( documentation )



- ensure that the following script is in your structure (if you want to use the xiao api generator script)
   - scripts
   ----- inc
   --------- xiao-generator.inc.php   (see xiao doc for more info: https://github.com/lingtalfi/XiaoApi)



Then use the generator to end with the following structure:
   - class-modules
   ----- My
   --------- Api
   ------------- ...all files generated by xiao api
   ------------- MyApi.php
   --------- assets
   ------------- db
   ----------------- my.mwb
   ----------------- my.sql        (result of exporting my.mwb, the name is the module name in snake case)
   --------- doc
   ------------- my-database.md    (documentation)
   --------- MyModule.php          (pre-filled)
   --------- MyServices.php        (empty)
   --------- MyHooks.php           (empty)
   - scripts
   ----- xiao-my.php               (api generator script)


```


Here is an example script of how it should be used:

```php
<?php


use KamilleEssentialTools\ModuleGenerator\KamilleModuleGenerator;

require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";




$moduleName = "EkomUserProductHistory";
$tablePrefix = "ekmod_uph_";
$modulesDir = __DIR__ . "/../class-modules";
$xiaoGenAlias = 'xiaoph';
$db = "kamille";




KamilleModuleGenerator::create()
    ->setDatabase($db)
    ->setModuleName($moduleName)
    ->setModulesDir($modulesDir)
    ->setTablePrefix($tablePrefix)
    ->setXiaoGenAlias($xiaoGenAlias)
    ->generate();


```