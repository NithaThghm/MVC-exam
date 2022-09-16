<?php
session_start();
var_dump($_SESSION, $_POST, $_GET);

// SERVICE
include dirname(__FILE__)."/Service/bdd.php";
//include "./Service/flash_message.php";

// MODEL
include dirname(__FILE__)."/src/model/abonne.php";
include dirname(__FILE__)."/src/model/ouvrage.php";
include dirname(__FILE__)."/src/model/association.php";

// CONTROLLER
include dirname(__FILE__)."/router.php";