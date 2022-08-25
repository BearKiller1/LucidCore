<?php

require '../../../includes/Autoloader.php';

class Welcome extends Model
{
    public function __construct($Action)
    {
        $this->$Action();
        $this->request = @$_REQUEST;
        $this->page = $this->request['page'];
        parent::__construct($this->page);
    }

    public function getPage(){
        // echo __DIR__;
    }
}

$Welcome = new Welcome($_REQUEST['action']);

?>