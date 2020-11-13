<?php

class Pergjigje{
	private $pergjigje;

	public function __construct($pergjigje){
		$this->pergjigje=$pergjigje;
	}

	public function getIdPergjigje() : int {
		return $this->pergjigje['id_pergjigje'];
	} 

	public function getPergjigja() : string {
		return $this->pergjigje['pergjigja'];
	}


	public function isSakte() : bool {
		return $this->pergjigje['sakte'];
	}


	public function getIdPyetje() : int {
		return $this->pergjigje['id_pyetje'];
	}

}

?>