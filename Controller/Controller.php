<?php

class Controller
{
    public function render($nameVue, $donnees = [])
    {
        $data = $donnees;
        require_once "../Vue/$nameVue.php";
    }
   
}