<?php

require_once "utils/Globals.php";
require_once "core/App.php";

$app = new App();

$app->get('/', function(){
    echo json_encode(array("version"=>"simple-rest-api version 0.1"));
});

$app->get('/hola', function(){
    $missatge="hola a tothom";
    echo $missatge;
});

$app->get('/hola/{nom}', function(){
    $nom=App::param('nom');
    echo "hola $nom";
});

$app->get('/tintin', function() use ($app){
    $pm = new TintinModel();
    $app->response_json($pm->all());
});

$app->get('/tintin/count', function() use ($app){
    $pm = new TintinModel();
    $app->response_json($pm->count());
});

$app->get('/tintin/{id}', function() use ($app){
    $id=App::param('id');
    $pm = new TintinModel();
    $app->response_json($pm->index($id));
});


$app->run();