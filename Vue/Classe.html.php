<?php include "template.html.php"?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light w-75 position-relatve" style="left: 15rem;">
        <div class="container-fluid">
            <a class="navbar-brand text-primary fw-bold">Breukh'S Cool</a>
            <div class="position-relative p-1 rounded" style="left: 1.5rem;color: white;background-color: blue;">
                2019/2020
            </div>
            <form class="d-flex">
                <button class="btn btn-outline-primary" type="submit">Ajouter</button>
            </form>
        </div>
    </nav>
    <div class="d-flex align-items-center justify-content-center navbar navbar-light bg-light w-25 position-relatve p-3"
        style="left: 47rem;top: 3rem;font-size: 2em; font-weight: bold;">Classe :
    </div>
    <div class="d-flex position-relative justify-content-between p-3 w-50" style="left: 30rem;top: 3rem;">
        <div>
            <button type="submit" class="btn btn-outline-primary btn-modifier" name="Modifier"
                data-bs-toggle="modal">Retour</button>
            <button type="submit" class="btn btn-outline-primary btn-modifier" name="Modifier"
                data-bs-toggle="modal">Coeffic</button>
        </div>
        <div class="d-flex position-relative justify-content-around w-75">
            <div class="mb-3">
                <span class="input-group" id="basic-addon1">Discipline :</span>
                <select class="form-select discipline" aria-label="Default select example">
                    <option selected>Discipline :</option>
                    <?php foreach($data[0] as $key => $ligne): ?>
                        <option class="" data-id_classe="<?php echo $ligne['id_classe']?>" value="<?php echo $ligne['id_discipline']?>"><?php echo $ligne['libelle']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="mb-3">
                <span class="input-group" id="basic-addon1">Semestre :</span>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Semestre :</option>
                    <?php foreach($data[2] as $key => $ligne): ?>
                    <option value="<?php echo $ligne['id_semestre']?>"><?php echo $ligne['libelle']?></option>
                    <?php endforeach;?>

                </select>
            </div>
            <div class="mb-3">
                <span class="input-group" id="basic-addon1">Note De :</span>
                <select class="form-select noteDe" aria-label="Default select example">
                    <option selected>Note De :</option>
                    <option value="ressource">ressource</option>
                    <option value="examen">examen</option>
                </select>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center position-relative flex-column align-items-center w-75" style="top: 2rem;left: 12rem;">
        <form action="">
            <table class="table" style="width: 55rem;">
                <thead>
                    <tr>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Note</th>
                        <th>Suppression</th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach($data[1] as $key => $ligne): ?>
                    <tr>
                        <td>
                            <?php echo $ligne['prenom']; ?>
                        </td>
                        <td>
                            <?php echo $ligne['nom']; ?>
                        </td>
                        <td class="d-flex justify-content-center align-items-center blocNote">
                            <input type="number" class="form-control w-25" aria-label="Username" aria-describedby="basic-addon1">
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-danger supprimer" name="supprimer"
                                data-id-discipline="<?php echo $ligne['id_Eleve']; ?>">Supprimer</button>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            <button class="btn btn-outline-primary w-25 mettre-a-jour" type="button">Enregistrer</button>
        </form>
    </div>
    <script src="http://localhost:8080/script3.js"></script>
</body>

</html>