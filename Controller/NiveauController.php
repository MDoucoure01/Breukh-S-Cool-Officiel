<?php
require "../Model/NiveauModel.php";

class NiveauController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new NiveauModel();
    }

    public function verification()
    {
        if (isset($_POST['ajouter']) && !empty($_POST['champ'])){
            echo "bonjour";
            $libelle = $_POST['champ'];
            $stock = $this->model->verification(["libelle"=>$libelle]);
            if (empty($stock)) {
                return $valeur = true;
            }else {
                return $valeur = false;
            }
        }
    }

    public function AJouter()
    {
        $valeur = $this->verification();
        if (isset($_POST['ajouter']) && !empty($_POST['champ']) && $valeur) {
            $libelle = $_POST['champ'];
            $this->model->Ajouter(["libelle"=>$libelle]);
        }
        header('Location: lister');
        exit;
    }

    public function lister()
    {
        $data = $this->model->lister();
        $this->render("GroupeNiveau.html", $data);
    }


    public function suppression()
    {
		if (isset($_POST['supprimer'])) {
            $libelle = $_POST['libelle'];
            $this->model->Supprimer(["libelle"=>$libelle]);
		}
        header('Location: lister');
        exit;
    }
}