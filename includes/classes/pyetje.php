<?php

class Pyetje{
	private $con;
	private $pyetje;
	private $pergjigjet=[];
	private $sakte;

	public function __construct($con, $pyetje){
		$this->con=$con;
		$this->pyetje=$pyetje;
		$this->setPergjigjet();
	}

	private function setPergjigjet(){
		$qryPergjigje="SELECT * FROM pergjigje WHERE id_pyetje='".$this->getIdPyetje()."' ORDER BY id_pergjigje";
		$result=mysqli_query($this->con, $qryPergjigje);
		$nrPergjigjesh=mysqli_num_rows($result);
		for($i=0; $i<$nrPergjigjesh; $i++){
			$row=mysqli_fetch_array($result);
			$this->pergjigjet[$i]=new Pergjigje($row);
			if($this->pergjigjet[$i]->isSakte())
				$this->sakte=$this->pergjigjet[$i]->getIdPergjigje();
		}
	}

	public function getIdPyetje(){
		return $this->pyetje['id_pyetje'];
	}

	public function getPyetje(){
		return $this->pyetje['pyetja'];
	}

	public function getIdTest(){
		return $this->pyetje['id_testi'];
	}


	public function getPergjigjet(){
		return $this->pergjigjet;
	}

	public function getIdPergjigjaSakte() : int {
		return $this->sakte;
	}

}

?>