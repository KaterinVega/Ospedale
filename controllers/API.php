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
        public function add(){
            if ($this->existPost(["account"])){
                $this->model->addAccount(json_decode($this->getPost("account"), true));
            }
        }
        #endregion

    }

?>