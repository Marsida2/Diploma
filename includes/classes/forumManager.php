<?php

class ForumManager {
	private $con;
	private $perdorues;//objekt
	private $lende;//objekt
	private $lastPostId=0;//ruaj id e postit te fundit te shfaqur ne forum

	public function __construct($con, $id_perdorues, $kod_lende){
		$this->con=$con;
		$this->perdorues=new Perdorues($this->con, $id_perdorues);
		$this->lende=new Lende($this->con, $kod_lende);
	}


	public function setLende($kod_lende){
		$this->lende=new Lende($this->con, $kod_lende);
	}

	public function getFullName($id){
		$qry="SELECT emri, mbiemri FROM perdorues WHERE id_perdorues='".$id."'";
		$result= mysqli_query($this->con, $qry);
		if(!$result) return "Nuk ekziston perdoruesi";
		else {
			$row=mysqli_fetch_row($result);
			return $row[0]." ".$row[1];
		}
	}

	public function getPostet($limit){
		$lastPostId=0;
		$postet=[];
		$qry="SELECT * FROM post WHERE kod_lende='".$this->lende->getKodLende()."' ORDER BY id_post DESC LIMIT $limit";//marrim vetem $limit postet e fundit
		$result=mysqli_query($this->con, $qry);
		while($row=mysqli_fetch_assoc($result))
			$postet[]=new Post($row);
		//update-oj vleren e lastPostId
		if(count($postet)!=0)
			$this->lastPostId=$postet[count($postet)-1]->getIdPost();
		return $postet;
	}

//kthen nje post te vetem
	public function getPost($id_post){
		$qry="SELECT * FROM post WHERE id_post='".$id_post."'";
		$result=mysqli_query($this->con, $qry);
		$row=mysqli_fetch_assoc($result);
		return new Post($row);
	}

	public function getlastPostId(){
		return $this->lastPostId;
	}

	public function getKomentet($id_post){
		$komentet=[];
		$qry="SELECT * FROM koment WHERE id_post='".$id_post."' ORDER BY data";
		$result=mysqli_query($this->con, $qry);
		while($row=mysqli_fetch_assoc($result))
			$komentet[]= new Koment($row);
		return $komentet;
	}  


		public function ndjekLenden(){
			$lendet=$this->perdorues->getLendet();
			for($i=0; $i<count($lendet); $i++)
				if($lendet[$i]->getKodLende()==$this->lende->getKodLende())
					return true;
			return false;
		}
}

?>