[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Report\HtmlReport class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/HtmlReport.md)


HtmlReport::getTableSection
================



HtmlReport::getTableSection — Returns a table widget.




Description
================


private [HtmlReport::getTableSection](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/HtmlReport/getTableSection.md)(string $title, string $id, array $headers, array $rows, ?$nbItems = null, ?$acceptWarning = true) : array




Returns a table widget.




Parameters
================


- title

    

- id

    

- headers

    

- rows

    

- nbItems

    

- acceptWarning

    


Return values
================

Returns array.
- type: string. The type of widget.
             Available types:
                 - table
     - title: string. The widget title.
     - id: string. The identifier of the widget: it's basically the anchor of the widget title,
             without the starting pound symbol (#).
     - ?table: string. Only used if type=table. The html of the table.
     - ?nbItems: int. Only if type=table. The number of items of the table.







Source Code
===========
See the source code for method [HtmlReport::getTableSection](https://github.com/lingtalfi/DocTools/blob/master/Report/HtmlReport.php#L532-L554)


See Also
================

The [HtmlReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/HtmlReport.md) class.

Previous method: [__toString](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/HtmlReport/__toString.md)<br>

