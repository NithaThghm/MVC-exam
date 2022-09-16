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