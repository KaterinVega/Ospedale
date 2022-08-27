<?php

    date_default_timezone_set("America/Bogota");

    error_reporting(E_ALL);

    ini_set("ignore_repeated_errors", TRUE);
    ini_set("display_errors", FALSE);
    ini_set("log_errors", TRUE);
    ini_set("error_log", "C:/xampp\htdocs\Ospedale/php-error.log");

    error_log("Run App");

    //! LIBRARY
    require 'libs/App.php';
    require 'libs/BaseController.php';
    require 'libs/BaseModel.php';
    require 'libs/View.php';
    require 'libs/Db.php';

    require 'handlers/ErrorMessages.php';
    require 'handlers/SuccessMessages.php';
    require 'handlers/session/SessionController.php';

    require 'config/settings.php';

    $app = new App();

?>