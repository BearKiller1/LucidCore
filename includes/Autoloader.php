<?php

Autoloader::register();

class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            if($class == "Connection"){
                if(file_exists("../../../includes/Connection.class.php")){
                    include_once "../../../includes/Connection.class.php";
                }
                else{
                    include_once "../../includes/Connection.class.php";
                }
            } else if($class == 'Model'){
                if(file_exists("../../../includes/Model.class.php")){
                    include_once "../../../includes/Model.class.php";
                }
                else{
                    include_once "../../includes/Model.class.php";
                }
            } else if($class == 'Component'){
                if(file_exists('../Component/'.$class.'.class.php')){
                    include_once '../Component/'.$class.'.class.php';
                }
                else if(file_exists('../../../includes/plugins/Component/'.$class.'.class.php')){
                    include_once '../../../includes/plugins/Component/'.$class.'.class.php';
                }
                else if('plugins/Component/'.$class.'.class.php'){
                    include_once 'includes/Plugins/Component/'.$class.'.class.php';
                }
            } else if($class == 'Router'){
                if(file_exists('../Router/'.$class.'.class.php')){
                    include_once '../Router/'.$class.'.class.php';
                }
                else if(file_exists('../../../includes/plugins/Router/'.$class.'.class.php')){
                    include_once '../../../includes/plugins/Router/'.$class.'.class.php';
                }
                else if('plugins/Router/'.$class.'.class.php'){
                    include_once 'includes/Plugins/Router/'.$class.'.class.php';
                }
            }
        });
    }
}
    

?>