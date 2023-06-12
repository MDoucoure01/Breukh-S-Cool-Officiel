<?php
require_once "../Model/EleveModel.php";


class EleveController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new EleveModel();
    }

    public function lister()
    {
        if (isset($_POST['id_classe'])) {
            $nomclasse = $_POST['nom'];
            $id_classe = $_POST['id_classe'];
            $data = $this->model->lister($id_classe);
            $this->render("ListeEleves.html", $data);
        }
    }

    public function ajouterEleve()
    {
        $id_Classe = null;
        if (isset($_POST['id_classe'])) {
            $anneeEnCour = $this->model->anneeActuel();
            $id_classe = $_POST['id_classe'];
        }
        if (isset($_POST['prenom'])){
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $dateDeNaissance = $_POST['dateDeNaissance'];
            $Numero = $_POST['Numero'];
            $id_Classe = $_POST['id_classe'];
            $lieu = $_POST['lieu'];
            $genre = $_POST['genre'];
            
            $this->model->AJoutEleve(['nom' => $nom,'prenom' => $prenom,'dateDeNaissance' => $dateDeNaissance,'Numero' => $Numero,'id_Classe' => $id_Classe,'lieu' => $lieu,'sexe' => $genre]);
            
            $id_Eleve = $this->model->getLastInsertedId();
            
            $this->model->ajouterInscription($id_Eleve, $id_Classe, $anneeEnCour);
            
        } 
        require_once "../Vue/GestionEleve.html.php";


    }

}