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
<style>
  .fullscreen-overlay {
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: 999;
    background-color: black;
  }
</style>

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
  <div class="d-flex align-items-center justify-content-center navbar navbar-light bg-light w-25 position-relatve p-3"
    style="left: 47rem;top: 1rem;font-size: 2em; font-weight: bold;">Coef / Ponderation</div>

  <div class="d-flex justify-content-center position-relative flex-column align-items-center" style="top: 5rem;">
    <form action="">

      <table class="table w-50">
        <thead>
          <tr>
            <th>Discipline</th>
            <th>Ressources</th>
            <th>Examen</th>
            <th>Suppression</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($data as $key => $ligne): ?>
          <tr>
            <td>
            <?php echo $ligne['libelle']; ?>
            </td>
            <td>
            <input class="Modif ressource" type="number" data="<?php echo $ligne['id_discipline']; ?>_R" name="libelle" value="<?php echo $ligne['ressource']; ?>" classe="ressource" data-id-discipline="<?php echo $ligne['id_discipline']; ?>">
            </td>
            <td>
              <form action="" method="post">
              <input class="Modif examen" type="number" data="<?php echo $ligne['id_discipline']; ?>_E" name="libelle" value="<?php echo $ligne['examen']; ?>" classe="examen" data-id-discipline="<?php echo $ligne['id_discipline']; ?>">
              </form>
            </td>
            <td>
              <form action="" method="post">
                <input type="hidden" name="id_discipline" classe="suppression" value="<?php echo $ligne['id_discipline']; ?>">
                <button type="button" class="btn btn-outline-danger supprimer" name="supprimer" data-id-discipline="<?php echo $ligne['id_discipline']; ?>">Supprimer</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
      <button class="btn btn-outline-primary w-25 mettre-a-jour" type="button">Mettre A jour </button>
    </form>
  </div>

  <script src="http://localhost:8080/script2.js"></script>
</body>

</html>