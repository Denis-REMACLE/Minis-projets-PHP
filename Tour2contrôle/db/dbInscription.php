<?php
include "../class/classinsc.php";
include "../manager/inscManager.php";
$personne = new Inscription([
  'nom' => $_POST['nom'],
  'prenom' => $_POST['prenom'],
  'mail' => $_POST['mail'],
  'mdp' => $_POST['MDP']]);
include "../app/connexionPDO.php";
$manager= new InscManager($db);
$manager->Ajouter($personne);
header("location: ../index.php");
?>
