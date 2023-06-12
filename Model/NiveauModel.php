<?php

require_once "Dbconnexion.php";

class NiveauModel
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Dbconnexion::connexion();
    }

    public function Ajouter(array $data)
    {
        $requete = "insert into GroupeNiveau (libelle) values (:libelle)";
        $statement = $this->pdo->prepare($requete);
        $statement->execute($data);
    }

    public function lister()
    {
        $responce = new Dbconnexion();
        $requete = "select * From GroupeNiveau";
        $statement = $this->pdo->prepare($requete);
        $statement->execute();
        return $responce->recupfetchAll($statement);
    }
    public function Supprimer(array $data)
    {
        $requete = "DELETE FROM GroupeNiveau WHERE libelle = (:libelle)";
        $statement = $this->pdo->prepare($requete);
        $statement->execute($data);
    }

    public function verification(array $data)
    {
        $requete = "SELECT * FROM GroupeNiveau WHERE libelle LIKE (:libelle)";
        $statement = $this->pdo->prepare($requete);
        $statement->execute($data);
        $responce = new Dbconnexion();
        return $responce->recupfetchAll($statement);
    }
}