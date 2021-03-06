[Back to the Ling/BabyYamlDatabase api](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase.md)<br>
[Back to the Ling\BabyYamlDatabase\BabyYamlDatabaseInterface class](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface.md)


BabyYamlDatabaseInterface::insert
================



BabyYamlDatabaseInterface::insert — if it exists, or null otherwise.




Description
================


abstract public [BabyYamlDatabaseInterface::insert](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/insert.md)(string $table, array $row) : int | null




Inserts the given row in the given table,
and returns either the last inserted auto-incremented key value
if it exists, or null otherwise.

The [constraints checking](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/pages/conception-notes.md#constraints-checks) applies.




Parameters
================


- table

    

- row

    


Return values
================

Returns int | null.


Exceptions thrown
================

- [InconsistentRowException](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/Exception/InconsistentRowException.md).&nbsp;







Source Code
===========
See the source code for method [BabyYamlDatabaseInterface::insert](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/BabyYamlDatabaseInterface.php#L27-L27)


See Also
================

The [BabyYamlDatabaseInterface](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface.md) class.

Next method: [getItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/getItemByKey.md)<br>

