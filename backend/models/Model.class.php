<?php

require '../../../includes/autoloader.php';

class Model extends Connection
{
    public function __construct($id, $module = null)
    {
        parent::__construct($id, $module);
    }
}