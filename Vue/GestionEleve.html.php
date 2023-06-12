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
      <div class="position-relative p-1 rounded" style="left: 1.2rem;color: white;background-color: blue;">2019/2020
      </div>
      <form class="d-flex">
        <button class="btn btn-outline-primary" type="submit">Ajouter</button>
      </form>
    </div>
  </nav>
  <div class="d-flex align-items-center justify-content-center navbar navbar-light bg-light w-25 position-relatve p-3"
    style="left: 47rem;top: 2rem;font-size: 2em; font-weight: bold;">CI</div>
  <div class="input-group position-relative w-25" style="top: 15rem;left: 71%;">
    <!-- <button class="btn btn-primary" type="button">Ajouter</button> -->
  </div>
  <div class="d-flex justify-content-center position-relative" style="top: 4rem;">
    <form action="http://localhost:8080/eleve/ajouterEleve" method="post" class=" w-50  ">

      <input type="hidden" 
      <?php if (isset($_POST['ajouter'])): ?>
      value="<?php echo $_POST['id_classe']; ?>"
      <?php endif; ?>
      name="id_classe">
      <div class="row" class=" w-25 justify-content-center">
        <div class="col-6 mb-5">
          <input type="text" class="form-control" placeholder="Nom" name="nom" aria-label="First name">
        </div>
        <div class="col-6 mb-5">
          <input type="text" class="form-control" placeholder="Prenom" name="prenom" aria-label="Last name">
        </div>
        <div class="col-6 mb-5">
          <input type="date" class="form-control" placeholder="date De Naissance" name="dateDeNaissance" aria-label="date naissance">
        </div>
        <div class="col-6">
          <input type="text" class="form-control" placeholder="Lieu de naissance" name="lieu" aria-label="Lieu naissance">
        </div>
        <div class="col-6 mb-5">
          <input type="text" class="form-control" placeholder="Numero" name="Numero" aria-label="First name">
        </div>
        <div class="col-6 d-flex">
          <input class="form-check-input" type="radio" name="genre" id="flexRadioDefault1" value="masculin">
          <label class="form-check-label " for="masculin">Masculin </label>

          <input class="form-check-input " type="radio" name="genre" id="flexRadioDefault1" value="feminin">
          <label class="form-check-label " for="feminin">feminin</label>
        </div>

        <div class="col-6">
          <select class="form-select" aria-label="Disabled select example" name="id_niveau" disabled>

            <?php foreach ($data as $d): ?>
            <option value="<?= $d['id_niveau']?>">
              <?=$d['libelle']?>
            </option>
            <?php endforeach; ?>

          </select>
        </div>

        <div class="col-6 mb-5">
          <select class="form-select" aria-label="Disabled select example" name="id_classe" disabled>
            <?php foreach ($classe as $d): ?>
            <option value="<?= $d['id_classe']?>">
              <?=$d['nom']?>
            </option>
            <?php endforeach; ?>
          </select>

        </div>
        <div class="text-center ml-3 ">
          <button type="submit">inscrire</button>
        </div>
      </div>


    </form>
  </div>
</body>
</html>