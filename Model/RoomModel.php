<?php

require_once "Dbconnexion.php";


class RoomModel
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Dbconnexion::connexion();
    }

    public function lister($id)
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


    
    public function supprimer(array $data)
    {
        $requete = "DELETE FROM ClasseDiscipline WHERE id_discipline = :id_discipline";
        $statement = $this->pdo->prepare($requete);
        $statement->execute($data);
    }



    public function Modifier(array $data)
    {
        
        if(array_key_exists('ressource', $data)){
            echo "1 er test";
            $requete = "UPDATE ClasseDiscipline SET ressource = :ressource WHERE id_discipline = :id_discipline";
            $statement = $this->pdo->prepare($requete);
            $statement->execute($data);
        }
        if(array_key_exists('examen', $data)){
            echo "2iem test";
            $requete = "UPDATE ClasseDiscipline SET examen = :examen WHERE id_discipline = :id_discipline";
            $statement = $this->pdo->prepare($requete);
            $statement->execute($data);
        }
    }
}
