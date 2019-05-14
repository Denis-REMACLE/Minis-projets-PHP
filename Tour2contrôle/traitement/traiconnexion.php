<?php
include('connexionPDO.php');
$req=$bdd->prepare('SELECT id, email, mdp FROM inscription WHERE email = :email AND mdp = :mdp');
$req->execute(array('email'=>$_POST['email'],'mdp'=>$_POST['mdp']));

$result = $req->fetch();

if($result['email'] == 'admin@admin.com' AND $result['mdp'] == 'admin') {
  setcookie('admin', $result['id'], time()+3600, '/');
  header('location: membre.php');
}
elseif($req->rowCount() == 1) {
    setcookie('id', $result['id'], time()+3600, '/');
    header('location: membre.php');
  } else {
    header('location: connexion.php');
  }
?>
