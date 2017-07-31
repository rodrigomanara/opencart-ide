<?php

namespace IDE;

use IDE\Model;
use IDE\System;
use IDE\Writer;
use Composer\Script\Event;

/**
 * Description of Installer
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class Installer {

    public static function Init(Event $event) {

        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
        //opencart 2.* < or below
        $defaultDirRoot = $vendorDir . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR;
        //fix for 3.*
        $dir = self::getDir($defaultDirRoot);
 
        $model = new Model();

        $result_model = $model
                ->setPath($dir . "upload" . DIRECTORY_SEPARATOR . "admin" . DIRECTORY_SEPARATOR . "model")
                ->setPath($dir . "upload" . DIRECTORY_SEPARATOR . "catalog" . DIRECTORY_SEPARATOR . "model")
                ->init();

        $engine = new System();
        $result_negine = $engine->setPath($dir . "upload" . DIRECTORY_SEPARATOR . "system" . DIRECTORY_SEPARATOR . "library")
                ->init();

        $default = array(
            array('method' => 'Loader', 'type' => '$load'),
        );
        $merge = array_merge($result_model, $result_negine, $default);

        new Writer($merge, $dir . "upload/system/engine/controller.php");
    }
    /**
     * 
     * @param type $dir
     * @return type
     */
    private static function getDir($dir) {
        
        preg_match("/(.*?)upload/", $dir, $matches);

        if (isset($matches[1])) {
            return $matches[1];
        }
        return $dir;
    }

}
