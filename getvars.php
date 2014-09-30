<?php

$app = require "classes/Bootstrapper.php";
$app->start();

$glob = new Glob();

require_once $glob->search('database.php')->first();
require_once $glob->search('functions.php')->first();

$design = new designDB($db,"testband");

$values = $design->getvars("design");

//echo $values;

echo json_encode($values);

?>