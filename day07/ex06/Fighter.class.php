<?PHP
abstract Class Fighter{

	private	$_name;

	abstract function fight($target);

	public function __construct($str){
		$this->_name = $str;
	}

	public function getName(){
		return $this->_name;
	}

}
?>
