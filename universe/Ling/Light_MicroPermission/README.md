Light_MicroPermission
===========
2019-09-26 -> 2020-07-06



A light service to handle permissions with an extra layer of organization.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_MicroPermission
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_MicroPermission api](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/pages/conception-notes.md)
    - [Recommended micro permission notation](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/pages/recommended-micropermission-notation.md)
- [Services](#services)
- [Related](#related)



Services
=========


This plugin provides the following services:

- micro_permission (returns a LightMicroPermissionService instance)



Here is an example of the service configuration:

```yaml
micro_permission:
    instance: Ling\Light_MicroPermission\Service\LightMicroPermissionService
    methods:
        setContainer:
            container: @container()






```



Related
===========
- [Light_UserRowRestriction](https://github.com/lingtalfi/Light_UserRowRestriction)





History Log
=============

- 2.6.1 -- 2020-07-06

    - fix LightMicroPermissionService->registerMicroPermissionsByProfile not working properly

- 2.6.0 -- 2020-07-03

    - add LightMicroPermissionService->registerMicroPermissionsByProfile
    
- 2.5.0 -- 2020-03-10

    - removed LightMicroPermissionDatabaseEventHandler class
    
- 2.4.0 -- 2020-03-02

    - add LightMicroPermissionDatabaseEventHandler class
    
- 2.3.1 -- 2019-12-20

    - add personal memo in conception notes
    
- 2.3.0 -- 2019-12-20

    - add LightMicroPermissionTrait trait
    
- 2.2.0 -- 2019-12-20

    - update LightMicroPermissionService->restoreNamespaces add namespace optional argument

- 2.1.0 -- 2019-12-19

    - replace mode system with disabledNamespace system
    
- 2.0.1 -- 2019-12-18

    - forgot implementation of mode
    
- 2.0.0 -- 2019-12-18

    - new system
    
- 1.1.2 -- 2019-10-30

    - add "Recommended micro permission notation" document
    
- 1.1.1 -- 2019-09-27

    - fix typo
    
- 1.1.0 -- 2019-09-27

    - add BabyYamlMicroPermissionResolver
    - fix LightMicroPermissionResolverInterface using microPermissionId instead of microPermission
    
- 1.0.0 -- 2019-09-26

    - initial commit