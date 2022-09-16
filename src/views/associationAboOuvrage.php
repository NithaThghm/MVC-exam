<?php
include 'head.php';
include '../../loader.php';

?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="../../loader.php?action=add-abo-ouvrage">
                    <div class="mb-3">
                        <select class="form-select" name="idAbo" required>
                            <?php
                            foreach ($resultat as $row): ?>
                                <option value="<?= $row['id'] ?>"><?= $row['prenom'] ?> <?= $row['nom'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select class="form-select" name="idOuvrage" required>
                            <?php
                            foreach ($resultat2 as $row): ?>
                                <option value="<?= $row['id'] ?>"><?= $row['titre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>