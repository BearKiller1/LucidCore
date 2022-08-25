<?php

    require 'includes/router.class.php';

    class Index
    {
        public function __construct()
        {
            $this->Router = new Router();
            
            $data = $this->Router->GetPage('main', ['main']);

            echo $data;
        }
    }

    new Index();
?>