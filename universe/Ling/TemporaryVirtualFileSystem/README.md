TemporaryVirtualFileSystem
===========
2020-04-17 -> 2020-06-01



This tool helps you implement a temporary virtual file system.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/TemporaryVirtualFileSystem
```

Or just download it and place it where you want otherwise.






Summary
===========
- [TemporaryVirtualFileSystem api](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/pages/conception-notes.md)






History Log
=============

- 1.11.3 -- 2020-06-01

    - fix TemporaryVirtualFileSystem->addEntry not allowing path=null
    
- 1.11.2 -- 2020-05-22

    - fix TemporaryVirtualFileSystem->updateEntry allowing path=null
    
- 1.11.1 -- 2020-05-21

    - fix TemporaryVirtualFileSystem->addEntry returning wrong array
    
- 1.11.0 -- 2020-05-20

    - the path property of an update operation can now be null
    
- 1.10.1 -- 2020-05-19

    - change TemporaryVirtualFileSystemInterface->commit option name to reset
    
- 1.10.0 -- 2020-05-19

    - add TemporaryVirtualFileSystemInterface->commit options argument
    
- 1.9.0 -- 2020-05-19

    - add abs_path to the commit list
    
- 1.8.0 -- 2020-05-19

    - implement TemporaryVirtualFileSystem->commit
    
- 1.7.0 -- 2020-05-15

    - add TemporaryVirtualFileSystem->onFileRemovedAfter hook method
    
- 1.6.1 -- 2020-05-14

    - fix TemporaryVirtualFileSystem->getRawOperations typo
    
- 1.6.0 -- 2020-05-14

    - add TemporaryVirtualFileSystem->getRawOperations method
    
- 1.5.0 -- 2020-05-14

    - add TemporaryVirtualFileSystem->doGetEntryRealPathByOperation
    
- 1.4.2 -- 2020-05-13

    - fix TemporaryVirtualFileSystem->updateEntry not merging with old meta
    
- 1.4.1 -- 2020-05-13

    - fix TemporaryVirtualFileSystem->onFileAddedAfter hook not called properly

- 1.4.0 -- 2020-05-13

    - update TemporaryVirtualFileSystem->onFileAddedAfter hook method, now can update the operation
    
- 1.3.0 -- 2020-05-13

    - update TemporaryVirtualFileSystemInterface->update method, now returns an array
    
- 1.2.2 -- 2020-05-13

    - optimize TemporaryVirtualFileSystem copying files when not necessary
    
- 1.2.1 -- 2020-04-20

    - fix TemporaryVirtualFileSystem->removeEntry not removing the associated binary file
    
- 1.2.0 -- 2020-04-20

    - add TemporaryVirtualFileSystemInterface->get options parameter with realpath entry
    
- 1.1.0 -- 2020-04-20

    - update file url is now file id
    
- 1.0.1 -- 2020-04-17

    - fix conception notes typo
    
- 1.0.0 -- 2020-04-17

    - initial commit