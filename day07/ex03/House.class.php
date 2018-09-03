<?php
Class House
{
	abstract function getHouseName();
	abstract function getHouseMotto();
	abstract function getHouseseat();

	public function introduce()
	{
		print( "House ". $this->getHouseName() ." of ". $this->getHouseSeat() ." : \"" . $this->getHouseMotto() . "\"". PHP_EOL);
	}
}
?>
