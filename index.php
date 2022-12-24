<?php

require_once "App.php";
$app = new App();

$app->route('/', function(){
    App::redirect('/home');
});


$method = strtoupper($_SERVER['REQUEST_METHOD']);


