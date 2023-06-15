<?php include "template.html.php"?>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form id="form-modification" action="modification" method="post">
      <input type="hidden" name="ancien_libelle" id="ancien_libelle" value="">
      <input type="text" class="form-control" name="nouveau_libelle" id="nouveau_libelle" placeholder="Nouveau libellé">
      <button type="submit" class="btn btn-primary" name="modifier">Modifier</button>
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
    </form>

    </div>
  </div>
</div>
    <nav class="navbar navbar-light bg-light w-75 position-relatve" style="left: 15rem;">
        <div class="container-fluid">
          <a class="navbar-brand text-primary fw-bold">Breukh'S Cool</a>
          <div class="position-relative p-1 rounded" style="left: 1.5rem;color: white;background-color: blue;">2019/2020</div>
          <form class="d-flex">
            <button class="btn btn-outline-primary" type="submit">Ajouter</button>
          </form>
        </div>
    </nav>
    <div class="input-group position-relative w-50 d-flex justify-content-around" style="top: 15rem;left: 25%;">
      <form action="insertion" method="post" class="input-group position-relative w-50">
        <input type="text" class="form-control" name="libelle" placeholder="aaaa / AAAA">
        <button class="btn btn-outline-primary" type="submit" name="ok">Ajouter</button>
      </form>
    </div>      
    <div class="d-flex justify-content-center position-relative" style="top: 15rem;">
        <table class="table w-50">
            <thead>
              <tr>
                <th>Nom</th>
                <th>Status</th>
                <th colspan="3">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($data as $key => $ligne): ?>
              <tr>
                <td><?php echo $ligne['libelle']; ?></td>
                <td>
                <form action="activerDesactiverAnneeScolaire" method="post">
                  <input type="hidden" name="id_AnneeScolaire" value="<?php echo $ligne['id_AnneeScolaire']; ?>">
                  <input type="hidden" name="Status" value="<?php echo $ligne['Status']; ?>">
                  <?php if ($ligne['Status'] == 1): ?>
                    <button type="button" class="btn btn-success" disabled>Désact.</button>
                  <?php else: ?>
                    <button type="submit" class="btn btn-primary" name="activer">Activer</button>
                  <?php endif; ?>
                </form>
                </td>
                <td>
                  <form method="post" action="">
                    <input type="hidden" name="<?php echo $ligne['libelle']; ?>" value="aff">
                    <button type="submit" class="btn btn-primary" name="afficher">Aff.</button>
                  </form>
                </td>
                    <td>
                      <input class="Modif" type="hidden" name="libelle" value="<?php echo $ligne['libelle']; ?>">
                      <button type="submit" class="btn btn-primary btn-modifier" name="Modifier" data-bs-toggle="modal"   data-bs-target="#exampleModal">Modif.</button>
                      <button type="button" class="btn btn-primary btn-modifier" data-bs-toggle="modal" data-bs-target="#exampleModal">Modif.</button>

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
<script>
    const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
    const formModification = document.getElementById('form-modification');
    const ancienLibelleInput = document.getElementById('ancien_libelle');

    // Fonction pour récupérer les informations de la ligne sélectionnée et afficher le modal
    function handleModifierClick(event) {
        const ligne = event.currentTarget.closest('tr');
        const ancienLibelle = ligne.querySelector('td:nth-child(1)').innerText;
        ancienLibelleInput.value = ancienLibelle;
        modal.show();
    }

    // Ajouter un gestionnaire d'événement pour chaque bouton "Modifier"
    const btnModifierList = document.getElementsByClassName('btn-modifier');
    Array.from(btnModifierList).forEach((btn) => {
        btn.addEventListener('click', handleModifierClick);
    });

    // Soumettre le formulaire de modification
    formModification.addEventListener('submit', (event) => {
        event.preventDefault();
        // Envoyer le formulaire via AJAX ou soumettre le formulaire normalement
        // en fonction de votre implémentation
        formModification.submit();
    });
</script>
</body>
</html>
