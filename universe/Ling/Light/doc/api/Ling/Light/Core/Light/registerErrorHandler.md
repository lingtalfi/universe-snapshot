[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Core\Light class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)


Light::registerErrorHandler
================



Light::registerErrorHandler — Registers a error handler callback.




Description
================


public [Light::registerErrorHandler](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/registerErrorHandler.md)(callable $errorHandler) : void




Registers a error handler callback.

The error handler callback is a callback with the following signature:

```txt
     function errorHandler ( $errorType, \Exception $e, &$response = null )
```

The error handler callback should handle the given exception if necessary (i.e. if it can
handle this errorType} and set the response to either a string or an HttpResponseInterface.

Note: multiple error handlers will be in concurrence for handling a given error, and the first
handler to return a response will be used (i.e. subsequent handlers will be discarded).

Note: the errorType might be null.




Parameters
================


- errorHandler

    


Return values
================

Returns void.








See Also
================

The [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) class.

Previous method: [getRoutes](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/getRoutes.md)<br>Next method: [run](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/run.md)<br>
