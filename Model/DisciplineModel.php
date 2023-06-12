<?php

require_once "Dbconnexion.php";

class DisciplineModel
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Dbconnexion::connexion();
    }


    
    public function option()
    {
        $requete = "SELECT * FROM GroupeNiveau";
        $statement = $this->pdo->prepare($requete);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    public function getClassesByNiveau()
    {
        $query = "SELECT * FROM Classe";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDisciplineByClasse()
    {
        $query = "SELECT * FROM groupeDiscipline";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDiscipline()
    {
        $query = "SELECT *
        FROM discipline
        JOIN ClasseDiscipline ON ClasseDiscipline.id_discipline = discipline.id_discipline";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function supprimer(array $data)
    {
        $requete = "DELETE FROM ClasseDiscipline WHERE id_discipline = :id_discipline";
        $statement = $this->pdo->prepare($requete);
        $statement->execute($data);
    }
    
    public function insertDiscipline(array $disciplineData, array $classeData)
    {
        $requete = "INSERT INTO discipline (libelle, code, id_groupeDiscipline) VALUES (:libelle, :code, :id_groupeDiscipline)";
        $statement = $this->pdo->prepare($requete);
        $statement->execute($disciplineData);
        
        echo "Insertion de la discipline effectuée avec succès";
        $id_discipline = $this->pdo->lastInsertId();
        
        $query = "INSERT INTO `ClasseDiscipline` (`id_classe`, `id_discipline`) VALUES (:id_classe, :id_discipline)";
        $classeData['id_discipline'] = $id_discipline;
        $statement = $this->pdo->prepare($query);
        $statement->execute($classeData);
        
        echo "Insertion terminée";
    }  


    public function insertGroupeDiscipline(array $data)
    {
        $requete = "INSERT INTO groupeDiscipline (libelle) VALUES (:libelle)";
        $statement = $this->pdo->prepare($requete);
        $statement->execute($data);
        echo "Insertion terminée";
    }
}











// public function insertDiscipline(array $data, array $data1)
// {
//     $requete = "INSERT INTO discipline (libelle, code, id_groupeDiscipline) VALUES (:libelle, :code, :id_groupeDiscipline)";
//     $statement = $this->pdo->prepare($requete);
//     $statement->execute($data);

//     echo "insetions inserted successfully";
//     $id_discipline = $this->pdo->lastInsertId();

//     $query = "INSERT INTO `ClasseDiscipline` (`id_classe`, `id_discipline`) VALUES (:id_classe, :id_discipline)";
//     $data1['id_discipline'] = $id_discipline;
//     $statement = $this->pdo->prepare($query);
//     $statement->execute($data1);

//     echo "tout est fait";
// }






































































// public function lister($id)
// {
    //     $responce = new Dbconnexion();
    //     $requete = "SELECT nom FROM Classe WHERE id_groupeNiveau = :id";
    //     $statement = $this->pdo->prepare($requete);
    //     $statement->bindValue(':id', $id);
    //     $statement->execute();
    //     $data = array();
    //     while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        //         $data[] = $row;
        //     }
        //     return $data;
        // }
        
        // public function lister($id)
        // {
            //     $responce = new Dbconnexion();
            //     $requete = "select * From Classe where id_groupeNiveau = :id";
            //     $statement = $this->pdo->prepare($requete);
            //     $statement->bindParam(':id', $id);
            //     $statement->execute();
            //     return $responce->recupfetchAll($statement);
            // }
            
            // public function lister($id)
            // {
                //     $data = array();
                //     $responce = new Dbconnexion();
                //     $requete = "SELECT nom FROM Classe WHERE id_groupeNiveau = :id";
                //     $statement = $this->pdo->prepare($requete);
                //     $statement->bindParam(':id', $id);
                //     $statement->execute();
                //     if ($statement->execute()) {
                    //     while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            //         $data[] = $row;
            //     }
            // }
            //     return $data;
            //     }
            
            
            
            // public function option()
            // {
                //     $responce = new Dbconnexion();
                //     $requete = "select * From GroupeNiveau";
                //     $statement = $this->pdo->prepare($requete);
                //     $statement->execute();
                //     return $responce->recupfetchAll($statement);
                // }
                // public function lister($idClass)
                // {
                    //     $query = "SELECT id_classe, nom FROM Classe where id_classe = :idclasse";
                    //     $statement = $this->pdo->prepare($query);
                    //     $statement->bindParam(":idclasse", $idClass);
                    //     if ($statement->execute()) {
                        //     while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                            //         $data[] = $row;
                            //     }
                            //     }
                            //     return $data;
                            // }