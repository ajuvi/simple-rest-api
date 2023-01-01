<?php
$_ENV = array();
$fd = fopen(".env", "r");
if ($fd) {
    while (!feof($fd)) {
        $line = fgets($fd);
        $_ENV[trim(explode("=",$line)[0],'"')]=trim(explode("=",$line)[1],'"');
    }

    fclose($fd);
}