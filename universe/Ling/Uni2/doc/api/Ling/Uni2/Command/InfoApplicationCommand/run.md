[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\Command\InfoApplicationCommand class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/InfoApplicationCommand.md)


InfoApplicationCommand::run
================



InfoApplicationCommand::run — Runs the command.




Description
================


public [InfoApplicationCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/InfoApplicationCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int




Runs the command.

Important note:
The input object passed to the commands is the same as the input object passed to the application itself.
This means that the parameter index used by commands should start at 2 (because 1 is already the name of the command).

So, remember, when you're inside a command, if you want to get a parameter, starts with 2 (and not 0 or 1).




Parameters
================


- input

    

- output

    


Return values
================

Returns int.
The exit status.
If null, 0 should be assumed.







Source Code
===========
See the source code for method [InfoApplicationCommand::run](https://github.com/lingtalfi/Uni2/blob/master/Command/InfoApplicationCommand.php#L34-L80)


See Also
================

The [InfoApplicationCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/InfoApplicationCommand.md) class.



