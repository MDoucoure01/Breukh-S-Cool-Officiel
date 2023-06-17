<?php
require_once "Dbconnexion.php";

class NoteModel
{
    
    private $pdo;
    public function __construct()
    {
        $this->pdo = Dbconnexion::connexion();
    }


    public function lister($id)
    {
        $responce = new Dbconnexion();
        $requete = "Select * from Eleve where id_classe = $id";
        $statement = $this->pdo->prepare($requete);
        $statement->execute();
        return $responce->recupfetchAll($statement);
    }

    public function getDisciplineByClasse($id)
    {
        $responce = new Dbconnexion();
        $requete = "SELECT *
        FROM discipline
        JOIN ClasseDiscipline ON ClasseDiscipline.id_discipline = discipline.id_discipline
        WHERE id_classe = $id";
        $statement = $this->pdo->prepare($requete);
        $statement->execute();
        return $responce->recupfetchAll($statement);
    }

    public function getSemestreByClasse($id)
    {
        $responce = new Dbconnexion();
        $requete = "SELECT * FROM `semestre` WHERE id_classe = $id";
        $statement = $this->pdo->prepare($requete);
        $statement->execute();
        return $responce->recupfetchAll($statement);
    }

    public function getPonderation($id_discipline)
    {
        $responce = new Dbconnexion();
        $requete = "SELECT * FROM ClasseDiscipline WHERE id_discipline = $id_discipline";
        $statement = $this->pdo->prepare($requete);
        $statement->execute();
        return $responce->recupfetchAll($statement);
    }
}