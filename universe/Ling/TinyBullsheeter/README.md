TinyBullsheeter
===========
2019-08-14



A helper to generate fake data for a database.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/TinyBullsheeter
```

Or just download it and place it where you want otherwise.






Summary
===========
- [TinyBullsheeter api](https://github.com/lingtalfi/TinyBullsheeter/blob/master/doc/api/Ling/TinyBullsheeter.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [How does it work?](#how-does-it-work)
- [Examples](#examples)
- [Related](#related)




How does it work?
==============

Call the different methods of the class:

- [getRandomPseudo](https://github.com/lingtalfi/TinyBullsheeter/blob/master/doc/api/Ling/TinyBullsheeter/TinyBullsheeterTool/getRandomPseudo.md)


Note: this is an update on my previous [BullSheet](https://github.com/lingtalfi/BullSheet) repository.
The problem I had with BullSheet was that it requires you to setup a directory containing all the fake data,
while I wanted a tool that could generate random data without me to setup anything. So TinyBullsheeter does just that:
it generates data for you, you don't have to prepare anything, just call the methods.



Examples
===========




This code:

```php
for ($i = 1; $i <= 10; $i++) {
    a(TinyBullsheeterTool::getRandomPseudo());
}
```


Will produce something like this:

```html
string(6) "rashes"

string(12) "sanchez.ella"

string(16) "madison-phillips"

string(8) "lil_dove"

string(8) "paradise"

string(9) "foxy_lady"

string(14) "grayson_tucker"

string(8) "lifeline"

string(11) "camila-gray"

string(8) "lane_eva"

```




Related
==========

- [BullSheet](https://github.com/lingtalfi/BullSheet): the big brother of TinyBullsheeter. 



History Log
=============

- 1.0.0 -- 2019-08-14

    - initial commit