Light_DatabaseInfo
===========
2019-09-12 -> 2020-07-07



A [light](https://github.com/lingtalfi/Light) service to access database information.
 

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_DatabaseInfo
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_DatabaseInfo api](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages:
    - [Conception notes](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/pages/conception-notes.md)
- [Services](#services)




Services
=========


This plugin provides the following services:

- database_info


Here is the content of the service configuration file:

```yaml
database_info:
    instance: Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService
    methods:
        setCacheDir:
            dir: ${app_dir}/cache/Light_DatabaseInfo
        setContainer:
            container: @container()



```




History Log
=============

    
- 1.12.0 -- 2020-07-07

    - add LightDatabaseInfoService->hasTable
    
- 1.11.0 -- 2020-02-13

    - update LightDatabaseInfoService->getTableInfo, now also returns the referencedByTables and hasItems properties 
    
- 1.10.0 -- 2020-02-03

    - replaced TypeHelper by external dependency
    
- 1.9.0 -- 2019-11-13

    - update LightDatabaseInfoService->getTableInfo, now also returns the database entry

- 1.8.1 -- 2019-11-13

    - fix functional typo in TypeHelper::getSimpleTypes
    
- 1.8.0 -- 2019-11-13

    - update LightDatabaseInfoService->getTableInfo, now returns simpleTypes entry

- 1.7.0 -- 2019-11-13

    - update LightDatabaseInfoService->getTableInfo, now returns foreignKeysInfo entry
    
- 1.6.0 -- 2019-11-04

    - updated LightDatabaseInfoService->getTables, now returns a ricStrict entry
    
- 1.5.0 -- 2019-10-24

    - add LightDatabaseInfoService->getTables method
    
- 1.4.0 -- 2019-10-23

    - updated LightDatabaseInfoService->getTableInfo method, now also returns uniqueIndexes

- 1.3.0 -- 2019-09-12

    - updated LightDatabaseInfoService->getTableInfo method, now returns the autoIncrementedKey

- 1.2.0 -- 2019-09-12

    - updated LightDatabaseInfoService->getTableInfo method, now returns the types
    
- 1.1.0 -- 2019-09-12

    - added LightDatabaseInfoService->getTablesByPrefix method
    - updated LightDatabaseInfoService fetch methods, added the database argument
    
- 1.0.3 -- 2019-09-12

    - fix ric link in the doc
    
- 1.0.2 -- 2019-09-12

    - fix LightDatabaseInfoService->getTableInfo comment
    
- 1.0.1 -- 2019-09-12

    - fix doc link
    
- 1.0.0 -- 2019-09-12

    - initial commit