<?php


function __autoload($class_name)
{
    //class paths
    $array_paths = array(
        '/models/',
        '/components/',
        '/controllers/',
    );

    //loop of paths
    foreach ($array_paths as $path) {

        //path to class
        $path = ROOT . $path . $class_name . '.php';

        if (is_file($path)) {
            include_once $path;
        }
    }
}
