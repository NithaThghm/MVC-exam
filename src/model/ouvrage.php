<?php

function ouvrageDML($db, $req, $id = null)
{
    $titre = (isset($_POST['titre']) and $_POST['titre'] != '') ? $_POST['titre'] : null;
    $auteur = (isset($_POST['auteur']) and $_POST['auteur'] != '') ? $_POST['auteur'] : null;

    var_dump($titre,$auteur, $id);

    if ($titre != null and $auteur != null) {
        $sth = $db->prepare($req);
        $sth->bindParam(':titre', $titre);
        $sth->bindParam(':auteur', $auteur);
        if ($id != null) {
            $sth->bindParam(':id', $id);
        }
        $sth->execute();
        //addMessage('success', 'Patient enregistrer !');
    } else {
        //addMessage('danger', 'Erreur lors de enregistrement !');
    }
}

function addOuvrage(PDO $db)
{
    $req = 'INSERT INTO ouvrage (titre, auteur)
        VALUES (:titre,:auteur)';
    ouvrageDML($db, $req);
    header('Location: index.php');
}

function listOuvrage(PDO $db)
{
    $req = 'SELECT * FROM ouvrage';
    $sth = $db->prepare($req);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function modifyOuvrage(PDO $db)
{
    $req = 'UPDATE ouvrage
        SET titre = :titre,
            auteur = :auteur
        WHERE id = :id';
    $id = (isset($_GET['id']) and $_GET['id'] != '') ? $_GET['id'] : null;
    ouvrageDML($db, $req, $id);
    header('Location: ./src/views/liste-ouvrage.php?action=search-ouvrage');
}

function deleteOuvrage(PDO $db)
{
    $req = 'DELETE FROM ouvrage WHERE id = :id';

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
    header('Location: liste-ouvrage.php?action=search-ouvrage');
}