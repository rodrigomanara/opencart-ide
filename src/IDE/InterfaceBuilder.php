<?php

namespace IDE;

/**
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
interface  InterfaceBuilder{
    /**
     * init start the build
     */
    public function init();
    
    /**
     * 
     * @param string $path
     */
    public function setPath($path);
    
    
}