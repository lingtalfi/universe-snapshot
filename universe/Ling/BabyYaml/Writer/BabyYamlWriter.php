<?php


namespace Ling\BabyYaml\Writer;


use Ling\Bat\FileSystemTool;

/**
 * BabyYamlWriter.
 * @author Lingtalfi
 *
 *
 */
class BabyYamlWriter
{

    private $valueAdaptor;
    private $eol = PHP_EOL;
    private $tab = "    ";
    private $formatCode = true;


    public function __construct()
    {
        $this->valueAdaptor = new BabyYamlWriterValueAdaptor();
    }


    /**
     * If file is null, will return the babyYaml dump.
     * If file is given, will write the babyYaml dump to the given file.
     *
     *
     * @return bool|string,
     *                  bool is returned only if file is given.
     *                  It indicates whether or not the writing to the file has been successful.
     *
     *                  string is returned only if file is null.
     *
     */
    public function export(array $data, $file = null)
    {
        $content = $this->getBabyYamlFromArray($data);
        if (null === $file) {
            return $content;
        }
        return (false !== FileSystemTool::mkfile($file, $content));
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function getBabyYamlFromArray(array $array)
    {
        $s = rtrim($this->getNodeContent($array, 0), PHP_EOL);
        return $s;
    }

    private function getNodeContent(array $config, $level = 0, $n = 0)
    {

        $s = '';
        foreach ($config as $k => $v) {
            if (is_numeric($k)) {

                $prefix = $k . ': ';
                if ((int)$k === (int)$n) {
                    $prefix = "- ";
                } else {
                    $n = $k;
                }


                if (is_array($v)) {
                    $s .= $this->tab($level) . $prefix;
                    if ($v) {
                        $p = 0;
                        $s .= $this->eol();
                        foreach ($v as $k2 => $v2) {
                            $s .= $this->getNodeContent(array($k2 => $v2), ($level + 1), $p);
                            $p++;
                        }
                        $s .= $this->tab($level);
                    } else {
                        $s .= $this->toLiteral($v, $level);
                    }
                    $s .= $this->eol();
                } else {
                    $s .= $this->tab($level) . $prefix . $this->toLiteral($v, $level) . $this->eol();
                }
                $n++;
            } else {
                if (is_array($v)) {
                    $s .= $this->tab($level) . $k . ': ';
                    if ($v) {
                        $p = 0;
                        $s .= $this->eol();
                        foreach ($v as $k2 => $v2) {
                            $s .= $this->getNodeContent(array($k2 => $v2), ($level + 1), $p);
                            $p++;
                        }
                        $s .= $this->tab($level);
                    } else {
                        $s .= $this->toLiteral($v, $level);
                    }
                    $s .= $this->eol();
                } else {
                    if (false !== strpos($k, ':')) {
                        $k = '"' . str_replace('"', '\"', $k) . '"';
                    }
                    $s .= $this->tab($level) . $k . ': ' . $this->toLiteral($v, $level) . $this->eol();
                }
            }
        }
        return $s;
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function toLiteral($scalar, $level)
    {
        if (is_string($scalar) && false !== strpos($scalar, $this->eol())) {
            // adding 4 extra spaces (compared to the parent key's beginning) at the beginning of each line
            $nbSpaces = ($level * 4) + 4;
            $s = '<' . $this->eol();
            $p = explode($this->eol(), $scalar);
            foreach ($p as $v) {
                $t = trim($v);
                if (strlen($t) > 0) {
                    $v = str_repeat($this->tab, $nbSpaces / 4) . $v;
                }
                $s .= $v . $this->eol();
            }
            $s .= str_repeat(' ', $level * 4) . '>';
            $v = $s;
        } else {
            $v = $this->valueAdaptor->getValue($scalar);
        }
        return $v;
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function tab($level)
    {
        if (true === $this->formatCode) {
            return str_repeat($this->tab, $level);
        }
    }

    private function eol()
    {
        if (true === $this->formatCode) {
            return $this->eol;
        }
    }
}
