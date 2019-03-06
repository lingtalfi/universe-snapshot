<?php

namespace Ling\UniverseTools;


use Ling\DirScanner\YorgDirScannerTool;
use Ling\UniverseTools\Exception\UniverseToolsException;

/**
 * The PlanetTool class.
 *
 * Contains methods related to a planet, like listing the @kw(bsr-0) classes found in a planet for instance.
 *
 */
class PlanetTool
{


    /**
     * Parses the given directory recursively and returns an array containing the names of all @kw(bsr-0) classes found.
     *
     * Example:
     * -----------
     *
     * The following code:
     *
     * ```php
     * $planetDir = "/komin/jin_site_demo/universe/UniverseTools";
     * az(PlanetTool::getClassNames($planetDir));
     * ```
     *
     *
     * Will output:
     *
     * ```html
     * array(3) {
     * [0] => string(28) "UniverseTools\DependencyTool"
     * [1] => string(46) "UniverseTools\Exception\UniverseToolsException"
     * [2] => string(24) "UniverseTools\PlanetTool"
     * }
     *
     * ```
     *
     *
     *
     * @see https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md
     *
     * @param $planetDir
     * @return array
     * @throws UniverseToolsException
     */
    public static function getClassNames($planetDir)
    {
        if (false === is_dir($planetDir)) {
            throw new UniverseToolsException("Dir not found: $planetDir");
        }

        $classNames = [];
        $dirName = basename($planetDir);


        $files = YorgDirScannerTool::getFilesWithExtension($planetDir, 'php', false, true, true);
        foreach ($files as $file) {
            $relativeClassName = str_replace('/', '\\', substr($file, 0, -4));
            $className = $dirName . '\\' . $relativeClassName;
            try {
                $class = new \ReflectionClass($className);
                $classNames[] = $className;

            } catch (\ReflectionException $e) {

            }
        }
        return $classNames;
    }


    /**
     * Returns the list of planet dirs for a given $universeDir.
     *
     * If the given universe directory does not exist, a UniverseToolsException is thrown.
     *
     *
     * @param string $universeDir
     * @return array
     * @throws UniverseToolsException
     */
    public static function getPlanetDirs(string $universeDir): array
    {
        if (false === is_dir($universeDir)) {
            throw new UniverseToolsException("Dir not found: $universeDir");
        }
        $ret = [];
        $galaxies = YorgDirScannerTool::getDirs($universeDir);
        foreach ($galaxies as $galaxy) {
            $ret = array_merge($ret, YorgDirScannerTool::getDirs($galaxy));
        }
        return $ret;
    }


    /**
     * Returns an array containing the galaxy name and the short planet name extracted from the given $planetDir.
     * Returns false if the given $planetDir is not valid.
     *
     * @param string $planetDir
     * @return array|false
     */
    public static function getGalaxyNamePlanetNameByDir(string $planetDir)
    {
        if (false !== strpos($planetDir, "/")) {
            return [
                basename(dirname($planetDir)),
                basename($planetDir),
            ];
        }
        return false;
    }


    /**
     * Returns an array containing the galaxy name and the short planet name extracted from the given $planetName.
     * Returns false if the given $planetName is invalid.
     *
     *
     * @param string $planetName
     * The long planet name (galaxy/planetShortName).
     * @return array|false
     */
    public static function getGalaxyNamePlanetNameByPlanetName(string $planetName)
    {
        $p = explode("/", $planetName);
        if (2 === count($p)) {
            return $p;
        }
        return false;
    }

}