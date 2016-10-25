<?php

namespace IDE;

use Symfony\Component\Finder\Finder;
/**
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
abstract class AbstractBuilder {

    protected $path = array();
    protected $realPath = array();
    protected $depth = false;

    /**
     * 
     * @param type $path
     */
    public function setPath($path) {
        $this->realPath[] = $path;
        return $this;
    }

    /**
     * 
     */
    protected function getFiles() {

        foreach ($this->realPath as $path) {
            $find = new Finder();
            $find->files()->name('*.php')->in($path);

            if ($this->depth)
                $find->depth('== 0');

            foreach ($find as $file) {
                array_push($this->path, $file->getRealPath());
            }
        }
        return $this;
    }

    /**
     * 
     * @param type $classname
     * @return string
     */
    protected function getModel($classname, $path = null) {

        if (is_null($classname) or empty($classname)) {
            return '';
        }
        $result = array();

        if (isset($classname['model'])) {
            $parts = explode("model", $path);

            if (isset($parts[1])) {
                $combine = array();
                $combine[] = "model";
                $parts = explode("\\", $parts[1]);
                foreach($parts as $part) {
                    $combine[] = strtolower($part);
                }
            }

            $result['method'] = $classname['model'];
            $type = "$" . implode("_", str_replace(".php", "",$combine));;
            $result['type'] = str_replace("__", "_", $type);
        }

        if (isset($classname['class'])) {

            $result['method'] = $classname['class'];
            $result['type'] = "$" . strtolower($classname['class']);
        }



        return $result;
    }

    protected function getContent($path) {
        $content = file_get_contents($path);
        return $content;
    }

    /**
     * 
     * @param type $path
     * @return type
     */
    protected function getClassName($content) {


        if (is_null($content) or empty($content)) {
            return '';
        }

        preg_match("/class\s(.*)\sextends/", $content, $matches);
        preg_match("/class\s(.*)\s{/", $content, $matches_1);

        $classname = array();
        if (isset($matches[1]) && !empty($matches[1])) {
            $classname['model'] = $matches[1];
        } else if (!isset($classname['model']) && isset($matches_1[1]) && !empty($matches_1[1])) {
            $classname['class'] = $matches_1[1];
        }

        return $classname;
    }

}
