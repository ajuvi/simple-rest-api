<?php

class App{

    public $routes = array();
    public $method = strtoupper($_SERVER['REQUEST_METHOD']);

    public function route($name,$function){
        $this->routes[$name] = $function;
    }

    public function run(){
    
        //assigna el camp default a la darrera posció
        if(isset($this->routes['default'])){
            $default = $this->routes['default'];
            unset($this->routes['default']);
            $this->routes['default'] = $default;
        }

        foreach ($this->routes as $route => $function) {
            if($this->match($route)){
                $function();
                break;
            }
        }
    }
    
    public function match($route){
        if($route == Path::route() || ($route . "/") == Path::route() || $route=='default'){
            return true;
        }else{
            $p_route = explode('/',rtrim($route,"/ "));
            $p_actual = explode('/',rtrim(Path::route(),"/ "));

            if(count($p_route)==count($p_actual)){
                for($i=0;$i<count($p_route);$i++){                    
                    if($this->_startsWith($p_route[$i],"{") && $this->_endsWith($p_route[$i],"}")){
                        //agafar els valors de {*}
                        $_GET[trim($p_route[$i],"{}")] = $p_actual[$i];
                    } else {
                        if($p_route[$i]!=$p_actual[$i]){
                            return false;
                        }
                    }
                }
                return true;
            }
        }

        return false;
    }

    private function _startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    private function _endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }

}