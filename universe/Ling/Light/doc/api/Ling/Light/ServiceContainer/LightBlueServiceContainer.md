[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The LightBlueServiceContainer class
================
2019-04-09 --> 2019-05-02






Introduction
============

The LightBlueServiceContainer class.



Class synopsis
==============


class <span class="pl-k">LightBlueServiceContainer</span> extends BlueOctopusServiceContainer implements OctopusServiceContainerInterface, [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) {

- Inherited methods
    - public BlueOctopusServiceContainer::__construct() : void
    - public BlueOctopusServiceContainer::get(string $service) : object
    - public BlueOctopusServiceContainer::has(string $service) : bool
    - public BlueOctopusServiceContainer::all() : array
    - public static BlueOctopusServiceContainer::getMethodName(string $serviceName) : string
    - public static BlueOctopusServiceContainer::getServiceName(string $methodName) : string

}






Methods
==============

- BlueOctopusServiceContainer::__construct &ndash; Builds the service container.
- BlueOctopusServiceContainer::get &ndash; Returns the service which name is given.
- BlueOctopusServiceContainer::has &ndash; 
- BlueOctopusServiceContainer::all &ndash; Returns the list of all service names for this instance.
- BlueOctopusServiceContainer::getMethodName &ndash; Converts the given service name into a method name (the name of the method in charge of returning the service).
- BlueOctopusServiceContainer::getServiceName &ndash; Returns the service name from the given method name.





Location
=============
Ling\Light\ServiceContainer\LightBlueServiceContainer


SeeAlso
==============
Previous class: [LightRouterInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface.md)<br>Next class: [LightDummyServiceContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer.md)<br>