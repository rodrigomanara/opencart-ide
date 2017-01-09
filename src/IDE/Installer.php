<?php

 

namespace IDE;


use IDE\Model;
use IDE\System;
use IDE\Writer;

/**
 * Description of Installer
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class Installer {
    
    private $dir;
    public function __construct($dir = __DIR__) {
        $this->dir = $dir;
    }
    
    public static function Init( ) {

        $model = new Model();

        $result_model = $model->setPath($this->dir . DIRECTORY_SEPARATOR .   "upload\\admin\\model")
                ->setPath($this->dir . DIRECTORY_SEPARATOR . "upload\\catalog\\model")
                ->init();

        $engine = new System();
        $result_negine = $engine->setPath($this->dir . DIRECTORY_SEPARATOR . "upload\\system\\library")
                ->init();

        $default = array(
            array('method' => 'Loader', 'type' => '$load'),
        );
        $merge = array_merge($result_model, $result_negine, $default);


        new Writer($merge, $this->dir . DIRECTORY_SEPARATOR . "upload\\system\\engine\\controller.php");
    }
}
