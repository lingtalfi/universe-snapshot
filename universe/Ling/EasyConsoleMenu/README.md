EasyConsoleMenu
===========
2019-04-03



Generate console interfaces quickly. 



This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/EasyConsoleMenu
```

Or just download it and place it where you want otherwise.




![Easy console menu screenshot](http://lingtalfi.com/img/universe/EasyConsoleMenu/easy-console-menu.png)


Summary
===========
- [EasyConsoleMenu api](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Easy menu configuration file](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/pages/easy-menu-configuration-file.md)
- [How to use](#how-to-use)




How to use
===========

We call the **executeMenu** method of the **MenuExecutor** object, like this:



```php
#!/usr/bin/env php
<?php


use Ling\CliTools\Output\Output;
use Ling\EasyConsoleMenu\MenuExecutor;


require_once "/myphp/universe/bigbang.php"; // activate universe




$output = new Output();
$menu = new MenuExecutor();
$file = "/komin/jin_site_demo/universe/Ling/Deploy/menu.byml";
$menu->executeMenu($file, $output);
```

All the interactive program is encoded in the configuration file.

See more details in [the configuration file page](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/pages/easy-menu-configuration-file.md).





History Log
=============

- 1.0.1 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.0.0 -- 2019-04-03

    - initial commit