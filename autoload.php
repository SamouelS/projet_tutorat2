<?php
spl_autoload_register('autoload');

function autoload($class){
    $class = str_replace('\\', '/', $class);
    $class = $class.'.php';
    if(file_exists($class)){
        require_once $class;
    }
    
}
 ?>