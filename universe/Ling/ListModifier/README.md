ListModifier
===================
2017-06-22



A system to shape a list of items in a mvc multi-widgets environment.



This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/ListModifier
```

Or just download it and place it where you want otherwise.





[![list-modifier-circle-system.jpg](http://lingtalfi.com/img/universe/ListModifier/list-modifier-circle-system.jpg)](http://lingtalfi.com/img/universe/ListModifier/list-modifier-circle-system.jpg)




The example
==================

Maybe you should read the ListModifier Circle system section first,
but here is the example code.

First, a Controller example code:

```php
<?php
// ...
/**
 * @var $circle ListModifierCircle
 */
$circle = X::get("Core_ListModifierCircle"); // accessing the circle service via the app (in this case kamille framework)


/**
* set the list modifiers.
* In this case, just a sort modifier for the demo.
* Note: The sort is actually composed of two parts: sort and sort-dir
* 
*/
$circle = X::get("Core_ListModifierCircle");
$circle->setListModifier(['sort', 'sort-dir'], function (RequestModifierInterface $modifier) {
    if (
        array_key_exists('sort', $_GET) &&
        array_key_exists('sort-dir', $_GET)
    ) { // only update the request if the params exist in the uri
        $sort = $_GET['sort'];
        
        switch ($sort) { // a little bit of field names translation
            case 'name':
                $sort = "label";
                break;
            case 'price':
                $sort = "rawSalePrice";
                break;
            default:
                break;
        }
        $modifier->addSortItem($sort, $_GET['sort-dir']); // this statement will impact the request 
    }
});
$formTrail = ListModifierUtil::toFormFields($circle, ['sort', 'sort-dir']); // generating the formTrail for the relevant widget (the one displaying the sort control) 
$circleValues = ListModifierUtil::getCircleValues($circle); // generating the circleValues for all widgets

$cards = EkomApi::inst()->productCardLayer()->getProductCardsByCategory($catId); // this actually generate the request...
/**
* Here is a code that might inspire you if you use arrays.
* This is a potential content for the getProductCardsByCategory method.
*            $gen = ArrayRowsGenerator::create()->setArray($ret);
*            RequestModifier2RowsGeneratorAdaptorUtil::decorate($gen, $circle);
*            $ret = $gen->getRows();
*/


// configuration of widgets (in this case only one) in kamille
$config = [
    "maincontent.productList" => [
        'conf' => [
            'cards' => $cards,
            'formTrail' => $formTrail,
            'circleValues' => $circleValues,
        ],
    ],
];
// ...
```









The ListModifier Circle system
==================================

At some point, in a MVC context, the following use case might occur, where
you want to display a list of items (for instance a product list in an e-commerce website),
which shape is decided by different widgets at different locations on the page.

For instance, a widget placed on the top of the list might be used to order the list, 
providing the user with html select,
and another widget placed on the left sidebar will allow the user to filter
the list by choosing a price range, or a manufacturer, or a color filter, and so on.


So, two different widgets, two locations, but the same target: the list.

How do you handle that?

One concrete problem is that to generate the request supporting the list, we need first
to gather all the parameters that impact that list, no matter which widget they
originate from.


As often, I like to start tackling the problem by giving names to things.


The list modifier
-------------------

A list modifier is a parameter; that you can pass via the uri if you want,
and which is used to shape the list request.

So for instance if your list is generated by a mysql request like the following:

```mysql
select * from products
```

Then a list modifier could for instance affect the where clause, like so:

```mysql
select * from products where price > 10
```

Other parts of the request could be affected, like the **order** clause for instance.

So, that's a list modifier.


That being said, what is the ListModifier Circle system and how can it help me with 
my MVC implementation?


How does it work?
--------------------

To centralize all widgets information into one, the circle system uses the uri as
the common container for params.


Ok, let's do a top/down scan and see what happens really.

We start from the top, and we have the url parameters.
Those can contain list modifiers, but also other things.

Let's create a fake uri for this session, so that put ourselves in concrete mode:

```php
http://mysite.com/product-list.php?sayhello=true&sort=price&sort-dir=asc&manufacturer=william
```

So if we analyze the url above, we have three list modifiers (the sayhello parameter
could potentially be a list modifier too, but let's pretend that it's not in this case):
 
- sort: price
- sort-dir: asc
- manufacturer: william

Let's say that the sort and sort-dir modifiers are provided by a SORT widget,
and that the manufacturer was brought by the MANU widget.

But for now, we don't care about who is providing them, they are just in the uri, and this
is our starting point.

The next stop in our top/down chain is the Controller.

The Controller is responsible for displaying the whole page.

This includes all widgets.
This means the Controller knows the configuration of every widget.


- Step 1: the Controller accesses the list modifier circle, which is a tiny service provided by 
the application.

- Step 2: the Controller defines the list modifiers and attaches them to the circle


To define a list modifier means defining two things:

- defining the name of the list modifier, which is basically the name that is used in the uri (as a parameter)
- defining an array of request modifiers.
        A request modifier is an array of target => callback.
        The target is the name of the target in the request that the list modifier tries to hit.
        For instance the target wants to update the "order clause" of the mysql request, 
        or it wants to update the "where clause", etc...
        That's the target.
        The available targets are:
        - order
        - where
        
        The callback is used to concretely apply the change to the mysql query.
        As the time of writing, the parameters of this callback are yet to be defined.
        

So at the end of step 2, the Controller has defined all the list modifiers that are going
to be used by the widgets.

Step 3: the Controller provides the formTrail string to every widget that requires it (every
widget that uses the list modifier circle system, that is).


What's the formTrail? (you might ask)
----------------------------------

If you think of our use case again, you picture at least two different widgets that 
are providing form controls (or other things).
 
So for instance widget SORT provides a form which will post the following:

- sort: some user value
- sort-dir: some user value

and the widget MANU will have a form that posts the following:

- manufacturer: some user value
 

But wait a minute!! If the MANU form is posted, we will loose our sort/sort-dir data, right?

The goal of the game here is to persist those data, so that we can shape the list
using both widgets together, although they might come from different authors.


1, 2, 3, 4 ... (waiting for the answer)


We could use sessions, or other means, but in the ListModifier Circle system, we just
use the uri (so that we don't need any special preparation).

In order for that to work, notice first that we only post one widget at the time.

That being said, the solution chosen by our system is the following:

- each widget must include the list modifier params (and their value) in the form they are posting,
probably as hidden inputs because the user doesn't need to know about it.


In order to help, we provide a string: the formTrail, which basically contains the part of the form 
which includes all the necessary hidden input to achieve our unified uri goal.
 
Actually for the SORT widget, the formTrail might look like this (at least if the manufacturer parameter was found
in the uri):

- <input type="hidden" name="manufacturer" value="william">

But for the MANU widget, the formTrail looks different:

- <input type="hidden" name="sort" value="price">
- <input type="hidden" name="sort-dir" value="asc">


So yes, the formTrail depends on the widget being used, and as you can probably guess, this is because
we don't want that the parameters provided by the widget conflict with the parameters in the formTrail.

The Controller can use the ListModifierUtil object to help implementing this.


Circle Values
---------------
Another thing passed to widgets is the circleValues array.

This array simply contains all parameters participating to the system.
If the value is not found in the uri, then an empty value is set.

This is provided by the Controller too, with the help of the ListModifierUtil class.

Widgets should use this array to persist the state of their form controls (for instance sort by price
is the current sort selected by the user).


Request modifier
-------------------

Then we have to update the request generating the list.
One other problem we have is that we don't know exactly how the request will be generated.

Will it be generated by a sql request? 
Or is it a simple php array?
Or maybe something else?

Whatever it is, our system needs to affect this request.

So the only thing we can do is provide our intent, and let
the concrete implementation do the rest.

To express one's intent, we provide the RequestModifier object.

Implementation note:
You might be interested by the [RowsGenerator planet](https://github.com/lingtalfi/RowsGenerator),
as I will provide some helper methods for RowsGenerator users.



The toString method
---------------------

Another ability of the Circle object is that it can be put into a string easily.
 
The main use case for this is when you want to cache a list with certain parameters.
Since the Circle holds all the parameters, it's the perfect object to stringify.

All parameters are ordered and formatted for the developer's convenience, so that the same cache would be hit
every time.
 
 




So that's it.

Hopefully you have the whole picture in mind now.

To summarize, almost all the job is done by the Controller.

The $_GET parameters are used.

The only think left to the widget is to display the formTrail passed by the Controller at the end of their form.

This implies that they use a form (but that's another topic).







History Log
------------------    
    

- 1.3.0 -- 2017-08-04

    - fix ListModifierCircle.clean method
    - add RequestModifierInterface.getLimit method
    
- 1.2.0 -- 2017-08-04

    - add ListModifierCircle.clean method

- 1.1.0 -- 2017-06-22

    - add ListModifierUtil.getCircleValues $defaultValues optional argument

- 1.2.0 -- 2017-06-26

    - ListModifierUtil.toFormFields now accept values of type array
    
- 1.1.0 -- 2017-06-26

    - ListModifierCircle.__toString now accept values of type array
    - RequestModifierInterface.addSearchItem add $operand2 parameter

    
- 1.0.0 -- 2017-06-22

    - initial commit
















