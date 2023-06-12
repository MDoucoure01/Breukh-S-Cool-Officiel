<?php
require_once "../Model/ConnexionModel.php";

class ConnexionController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new ConnexionModel();
        $this->render("Connexion.html");
    }

    public function Connexion()
    {
   
        if (isset($_POST['phone']) && isset($_POST['password'])) {
            $phone = $_POST['phone'];
            $password = $_POST['password'];
    
            // Vérifier si l'utilisateur existe
            $user = $this->model->getUserByPhone($phone);

            var_dump($user);
    
            if (!$user) {
                
                echo "user bi amoul";
                return;
            }


            
            if ($user[0]['password'] === $password) {
                 
                $_SESSION['phone']= $user['phone'];
                header("location: http://localhost:8080/Niveau/lister");
                exit();
    
               
            } else {
                echo "mot de passe bi amoul";
               
            }    
        } else {
            echo "Veuillez remplir tous les champs du formulaire.";
        }

        
        
    }
}