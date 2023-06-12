<?php
require_once "../Model/ClasseModel.php";

class ClasseController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new ClasseModel();
    }

    public function lister()
    {
        if (isset($_POST['id_groupeNiveau'])) {
            $id_groupeNiveau = $_POST['id_groupeNiveau'];
            $nomNiveau = $_POST['nomNiveau'];
            $data = $this->model->lister($id_groupeNiveau);
            $this->render("LesClasses.html", $data);
        }
    }

    public function AJouter()
    {
        if (isset($_POST['ajouter']) && !empty($_POST['champ']) && !empty($_POST['effectif']) && isset($_POST['id_groupeNiveau'])) {
            $nom = $_POST['champ'];
            $effectif = $_POST['effectif'];
            $id_groupeNiveau = $_POST['id_groupeNiveau'];
            $this->model->Ajouter(["nom" => $nom, "effectif" => $effectif, "id_groupeNiveau" => $id_groupeNiveau]);
        }
        header('Location: lister');
        exit;
    }
    
    // public function AJouter()
    // {
        
    //     $id = $_POST['niveau'];
    //     if (isset($_POST['ajouter']) && !empty($_POST['champ']) && !empty($_POST['effectif'])) {
    //         $nom = $_POST['champ'];
    //         $effectif = $_POST['effectif'];
    //         $this->model->Ajouter(["nom" => $nom, "effectif" => $effectif, "id_groupeNiveau" => $id]);

    //     }
    //     header('Location: lister');
    //     exit;
    // }
}