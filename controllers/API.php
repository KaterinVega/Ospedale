<?php

    class API extends BaseController {

        public function __construct()
        {
            parent::__construct();

            error_log("Es::Construct => Inicio de ES");
        }

        function render(){

        }

        #region Account
        public function signUp(){
            if ($this->existPost(["account"])){
                $this->model->newAccount(json_decode($this->getPost("account"), true));
            }
        }

        public function signIn(){
            if ($this->existPost(["account"])){
                $this->model->joinAccount(json_decode($this->getPost("account"), true));
            }
        }
        #endregion

    }

?>