<?php
    
    class Router
    {
        public $Path;

        public function __construct()
        {
        }

        public function Call($MethodName, $data = []){    
            $this->$MethodName($data);
        }

        public function GetPage1($PageName, $Addition = [] )
        {
            $this->PageName = $PageName;

            if(!empty($Addition))
                $this->CheckAddition($Addition);
            else
                $this->Path = 'views/' . $this->PageName . '.html';
                
            return $this->checkComponent(file_get_contents($this->Path));
        }

        public function CheckAddition1($Addition)
        {
            if($Addition[0] != ''){
                if($Addition[0] == 'main'){
                    $this->Path = 'main.html';
                }
                else{
                    if(file_exists('views/' . $this->PageName . '/' . $Addition[0] . '.html')){
                        $this->Path = 'views/' . $this->PageName . '.html';
                    } else if(file_exists('views/' . $Addition[0] . '/' . $this->PageName . '.html')){
                        $this->Path = 'views/' . $Addition[0] . '/' . $this->PageName . '.html';
                    } else {
                        $this->Path = 'views/404.html';
                    }
                }
            }
            else{
                $this->Path = 'views/' . $this->PageName . '.html';
            }
        }

        public function checkComponent1($page)
        {
            if(strpos($page, '<<') !== false){
                $start  = strpos($page, '<<');
                $end    = strpos($page, '>>');
                if($start == 0 ){
                    $end = $end + 2;
                }
                $caller = substr($page, $start, $end);
                if(strpos($caller, 'call')){
                    $callerStart    = strpos($caller, '(') + 1;
                    $callerEnd      = strpos($caller, ')');
                    $component      = substr($caller, $callerStart, $callerEnd - $callerStart);

                    if(strpos($component, ',')){
                        $component  = explode(',', $component);
                        $folder     = $component[1];
                        $component  = $component[0];
                        $folder     = str_replace(' ', '', $folder);
                        $newPage    = str_replace($caller, $this->GetPage($component, [$folder]), $page);
                    }
                    else{
                        $newPage    = str_replace($caller, $this->GetPage($component), $page);
                    }
                    return $newPage;

                }
            }
            else{
                return $page;
            }
        }


        public function GetPage($data){
            $PageName = $data['PageName'];
            $Addition = $data['Addition'];

            if(!empty($Addition)){
                $this->CheckAddition([$Addition, $PageName]);
            } else{
                $this->Path = 'views/' . $PageName . '.html';
            }

            return $this->CheckComponent(file_get_contents($this->Path));

        }

        public function CheckAddition($data){
            $data = $data[0];
            if($data[0] != ''){
                if($data[0] == 'main'){
                    $this->Path = 'main.html';
                }
                else{
                    if(file_exists('views/' . $this->PageName . '/' . $data[0] . '.html')){
                        $this->Path = 'views/' . $this->PageName . '.html';
                    } else if(file_exists('views/' . $data[0] . '/' . $this->PageName . '.html')){
                        $this->Path = 'views/' . $data[0] . '/' . $this->PageName . '.html';
                    } else {
                        $this->Path = 'views/404.html';
                    }
                }
            }
            else{
                $this->Path = 'views/' . $this->PageName . '.html';
            }
        }

        public function CheckComponent($data){

        }


    }


?>