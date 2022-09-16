<?php

function associationDML($db, $req, $id = null)
{
    $idAbo = (isset($_POST['idAbo'])) ? $_POST['idAbo'] : null;
    $idOuvrage = (isset($_POST['idOuvrage'])) ? $_POST['idOuvrage'] : null;

    if ($idAbo != null and $idOuvrage != null) {
        $sth = $db->prepare($req);
        $sth->bindParam(':idAbo', $idAbo);
        $sth->bindParam(':idOuvrage', $idOuvrage);
        $sth->execute();
        //addMessage('success', 'Patient enregistrer !');
    } else {
        //addMessage('danger', 'Erreur lors de enregistrement !');
    }
}

function addAssociation(PDO $db)
{
    $req = 'INSERT INTO association_abonne_ouvrage (id_abonne, id_ouvrage)
        VALUES (:idAbo,:idOuvrage)';
    associationDML($db, $req);
    header('Location: index.php');
}