Ling/Light_UserRowRestriction
================
2020-03-03 --> 2020-03-10




Table of contents
===========

- [LightUserRowRestrictionException](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Exception/LightUserRowRestrictionException.md) &ndash; The LightUserRowRestrictionException class.
- [RowRestrictionViolationException](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Exception/RowRestrictionViolationException.md) &ndash; The RowRestrictionViolationException class.
- [RowRestrictionHandlerInterface](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/RowRestrictionHandler/RowRestrictionHandlerInterface.md) &ndash; The RowRestrictionHandlerInterface interface.
    - [RowRestrictionHandlerInterface::checkRestriction](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/RowRestrictionHandler/RowRestrictionHandlerInterface/checkRestriction.md) &ndash; table and parameters.
- [LightUserRowRestrictionService](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService.md) &ndash; The LightUserRowRestrictionService class.
    - [LightUserRowRestrictionService::__construct](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/__construct.md) &ndash; Builds the LightUserRowRestrictionService instance.
    - [LightUserRowRestrictionService::registerRowRestrictionHandlerByTablePrefix](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/registerRowRestrictionHandlerByTablePrefix.md) &ndash; Registers a row restriction handler, and assigns it to the given table prefix.
    - [LightUserRowRestrictionService::setContainer](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/setContainer.md) &ndash; Sets the container.
    - [LightUserRowRestrictionService::checkRestrictions](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/checkRestrictions.md) &ndash; Checks that the current user is granted to do the crud operation (eventName argument).


Dependencies
============
- [Light_User](https://github.com/lingtalfi/Light_User)
- [Light](https://github.com/lingtalfi/Light)
- [Light_Database](https://github.com/lingtalfi/Light_Database)
- [Light_UserManager](https://github.com/lingtalfi/Light_UserManager)
- [SqlWizard](https://github.com/lingtalfi/SqlWizard)


