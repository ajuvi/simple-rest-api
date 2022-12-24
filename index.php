<?php

require_once "App.php";
$app = new App();


$app->route('/', function(){
    App::redirect('/home');
});

$app->route(,'/exercici/{id}', function(){
    $model = new DefaultModel("");    
});




