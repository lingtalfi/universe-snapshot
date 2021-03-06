GormanJsonDecoder
===========
2020-05-28



An alternative to json_encode which encode callbacks too.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/GormanJsonDecoder
```

Or just download it and place it where you want otherwise.






Summary
===========
- Pages
    - [Conception notes](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/doc/pages/conception-notes.md)


Usage
=========


```php 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
</head>

<body>


<?php


require_once "init.inc.php"; // just the autoloader for the GormanJsonDecoder


use Ling\GormanJsonDecoder\GormanJsonDecoder;

$arr = GormanJsonDecoder::encode([
    'a' => 123,
    'b' => true,
    'c' => "a string",
    'd' => [
        "fruits" => ['apple', 'banana'],
        "dogs" => 4,
    ],
    'e' => 'function(arg1){
        console.log("I was called with arg: " + arg1);
        return 456;
    }',
    'f' => null,
], ['e']);

?>


<script>

    let arr = <?php echo GormanJsonDecoder::decode($arr); ?>;
    console.log(arr.e("hello"));
    // will output:
    // I was called with arg
    // 456


</script>
</body>
</html>
```


See more in the [conception notes](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/doc/pages/conception-notes.md).





History Log
=============

- 1.1.0 -- 2020-05-28

    - changed workflow
    
- 1.0.1 -- 2020-05-28

    - fix typo in code and in README.md
    
- 1.0.0 -- 2020-05-28

    - initial commit