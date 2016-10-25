<?php

namespace IDE;

Class Model extends AbstractBuilder implements InterfaceBuilder{

    public function init() {

        //find all files
        $this->getFiles();

        $build_list = array();
        foreach ($this->path as $path) {
            $build_list[] = $this->getModel($this->getClassName($this->getContent($path)) , $path);
        }
        
        return $build_list;
    }

}
