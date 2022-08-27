<?php

    require_once 'handlers/session/Session.php';
    require_once 'models/core/AccountModel.php';

    class SessionController extends BaseController {

        private $userSession;
        private $username;
        private $userID;

        private $session;
        private $sites;

        private $user;

        public function __construct()
        {
            parent::__construct();
            
            $this->init();
        }

        function init(){
            $this->session = new Session();

            $json = $this->getJSONFile();

            $this->sites = $json["sites"];
            $this->defaultSites = $json["default-sites"];

            $this->validateSession();
        }

        private function getJSONFile(){
            $s = file_get_contents('config/access.json');
            $json = json_decode($s, true);

            return $json;
        }

        public function validateSession(){
            if ($this->existsSession()){
                $role = $this->getUserSessionData()->getRole();

                if ($this->isPublic()){
                    //!$this->redirectDefaultSiteByRole($role);
                } else {
                    if ($this->isAuthorized($role)){
                        
                    } else {
                        //!$this->redirectDefaultSiteByRole($role);
                        $this->redirect("", "");
                    }
                }
            } else {
                if ($this->isPublic()){

                } else {
                    $this->redirect("", "");
                }
            }
        }

        function existsSession(){

            if (!$this->session->exists()){
                return false;
            }

            if ($this->session->getCurrentUser() == null){
                return false;
            }

            $userID = $this->session->getCurrentUser();

            if ($userID){
                return true;
            } else {
                return false;
            }
        }

        function getUserSessionData(){
            $email = $this->session->getCurrentUser();
            $this->account = new AccountModel();

            if ($email != null){
                $this->account->get($email);
            }

            return $this->account;
        }

        function isPublic(){
            $currentURL = $this->getCurrentPage();
            $currentURL = preg_replace("/\?.*/", "", $currentURL);

            for($i = 0; $i < sizeof($this->sites); $i++){
                if ($currentURL == $this->sites[$i]["site"] && $this->sites[$i]["access"] == "public"){
                    return true;
                }
            }

            return false;
        }

        function getCurrentPage(){
            $actualLink = trim("$_SERVER[REQUEST_URI]");
            $url = explode("/", $actualLink);

            return $url[2];
        }

        private function redirectDefaultSiteByRole($pRole){
            $url = "";

            for($i = 0; $i < sizeof($this->sites); $i++){
                if ($this->sites[$i]["role"] == $pRole){
                    $url =  $this->sites[$i]["site"];
                    break;
                }
            }

            header("Location: " . URL . $url);
        } 

        private function isAuthorized($pRole){
            $currentURL = $this->getCurrentPage();
            $currentURL = preg_replace("/\?.*/", "", $currentURL);

            for($i = 0; $i < sizeof($this->sites); $i++){
                if ($currentURL == $this->sites[$i]["site"] && $this->sites[$i]["role"] == $pRole){
                    return true;
                }
            }

            return false;
        }

        function initialize($account){
            $this->session->setCurrentUser($account->getEmail()); //! FALTA
            $this->authorizedAccess($account->getRole());
        }

        function authorizedAccess($pRole){
            switch($pRole){
                case "Empleado":
                    $this->redirect($this->defaultSites["Empleado"], []); //! FALTA 
                    break;
                
                case "Administrador":
                    //$this->redirect($this->defaultSites["Administrador"], []);
                    header("Location: " . PATH . $this->defaultSites["Administrador"]);
                    break;
            }
        }

        function logout(){
            $this->session->closeSession(); //! FALTA
            $this->redirect("", "");
        }
    }
