<?php

class Path{

    static function route(){
        return str_replace(ROUTE_BASE,"",$_SERVER['REQUEST_URI']);
    }

}

