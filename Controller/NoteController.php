<?php
require_once "../Model/NoteModel.php";


class NoteController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new NoteModel();
    }

    public function lister()
    {
        if (isset($_POST['id_classe'])) {
            $nomclasse = $_POST['nom'];
            $id_classe = $_POST['id_classe'];
            $classe = $this->model->lister($id_classe);
            $discipline = $this->model->getDisciplineByClasse($id_classe);

            // foreach ($classe as $key => $eleve) {
            //     $classe[$key]['prenom'] = isset($eleve['prenom']) ? $eleve['prenom'] : '';
            //     $classe[$key]['nom'] = isset($eleve['nom']) ? $eleve['nom'] : '';
            // }

            $data = array($discipline, $classe);

            // echo "<pre>";
            // var_dump($data);
            // echo "<pre>";
            $this->render("Classe.html", $data);
        }
    }

}