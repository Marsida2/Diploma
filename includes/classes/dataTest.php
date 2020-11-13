<?php

class Kot{
	private $emri;
	private $con;

	public function __construct($str, $con){
		$this->emri=$str;
		$this->con=$con;
		echo "</br>konstruktori i $this->emri u thirr";
	}

	public function __destruct(){
		echo "</br>destruktori u thirr per $this->emri";
	}

	public function print(){
		echo "</br>$this->emri print.</br>";
	}

	public function setCon($con){
			$this->con=$con;
			echo "</br>u nderrua con";

	}

	public function merr(){
		$qry="select * from perdorues where email='admin@fti.edu.al'";
		$res=mysqli_query($this->con, $qry);
		$row=mysqli_fetch_array($res);
		return $row[1];
	}

}
?>