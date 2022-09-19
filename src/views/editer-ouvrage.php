<?php include 'head.php';
include '../../loader.php';
?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                if ($resultat != null) {
                    foreach ($resultat as $row) {
                        if($row['id'] == $_GET['id']){?>
                            <form method="POST" action="../../loader.php?action=edit-ouvrage&id=<?=$row['id']?>">
                                <div class="mb-3">
                                    <label for="titre" class="form-label">Titre</label>
                                    <input type="text" class="form-control" id="titre" name="titre" placeholder="<?=$row['titre']?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="auteur" class="form-label">Auteur</label>
                                    <input type="text" class="form-control" id="auteur" name="auteur" placeholder="<?=$row['auteur']?>"required>
                                </div>
                                <button type="submit" class="btn btn-primary">Editer</button>
                            </form>
                        <?php }}
                }?>
            </div>
        </div>
    </div>


<?php include 'footer.php'; ?>