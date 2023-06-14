<?php
require "../Model/RoomModel.php";

class RoomController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new RoomModel();
    }


    public function lister()
    {
        $id_classe = $_POST['id_classe'];
        $data = $this->model->lister($id_classe);

        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";
        $this->render("CoefPonderation.html", $data);
    }


    public function suppression()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->model->supprimer($data);
    }

    public function miseAjour()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $updatedData = $data['updatedData'];

        foreach ($updatedData as $item) {
            $id_discipline = $item['id_discipline'];
            $valeur = $item['valeur'];
            $direction = $item['direction'];
            if ($direction == 'R') {
                $valeur = $item['valeur'];
                $this->model->Modifier(['id_discipline' => $id_discipline, 'ressource' => $valeur]);
            }

            if ($direction == 'E') {
                $valeur = $item['valeur'];
                $this->model->Modifier(['id_discipline' => $id_discipline, 'examen' => $valeur]);
            }
        }
    }

}