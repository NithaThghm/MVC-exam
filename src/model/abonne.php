<?php

function abonneDML($db, $req, $id = null)
{
    $lastname = (isset($_POST['lastname']) and $_POST['lastname'] != '') ? $_POST['lastname'] : null;
    $firstname = (isset($_POST['firstname']) and $_POST['firstname'] != '') ? $_POST['firstname'] : null;

    var_dump($lastname, $firstname, $id);

    if ($lastname != null and $firstname != null) {
        $sth = $db->prepare($req);
        $sth->bindParam(':lastname', $lastname);
        $sth->bindParam(':firstname', $firstname);
        if ($id != null) {
            $sth->bindParam(':id', $id);
        }
        $sth->execute();
        //addMessage('success', 'Patient enregistrer !');
    } else {
        //addMessage('danger', 'Erreur lors de enregistrement !');
    }
}

function addAbonne(PDO $db)
{
    $req = 'INSERT INTO abonne (nom,prenom)
        VALUES (:lastname,:firstname)';
    abonneDML($db, $req);
    header('Location: index.php');
}

function listAbonne(PDO $db)
{
    $req = 'SELECT * FROM abonne';
    $sth = $db->prepare($req);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function patient(PDO $db)
{
    $id = (isset($_GET['id']) and $_GET['id'] != '') ? $_GET['id'] : null;
    return querySingle($db, 'SELECT * FROM patients WHERE id =' . $id);
}

function modifyPatient(PDO $db)
{
    $req = 'UPDATE patients
        SET lastname = :lastname,
            firstname = :firstname,
            birthdate = :birthdate,
            phone = :phone,
            mail = :mail
        WHERE id = :id';
    $id = (isset($_GET['id']) and $_GET['id'] != '') ? $_GET['id'] : null;
    patientDML($db, $req, $id);
    header('Location: ./view/profil-patient.php?action=patient&id=' . $id);
}

function deletePatient(PDO $db)
{
    $req = 'DELETE FROM appointments WHERE idPatients = :idPatients';
    $reqP = 'DELETE FROM patients WHERE id = :id';

    $id = (isset($_GET['id']) and $_GET['id'] != '') ? $_GET['id'] : null;

    var_dump($id);

    if ($id != null) {
        $sth = $db->prepare($req);
        $sth->bindParam(':idPatients', $id);
        $sth->execute();

        $sth = $db->prepare($reqP);
        $sth->bindParam(':id', $id);
        $sth->execute();

        addMessage('success', 'Patient delete !');
    } else {
        addMessage('danger', 'Erreur lors de la suppression !');
    }
    header('Location: index.php');
}

function searchPatient(PDO $db)
{
    $req = "SELECT * FROM patients 
        WHERE lastname LIKE :lastname
          OR firstname LIKE :firstname
          OR birthdate LIKE :birthdate
          OR phone LIKE :phone
          OR mail LIKE :mail
    ";

    $lastname = (isset($_GET['search-lastname']) and $_GET['search-lastname'] != '') ? $_GET['search-lastname'] . '%' : null;
    $firstname = (isset($_GET['search-firstname']) and $_GET['search-firstname'] != '') ? $_GET['search-firstname'] . '%' : null;
    $birthdate = (isset($_GET['search-birthdate']) and $_GET['search-birthdate'] != '') ? $_GET['search-birthdate'] . '%' : null;
    $phone = (isset($_GET['search-phone']) and $_GET['search-phone'] != '') ? $_GET['search-phone'] . '%' : null;
    $mail = (isset($_GET['search-mail']) and $_GET['search-mail'] != '') ? $_GET['search-mail'] . '%' : null;

    var_dump($lastname, $firstname, $birthdate, $phone, $mail);

    $sth = $db->prepare($req);
    $sth->bindParam(':lastname', $lastname);
    $sth->bindParam(':firstname', $firstname);
    $sth->bindParam(':birthdate', $birthdate);
    $sth->bindParam(':phone', $phone);
    $sth->bindParam(':mail', $mail);

    $sth->execute();

    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function nbPatients(PDO $db)
{
    return querySingle($db, 'SELECT COUNT(*) AS nb_patients FROM patients');
}