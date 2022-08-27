<?php

    class ErrorMessages {

        private $errorList = [];

        public function __construct()
        {
            $this->errorList = [
            ];
        }

        public function get($pHash){
            return $this->errorList[$pHash];
        }

        public function existsKey($pKey){
            if (array_key_exists($pKey, $this->errorList)){
                return true;
            } else {
                return false;
            }
        }
    }

?>