<?php
class InscManager{
private $_db;
public function __construct($db)
{
  $this->setDb($db);
}
public function setDb(PDO $db)
{
  $this->_db=$db;
}

public function Ajouter(Inscription $personne){
  $requete = $this->_db->prepare('INSERT INTO inscription (Nom, Prenom, Mail, MDP)  VALUES (:nom,:prenom,:mail,:mdp)');
$requete->execute(array(
 'nom'=>$personne->nom(),
 'prenom'=>$personne->prenom(),
 'mail'=>$personne->email(),
 'mdp'=>$personne->mdp()
));

}
}
?>
