[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\HttpJsonResponse class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse.md)


HttpJsonResponse::create
================



HttpJsonResponse::create — Creates and returns the http json response instance.




Description
================


public static [HttpJsonResponse::create](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse/create.md)($data) : [HttpJsonResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse.md)




Creates and returns the http json response instance.




Parameters
================


- data

    The raw data. Note: this method will convert it to json internally.



Note: this method has no benefit over a regular constructor, but I keep it for legacy purpose.


Return values
================

Returns [HttpJsonResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse.md).








Source Code
===========
See the source code for method [HttpJsonResponse::create](https://github.com/lingtalfi/Light/blob/master/Http/HttpJsonResponse.php#L37-L40)


See Also
================

The [HttpJsonResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse/__construct.md)<br>Next method: [sendHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse/sendHeaders.md)<br>

