<?php 
    spl_autoload_register('myAutoLoader');
    function myAutoLoader($className){
        // $server[req]-> uri naszej strony
        $url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        //strpos sprawdza czy dany string jest w środku $url 
        if(strpos($url,"includes")!==false){
            $path="../classes/";
            // ../ znaczy, że cofamy się o jeden katalog do tyłu
        }
        else {
            $path="classes/";
        }
        $extension=".php";
        $fullPath=$path.$className.$extension;
        include_once $fullPath;
        if(!file_exists($fullPath)){
            return false;
        }
     }