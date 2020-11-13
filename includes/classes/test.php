<?php

class Test {
	private $con;
	private $test;
	private $pyetjet=[]; 

	public function __construct($con, $id_test){
		$this->con=$con;

		$qry="SELECT * FROM test WHERE id_test='$id_test'";
		$result=mysqli_query($this->con, $qry);
		$row=mysqli_fetch_array($result);
		$this->test=$row;

	//	$this->setPyetjet();
	}

	public function ngarkoPyetjet(){
		$qryPyetje="SELECT * from pyetje WHERE id_testi='".$this->getIdTest()."' ORDER BY id_pyetje";
		$result=mysqli_query($this->con, $qryPyetje);
		while ($row=mysqli_fetch_array($result))
			$this->pyetjet[]=new Pyetje($this->con, $row);
	}

	public function getIdTest() : int {
		return $this->test['id_test'];
	}
	
	public function getEmertimTesti() : string {
		return $this->test['emertim_testi'];
	}

	public function getKodLende() : string {
		return $this->test['kod_lende'];
	}

	public function getFillimi() : string {
		return $this->test['fillimi'];
	}

	public function getMbarimi() : string{
		return $this->test['mbarimi'];
	}

	public function paraAfati() : bool {
		return date("Y-m-d H:i:s")<$this->getFillimi();
	}

	public function pasAfati() : bool {
		return date("Y-m-d H:i:s")>$this->getMbarimi();
	}

	public function getPyetjet() : array {
		return $this->pyetjet;
	}
	
	public function getPikeTotal() : int {
		$qryPyetje="SELECT * from pyetje WHERE id_testi='".$this->getIdTest()."'";
		$result=mysqli_query($this->con, $qryPyetje);
		$nr=mysqli_num_rows($result);
		return $nr;
	}

	public function vleresoPergjigjet($pergjigjet) : int {
		$count=0;
		if(count($this->pyetjet)==0)
			$this->ngarkoPyetjet();

		for($i=0; $i<count($this->pyetjet); $i++){
			$pyetjeID=$this->pyetjet[$i]->getIdPyetje();
			$pergjigjeID=$this->pyetjet[$i]->getIdPergjigjaSakte();
			if(isset($pergjigjet[$pyetjeID]) && $pergjigjet[$pyetjeID]==$pergjigjeID)
				$count++;
			}
		return $count;
	}
}

?>