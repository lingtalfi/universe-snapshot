PlanetSitemap
===========
2019-03-14



Create simple sitemap for your planets.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/PlanetSitemap
```

Or just download it and place it where you want otherwise.


Summary
===========
- [PlanetSitemap api](https://github.com/lingtalfi/PlanetSitemap/blob/master/doc/api/Ling/PlanetSitemap.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [How to use?](#how-to-use)
- [History log](#history-log)




How to use?
==============

The code below will create the **sitemap.txt** file at the root of the [CliTools planet](https://github.com/lingtalfi/CliTools).


```php
$planetDir = "/myphp/universe/Ling/CliTools";
$baseUrl = "https://github.com/lingtalfi";
PlanetSitemapHelper::createGithubSitemap($planetDir, $baseUrl);
```











History Log
=============
    
- 1.0.1 -- 2019-03-14

    - add summary to README.md

- 1.0.0 -- 2019-03-14

    - initial commit