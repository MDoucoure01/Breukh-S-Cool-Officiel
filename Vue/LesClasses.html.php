<?php include "template.html.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light w-75 position-relatve" style="left: 15rem;">
        <div class="container-fluid">
          <a class="navbar-brand text-primary fw-bold">Breukh'S Cool</a>
          <div class="position-relative p-1 rounded" style="left: 1.2rem;color: white;background-color: blue;">2019/2020</div>
          <form class="d-flex">
            <button class="btn btn-outline-primary" type="submit">Ajouter</button>
          </form>
        </div>
    </nav>
    <div class="d-flex align-items-center justify-content-center navbar navbar-light bg-light w-25 position-relatve p-3" style="left: 47rem;top: 10rem;font-size: 2em; font-weight: bold;"><?php echo $_POST['nomNiveau']; ?></div>
    <!-- <form action="AJouter" method="post" class="input-group position-relative w-25" style="top: 15rem;left: 50%;">
      <input type="number" name="effectif" id="" class="w-25 form-control" placeholder="Effectif">
      <input type="text" class="form-control w-50" placeholder="Nom Classe" name="champ">
      <button class="btn btn-primary" type="submit" name="ajouter">Ajouter</button>
    </form> -->
    <form action="AJouter" method="post" class="input-group position-relative w-25" style="top: 15rem;left: 50%;">
      <input type="number" name="effectif" id="" class="w-25 form-control" placeholder="Effectif">
      <input type="text" class="form-control w-50" placeholder="Nom Classe" name="champ">
      <input type="hidden" name="id_groupeNiveau" value="<?php echo $_POST['id_groupeNiveau']; ?>">
      <button class="btn btn-primary" type="submit" name="ajouter">Ajouter</button>
    </form>
    
    <div class="d-flex justify-content-center position-relative" style="top: 15rem;">
        <table class="table w-50">
            <thead>
              <tr>
                <th>Classes</th>
                <th>Effectif</th>
                <th colspan="4">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($data as $key => $ligne): ?>
              <tr>
                <td><?php echo $ligne['nom']; ?></td>
                <td><?php echo $ligne['effectif']; ?></td>
                <td>
                  <form method="post" action="http://localhost:8080/Room/lister">
                    <input type="hidden" name="nom" value="<?php echo $ligne['nom']; ?>">
                    <input type="hidden" name="id_classe" value="<?php echo $ligne['id_classe']; ?>">
                    <button type="submit" class="btn btn-outline-primary" name="afficher">Coef./Pond.</button>
                  </form>
                </td>
                <td>
                  <form method="post" action="http://localhost:8080/eleve/lister">
                    <input type="hidden" name="nom" value="<?php echo $ligne['nom']; ?>">
                    <input type="hidden" name="id_classe" value="<?php echo $ligne['id_classe']; ?>">
                    <button type="submit" class="btn btn-outline-primary" name="afficher">Afficher</button>
                  </form>
                </td>
                    <td>
                    <form method="post" action="http://localhost:8080/Note/lister">
                      <input type="hidden" name="nom" value="<?php echo $ligne['nom']; ?>">
                      <input type="hidden" name="id_classe" value="<?php echo $ligne['id_classe']; ?>">
                      <button type="submit" class="btn btn-outline-primary" name="afficher">Gerer Note</button>
                    </form>
                    </td>
                    <td>
                      <form action="suppression" method="post">
                        <input type="hidden" name="libelle" value="<?php echo $ligne['nom']; ?>">
                        <button type="submit" class="btn btn-outline-primary" name="supprimer">Supprimer</button>
                      </form>
                    </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
    </div>
</body>
</html>