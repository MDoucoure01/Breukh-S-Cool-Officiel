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
            $semestre = $this->model->getSemestreByClasse($id_classe);
            $data = array($discipline, $classe, $semestre);
            $this->render("Classe.html", $data);
        }
    }

    public function getPonderation()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $updatedData = $data['updatedData'];

        foreach ($updatedData as $item) {
        $id_discipline = $item['id_discipline'];
        }
        $result = $this->model->getPonderation($id_discipline);
        $encodedResult = json_encode($result);
        echo $encodedResult;
    }

}