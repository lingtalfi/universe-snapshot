[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Router\LightRouterInterface class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface.md)


LightRouterInterface::match
================



LightRouterInterface::match — Tests the given httpRequest against the routes until one matches.




Description
================


abstract public [LightRouterInterface::match](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface/match.md)([Ling\Light\Http\HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) $request, array $routes) : false | array




Tests the given httpRequest against the routes until one matches.
If one route matches, it returns the matching route.
If no route matches, it returns false.

A route is just an array which structure is detailed on [the route page](https://github.com/lingtalfi/Light/blob/master/doc/pages/route.md).




Parameters
================


- request

    

- routes

    


Return values
================

Returns false | array.








Source Code
===========
See the source code for method [LightRouterInterface::match](https://github.com/lingtalfi/Light/blob/master/Router/LightRouterInterface.php#L35-L35)


See Also
================

The [LightRouterInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface.md) class.

Next method: [getMatchingRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface/getMatchingRoute.md)<br>

