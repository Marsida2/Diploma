<?php

class Lende {
	private $con;
	private $lenda;

	public function __construct($con, $kodi){
		$this->con=$con;
		$qry="SELECT * FROM lende WHERE kodi='$kodi'";
		$result=mysqli_query($this->con, $qry);
		$this->lenda=mysqli_fetch_assoc($result);
	}

	public function getKodLende(){
		return $this->lenda['kodi'];
	}	

	public function getEmertimi(){
		return $this->lenda['emertimi'];
	}	

	public function getPershkrimi(){
		return $this->lenda['pershkrimi'];
	}

}

?>