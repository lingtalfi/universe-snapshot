Duelist
==============
2019-08-23


Table of Contents
=================

* [The base sql query](#the-base-sql-query)
* [The user injections](#the-user-injections)
 * [Variables](#variables)
 * [Inner markers](#inner-markers)
* [The limit setting](#the-limit-setting)
* [Options](#options)
* [Routines](#routines)
* [Csrf token](#csrf-token)
 * [The operator_and_value routine](#the-operator_and_value-routine)
* [Building the where expression](#building-the-where-expression)
  * [Where groups](#where-groups)
  * [The default where mode](#the-default-where-mode)
  * [The groups where mode](#the-groups-where-mode)
* [Ric](#ric)
* [Dynamic injection](#dynamic-injection)





Duelist is the idea of implementing a gui list system created by both a developer and an user.


The two main actors are the developer and the user.
The developer is trusted, the user is not.


The developer basically writes the sql query, and allow the user to interact with it, in a way that doesn't 
compromise the security of the application (i.e. sql injection or other sql query based attacks).


The developer starts by writing a so called **request declaration**, usually stored in a file 
in [babyYaml](https://github.com/lingtalfi/BabyYaml) format (which is in fact nothing more than a big configuration array).


The request declaration is composed of various settings, which we will explore in this document.

We can conceptually divide the request declaration settings in sections:

- base sql query 
- user injections 
- limit setting 
- options
- routines
- csrf token




The base sql query
--------------

This part is the safest part of the request declaration.
The user has almost no interaction with it.

The developer writes this section by using the following settings:

- table: the name of the table to interact with
- ric: the row identifier columns array. See the ric section for more details.
- base_fields: the list of columns used in the sql request (expressions with aliases are allowed)
- ?base_joins: array|string. Each item being a join expression.
        Example: 
            - inner join user u on i.user_id=u.id 
- ?base_where: array|string. Each item being a "where" expression.
        The first item is implicitly prefixed with "WHERE 0 ", while the other items are piled after that.
        Example:
            - and (first_name like '%marie%'
            - or last_name like '%marie%')
            
        In other words, you're responsible for creating the full where clause, and you have full control 
        on the syntax.            
- ?base_group_by: array|string. Each item being a "group_by" expression (without the "GROUP BY" keyword).
        Example:
            - first_name
- ?base_having: array|string. Each item being an "having" expression (without the "HAVING" keyword).
        Example:
            - nb_total > 12       
    
                
- ?base_order: array|string. Each item being an "order" expression (without the "ORDER BY" keyword).
        Example:
            - first_name asc


The user injections
--------------

The developer can also allow users to inject data to build a more dynamic sql request.
The settings (i.e. sections) where the user has potential interaction are:


- where
- order
- limit


Each of those settings is an array of tags, or more precisely an array of **tagName** => **tagExpression**.
Here are a few examples of what tags look like in the request declaration.

Example #1:

```yaml
order:
    col_order: last_name desc
```

Example #2:

```yaml
order:
    col_order: $column $direction
```

Example #3:

```yaml
order:
    col_order: first_name asc
    another_col_order_tag: last_name $direction
    yet_another_col_order_tag: $column $any_variable
```


Example #4:

```yaml
where:
    where_global: <
        id like :%expression% or
        identifier like :%expression% or
        pseudo like :%expression% 
    >
    where_generic: $column $operator :$operator_value
```



A tag basically represents the data provided by the user.
The developer consciously injects the tags into his sql request.

The **tagName** is just an arbitrary string chosen by the developer to identify the tag.

The **tagExpression** is a string which will ultimately be converted to a fragment of the sql query.
Hence, the **tagExpression** deserves a lot of attention.

The **tagExpression** can be written entirely by the developer, or the developer can allow some user injection.

When the **tagExpression** is written entirely by the developer, all the user can do is activate the tag (i.e. like a on/off button).
When the developer allows user injection, this is a totally different beast.

User injection in tag expressions is brought by special notation:

- the variables 
- the inner markers


### Variables

A variable is a string starting with the dollar symbol ($).
When a variable is written, it is expected that the user also provides a value for it, otherwise the request should be rejected, unless
the implementor provides a default value for it.

This value can be constrained by the developer (personal note: no implementation yet). 

Also, there are some reserved variable names, which basically trigger automatically checked constraints:

- $column: check that this variable is one of the fields defined with the **base_fields** setting
- $direction: check that this variable is either asc or desc
- $operator: check that this variable is an operator defined in the [open admin table protocol operators](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-protocol.md)
- $page: converts the variable to an int. 
- $page_length: converts the variable to an int. The "all" special value means: no pagination at all (i.e. there is only one page with all the rows in it)

If the check fails, the request is rejected.


### Inner markers

An **inner marker** is a string starting with the colon symbol (:), and has the following notation:

- inner marker notation: {colon} {percentPrefix}? {markerName} {percentSuffix}?

An **inner marker** is used like a standard sql marker, the only difference is that it has an extended notation.

Examples of inner markers:

- where name = :name
- where name like :name
- where name like :%name%
- where name like :%name
- where name like :name%

Inner marker are ultimately converted to standard sql markers before executing the request, but in the meantime they allow 
the developer to specify which flavour of the "LIKE" keyword he wants.

It's a syntactic sugar if you will.


When an **inner marker** is written, it is expected that the user will bring the corresponding data, otherwise the request should be rejected.



The limit setting
------------

The **limit** setting is special, because it's simpler than the other sql clauses.
The limit setting is a simple array with two entries:

- page
- ?page_length

The developer can allow user injection using the **$page** reserved variable.


Example #1:

```yaml
limit:
    page: $page
    page_length: 10
```

Example #2, showing all results (i.e. no pagination):

```yaml
limit:
    page: 1 
```

As long as **page_length** is not set, the page will be forced to 1.





Options
--------

The duelist conception so far is quite straightforward.
However it might not handle all the problems we will be facing when writing gui lists.

The **options** are basically a mean to compensate those lacks.

So, it's extendable, as new problems might come with time.
Implementors of the duelist idea can also extend this array as they want.


The base **options** are:


- **sql_like_percent_char**: the default char used to represent the default percent sql wildcard. Note: this should be synced with your sql configuration. 
- **sql_like_underscore_char**: the default char used to represent the default underscore sql wildcard. Note: this should be synced with your sql configuration.
- **tag_options**: array of **tagName** => **thisTagOptions**. 
        With **thisTagOptions**: 
            - **escape_percent**: bool=true. Whether to escape the percent symbol in the user provided data for this group.  
            - **escape_underscore**: bool=true. Whether to escape the underscore symbol in the user provided data for this group.  
            - **operator_and_value**: array. A routine. See the routines section for more info.  
            - **operators**: array. The available operators. By default, the one defined in the [open admin protocol](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-protocol.md) are used.
            - **where_repeat_operator**: string=AND. The **where repeat operator**.
                        See the "where groups" section below for more details.        
- **where**: array where related options (see the "Building the where expression" section below for more details).
    - **mode**: string=default. The **where mode** (see the "Building the where expression" section below for more details).
    - **repeat_operator**: string=AND. The repeat operator to use when mode=default (see the "Building the where expression" section below for more details).
    -...(more variables, depending on the mode)



Routines
----------

So as we said, options are here to resolve problems.
But sometimes, we need more code to solve a problem.

So, the routines are like the tools of the options, the macros that some options can resort to if they need to.

When an option invokes a routine, it also provides the initialization parameters that goes along with it.


The available routines are:

- operator_and_value 



Csrf token
--------------

As duelist was meant to be invoked from an ajax service, it's naturally vulnerable to csrf attacks.
The csrf_token option allows us to secure the ajax service.

It's an array or null. An example is this:

```yaml
csrf_token:
    name: realist-request
    value: REALIST(Light_Kit_Admin, csrf_token, realist-request)
```

If the value is null, or if the **csrf_token** key doesn't exist in the **requestDeclaration** array,
then no csrf check will be performed (not recommended).

If it's an array, it must contain the following entries:

- name: the name of the csrf token to validate against
- value: the value of the token. Note: in the above example I used the [dynamic injection](#dynamic-injection) notation
    to generate the csrf token value on the fly (rather than using a hard-coded value).
    

Usually, the name "realist-request" is used for a token used to protect a realist/duelist request.    













### The operator_and_value routine

This routine transforms some special inner markers in a **tagExpression**.

Setup: your **tagExpression** must contain an **$operator** variable and an **:operator_value** inner marker.

Then this routine will basically update the where expression fragment based on the value of the **$operator**
variable and the value of the **:operator_value** inner marker.


Here are the list of things that this routine does, depending on the **$operator** variable value:

- if the **$operator** is a flavour of like (like, %like%, %like or like%), then the **:operator_value**
    inner marker will be updated accordingly (:operator_value, :%operator_value, :%operator_value or :operator_value%)
    
- if the **$operator** is **in** or **not_in**, the **:operator_value** variable provided by the user should be an array or a comma separated
    list of values, and the expression will be transformed to a sql injection safe statement like this:
        - IN ( :tag1, :tag2, :tag3, ... )
        
        Note: if the user provides a list of comma separated elements, white space is not
        important. The comma must be protected with quotes if it has a literal meaning.
        
        
- if the **$operator** is **between** (or **not_between**), the **:operator_value** variable provided by the user should be an array of 
    two elements, or a comma separated list of two values (with quote protection for the comma if necessary).
        The expression will be transformed to a sql injection safe statement like this:
        - BETWEEN :tag1 AND :tag2
        
- if the **$operator** is **null** (or **is_not_null**), the **:operator_value** variable provided by the user (if any) will be turned down.
        The expression will be transformed to a sql injection safe statement like this:
        - IS NULL
        - IS NOT NULL
        
         
    
    
    

It's configuration array takes two arguments

- source: the name of the variable (operator in our example)
- target: the name of the inner marker to update (operator_value in our example)


Note: the target should be declared without any flavour (i.e. don't use the percent symbol in the target,
because it will be added automatically by the routine if necessary).



 
Building the where expression
=======================

The where expression is sometimes the result of combining multiple tags together.
When this happens, we need to decide how to combine them, using the AND or OR keywords.

Since there are a lot of ways we could combine those tags, we provide different modes (called **where modes**)
for the developer to choose from.


The **where mode** defines how tags are combined together to form the final where expression.

The **where mode** is defined using the **where.mode* option.

It can be one of the following values:

- default
- groups 



Before we dive into the different modes details, here are a few concepts that might be useful:

- where groups




Where groups
-------------

If we slice a **where expression** by using the OR and/or AND operators, we end up with some "logical components".
 
A **where group** basically represents such a "logical component".  

The user sending the tags can send one tag, or multiple tags.
When multiple tags are sent, the same tag can sometimes be sent multiple times with different parameters (aka variables).

This is usually the case when the tags is generic, for instance:

- my_generic_where_tag: $column $operator :%operator_value%


A **where group** is a virtual group created for each tag that the user provides in the where section (of the **request declaration**).
In case the user provides the same tag multiple times, all those tags will combine themselves to form only one **where group** with the same name.

So for instance if the user provides the following where tags (with different variables):

- **generic_filter**
- **generic_filter**
- **generic_filter**
- **generic_sub_filter**

Then we would have two different **where groups**:

- **generic_filter** (composed of three elements)
- **generic_sub_filter** (composed of one element)



Items inside the same **where group** combine with each other using logical operator: either OR or AND.

We call that operator the **where repeat operator**.
The **where repeat operator** can be defined using the **tag_options.$tagName.where_repeat_operator** option.
It defaults to "AND".





The default where mode
--------------------

By default, when we combine multiple **where groups** by simply adding a chosen **repeat operator** between them. 

This **repeat operator** is defined using the **where.repeat_operator** option, and defaults to AND.



The groups where mode
-------------------

In this mode, we decide how groups are combined using a **mask**.

A mask looks like either one of those:

- {whereGroupOne} OR {whereGroupTwo}
- {whereGroupOne} AND ( {tagGroupTwo} OR  {tagGroupThree} )

So as you can see

- it's very flexible (i.e. we can recreate any where expression)
- we enclose the **where group** names within the curly brackets
- note: each **where group** is enclosed within extra parenthesis automatically


The result of a mask is inserted in a **WHERE 0 OR ()** scheme, for instance:

- WHERE 0 OR ( {whereGroupOne} OR {whereGroupTwo} )


To setup a mask, we list all its participant tags in an array.

This is done via the **where.masks** option.

Here is an example of what the where option looks like when setup for using the **groups** where mode:

```yaml
where:
    mode: groups
    masks:
        -
            participants:
                - tagOne
                - tagTwo
            mask: {tagOne} OR {tagTwo}
        - ...
                
```



Ric
==========
2019-09-03


See the official [ric definition](https://github.com/lingtalfi/NotationFan/blob/master/ric.md).

     


Dynamic injection
=============
2019-09-19


So basically, the duelist uses a configuration array.

```yaml
fruits:
    a: apple
    b: banana
    c: cherry
sports:
    - judo
    - karate
    - kungfu
```

Dynamic injection allows us to replace the content of a configuration value dynamically, by using the REALIST(args) notation,
where args is a comma separated list of arguments, using smart code notation (https://github.com/lingtalfi/Bat/blob/master/SmartCodeTool.md).

The first argument is the identifier of the handler of the function (owned by a plugin who registered the handler in advance), 
and the rest of the arguments will be passed to the handler.

Because there are many plugins, I opted that a handler is an object rather than just a callable, the idea being that each plugin provides
only one handler that handles all the use cases for that plugin.

I provide a **RealistDynamicInjectionHandlerInterface** for that purpose.


So for instance if the plugin **MyPlugin** registers a realist dynamic injection handler with identifier **MyPlugin**,
we can imagine that this array:



```yaml
fruits:
    a: apple
    b: REALIST(MyPlugin, sayWord, hello )
    c: cherry
sports:
    - judo
    - karate
    - kungfu
```

Would be converted by the realist tools to:

```yaml
fruits:
    a: apple
    b: hello
    c: cherry
sports:
    - judo
    - karate
    - kungfu
```


All registrations of realist dynamic injection handlers is done via the realist service.
 
The result of a handler doesn't have to be a string, it could be an array, an object, an int, anything.

If the handler returns a "stringable" result, then we can embed the handler call in a bigger string.

For instance, we can do this:

```yaml
fruits:
    b: My name is REALIST(MyPlugin, sayWord, paul )
```

This would give us:

```yaml
fruits:
    b: My name is paul
```





 






 




         


 