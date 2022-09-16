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
                            <th scope="col">nom</th>
                            <th scope="col">prenom</th>
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
                                <td><?= $row['nom'] ?></td>
                                <td><?= $row['prenom'] ?></td>
                                <td><button type="submit">Editer</button></td>
                                <td><button type="submit">Supprimer</button></td>
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