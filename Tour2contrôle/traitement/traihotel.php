<?php
include('connexionPDO.php');
$req=$bdd->prepare('SELECT * FROM vol WHERE ville_arr = :dest AND date_dep = :dep');
$req->execute(array('dest'=>$_POST['destination'],'dep'=>$_POST['checkin_date']));

$result = $req->fetch();

if(isset($result)) {
  setcookie('vol', $result, time()+3600, '/');
  header('location: tickets.php');
}
else {
    header('location: index.html');
  }
?>
