<?php

    class Db {
        
        private $host;
        private $db;
        private $user;
        private $pass;
        private $charset;

        public function __construct()
        {
            $this->host = HOST;
            $this->db = DB;
            $this->user = USER;
            $this->pass = PASS;
            $this->charset = CHARSET;
        }

        function connect(){
            try{
                
                $con = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
                $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false];

                $pdo = new PDO($con, $this->user, $this->pass, $options);

                error_log("Conectado a la base de datos");

                return $pdo;
            } catch(PDOException $e){
                var_dump("Error Connect: " . $e->getMessage());
            }
        }
    }

?>