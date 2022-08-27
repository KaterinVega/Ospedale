<?php

    require_once "core/AccountModel.php";

    class APIModel extends BaseModel {

        public function __construct()
        {
            parent::__construct();
        }

        #region Account
        
        public function newAccount($data){
            $account = new AccountModel();
            $account->from($data);

            if ($account->save()){
                echo json_encode("ok");
            } else {
                echo json_encode("Error");
            }
        }

        public function joinAccount($data){
            $account = new AccountModel();

            if ($account->comparePasswords($data["pass"], $data["email"])){
                echo json_encode("ok");
            } else {
                echo json_encode("Error");
            }
        }

        #endregion

    }

?>