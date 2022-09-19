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

function listAssociation(PDO $db)
{
    $req = 'SELECT tab1.id, prenom, nom, titre, auteur FROM (SELECT asso.id,id_ouvrage, prenom, nom FROM `association_abonne_ouvrage` asso INNER JOIN abonne ON asso.id_abonne = abonne.id) tab1 INNER JOIN ouvrage ON tab1.id_ouvrage = ouvrage.id; ';
    $sth = $db->prepare($req);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function deleteAssociation(PDO $db)
{
    $req = 'DELETE FROM association_abonne_ouvrage WHERE id = :id';

    $id = (isset($_GET['id']) and $_GET['id'] != '') ? $_GET['id'] : null;

    var_dump($id);

    if ($id != null) {
        $sth = $db->prepare($req);
        $sth->bindParam(':id', $id);
        $sth->execute();

        //addMessage('success', 'Patient delete !');
    } else {
        //addMessage('danger', 'Erreur lors de la suppression !');
    }
    header('Location: liste-association.php?action=search-association');
}