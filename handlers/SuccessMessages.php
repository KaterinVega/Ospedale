<?php

    class SuccessMessages {

        private $successList = [];

        public function __construct()
        {
            $this->successList = [
            ];
        }

        public function get($pHash){
            return $this->successList[$pHash];
        }

        public function existsKey($pKey){
            if (array_key_exists($pKey, $this->successList)){
                return true;
            } else {
                return false;
            }
        }
    }

?>