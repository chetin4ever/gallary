<?php
    function __autoload($class){
        $class=strtolower($class);
        $the_path="includes/{$class}.php";
        if(file_exists($the_path)){
            require_once($the_path);
        }
        else{
            die("the file name {$class}.php not found man....:(:(:(");
        }
    }

    function redirect($location){
        print $location;
        header("Location:{$location}");
    }
?>