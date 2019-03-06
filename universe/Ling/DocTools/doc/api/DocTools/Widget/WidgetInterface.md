[Back to the DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools.md)



The WidgetInterface class
================
2019-02-21 --> 2019-03-05






Introduction
============

The interface for all DocTools widgets.

A widget is a class that displays a visual component on the screen, like a list or a menu for instance.
The idea behind the widgets is that we can then compose a page by displaying widgets on it,
rather than hardcoding everything from scratch every time we want to build a new doc style.

All widgets return markdown code.
The idea is that we can later convert the markdown to html (with a one liner) if we so desire.


You will use widgets to create your own [DocBuilder](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/DocBuilder/DocBuilder.md) object.



Class synopsis
==============


abstract class <span class="pl-k">WidgetInterface</span>  {

- Methods
    - abstract public [render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/WidgetInterface/render.md)() : string

}






Methods
==============

- [WidgetInterface::render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/WidgetInterface/render.md) &ndash; Returns the rendered widget.





Location
=============
DocTools\Widget\WidgetInterface


SeeAlso
==============
Previous class: [Widget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/Widget.md)<br>