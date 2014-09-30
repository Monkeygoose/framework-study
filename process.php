<?php

$app = require "classes/Bootstrapper.php";
$app->start();

$glob = new Glob();

require_once $glob->search('database.php')->first();
require_once $glob->search('functions.php')->first();

$design = new designDB($db,"testband");

$design->createTable("design",$_POST);

$design->submit("design", $_POST);

echo "</br>Successfully Processed!</br>";

?>