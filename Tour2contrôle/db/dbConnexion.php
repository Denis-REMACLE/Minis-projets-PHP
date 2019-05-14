<?php
include "../class/classinsc.php";
include "../manager/inscManager.php";
//on inclut les pages classinsc.php et inscManager.php dans la page de traitement
$personne = new Inscription([
  'mail' => $_POST['mail'],
  'MDP' => $_POST['MDP']]);
     //on envoit les valeurs contenues dans les post dans la classe Inscription
include "../app/connexionPDO.php";
//on inclut la page connexionPDO.php où se trouve la connexion à la base de données
$manager= new inscManager($db);
$manager->getList();
//cette variable va appeler la getList() se trouvant dans la classe inscManager
header("location: ../indexconnecte.php");//On est redirigé sur la page index.php
?>
