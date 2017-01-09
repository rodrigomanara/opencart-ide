<?php

namespace ComposerScript;

use IDE\Model;
use IDE\System;
use IDE\Writer;

class Installer {


    public static function Init() {

        $model = new Model();

        $result_model = $model->setPath("upload\\admin\\model")
                ->setPath("upload\\catalog\\model")
                ->init();

        $engine = new System();
        $result_negine = $engine->setPath("upload\\system\\library")
                ->init();

        $default = array(
            array('method' => 'Loader', 'type' => '$load'),
        );
        $merge = array_merge($result_model, $result_negine, $default);


        new Writer($merge, "upload\\system\\engine\\controller.php");
    }

}
