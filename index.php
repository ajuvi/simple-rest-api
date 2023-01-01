<?php

require_once "utils/Globals.php";
require_once "core/App.php";

$app = new App();

$app->route('/', function(){
    echo json_encode(array("version"=>"simple-rest-api version 0.1"));
});

$app->route('/hola', function(){
    $missatge="hola a tothom";
    echo $missatge;
});

$app->route('/hola/{nom}', function(){
    $nom=App::param('nom');
    echo "hola $nom";
});

$app->route('/tintin', function() use ($app){
    $pm = new TintinModel();
    $app->response_json($pm->all());
});

$app->route('/tintin/count', function() use ($app){
    $pm = new TintinModel();
    $app->response_json($pm->count());
});

$app->route('/tintin/{id}', function() use ($app){
    $id=App::param('id');
    $pm = new TintinModel();
    $app->response_json($pm->index($id));
});


$app->run();