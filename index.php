<?php

require __DIR__ . '/vendor/autoload.php';



$model = new IDE\Model();

$result_model = $model->setPath(__DIR__ . DIRECTORY_SEPARATOR . "upload\\admin\\model")
        ->setPath(__DIR__ . DIRECTORY_SEPARATOR . "upload\\catalog\\model")
        ->init();

$engine = new IDE\Engine();
$result_negine =  $engine->setPath(__DIR__ . DIRECTORY_SEPARATOR . "upload\\system\\library")
       
        ->init();

$merge = array_merge($result_model, $result_negine);


new IDE\Writer($merge, __DIR__ . DIRECTORY_SEPARATOR ."upload\\system\\engine\\controller.php");

