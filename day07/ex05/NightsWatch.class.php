<?php

Class NightsWatch
{
  private $fighter = array();

  public function recruit($recruit)
  {
      $this->fighter[] = $recruit;
      print_r($fighter);
  }

  public function fight()
  {
    foreach ($this->fighter as $recruit)
      if ($recruit instanceof IFighter)
      call_user_method('fight', $recruit);
  }
}
?>
