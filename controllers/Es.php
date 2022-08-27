<?php

    class Es extends SessionController {

        public function __construct()
        {
            parent::__construct();

            if ($this->getUserSessionData() != null){
                $this->account = $this->getUserSessionData();
            }

            error_log("Es::Construct => Inicio de ES");
        }

        function render(){
            $this->view->render("Home/index", [
            ]);
            
            error_log("Home::render => Carga el index de Home");
        }

    }

?>