PhpExcelTool
===========
2017-10-17


A personal helper for using the PHPOffice/PHPExcel library.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import PhpExcelTool
```

Or just download it and place it where you want otherwise.




How to
==========


```php
<?php

$file = "/Users/me/Downloads/Liste des Villes Equipements.xlsx";
$colValues = PhpExcelTool::getColumnValues("C", $file);

```





```php
<?php

$rows = [];
// populating rows...

$target = __DIR__ . "/baked/liste-salle-sport.xlsx";
$ret = PhpExcelTool::createExcelFileByData($target, $rows, [
    'propertiesFn' => function (PHPExcel_DocumentProperties $props) {
        $props->setCreator("LingTalfi")
            ->setTitle("Liste des salles de sport")
            ->setSubject("Liste des salles");
    }
]);
a($ret); // null, means ok

```


```php
<?php 
$file = "/myphp/leaderfit/leaderfit/class-modules/ThisApp/assets/fixtures/ID_CATEGORIES.XLSX";
$rows = PhpExcelTool::getColumnsAsRows([
    "A" => "parent_id",
    "B" => "id",
    "C" => "name",
], $file, 1);
az($rows);
```



Creating a table (in the database) corresponding to a XLSX file
-------------------------

Note that this method requires the [QuickPdo](https://github.com/lingtalfi/Quickpdo) planet.


```php

// simplest example, using the defaults
$file = "/Users/miaou/Downloads/DESCRIPTIF__FORMATIONS-1.XLSX";
PhpExcelTool::file2Table($file);



// example with a column map
$file = "/Users/miaou/Downloads/LIEUX__FORMATIONS-1.XLSX";
PhpExcelTool::file2Table($file, [
    'database' => "formation_tmp",
    'columnsMap' => [
        "A" => "reference",
        "B" => "lieu",
    ],
]);


// another example with a column map and a rowCallback function to fix the dates
/**
 * Note that by default dates are stored as number of days from an origin date in excel
 * (at least from what I read)
 */
$file = "/Users/miaou/Downloads/DATES__FORMATIONS-2.XLSX";
PhpExcelTool::file2Table($file, [
    'database' => "formation_tmp",
    'tableName' => "dates_formations",
    'columnsMap' => [
        "A" => "reference",
        "B" => "ref_formation",
        "C" => "date_depart",
    ],
    'rowCallback' => function ($column, $value, array $row) {
        if ('date_depart' === $column) {
            $value = PhpExcelToolHelper::asDate($value, "1899-12-30");
        }
        return $value;
    },
]);


// another example using the column types map
$file = "/Users/miaou/Downloads/DESCRIPTIF__FORMATIONS-1.XLSX";
PhpExcelTool::file2Table($file, [
    'database' => "formation_tmp",
    'tableName' => "details_formation",
    'colTypes' => [
        "I" => "TEXT",
    ],
]);


```


History Log
------------------
    
- 1.9.0 -- 2018-05-29

    - add PhpExcelTool::getRowValues useLetterAsKey option 
    
- 1.8.0 -- 2018-05-29

    - add PhpExcelTool::getRowValues method 
    
- 1.7.0 -- 2018-05-29

    - add PhpExcelTool::getAllAsRows method 
    
- 1.6.0 -- 2018-05-18

    - add PhpExcelTool::table2File method 
    
- 1.5.1 -- 2018-05-18

    - fix internal letter incrementor now can handle multiple letters (A -> AG) 
    
- 1.5.0 -- 2018-05-01

    - update PhpExcelTool::file2Table, moved the second argument to options, allowing smaller invocation code

- 1.4.0 -- 2018-04-30

    - add PhpExcelTool::file2Table rowCallback option
    - add PhpExcelToolHelper class

- 1.3.0 -- 2018-04-30

    - add PhpExcelTool::file2Table method

- 1.2.0 -- 2018-04-13

    - add getColumnsAsRows method
    - Now ships with the PHPOffice/PHPExcel library, since it's marked as deprecated by its authors
    
- 1.1.0 -- 2017-10-18

    - add PhpExcelTool::createExcelFileByData method
    
- 1.0.0 -- 2017-10-17

    - initial commit