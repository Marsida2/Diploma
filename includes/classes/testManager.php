<?php

class testManager {
	private $con;
	private $lende;
	private $perdorues;

	public function __construct($connection, $id_perdorues, $kod_lende){
		$this->con=$connection;
		$this->perdorues=new Perdorues($this->con, $id_perdorues);
		$this->lende=new Lende($this->con, $kod_lende);
	}

	public function getTestet(){
		$testet=[];
		$qry="SELECT * FROM test WHERE kod_lende='".$this->lende->getKodLende()."' ORDER BY fillimi";
			$result=mysqli_query($this->con, $qry);
			$nrTestesh=mysqli_num_rows($result);
				for($j=0; $j<$nrTestesh; $j++){
					$row=mysqli_fetch_array($result);
					$testet[]=new Test($this->con, $row['id_test']);
				}
		return $testet;
	}

	public function ngarkoTest($emertim_testi, $kod_lende, $fillimi, $mbarimi){
		$query="INSERT INTO test VALUES(NULL, '$emertim_testi', '$kod_lende', '$fillimi', '$mbarimi')";
	    $result=mysqli_query($this->con, $query);
	    if(!$result)
	    	return "Error";
		$getId=mysqli_query($this->con,"select last_insert_id()");//marrim id e testit qe sapo krijuam
		$row=mysqli_fetch_array($getId);
		return $row[0];
	}

	public function ngarkoPyetje($pyetja, $id_testi, $pergjigjet, $sakte){
		$query="INSERT INTO pyetje VALUES(NULL, '$pyetja', '$id_testi')";
	    $result=mysqli_query($this->con,$query);
	    if(!$result)
	    	return "Error";
	    
	    $getId=mysqli_query($this->con,"select last_insert_id()");//marrim id e pyetjes qe sapo krijuam
	   	$row=mysqli_fetch_array($getId);
	    $id_pyetja=$row[0];
		
		for($i=0; $i<count($pergjigjet); $i++){
			if(strlen($pergjigjet[$i])==0)
				continue;
			$query="INSERT INTO pergjigje VALUES(NULL, '$pergjigjet[$i]', '".( $sakte==$i ? '1': '0') ."', '$id_pyetja')";
		    $result=mysqli_query($this->con,$query);
		    if(!$result)
		    	return "Error";
			}
			return "ok";
	}


	public function kryer($id_testi) : bool {
		$qry="SELECT * FROM pike WHERE id_student='".$this->perdorues->getID()."' AND id_testi='$id_testi'";
		$result=mysqli_query($this->con, $qry);
		if(mysqli_num_rows($result)==0){
			return false;
		}
		return true;
	}


	public function getPiket($id_testi) : int { 
		$qry="SELECT * FROM pike WHERE id_student='".$this->perdorues->getID()."' AND id_testi='$id_testi'";
		$result=mysqli_query($this->con, $qry);
		$row=mysqli_fetch_array($result);
		return $row['piket'];
	}

	public function setPiket($id_testi, $piket) : bool {
		$qry="INSERT INTO pike VALUES( '$id_testi', '".$this->perdorues->getID()."' , '$piket')";
		$result=mysqli_query($this->con, $qry);
		if($result){
			return true;
		}
		return false;
	}
	
	public function getPiketStudentet($id_testi) : array { 
		$rezultatet=[];
		$qry="SELECT emri, mbiemri, piket FROM pike LEFT JOIN perdorues ON id_perdorues=id_student WHERE id_testi='$id_testi'";
		$result=mysqli_query($this->con, $qry);
		while($row=mysqli_fetch_array($result))
			$rezultatet[]=$row;
		return $rezultatet;
	}

	public function getJoPjesemarres($id_testi) : array { 
		$rezultatet=[];
		$qry="SELECT id_student, emri, mbiemri FROM (SELECT r.id_student FROM regjistrim_lende r LEFT JOIN (SELECT * from pike Where pike.id_testi='$id_testi') AS p ON r.id_student=p.id_student WHERE kod_lende='".$this->lende->getKodLende()."' AND piket IS NULL ) AS tab1 INNER JOIN perdorues ON perdorues.id_perdorues=tab1.id_student";
		$result=mysqli_query($this->con, $qry);
		while($row=mysqli_fetch_array($result))
			$rezultatet[]=$row;
		return $rezultatet;
	}

}
?>