<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiants</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<style>
    .discipline-column {
        padding-left: 50px;
        padding-right: 50px;
    }

    .no-disciplines-message {
        color: red;
    }

    .discipline-column.unchecked {
        color: red;
    }

    .btn-large {
        font-size: 30px;
        padding: 10px 50px;
        margin-top: 50px;
    }

    label {
        font-size: 20px;
    }

    .form-control-lg {
        font-size: 20px;
    }

    #disciplines-container {
        font-size: 20px;
    }
</style>

<body>
    <!-- Button trigger modal -->
<input type="hidden" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">

</input>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <input type="text" class="form-control form-control-lg insertdiscipline"  id="disc" placeholder="Ex: Mathematique">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary saves" data-bs-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-light bg-light w-75 position-relatve" style="left: 15rem;">
    <div class="container-fluid ">
      <a class="navbar-brand text-primary fw-bold">Breukh'S Cool</a>
      <div class="position-relative p-1 rounded fw-bold" style="left: 1.2rem;color: white;background-color: blue;">2019/2020</div>
      <form class="d-flex">
        <button class="btn btn-outline-primary" type="submit">Ajouter</button>
      </form>
    </div>
</nav>

    <div class="container text-center mt-5">
        
        <h1>Gestion des Disciplines</h1>

        <form action="" method="post">
    
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="select-niveau">Niveau</label>
                    <select id="select-niveau" name="niveau" class="form-control form-control-lg">
                        <option value="0">Sélectionner un niveau</option>
                        <?php foreach($data as $key => $ligne): ?>
                            <option value="<?php echo $ligne['id_groupeNiveau']; ?>"><?php echo $ligne['libelle']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
    
                    <div class="form-group">
                        <label for="select-groupe">Groupe de Discipline</label>
                       <select id="select-groupe" name="groupe" class="form-control form-control-lg">
                       </select>
                    </div>
                </div>
                <div class="col-md-6">
    
                    <div class="form-group">
                        <label for="select-classes">Classe</label>
                        <select id="select-classes" name="classe" class="form-control form-control-lg">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="disc">Discipline</label>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg discipline" name="module" id="disc" placeholder="Ex: Maths">
                            <div class="input-group-append">
                                <button class="btn btn-primary Ok_boutton" type="button">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="form-group">
                    
                        <label for="disciplines-label">Disciplines de la classe nom_classe</label>
                        <div style="color: red;">Decocher une discipline pour la supprimer de la classe</div>
                        <div style="margin-top: 50px; background-color: rgb(240, 240, 240); width: 1100px; height: 220px;" id="disciplines-container" class=" d-flex justify-content-around flex-wrap">
                            
                        </div>
                         <button id="update-button" class="btn btn-outline-primary btn-large mettreJour" style="margin-right: -1400px;">Mettre a jour</button>
                   
                    </div>
                    </div>
                </div>
            </div>

    </div>

    <div class="modal fade" id="modal-ajout" tabindex="-1" role="dialog" aria-labelledby="modal-ajout-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-ajout-label">Ajouter un nouveau groupe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    <div class="modal-body">
    <form id="form-ajout-groupe" action="/" method="post">

        <div class="form-group">
            <label for="nom-groupe">Nom du groupe :</label>
            <input type="text" class="form-control" id="nom-groupe" name="nom-groupe" placeholder="Saisir le nouveau groupe à ajouter">
        </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="button" class="btn btn-primary">Ajouter</button>
    </form> 
    </div>
</div>
  </div>
</div>

<script src="http://localhost:8080/script1.js"></script>



    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script src="http://localhost:4000/script.js"></script> -->

</body>
</html>
