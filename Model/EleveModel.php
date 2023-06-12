<?php
require_once "Dbconnexion.php";

class EleveModel
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


    public function anneeActuel()
    {
        $requete = "SELECT id_AnneeScolaire FROM AnneeScolaire WHERE status = 1";
        $statement = $this->pdo->prepare($requete);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['id_AnneeScolaire'];
    }

    public function getLastInsertedId()
    {
        return $this->pdo->lastInsertId();
    }


    public function AJoutEleve(array $data)
    {
        $requete = "INSERT INTO Eleve (nom, prenom, dateDeNaissance, Numero, id_Classe, lieu, sexe) VALUES (:nom, :prenom, :dateDeNaissance, :Numero, :id_Classe, :lieu, :sexe)";
        $statement = $this->pdo->prepare($requete);
        $statement->execute($data);
    }


    public function ajouterInscription($id_Eleve, $id_Classe, $anneeEnCour)
    {
        $requete = "INSERT INTO inscription (id_AnneeEnCour, id_Eleve, id_Classe) VALUES ($anneeEnCour, $id_Eleve, $id_Classe)";
        $statement = $this->pdo->prepare($requete);
        // $statement->bindParam(':nneeEnCour', $anneeEnCour);
        // $statement->bindParam(':id_Eleve', $id_Eleve);
        // $statement->bindParam(':id_Classe', $id_Classe);
        $statement->execute();
    }
}