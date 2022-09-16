<?php include 'head.php' ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="../../loader.php?action=add-abo">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Prenom</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>