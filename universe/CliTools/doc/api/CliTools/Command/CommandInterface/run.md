[Back to the CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools.md)<br>
[Back to the CliTools\Command\CommandInterface class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Command/CommandInterface.md)


CommandInterface::run
================



CommandInterface::run — Runs the command.




Description
================


abstract public [CommandInterface::run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Command/CommandInterface/run.md)([CliTools\Input\InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/InputInterface.md) $input, [CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Output/OutputInterface.md) $output) : void




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

Returns void.







See Also
================

The [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Command/CommandInterface.md) class.