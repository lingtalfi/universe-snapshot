<?php


namespace Ling\LingTalfi\Kaos\Command;


use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\ArrayInput;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\LingTalfi\Kaos\Util\ReadmeUtil;
use Ling\UniverseTools\DependencyTool;
use Ling\UniverseTools\Exception\UniverseToolsException;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\PlanetTool;

/**
 * The PushCommand class.
 *
 * This command does the following (for the given planet):
 *
 *
 * - Updates the version in meta-info.byml based on the **History Log** section in the README.md, or create it if necessary.
 * - Updates/creates the dependencies.byml file if necessary
 * - Builds the doc, if there is a corresponding LingTalfi/DocBuilder object.
 * - Pushes the planet to github.com.
 * - If the version number is greater than before, executes the PackAndPushUniTool command (see the @object(PackAndPushUniTool) class for more details).
 *
 *
 * Note: this command assumes that the planet dir represents a planet only if it contains a README.md file with a **History Log** section.
 *
 *
 * Options, flags
 * ----------------
 *
 * - ?planet-dir=string. The path to the planet directory to push. If not set, will use the current directory.
 *
 *
 */
class PushCommand extends KaosGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $indentLevel = $this->application->getBaseIndentLevel();


        $planetDir = $input->getOption('planet-dir');
        if (null === $planetDir) {
            $planetDir = $this->application->getCurrentDirectory();
        }


        $pInfo = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
        if (false !== $pInfo) {

            list($galaxyName, $planetName) = $pInfo;

            H::info(H::i($indentLevel) . "Pushing planet <blue>$galaxyName/$planetName</blue> ($planetDir):" . PHP_EOL, $output);
            H::info(H::i($indentLevel + 1) . "Scanning <b>README.md</b> file:" . PHP_EOL, $output);


            //--------------------------------------------
            // SCANNING README.MD
            //--------------------------------------------
            $readMeFile = $planetDir . "/README.md";
            $readMeUtil = new ReadmeUtil();
            $info = $readMeUtil->getLatestVersionInfo($readMeFile);


            if (false !== $info) {
                list($historyLogVersion, $commitText) = $info;
                H::discover(H::i($indentLevel + 2) . "Found version <b>$historyLogVersion</b> with commit text: \"$commitText\"." . PHP_EOL, $output);

                //--------------------------------------------
                // META-INFO.BYML
                //--------------------------------------------
                $metaInfo = MetaInfoTool::parseInfo($planetDir);
                $oldVersion = $metaInfo['version'] ?? null;


                $error = false;
                $newVersionAvailable = false;
                H::info(H::i($indentLevel + 1) . "Updating <b>meta-info.byml</b>...", $output);
                if ($historyLogVersion !== $oldVersion) {


                    $newVersionAvailable = true;
                    $metaInfo["version"] = $historyLogVersion;
                    $res = MetaInfoTool::writeInfo($planetDir, $metaInfo);
                    if (false === $res) {
                        $output->write('<error>oops</error>' . PHP_EOL);
                        H::error(H::i($indentLevel + 1) . "Couldn't write the meta-info file to the planet <bold>$planetDir</bold>." . PHP_EOL, $output);
                        $error = true;
                    } else {
                        $output->write('<success>ok</success>' . PHP_EOL);
                    }
                } else {
                    $output->write('<success>ok</success>' . PHP_EOL);
                }


                if (false === $error) {


                    //--------------------------------------------
                    // DEPENDENCIES.BYML
                    //--------------------------------------------
                    H::info(H::i($indentLevel + 1) . "Updating <b>dependencies.byml</b>...", $output);

                    try {

                        if (true === DependencyTool::writeDependencies($planetDir)) {
                            $output->write('<success>ok</success>' . PHP_EOL);


                            //--------------------------------------------
                            // DOC BUILDER
                            //--------------------------------------------
                            $docBuilderClass = "Ling\LingTalfi\DocBuilder\\$planetName\\$planetName" . "DocBuilder";
                            H::info(H::i($indentLevel + 1) . "Checking for documentation builder." . PHP_EOL, $output);

                            if (class_exists($docBuilderClass)) {
                                H::discover(H::i($indentLevel + 2) . "Found <b>$docBuilderClass</b>." . PHP_EOL, $output);
                                H::info(H::i($indentLevel + 2) . "Creating documentation....", $output);


                                call_user_func([$docBuilderClass, "buildDoc"]);
                                $output->write('<success>ok</success>' . PHP_EOL);


                                //--------------------------------------------
                                // PUSH TO GITHUB.COM
                                //--------------------------------------------
                                H::info(H::i($indentLevel + 1) . "Pushing planet <blue>$galaxyName/$planetName</blue> to github.com." . PHP_EOL, $output);


                                if (false === $newVersionAvailable) {
                                    $commitText = "Routine update.";
                                }
                                /**
                                 * Note: I'm using git shortcut commands:
                                 * https://github.com/lingtalfi/server-notes/blob/master/doc/my-git-local-flow.md
                                 */
                                passthru("cd \"$planetDir\"; git snap update \"" . str_replace('"', '\"', $commitText) . "\"");
                                if (true === $newVersionAvailable) {
                                    passthru("cd \"$planetDir\"; git t $historyLogVersion");
                                }
                                passthru("cd \"$planetDir\"; git pp");


                                //--------------------------------------------
                                // REPACK AND PUSH UNI TOOL
                                //--------------------------------------------
                                if (true === $newVersionAvailable) {

                                    $myInput = new ArrayInput();
                                    $myInput->setItems([
                                        ":packpushuni" => true,
                                    ]);
                                    $this->application->run($myInput, $output);
                                }


                                H::success(H::i($indentLevel) . "The planet <blue>$galaxyName/$planetName</blue> was pushed." . PHP_EOL, $output);


                            } else {
                                H::info(H::i($indentLevel + 2) . "No DocBuilder class found for planet <blue>$galaxyName/$planetName</blue>." . PHP_EOL, $output);
                            }


                        } else {
                            $output->write('<error>oops</error>' . PHP_EOL);
                            H::error(H::i($indentLevel + 2) . "Couldn't write the dependencies.byml file." . PHP_EOL, $output);
                        }
                    } catch (UniverseToolsException $e) {
                        $output->write('<error>oops</error>' . PHP_EOL);
                        H::error(H::i($indentLevel + 2) . $e->getMessage() . PHP_EOL, $output);
                    }
                }
            } else {
                $errors = $readMeUtil->getErrors();
                H::warning(H::i($indentLevel + 2) . "The directory <bold>$planetDir</bold> does not contain a valid <bold>README.md</bold> file. " . PHP_EOL, $output);
                if ($errors) {
                    H::warning(H::i($indentLevel + 2) . "The ReadMeUtil object said: " . PHP_EOL, $output);
                    foreach ($errors as $error) {
                        H::warning(H::i($indentLevel + 3) . $error . PHP_EOL, $output);
                    }
                }
            }

        } else {
            H::error(H::i($indentLevel) . "Invalid planet directory: <bold>$planetDir</bold>." . PHP_EOL, $output);
        }


    }


}