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
        } elseif ($_GET['action'] == 'search-abonne') {
            $resultat = listAbonne($db);
        } elseif ($_GET['action'] == 'add-rdv-view') {
            $nbPatients = (int)nbPatients($db)['nb_patients'];
            $resultat = listPatients($db, 1, $nbPatients);
        } elseif ($_GET['action'] == 'add-rdv-insert') {
            addRdv($db);
        } elseif ($_GET['action'] == 'list-rdv') {
            $resultat = listRdv($db);
        } elseif ($_GET['action'] == 'rendezvous' and isset($_GET['id'])) {
            $nbPatients = (int)nbPatients($db)['nb_patients'];
            $patients = listPatients($db, 1, $nbPatients);
            $resultat = rendezvous($db);
        } elseif ($_GET['action'] == 'modify-rdv' and isset($_GET['id'])) {
            modifyRdv($db);
        } elseif ($_GET['action'] == 'delete-rdv' and isset($_GET['id'])) {
            deleteRdv($db);
        } elseif ($_GET['action'] == 'delete-patient' and isset($_GET['id'])) {
            deletePatient($db);
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