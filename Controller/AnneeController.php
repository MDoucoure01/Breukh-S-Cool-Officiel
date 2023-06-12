<?php
require "../Model/AnneeModel.php";


class AnneeController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new AnneeModel();
    }
    public function lister()
    {
        $data = $this->model->getAll();
        $this->render("AnneeScolaire.html", $data);
    }
    public function verification()
    {
        if (isset($_POST['ok']) && !empty($_POST['libelle'])){
            echo "bonjour";
            $libelle = $_POST['libelle'];
            $stock = $this->model->verification(["libelle"=>$libelle]);
            if (empty($stock)) {
                return $valeur = true;
            }else {
                return $valeur = false;
            }
        }
    }
    public function estAnneeScolaireValide()
    {
        if (isset($_POST['ok'])) {
            $anneeScolaire = $_POST['libelle'];
            $annees = explode('/', $anneeScolaire);
            if (count($annees) === 2) {
                if ((strlen($annees[0]))===4 && (strlen($annees[1]))===4) {
                    $anneeDebut = intval($annees[0]);
                    $anneeFin = intval($annees[1]);
                    if ($anneeFin == ($anneeDebut + 1)) {
                        return $seccession = true;
                    }else {
                        return $seccession = false;
                    }
                }else {
                    return false;
                }
            }else {
                return $seccession = false;
            }
        }
    }
    public function insertion()
    {
        $valeur = $this->verification();
        $seccession = $this->estAnneeScolaireValide();
        if ($valeur && $seccession) {
            if (isset($_POST['ok']) && !empty($_POST['libelle'])){
                $libelle = $_POST['libelle'];
                $this->model->insertion(["libelle"=>$libelle]);
    
            }else {
                echo "remplissez votre";
            }
        }
        header('Location: lister');
        exit;
    }
    public function suppression()
    {
		if (isset($_POST['supprimer'])) {
            $libelle = $_POST['libelle'];
            $this->model->supprimer(["libelle"=>$libelle]);
		}
        header('Location: lister');
        exit;
    }
    public function modification()
    {
        if (isset($_POST['modifier'])) {
            $ancienLibelle = $_POST['ancien_libelle'];
            $nouveauLibelle = $_POST['nouveau_libelle'];
            $this->model->modifier(["Alibelle" => $ancienLibelle, "Nlibelle" => $nouveauLibelle]);
        }
        header('Location: lister');
        exit;
    }

    public function activerDesactiverAnneeScolaire()
    {
        if (isset($_POST['activer'])) {
            $libelle = $_POST['Status'];
            $id_AnneeScolaire = $_POST['id_AnneeScolaire'];
            $this->model->activerAnneeScolaire($id_AnneeScolaire);
        }

        // Rediriger vers la page de liste des années scolaires
        header('Location: lister');
        exit;
    }

}

