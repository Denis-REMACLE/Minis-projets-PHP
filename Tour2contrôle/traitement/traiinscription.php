<?php

include "ConnexionPDO.php";
session_start();

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$mdp = $_POST['mdp'];



if(empty($_POST['nom'])) {
 $_SESSION['message']='Le champ NOM est vide';
 header('location: inscription.php');
}
elseif(empty($_POST['prenom'])) {
 $_SESSION['message']='Le champ PRENOM est vide';
 header('location: inscription.php');
}
elseif(empty($_POST['email'])) {
 $_SESSION['message']='Le champ EMAIL est vide';
 header('location: inscription.php');
}
elseif(empty($_POST['mdp'])) {
 $_SESSION['message']='Le champ MOT DE PASSE est vide';
 header('location: inscription.php');
}
elseif (strlen($_POST['mdp']) < 4 OR strlen($_POST['mdp']) > 16 ) {
  $_SESSION['message']='Le mot de passe doit contenir 4 à 16 caractères';
 header('location: inscription.html');
}
else {
$req = $bdd->prepare('INSERT INTO inscription VALUES(:id,:nom,:prenom,:mail,:mdp)');

 $req->execute(array( 'id'=> NULL, 'nom' => $nom, 'prenom'=> $prenom ,'mail' => $mail, 'mdp'=> $mdp));
header('location: connexion.html'); }
 ?>
