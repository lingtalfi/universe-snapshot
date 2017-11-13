Generator
=============
2017-09-01




The generator will generate the following:


- a SaveOrm object per table
- an ObjectManager




One of our goal is to be able to extend the generated objects;
we will therefore have two layers of generated objects:

- a layer of generated objects that we won't touch (the generator will override them on every generation) 
- a layer of safe objects: the generator will only generate them if they don't exist
        Those are our objects. We can put our code in it if we want to.


Here is the default structure generated by the generator:


- $targetDir/
----- GeneratedObjects/
--------- ExampleGeneratedObject: contains all the code
----- Objects/
--------- ExampleObject extends ExampleGeneratedObject: is an empty shell
----- ObjectManager/
--------- GeneratedObjectManager
--------- ObjectManager extends GeneratedObjectManager 






Implementation notes
==========================

So, as I described earlier, SaveOrm uses 3 relationships:

- bindings
- siblings
- children



Bindings
------------
Bindings are decided by humans, so we won't have to do much work here 
as developers. 
Maybe we can double check that the guest table has an actual foreign
key pointing to the host table, but apart from that not much.

In the config file, we will use the binding



Siblings 
-----------
We can easily get all potential siblings by simply listing the foreign keys
for a given table.



Children
-------------

For children, it's more complicated.

It's complicated because this is not just about a middle table binding
sideways to a left and right table: there is also a direction, which is
from left to right.

If you observe any schema, you will see that using foreign keys only,
you will be able to detect 3 tables bound by a middle table,
but you won't be able to guess the direction/intent behind it.

Only the human behind the schema knows the intent.

So, what we have left is the name of the table.
Often, we use the "has" keyword in the name of the middle table:
 
- event_has_course
- location_has_hotel
- ...und so weiter

And so in this case, the direction is obvious.
However, there can be other words too:

- category_features_product
- card_owns_product
- ...

We need to be aware of this.
So, our technique for spotting children relationships will be based on keyword detection,
plus a double-checking of foreign keys.

Now keywords will need to provide the keywords to the generator.

That's something we will set in the generator config, at the generator level, using the 
**childrenDetectionKeywords** property.

So, typically:

```php
<?php


$conf = [
    '__' => [
        'childrenDetectionKeywords' => [
            '_has_',
        ],
    ],
];
```   

So, spotting the middle tables is not difficult if we use this system.
However, it's only half of the job.

The other half is to determine which table is the left table, and which one is the right table.
Our technique here is basically split the name of the table in half, strip the prefixes,
and try to find the corresponding foreign keys.












  





