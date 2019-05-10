[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The HttpRequestInterface class
================
2019-04-09 --> 2019-05-02






Introduction
============

The HttpRequestInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">HttpRequestInterface</span>  {

- Methods
    - abstract public [getMethod](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getMethod.md)() : string
    - abstract public [getUri](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getUri.md)() : string
    - abstract public [getUriPath](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getUriPath.md)() : string
    - abstract public [getQueryString](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getQueryString.md)() : string
    - abstract public [getQueryArgs](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getQueryArgs.md)() : array
    - abstract public [getTime](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getTime.md)() : float
    - abstract public [getHost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getHost.md)() : string
    - abstract public [isHttpsRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/isHttpsRequest.md)() : bool
    - abstract public [getPort](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getPort.md)() : int
    - abstract public [getIp](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getIp.md)() : string
    - abstract public [getReferer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getReferer.md)() : string | null
    - abstract public [getHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getHeaders.md)() : array
    - abstract public [getHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getHeader.md)(string $header, $default = null) : string | mixed
    - abstract public [getGet](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getGet.md)() : array
    - abstract public [getPost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getPost.md)() : array
    - abstract public [getFiles](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getFiles.md)() : array
    - abstract public [getCookie](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getCookie.md)() : array

}






Methods
==============

- [HttpRequestInterface::getMethod](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getMethod.md) &ndash; Returns the http method used for the request, in lower case.
- [HttpRequestInterface::getUri](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getUri.md) &ndash; Returns the uri of the http request.
- [HttpRequestInterface::getUriPath](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getUriPath.md) &ndash; Returns the uriPath of the http request.
- [HttpRequestInterface::getQueryString](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getQueryString.md) &ndash; Returns the queryString of the http request.
- [HttpRequestInterface::getQueryArgs](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getQueryArgs.md) &ndash; Returns the array version of the query string of the http request.
- [HttpRequestInterface::getTime](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getTime.md) &ndash; The time when the http request was created.
- [HttpRequestInterface::getHost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getHost.md) &ndash; Returns the host of the http request.
- [HttpRequestInterface::isHttpsRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/isHttpsRequest.md) &ndash; Returns whether the request is a secure http request (using https).
- [HttpRequestInterface::getPort](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getPort.md) &ndash; Returns the port number of the http request.
- [HttpRequestInterface::getIp](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getIp.md) &ndash; Returns the ip address of the user.
- [HttpRequestInterface::getReferer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getReferer.md) &ndash; Returns the http referer of the http request when available, or null otherwise.
- [HttpRequestInterface::getHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getHeaders.md) &ndash; Returns an array of the http headers attached to the http request.
- [HttpRequestInterface::getHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getHeader.md) &ndash; Returns the value of a specific header.
- [HttpRequestInterface::getGet](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getGet.md) &ndash; Returns the original $_GET array attached with the http request.
- [HttpRequestInterface::getPost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getPost.md) &ndash; Returns the original $_POST array attached with the http request.
- [HttpRequestInterface::getFiles](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getFiles.md) &ndash; https://github.com/karayabin/universe-snapshot/tree/master/planets/PhpUploadFileFix for more info).
- [HttpRequestInterface::getCookie](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getCookie.md) &ndash; Returns the original $_COOKIE array attached with the http request.





Location
=============
Ling\Light\Http\HttpRequestInterface


SeeAlso
==============
Previous class: [HttpRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest.md)<br>Next class: [HttpResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse.md)<br>