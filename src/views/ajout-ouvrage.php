<?php include 'head.php' ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="../../loader.php?action=add-ouvrage">
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="titre" name="titre" required>
                    </div>
                    <div class="mb-3">
                        <label for="auteur" class="form-label">Auteur</label>
                        <input type="text" class="form-control" id="auteur" name="auteur" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>