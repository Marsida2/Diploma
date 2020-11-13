<?php

class Koment {
	use FormatimDATE;
	private $koment;

	function __construct($koment){
		$this->koment=$koment;
	}

	public function getPermbajtja(){
		return $this->koment['permbajtja'];
	}

	public function getIdPost(){
		return $this->koment['id_post'];
	}

	public function getData(){
		return $this->koment['data'];
	}
	public function getIdPostues(){
		return $this->koment['id_postues'];
	}

	public function getFormatedData(){
		return $this->formatoDaten($this->getData());
	}
}

?>