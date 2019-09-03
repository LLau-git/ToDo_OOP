<?php
require_once("../config/cfg.php");
require_once("../src/Model.php");
$model = new Model(CFG::class);

$mydata = $model->getTasks(1);
print_r($mydata);
$model->addTasks($mydata[2]);
$model->deleteTasks(3, 1);