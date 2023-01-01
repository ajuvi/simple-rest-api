<?php

class TintinModel{
    private $dataset;

    function __construct(){
        $this->dataset = json_decode(file_get_contents("model/tintin.data"));
    }

    public function all(){
        return $this->dataset;
    }

    public function index($id){
        foreach($this->dataset as $item){
            if($item->id==$id){
                return $item;
            }
        }

        return null;
    }

    public function count(){
        return count($this->dataset);
    }

}





