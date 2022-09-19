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
                <form method="POST" action="../../loader.php?action=edit-abo&id=<?=$row['id']?>">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Prenom</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="<?=$row['prenom']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="<?=$row['nom']?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Editer</button>
                </form>
                <?php }}
                }?>
            </div>
        </div>
    </div>


<?php include 'footer.php'; ?>