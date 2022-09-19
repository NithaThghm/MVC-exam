<?php include 'head.php';
include '../../loader.php';

var_dump($resultat);?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">editer</th>
                        <th scope="col">supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($resultat != null) {
                        foreach ($resultat as $row) { ?>
                            <tr>
                                <th scope="row"><?= $row['id'] ?></th>
                                <td><?= $row['titre'] ?></td>
                                <td><?= $row['auteur'] ?></td>
                                <td><a href="editer-ouvrage.php?action=search-ouvrage&id=<?= $row['id'] ?>"
                                       class="btn btn-primary">Editer</a></td>
                                <td><a href="editer-ouvrage.php?action=delete-ouvrage&id=<?= $row['id'] ?>"
                                       class="btn btn-danger">Supprimer</a></td>
                            </tr>
                        <?php }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<?php include 'footer.php'; ?>