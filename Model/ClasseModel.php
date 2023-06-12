<?php

require_once "Dbconnexion.php";

class ClasseModel
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Dbconnexion::connexion();
    }

    public function lister($id)
    {
        $responce = new Dbconnexion();
        $requete = "select * From Classe where id_groupeNiveau = $id";
        $statement = $this->pdo->prepare($requete);
        $statement->execute();
        return $responce->recupfetchAll($statement);
    }

    public function Ajouter(array $data)
    {
        $requete = "insert into Classe (nom, effectif, id_groupeNiveau) values (:nom, :effectif, :id_groupeNiveau)";
        $statement = $this->pdo->prepare($requete);
        $statement->execute($data);
    }
}