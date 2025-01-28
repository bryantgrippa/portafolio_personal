<?php

        if (!isset($_REQUEST['p'])) {
            require_once "assets/landing/index.html";

        } else {
            $porta = $_REQUEST['p'];
            $controller = $_REQUEST['c'];

            require_once "models/" .$porta. "."."models/Database.php";



            require_once "controller/" . $porta . ".controllers/" . $controller . ".php";

            $controller = new $controller;
            // $action = new Login;
            // $controller->update();
            
            $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'main';
            call_user_func(array($controller, $action));

        }
?>