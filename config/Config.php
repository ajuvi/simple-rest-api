<?php

require_once "utils/LoadDotEnv.php";

define(
    "ROUTE_BASE", 
    isset($_ENV["ROUTE_BASE"])?$_ENV["ROUTE_BASE"]:"/"
);
