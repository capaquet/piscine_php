<?php
Class Lannister
{
  public function sleepWith($param)
  {
    if (  is_a($param, 'Lannister') )
      print('Not even if I\'m drunk !' . PHP_EOL);
    else
      print("Let's do this." . PHP_EOL);
  }

}
?>
