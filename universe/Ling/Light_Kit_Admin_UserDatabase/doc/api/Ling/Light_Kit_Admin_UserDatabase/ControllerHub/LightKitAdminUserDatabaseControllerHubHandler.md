[Back to the Ling/Light_Kit_Admin_UserDatabase api](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase.md)



The LightKitAdminUserDatabaseControllerHubHandler class
================
2020-06-25 --> 2020-06-25






Introduction
============

The LightKitAdminUserDatabaseControllerHubHandler class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminUserDatabaseControllerHubHandler</span> extends [LightBaseControllerHubHandler](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightBaseControllerHubHandler.md) implements [LightControllerHubHandlerInterface](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightControllerHubHandlerInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBaseControllerHubHandler::$container](#property-container) ;

- Methods
    - public [handle](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/ControllerHub/LightKitAdminUserDatabaseControllerHubHandler/handle.md)(string $controllerIdentifier, Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)

- Inherited methods
    - public LightBaseControllerHubHandler::__construct() : void
    - public LightBaseControllerHubHandler::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected LightBaseControllerHubHandler::doHandle(string $controllerDir, string $controllerIdentifier, Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)

}






Methods
==============

- [LightKitAdminUserDatabaseControllerHubHandler::handle](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/ControllerHub/LightKitAdminUserDatabaseControllerHubHandler/handle.md) &ndash; Process the given controllerIdentifier and returns an appropriate http response.
- LightBaseControllerHubHandler::__construct &ndash; Builds the LightKitAdminControllerHubHandler instance.
- LightBaseControllerHubHandler::setContainer &ndash; Sets the container.
- LightBaseControllerHubHandler::doHandle &ndash; Executes the controller identified by the given controllerDir and controllerIdentifier, and returns the appropriate http response.





Location
=============
Ling\Light_Kit_Admin_UserDatabase\ControllerHub\LightKitAdminUserDatabaseControllerHubHandler<br>
See the source code of [Ling\Light_Kit_Admin_UserDatabase\ControllerHub\LightKitAdminUserDatabaseControllerHubHandler](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/ControllerHub/LightKitAdminUserDatabaseControllerHubHandler.php)



SeeAlso
==============
Previous class: [UserProfileController](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Controller/User/UserProfileController.md)<br>Next class: [LightKitAdminUserDatabaseLkaPlugin](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/LightKitAdminPlugin/LightKitAdminUserDatabaseLkaPlugin.md)<br>
