[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The LightRouterInterface class
================
2019-04-09 --> 2019-05-02






Introduction
============

The LightRouterInterface interface.


The router in the Light framework is the object which chooses the controller to execute, based on the http request.
The controller being just a function which usually renders an html page.



Class synopsis
==============


abstract class <span class="pl-k">LightRouterInterface</span>  {

- Methods
    - abstract public [match](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface/match.md)([Ling\Light\Http\HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) $request, array $routes) : false | array

}






Methods
==============

- [LightRouterInterface::match](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface/match.md) &ndash; Tests the given httpRequest against the routes until one matches.





Location
=============
Ling\Light\Router\LightRouterInterface


SeeAlso
==============
Previous class: [LightRouter](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter.md)<br>Next class: [LightBlueServiceContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightBlueServiceContainer.md)<br>