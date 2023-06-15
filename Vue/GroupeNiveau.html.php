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
      <div class="position-relative p-1 rounded" style="left: 1.5rem;color: white;background-color: blue;">2019/2020
      </div>
      <form class="d-flex">
        <button class="btn btn-outline-primary" type="submit">Ajouter</button>
      </form>
    </div>
  </nav>

  <form action="AJouter" method="post" class="input-group position-relative w-25" style="top: 15rem;left: 50%;">
    <input type="text" class="form-control" placeholder="Nom Niveau" name="champ">
    <button class="btn btn-primary" type="submit" name="ajouter">Ajouter</button>
  </form>
  <?php

  ?>
  <div class="d-flex justify-content-center position-relative" style="top: 15rem;">
    <table class="table w-50">
      <thead>
        <tr>
          <th>Nom</th>
          <th colspan="3">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($data as $key => $ligne): ?>
              <tr>
                <td><?php echo $ligne['libelle']; ?></td>
                <td>
                  <!-- <form method="post" action="http://localhost:8080/Classe/lister">
                    <input type="hidden" name="niveau" value="">
                    <button type="submit" class="btn btn-primary" name="afficher">Aff.</button>
                  </form> -->
                  <form method="post" action="http://localhost:8080/Classe/lister">
                    <input type="hidden" name="id_groupeNiveau" value="<?php echo $ligne['id_groupeNiveau']; ?>">
                    <input type="hidden" name="nomNiveau" value="<?php echo $ligne['libelle']; ?>">
                    <button type="submit" class="btn btn-primary" name="afficher">Aff.</button>
                  </form>
                </td>
                <td>
                  <input class="Modif" type="hidden" name="libelle" value="<?php echo $ligne['libelle']; ?>">
                  <button type="submit" class="btn btn-primary btn-modifier" name="Modifier" data-bs-toggle="modal"   data-bs-target="#exampleModal">Modif.</button>

                </td>
                <td>
                  <form action="suppression" method="post">
                    <input type="hidden" name="libelle" value="<?php echo $ligne['libelle']; ?>">
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