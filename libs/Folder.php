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

        public function delete($name) {
            $route = $this->path . $name;

            if ($this->exists($route)){
                unlink($route);
                $root = explode("/", dirname($route, 1))[2];

                if (count($this->files($root)) == 0){
                    rmdir($this->path . $root);
                }

                return true;
            }

            return false;
        }

        public function files($name){
            $route = $this->path . $name;

            if ($this->exists($route)){
                $files = array_diff(scandir($route), array(".", ".."));

                return $files;
            }
        }

        public function exists($path){
            return is_dir($path) || is_file($path);
        }

    }

?>