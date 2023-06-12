<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light w-75 position-relatve" style="left: 15rem;">
        <div class="container-fluid ">
          <a class="navbar-brand text-primary fw-bold">Breukh'S Cool</a>
          <div class="position-relative p-1 rounded fw-bold" style="left: 1.2rem;color: white;background-color: blue;">2019/2020</div>
          <form class="d-flex">
            <button class="btn btn-outline-primary" type="submit">Ajouter</button>
          </form>
        </div>
    </nav>
    <div class="d-flex align-items-center justify-content-center navbar navbar-light bg-light w-25 position-relatve p-3" style="left: 47rem;top: 2rem;font-size: 2em; font-weight: bold;">Enregistrement Eleve</div>
    <div class="input-group position-relative w-25" style="top: 15rem;left: 71%;">
        <!-- <button class="btn btn-primary" type="button">Ajouter</button> -->
    </div>      
    <div class="d-flex flex-column align-items-center justify-content-center position-relative" style="top: 4rem;">
        <div style="width: 150px;height: 150px; background-color: black;">
        </div>
        <form class="w-25">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label fw-bold">Prenom</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label fw-bold">Nom</label>
              <input type="text" class="form-control" id="exampleInputPassword1">
            </div>
        </form>
        <form class="w-15 position-absolute" style="top: 20rem;right: 58rem;">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label fw-bold">Numero</label>
              <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label fw-bold">Niveau</label>
              <select class="form-select" aria-label="Select option">
                <option selected>Select an option</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
              </select>              
            </div>
        </form>
        <form class="w-15 position-absolute" style="top: 20rem;right: 45rem;">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">Sexe</label>
                <select class="form-select" aria-label="Select option">
                  <option selected>Select an option</option>
                  <option value="1">M</option>
                  <option value="2">F</option>
                </select>              
              </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label fw-bold">Classe</label>
              <select class="form-select" aria-label="Select option">
                <option selected>Select an option</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
              </select>              
            </div>
        </form>
        <button type="submit" class="btn btn-primary fw-bold position-absolute" style="top: 32rem;">Inscrire</button>
    </div>
</body>
</html>