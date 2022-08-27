<?php

    require_once "core/AccountModel.php";

    class APIModel extends BaseModel {

        public function __construct()
        {
            parent::__construct();
        }

        #region Account
        
        public function addAccount($data){
            $account = new AccountModel();
            $account->from($data);

            echo json_encode("ok");
        }

        #endregion

    }

?>