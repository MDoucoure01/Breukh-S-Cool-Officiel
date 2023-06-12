<?php

class Dbconnexion
{
   public static function connexion()
    {
        return new PDO("mysql:host=localhost;dbname=GestionNote","root","D@hiratoul01");
    }

    public function recupfetchAll($statement)
    {
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}