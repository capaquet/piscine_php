<?PHP

Class UnholyFactory{

	public $recruit = array();

	public function absorb($id){
		if ($id instanceof Fighter)
			if (array_search($id, $this->recruit) === FALSE)
			{
				$this->recruit[] = $id;
				print("(Factory absorbed a fighter of type ".$id->getName().")\n");
			}
			else
				print ("(Factory already absorbed a fighter of ".$id->getName().")\n");
		else
			print "(Factory can't absorb this, it's not a fighter)\n";
	}

	public function fabricate($str){
		foreach ($this->recruit as $object)
		{
			if (strcasecmp($str, $object->getName()) === 0)
			{
				print "(Factory fabricates a fighter of type ".$str.")\n";
				return $object;
			}
		}
		print "(Factory hasn't absorbed any fighter of type ".$str.")\n";
	}
}


?>
