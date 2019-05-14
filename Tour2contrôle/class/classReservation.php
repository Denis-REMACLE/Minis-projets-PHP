<?php
interface ReservationName
{
  public function setNombre($nombre);
  public function setDate($date);
  public function setDestination($destination);
  public function setArrivee($arrivee);
  public function nombre();
  public function date();
  public function destination();
  public function arrivee();
}
class Reservation implements ReservationName
{
  private $_nombre;
  private $_date;
  private $_destination;
  private $_arrivee;


public function __construct(array $donnees)
{
  $this->hydrate($donnees);
}

  // Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).
  public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value)
    {
      // On récupère le nom du setter correspondant à l'attribut.
      $method = 'set'.ucfirst($key);

      // Si le setter correspondant existe.
      if (method_exists($this, $method))
      {
        // On appelle le setter.
        $this->$method($value);
      }
    }
  }

  public function nombre() { return $this->_nombre; }
  public function date() { return $this->_date; }
  public function destination() { return $this->_destination; }
  public function arrivee() { return $this->_arrivee; }


  public function setNom($nombre)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 30 caractères.
    if (is_int($nombre) && strlen($nombre) <= 5)
    {
      $this->_nombre = $nombre;
    }
  }

  public function setPrenom($date)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 30 caractères.
    if (is_date($date))
    {
      $this->_date = $date;
    }
  }

  public function setMail($destination)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 30 caractères.
    if (is_string($destination) && strlen($destination) <= 40)
    {
      $this->_destination = $destination;
    }
  }

  public function setMail($arrivee)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 30 caractères.
    if (is_string($arrivee) && strlen($arrivee) <= 40)
    {
      $this->_arrivee = $arrivee;
    }
  }
}
?>
