<?php

    require_once 'libs/interfaces/IModel.php';

    class BaseModel {

        function __construct()
        {
            $this->db = new Db();   
        }

        function query($pQuery){
            return $this->db->connect()->query($pQuery);
        }

        function prepare($pQuery){
            return $this->db->connect()->prepare($pQuery);
        }
    }

?>