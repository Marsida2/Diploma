<?php
require 'roli.php';

class Perdorues {
	use NgarkimFILE;

	private $con;
	private $perdorues;
	public $roli=null;
	//private $lendet;


	public function __construct($con, $id){
		$this->con=$con;
		
		$query="SELECT * FROM perdorues WHERE id_perdorues='$id'";
		$result=mysqli_query($this->con, $query);
		$num_rows=mysqli_num_rows($result);
		// if($num_rows==0)
		// 	throw new Exception("Perdoruesi nuk ekziston!");
		$row=mysqli_fetch_array($result);
		$this->perdorues=$row;

		if($this->isAdmin())
			$this->roli=new Admin($con);
		else if($this->isPedagog())
			$this->roli=new Pedagog($this->con);
		else
			$this->roli=new Student($this->con);
}

	

	public function getID(){
		return $this->perdorues['id_perdorues'];
	}

	public function getFullName(){
		return $this->perdorues['emri']." ".$this->perdorues['mbiemri'];
	}

	public function getEmail(){
		return $this->perdorues['email'];
	}

	public function getRoli(){
		return $this->perdorues['roli'];
	}

	public function isPedagog(){
		return $this->perdorues['roli']=='p';
	}

	public function isAdmin(){
		return $this->perdorues['roli']=='a';
	}

	public function isStudent(){
		return $this->perdorues['roli']=='s';
	}

	public function getFoto(){
		return $this->perdorues['foto_profili'];
	}

	public function setFoto($fileUploaded){
		$folderTarget="foto/uploaded/";
		$emriFoto=$this->ngarkoFoto($fileUploaded, $folderTarget);
		$query_update="UPDATE perdorues SET foto_profili='$emriFoto' WHERE id_perdorues='".$this->perdorues['id_perdorues']."'";
		$result=mysqli_query($this->con, $query_update);
		if (!$result){
			return false;
		}else
			$this->perdorues['foto_profili']=$emriFoto;
		return true;
	}

	public function isFjalekalimi($fj){
		$fjalekalimi=md5($fj);
		return ($fjalekalimi==$this->perdorues['fjalekalimi']);
	}


	public function ndryshoFjalekalimin($new){
		$query_update="UPDATE perdorues SET fjalekalimi='".md5($new)."' WHERE id_perdorues='".$this->perdorues['id_perdorues']."'";
		$result=mysqli_query($this->con, $query_update);
		return $result;
	}


	public function getLendet(){
		return $this->roli->listaLendeve($this->getID());
	}
	

	public function shtoPost($kodLende, $titulli, $permbajtja, $fileUploaded){

		$uploaded=$this->ngarkoFoto($fileUploaded, "foto/poste/");  

		$titulli=strip_tags($titulli);//heq taget
		$titulli=mysqli_real_escape_string($this->con, $titulli);//rregullon thonjezat
		$permbajtja=strip_tags($permbajtja);
		$permbajtja=mysqli_real_escape_string($this->con, $permbajtja); 

		$data=date("Y-m-d H:i:s");
		
	    $query = "INSERT INTO post VALUES(NULL, '$titulli', '$permbajtja', '$data', '$kodLende', '".$this->getID()."', '$uploaded')";
	    $result=mysqli_query($this->con, $query);
	    if(!$result) 
	    	return false;
	    return true;
	}


	public function shtoKoment($id_posti, $permbajtja, $data){

		$permbajtja=strip_tags($permbajtja);//heq taget
		$permbajtja=mysqli_real_escape_string($this->con, $permbajtja);//rregullon thonjezat
		if($permbajtja!=""){
			$id_komentuesi=$this->getID();

		    $query = "INSERT INTO koment VALUES('$permbajtja', '$data', '$id_posti', '$id_komentuesi')";
		    $result=mysqli_query($this->con, $query);
		    if(!$result) {
		    	echo "Deshtoi hedhja e komentit ne databaze!: ". mysqli_error($connection);
		    	return false;
			}return true;
	}	return false;
}

}


?>