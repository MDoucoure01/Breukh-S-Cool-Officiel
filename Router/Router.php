<?php
require_once "../Controller/Controller.php";
require_once "../Controller/AnneeController.php";

class Router
{
    public function __construct()
    {
        $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
        //substr() permet de supprimer le premier et le dernier caractère d'une chaine
        $uri = substr($uri, 1);
        // echo $uri . '</br>';

        $link = explode('/', $uri);
        // var_dump($link[0]);

        if (isset($link[0]) && $link[0]) {
            // echo 'controller exist </br>';
        } else {
            $link[0] = 'Connexion';
            $filename = '../Controller/' . ucfirst(strtolower($link[0])) . 'Controller.php';
            require_once $filename;
            $controller = ucfirst(strtolower($link[0])) . "Controller";
            $controller = new $controller;

        }

        $filename = '../Controller/' . ucfirst(strtolower($link[0])) . 'Controller.php';
        //tester si l'action existe
        if (isset($link[1]) && $link[1]) {
            require_once $filename;

            //instancier le controller
            $controller = ucfirst(strtolower($link[0])) . "Controller";
            $controlle = new $controller;
            if (method_exists($controlle, $link[1])) {
                call_user_func([$controlle, $link[1]], []);
            } else {
                echo "page not found";
                // echo "method not exist </br>";
            }

        }
    }
}

