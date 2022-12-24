<?php

class DefaultModel{
    $tablename="";
    $fields = array();

    public function convertToJson(){
        return json_encode($fields);   
    }

    public function loadFromJson(){
        
    }

}


