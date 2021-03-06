[Back to the Ling/Kit api](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit.md)



The BabyYamlConfStorage class
================
2019-04-24 --> 2019-11-25






Introduction
============

The BabyYamlConfStorage interface.
With this storage, the data is organized in pages configuration files.

There is a root directory containing all page configuration files.

You can set this root directory to whatever using the setRootDir method.
Actually, you MUST set the directory, otherwise this class won't know where to search for pages.


Then in the root dir, you put all your configuration files.
They must have the [babyYaml](https://github.com/lingtalfi/BabyYaml) format (the .byml extension).
The file name (without the file extension) is actually the page name.

So when the user calls the getPageConf like this:

```php
getPageConf( page_one )
```

then this class will search for the following file:

- $rootDir/page_one.byml

The content of a page configuration file is defined in the kit documentation
(see the [page configuration array](https://github.com/lingtalfi/Kit/blob/master/README.md#the-kit-configuration-array) for more info).


Also, if a directory with the same name is found, all the .byml files found in it will be merged
to the page configuration file. This allows third-party plugins to participate to the construction
of the page.

So for instance, we can have this kind of structure:

- $rootDir/page_one.byml
- $rootDir/page_one/MyPlugin_One.byml
- $rootDir/page_one/MyPlugin_Two.byml
- $rootDir/page_one/...



Class synopsis
==============


class <span class="pl-k">BabyYamlConfStorage</span> implements [ConfStorageInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/ConfStorageInterface.md), [VariableAwareConfStorageInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/VariableAwareConfStorageInterface.md) {

- Properties
    - protected array [$errors](#property-errors) ;
    - protected string [$rootDir](#property-rootDir) ;
    - protected array [$dynamicVariables](#property-dynamicVariables) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/__construct.md)() : void
    - public [setVariables](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/setVariables.md)(array $variables) : void
    - public [getPageConf](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/getPageConf.md)(string $pageName) : array | false
    - public [getErrors](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/getErrors.md)() : array
    - public [setRootDir](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/setRootDir.md)(string $rootDir) : [BabyYamlConfStorage](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage.md)
    - protected [init](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/init.md)() : void
    - protected [addError](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/addError.md)(string $msg) : void

}




Properties
=============

- <span id="property-errors"><b>errors</b></span>

    This property holds the errors for this instance.
    
    

- <span id="property-rootDir"><b>rootDir</b></span>

    This property holds the rootDir for this instance.
    
    

- <span id="property-dynamicVariables"><b>dynamicVariables</b></span>

    This property holds the dynamicVariables for this instance.
    
    



Methods
==============

- [BabyYamlConfStorage::__construct](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/__construct.md) &ndash; Builds the BabyYamlConfStorage instance.
- [BabyYamlConfStorage::setVariables](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/setVariables.md) &ndash; Sets the variables to inject to this instance.
- [BabyYamlConfStorage::getPageConf](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/getPageConf.md) &ndash; Returns the page conf array for the given $pageName, or false if a problem occurs.
- [BabyYamlConfStorage::getErrors](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/getErrors.md) &ndash; Returns the errors that occurred during the last method call.
- [BabyYamlConfStorage::setRootDir](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/setRootDir.md) &ndash; Sets the rootDir.
- [BabyYamlConfStorage::init](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/init.md) &ndash; Resets the errors array, and check that the rootDir is set.
- [BabyYamlConfStorage::addError](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/addError.md) &ndash; Adds a nice error message.





Location
=============
Ling\Kit\ConfStorage\BabyYamlConfStorage<br>
See the source code of [Ling\Kit\ConfStorage\BabyYamlConfStorage](https://github.com/lingtalfi/Kit/blob/master/ConfStorage/BabyYamlConfStorage.php)



SeeAlso
==============
Next class: [ConfStorageInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/ConfStorageInterface.md)<br>
