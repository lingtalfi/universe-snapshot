CliTools
================
2019-02-26 --> 2019-03-05




Table of contents
===========

- [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Command/CommandInterface.md) &ndash; The CommandInterface interface.
    - [CommandInterface::run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Command/CommandInterface/run.md) &ndash; Runs the command.
- [ApplicationException](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Exception/ApplicationException.md) &ndash; The ApplicationException exception is thrown when a problem occurs in the [Application](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/Application.md) class.
- [CliToolsException](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Exception/CliToolsException.md) &ndash; The base class for all CliTools exceptions.
- [InvalidContextException](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Exception/InvalidContextException.md) &ndash; probably meaning that it was executed from a web context instead of a cli context.
- [BashtmlFormatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Formatter/BashtmlFormatter.md) &ndash; The BashtmlFormatter class.
    - [BashtmlFormatter::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Formatter/BashtmlFormatter/__construct.md) &ndash; Builds the BashtmlFormatter instance.
    - [BashtmlFormatter::format](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Formatter/BashtmlFormatter/format.md) &ndash; Parses the given $expression and returns its formatted/interpreted version.
- [DumbFormatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Formatter/DumbFormatter.md) &ndash; The DumbFormatter class.
    - [DumbFormatter::format](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Formatter/DumbFormatter/format.md) &ndash; Parses the given $expression and returns its formatted/interpreted version.
- [FormatterInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Formatter/FormatterInterface.md) &ndash; The FormatterInterface interface.
    - [FormatterInterface::format](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Formatter/FormatterInterface/format.md) &ndash; Parses the given $expression and returns its formatted/interpreted version.
- [QuestionHelper](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Helper/QuestionHelper.md) &ndash; The QuestionHelper class.
    - [QuestionHelper::ask](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Helper/QuestionHelper/ask.md) &ndash; Asks the given $question to the $user, and returns the answer (string).
- [AbstractInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput.md) &ndash; The AbstractInput class is a base class that abstracts the base logic for an InputInterface implementation.
    - [AbstractInput::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput/__construct.md) &ndash; Builds the class instance.
    - [AbstractInput::hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput/hasFlag.md) &ndash; Returns whether the flag $flagName was set.
    - [AbstractInput::getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput/getOption.md) &ndash; Returns the value of the option $optionName if set, or the $default value if the option was not defined.
    - [AbstractInput::getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput/getParameter.md) &ndash; Returns the value of the parameter at index $index, or the $default value if no parameter was defined for the given index.
    - [AbstractInput::getParameters](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput/getParameters.md) &ndash; Returns the list of all parameters, in the order they were written.
    - [AbstractInput::getOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput/getOptions.md) &ndash; Returns the list of all options (key/value pairs), in the order they were written.
    - [AbstractInput::getFlags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput/getFlags.md) &ndash; Returns the list of all flags, in the order they were written.
- [ArrayInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/ArrayInput.md) &ndash; The ArrayInput class is an implementation of the command line as described by [the command line page](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md).
    - [ArrayInput::setItems](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/ArrayInput/setItems.md) &ndash; Sets the items (parameters, options, flags) for this instance.
    - [AbstractInput::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput/__construct.md) &ndash; Builds the class instance.
    - [AbstractInput::hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput/hasFlag.md) &ndash; Returns whether the flag $flagName was set.
    - [AbstractInput::getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput/getOption.md) &ndash; Returns the value of the option $optionName if set, or the $default value if the option was not defined.
    - [AbstractInput::getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput/getParameter.md) &ndash; Returns the value of the parameter at index $index, or the $default value if no parameter was defined for the given index.
    - [AbstractInput::getParameters](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput/getParameters.md) &ndash; Returns the list of all parameters, in the order they were written.
    - [AbstractInput::getOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput/getOptions.md) &ndash; Returns the list of all options (key/value pairs), in the order they were written.
    - [AbstractInput::getFlags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput/getFlags.md) &ndash; Returns the list of all flags, in the order they were written.
- [CommandLineInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/CommandLineInput.md) &ndash; The CommandLineInput class is an implementation of the command line as described by [the command line page](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md).
    - [CommandLineInput::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/CommandLineInput/__construct.md) &ndash; Builds the class instance.
    - [AbstractInput::hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput/hasFlag.md) &ndash; Returns whether the flag $flagName was set.
    - [AbstractInput::getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput/getOption.md) &ndash; Returns the value of the option $optionName if set, or the $default value if the option was not defined.
    - [AbstractInput::getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput/getParameter.md) &ndash; Returns the value of the parameter at index $index, or the $default value if no parameter was defined for the given index.
    - [AbstractInput::getParameters](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput/getParameters.md) &ndash; Returns the list of all parameters, in the order they were written.
    - [AbstractInput::getOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput/getOptions.md) &ndash; Returns the list of all options (key/value pairs), in the order they were written.
    - [AbstractInput::getFlags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/AbstractInput/getFlags.md) &ndash; Returns the list of all flags, in the order they were written.
- [InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/InputInterface.md) &ndash; The InputInterface class.
    - [InputInterface::getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/InputInterface/getParameter.md) &ndash; Returns the value of the parameter at index $index, or the $default value if no parameter was defined for the given index.
    - [InputInterface::getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/InputInterface/getOption.md) &ndash; Returns the value of the option $optionName if set, or the $default value if the option was not defined.
    - [InputInterface::hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/InputInterface/hasFlag.md) &ndash; Returns whether the flag $flagName was set.
    - [InputInterface::getParameters](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/InputInterface/getParameters.md) &ndash; Returns the list of all parameters, in the order they were written.
    - [InputInterface::getOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/InputInterface/getOptions.md) &ndash; Returns the list of all options (key/value pairs), in the order they were written.
    - [InputInterface::getFlags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/InputInterface/getFlags.md) &ndash; Returns the list of all flags, in the order they were written.
- [BufferedOutput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Output/BufferedOutput.md) &ndash; The BufferedOutput class.
    - [BufferedOutput::write](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Output/BufferedOutput/write.md) &ndash; Writes a message to the output.
    - [BufferedOutput::reset](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Output/BufferedOutput/reset.md) &ndash; Resets the messages buffer.
    - [BufferedOutput::writeMessages](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Output/BufferedOutput/writeMessages.md) &ndash; Prints the buffered messages.
    - [BufferedOutput::getMessages](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Output/BufferedOutput/getMessages.md) &ndash; Returns the buffered messages.
    - [Output::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Output/Output/__construct.md) &ndash; Builds the Output instance.
    - [Output::setFormatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Output/Output/setFormatter.md) &ndash; Sets the formatter.
- [Output](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Output/Output.md) &ndash; The Output class.
    - [Output::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Output/Output/__construct.md) &ndash; Builds the Output instance.
    - [Output::setFormatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Output/Output/setFormatter.md) &ndash; Sets the formatter.
    - [Output::write](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Output/Output/write.md) &ndash; Writes a message to the output.
- [OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Output/OutputInterface.md) &ndash; The OutputInterface interface.
    - [OutputInterface::write](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Output/OutputInterface/write.md) &ndash; Writes a message to the output.
- [AbstractProgram](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/AbstractProgram.md) &ndash; The Program class.
    - [AbstractProgram::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/AbstractProgram/__construct.md) &ndash; Builds the AbstractProgram instance.
    - [AbstractProgram::setLogger](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/AbstractProgram/setLogger.md) &ndash; Sets the logger.
    - [AbstractProgram::setLoggerChannel](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/AbstractProgram/setLoggerChannel.md) &ndash; Sets the loggerChannel.
    - [AbstractProgram::setErrorIsVerbose](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/AbstractProgram/setErrorIsVerbose.md) &ndash; Sets the errorIsVerbose.
    - [AbstractProgram::run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/AbstractProgram/run.md) &ndash; Starts the interactive program.
- [Application](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/Application.md) &ndash; The Application class.
    - [Application::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/Application/__construct.md) &ndash; Builds the Application instance.
    - [Application::registerCommand](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/Application/registerCommand.md) &ndash; Registers a command with the given aliases.
    - [AbstractProgram::setLogger](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/AbstractProgram/setLogger.md) &ndash; Sets the logger.
    - [AbstractProgram::setLoggerChannel](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/AbstractProgram/setLoggerChannel.md) &ndash; Sets the loggerChannel.
    - [AbstractProgram::setErrorIsVerbose](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/AbstractProgram/setErrorIsVerbose.md) &ndash; Sets the errorIsVerbose.
    - [AbstractProgram::run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/AbstractProgram/run.md) &ndash; Starts the interactive program.
- [ProgramInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/ProgramInterface.md) &ndash; The ProgramInterface interface.
    - [ProgramInterface::run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/ProgramInterface/run.md) &ndash; Starts the interactive program.


Dependencies
============
- [Universe: UniversalLogger](https://github.com/karayabin/universe-snapshot/tree/master/universe/Ling/UniversalLogger)

