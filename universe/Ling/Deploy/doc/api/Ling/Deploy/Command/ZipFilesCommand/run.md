[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)<br>
[Back to the Ling\Deploy\Command\ZipFilesCommand class](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipFilesCommand.md)


ZipFilesCommand::run
================



ZipFilesCommand::run — Runs the command.




Description
================


public [ZipFilesCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipFilesCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int




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
See the source code for method [ZipFilesCommand::run](https://github.com/lingtalfi/Deploy/blob/master/Command/ZipFilesCommand.php#L45-L142)


See Also
================

The [ZipFilesCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipFilesCommand.md) class.



