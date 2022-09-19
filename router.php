<?php
//$parPage = 5;
//$currentPage = 1;

try {
    $resultat = null;
    $resultat2 = null;
    $db = connectBD('localhost', 'root', '', 'bibliotheque');

    if (isset($_GET['action']) and $_GET['action'] != null) {
        if ($_GET['action'] == 'add-abo') {
            addAbonne($db);
        } elseif ($_GET['action'] == 'add-ouvrage') {
            addOuvrage($db);
        } elseif ($_GET['action'] == 'ajout-association') {
            $resultat = listAbonne($db);
            $resultat2 = listOuvrage($db);
        } elseif ($_GET['action'] == 'add-abo-ouvrage') {
            addAssociation($db);
        } elseif ($_GET['action'] == 'search-abonne' OR $_GET['action'] == 'get-abo') {
            $resultat = listAbonne($db);
        } elseif ($_GET['action'] == 'edit-abo') {
            modifyAbo($db);
        } elseif ($_GET['action'] == 'delete-abo') {
            deleteAbo($db);
        } elseif ($_GET['action'] == 'search-ouvrage') {
            $resultat = listOuvrage($db);
        } elseif ($_GET['action'] == 'edit-ouvrage') {
            modifyOuvrage($db);
        } elseif ($_GET['action'] == 'delete-ouvrage') {
            deleteOuvrage($db);
        } elseif ($_GET['action'] == 'search-association') {
            $resultat = listAssociation($db);
        } elseif ($_GET['action'] == 'delete-association') {
            deleteAssociation($db);
        } elseif ($_GET['action'] == 'search-patient') {
            $resultat = searchPatient($db);
        } else {
            header('Location: index.php');
        }
    }
    $db = null;
} catch (PDOException $e) {
    var_dump($e);
}