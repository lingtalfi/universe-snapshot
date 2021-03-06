[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The WidgetInterface class
================
2019-02-21 --> 2020-06-29






Introduction
============

The interface for all DocTools widgets.

A widget is a class that displays a visual component on the screen, like a list or a menu for instance.
The idea behind the widgets is that we can then compose a page by displaying widgets on it,
rather than hardcoding everything from scratch every time we want to build a new doc style.

All widgets return markdown code.
The idea is that we can later convert the markdown to html (with a one liner) if we so desire.


You will use widgets to create your own [DocBuilder](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder.md) object.



Class synopsis
==============


abstract class <span class="pl-k">WidgetInterface</span>  {

- Methods
    - abstract public [render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/WidgetInterface/render.md)() : string

}






Methods
==============

- [WidgetInterface::render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/WidgetInterface/render.md) &ndash; Returns the rendered widget.





Location
=============
Ling\DocTools\Widget\WidgetInterface<br>
See the source code of [Ling\DocTools\Widget\WidgetInterface](https://github.com/lingtalfi/DocTools/blob/master/Widget/WidgetInterface.php)



SeeAlso
==============
Previous class: [Widget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/Widget.md)<br>
