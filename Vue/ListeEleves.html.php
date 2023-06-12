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
        style="left: 47rem;top: 3rem;font-size: 2em; font-weight: bold;">Classe : <?php echo $_POST['nom']; ?></div>

    <form action="http://localhost:8080/eleve/ajouterEleve" method="post" class="position-relative w-25" style="top: 3rem;left: 73%;">
        <input type="hidden" name="id_classe" value="<?php echo $_POST['id_classe']; ?>">
        <button class="btn btn-outline-primary" type="submit" name="ajouter">Ajouter</button>
    </form>
    <div class="d-flex justify-content-center position-relative" style="top: 3rem;">
        <table class="table w-75">
            <thead>
                <tr>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Date De Naissance</th>
                    <th>Lieu De Naissance</th>
                    <th colspan="4">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($data as $key => $ligne): ?>
              <tr>
                <td><?php echo $ligne['prenom']; ?></td>
                <td><?php echo $ligne['nom']; ?></td>
                <td><?php echo $ligne['dateDeNaissance']; ?></td>
                <td><?php echo $ligne['lieu']; ?></td>
                <td>
                  <form method="post" action="">
                    <input type="hidden" name="affichage" value="<?php echo $ligne['id_Eleve']; ?>">
                    <button type="submit" class="btn btn-primary" name="afficher">Aff.</button>
                  </form>
                </td>
                    <td>
                      <input class="Modif" type="hidden" name="modification" value="<?php echo $ligne['id_Eleve']; ?>">
                      <button type="submit" class="btn btn-primary btn-modifier" name="Modifier" data-bs-toggle="modal"   data-bs-target="#exampleModal">Modif.</button>
                      <!-- <button type="button" class="btn btn-primary btn-modifier" data-bs-toggle="modal" data-bs-target="#exampleModal">Modif.</button> -->
                    </td>
                    <td>
                      <form action="suppression" method="post">
                        <input type="hidden" name="suppression" value="<?php echo $ligne['id_Eleve']; ?>">
                        <button type="submit" class="btn btn-primary" name="supprimer">Sup.</button>
                      </form>
                    </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>