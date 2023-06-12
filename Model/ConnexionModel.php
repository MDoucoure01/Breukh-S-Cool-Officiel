<?php

require_once "Dbconnexion.php";

class ConnexionModel
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Dbconnexion::connexion();
    }

    public function getUserByPhone($phone)
    {
        $responce = new Dbconnexion();
        $requete = "select * From User where phone = $phone";
        $statement = $this->pdo->prepare($requete);
        $statement->execute();
        return $responce->recupfetchAll($statement);
    }
}