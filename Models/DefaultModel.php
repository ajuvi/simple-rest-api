<?php

class DefaultModel{
    $tablename="";
    $primaryKey="id";
    $fields = array();

    public function convertToJson(){
        return json_encode($fields);   
    }

    public function loadFromJson(){

    }

}


