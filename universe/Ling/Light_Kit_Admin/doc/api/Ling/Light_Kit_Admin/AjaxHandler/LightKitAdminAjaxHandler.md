[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminAjaxHandler class
================
2019-05-17 --> 2020-07-07






Introduction
============

The LightKitAdminAjaxHandler class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminAjaxHandler</span> extends [BaseLightAjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/BaseLightAjaxHandler.md) implements [LightAjaxHandlerInterface](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [ContainerAwareLightAjaxHandler::$container](#property-container) ;

- Methods
    - protected [doHandle](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/AjaxHandler/LightKitAdminAjaxHandler/doHandle.md)(string $action, Ling\Light\Http\HttpRequestInterface $request) : array
    - protected [error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/AjaxHandler/LightKitAdminAjaxHandler/error.md)(string $msg) : void
    - protected [executeListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/AjaxHandler/LightKitAdminAjaxHandler/executeListAction.md)(string $actionName, array $params) : array
    - protected [executeListGeneralAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/AjaxHandler/LightKitAdminAjaxHandler/executeListGeneralAction.md)(string $actionName, array $params) : array

- Inherited methods
    - public BaseLightAjaxHandler::handle(string $action, Ling\Light\Http\HttpRequestInterface $request) : array
    - public ContainerAwareLightAjaxHandler::__construct() : void
    - public ContainerAwareLightAjaxHandler::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected ContainerAwareLightAjaxHandler::getContainer() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)

}






Methods
==============

- [LightKitAdminAjaxHandler::doHandle](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/AjaxHandler/LightKitAdminAjaxHandler/doHandle.md) &ndash; Handles the given action and returns an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md), or throws an exception in case of problems.
- [LightKitAdminAjaxHandler::error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/AjaxHandler/LightKitAdminAjaxHandler/error.md) &ndash; Throws an error message.
- [LightKitAdminAjaxHandler::executeListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/AjaxHandler/LightKitAdminAjaxHandler/executeListAction.md) &ndash; Executes the list action identified by the given action name and returns the expected ajax response.
- [LightKitAdminAjaxHandler::executeListGeneralAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/AjaxHandler/LightKitAdminAjaxHandler/executeListGeneralAction.md) &ndash; Executes the list general action identified by the given action name and returns the expected ajax response.
- BaseLightAjaxHandler::handle &ndash; Handles the given action and returns an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md), or throws an exception in case of problems.
- ContainerAwareLightAjaxHandler::__construct &ndash; Builds the ContainerAwareLightAjaxHandler instance.
- ContainerAwareLightAjaxHandler::setContainer &ndash; Sets the light service container interface.
- ContainerAwareLightAjaxHandler::getContainer &ndash; Returns the container instance.





Location
=============
Ling\Light_Kit_Admin\AjaxHandler\LightKitAdminAjaxHandler<br>
See the source code of [Ling\Light_Kit_Admin\AjaxHandler\LightKitAdminAjaxHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/AjaxHandler/LightKitAdminAjaxHandler.php)



SeeAlso
==============
Next class: [LightKitAdminBMenuHost](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/BMenu/LightKitAdminBMenuHost.md)<br>
