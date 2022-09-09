<?php

    class Folder {

        private $path;

        public function __construct()
        {
            $this->path = "../data/";

            $this->create($this->path);
        }
        
        public function create($name){
            $route = $this->path . $name;
            
            if (!$this->exists($route)){
                mkdir($route);
            }

            return $route;
        }

        public function files($name){
            $route = $this->path . $name;

            if ($this->exists($route)){
                $files = array_diff(scandir($route), array(".", ".."));

                return $files;
            }
        }

        public function exists($path){
            return is_dir($path);
        }

    }

?>