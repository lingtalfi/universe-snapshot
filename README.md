Universe snapshot
=====================
2016-01-02 -- 2018-03-01



The universe is an extendable multi-purpose library of php classes.




Features
---------------

- one liner setup 
- unified naming convention based on psr-0 for all the classes



Metaphor
-------------

The sum of all universes is called multi-verse.
A developer creates her own universe(s).
Each universe consists of a collection of classes called planets.




Guide for the new developer
-------------------

Here are the few guidelines I can think of:

- Every planet should be named using the [BSR-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) naming convention,
which is a simplified version of the well known psr-0 naming convention.




Installation
-----------------

First, clone (or download) the universe where you want.

```bash
cd /path/to/where/you/want/to/install
git clone https://github.com/karayabin/universe-snapshot.git
```


You will end up with a universe-snapshots directory with the following structure:


- universe-snapshots/
    - bigbang.php
    - planets/


Now that the universe is on your machine, you can use it.

I personally always rename it to universe, and I would recommend you to do the same:

```bash
mv universe-snapshots universe
```



Also, I like to (and recommend to) install the [universe naive importer](https://github.com/lingtalfi/universe-naive-importer) (**uni**) tool, which
is a console interface to the universe planets.
The uni tool is actually a good way to manage your planets.

The https://github.com/karayabin/universe-snapshot is sometimes not up-to-date, while the uni tool manage planets at their sources and therefore always has the latest versions of the planets.
Install the uni tool and perform this last step to ensure you are working with the latest versions of the planets:

```bash
cd universe
uni importall -f
```


Now you are done :)


Bigbang
------------------------------------------

Bigbang is the name of the script that starts the universe.

It basically contains the universe autoloader.

If you want to use a planet (class) from the universe in your application, you need to call the bigbang script, once.

Note: if you know what you are doing, you can bypass the **bigbang.php** script and use your own autoloading system.

 
There are at least two ways to invoke the bigbang, the portable way (recommended), and the hard link way.


### Portable bigbang

Put the universe directory (universe-snapshots) in the include_path directive of your php ini.
Note that in this case you only need to do this once per machine (one universe per machine). 

Then put the following line at the beginning of your application (probably an init file):

```php
require_once "bigbang.php";
```

Done! from now on, any planet is available to you.

This is the recommended solution, because when you upload your app to another machine with the universe setup (in the php ini's include_path),
then you don't need to change the path to the bigbang script in your application.



### hard link bigbang

The other way is simply to include the bigbang file wherever it is:

```php
require_once "/path/to/bigbang.php";
```




In either cases, to use a class in your project, just call it:


```php
// Note: most IDE will generate this line for you as you type the other line below...
use My\Awesome\MegaClass;

// ...therefore in most cases you just need to type this line (and this IDE mechanism is a huge time saver by the way)
$translator = new MegaClass();
```



### adding your own classes

When creating a php application, you will need to extend the universe to your needs.
You do so by creating your own classes.

The good news is that the universe is easily expandable.

Start by creating a "class" directory (or any other name you like) in your project and put 
all your custom classes in there (using the BSR-0 naming convention).


```bash
cd /my/app
mkdir class
mkdir -p class/My/Awesome/MegaClass.php
```

The file will contain something like this:

```php
<?php 

namespace My\Awesome;


class MegaClass{
    // your code...
}

```



Now the last thing you need to do is make sure that the autoloader will parse your "class" directory.

If you are using the **Portable bigbang** method, you need to revisit the bigbang one liner setup, and turn it into this:

```php
$__butineurStart = false; 
require_once "bigbang.php";  
ButineurAutoloader::getInst()
->addLocation(__DIR__ . "/class")
// ->addLocation(__DIR__ . "/another_class_dir") // you could add other directories if needed...
->start();
```

We use the **$__butineurStart** variable to tell the bigbang.php script that we will start the universe manually.

Then we add our own dependencies (the **class** directory), and call the start method when ready.



### Bigbang bonus: a and az debug functions

If you look inside the bigbang.php script, you will see that there are two functions definitions at the end: a and az.



**a** is basically an alias for var_dump, since it's probably the function I use the most in php.

**az** does the same, plus it exits the current script.

I can't emphasize enough how much time those two aliases cut the debug time.


Anyway, if you don't use them, you can throw them away, no big deal.







Final words
------------------

Well, that's the end of the party.
See you next time (this paragraph is ridiculously useless and should have been deleted). 




