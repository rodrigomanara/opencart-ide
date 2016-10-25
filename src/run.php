<?php

namespace RUN;

use IDE\Model;
use IDE\System;
use IDE\Writer;
class start {

    public function __construct() {
        $model = new Model();

        $result_model = $model->setPath(__DIR__ . DIRECTORY_SEPARATOR . "upload\\admin\\model")
                ->setPath(__DIR__ . DIRECTORY_SEPARATOR . "upload\\catalog\\model")
                ->init();

        $engine = new System();
        $result_negine = $engine->setPath(__DIR__ . DIRECTORY_SEPARATOR . "upload\\system\\library")
                ->init();

        $merge = array_merge($result_model, $result_negine);


        new Writer($merge, __DIR__ . DIRECTORY_SEPARATOR . "upload\\system\\engine\\controller.php");
        ;
    }

}
