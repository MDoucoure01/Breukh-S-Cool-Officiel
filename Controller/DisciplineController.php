<?php
require "../Model/DisciplineModel.php";


class DisciplineController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new DisciplineModel();
    }

    public function Gestion()
    {
        $data = $this->model->option();
        $this->render("discipline.html", $data);
    }

    public function chargerClasses()
    {
        $classes = $this->model->getClassesByNiveau();
        header('Content-Type: application/json');
        echo json_encode($classes);
    }

    public function suppression()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->model->supprimer($data);

    }


    public function chargerDiscipline()
    {
        $discipline = $this->model->getDisciplineByClasse();
        header('Content-Type: application/json');
        echo json_encode($discipline);
    }

    public function chargementDiscipline()
    {
        $discipline = $this->model->getDiscipline();
        header('Content-Type: application/json');
        echo json_encode($discipline);
    }

    public function AjoutDiscipline()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        
        $disciplineData = $data['discipline'];
        $classeData = $data['classe'];
        
        $this->model->insertDiscipline($disciplineData, $classeData);
    } 

    public function insertGroupeDiscipline()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->model->insertGroupeDiscipline($data);
    }
}




// public function AjoutDiscipline()
// {
//     $data = json_decode(file_get_contents('php://input'), true);
    
//     var_dump($data);
//     $this->model->insertDiscipline($data);
// }