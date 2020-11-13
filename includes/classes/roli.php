<?php


abstract class Roli{
	protected $con;

	public function __construct($con){
		$this->con=$con;
	}

	public function setConnection($new_connection){
		$this->con=$new_connection;
	}

	abstract public function faqjaKryesore();
	abstract public function listaLendeve($id);
}


class Admin extends Roli {
	public function __construct($con){
		parent::__construct($con);
		// echo "u thirr kontruktori";
	}

	public function listaLendeve($id){
		$lendet=[];
		$qry="SELECT kodi FROM lende"; 
	 	$result=mysqli_query($this->con, $qry);
		while($row=mysqli_fetch_array($result))
			$lendet[]=new Lende($this->con, $row[0]);
		return $lendet;
	}


	public function faqjaKryesore(){
		echo '<div class="container">
				<a href="menaxhoPerdoruesit.php" class="kutiLink">Përdoruesit</a>
				<a href="menaxhoLende.php" class="kutiLink">Lëndët</a>
				<a href="regjistrimNeLende.php" class="kutiLink">Regjistrime në lëndë</a>
			</div>';
	}

	public function shtoPerdorues($filename, $roli){
		$student=file($filename, FILE_IGNORE_NEW_LINES);
		$kredencialet="";
		for($i=0; $i< count($student); $i++){
			list($emri, $mbiemri, $email)=explode(",", $student[$i]);
		
			if(preg_match("/^([a-zA-Z ]+)$/", $emri) && preg_match("/^([a-zA-Z ]+)$/", $mbiemri) && filter_var($email, FILTER_VALIDATE_EMAIL)) #validimi i te dhenave te lexuara
			{
				$fjalekalimi= randomPassword();
						
				$shto_qry= "INSERT INTO perdorues(emri, mbiemri, email, fjalekalimi, roli, foto_profili) values ('".$emri."', '".$mbiemri."', '".$email."', '".md5($fjalekalimi)."', '$roli', 'unknown.png');";
				$query=mysqli_query($this->con, $shto_qry);
				echo "</br>Emri: $emri Mbiemri: $mbiemri Email: $email";
				if (!$query) 
					echo mysqli_error($this->con);
					//echo "<span style='color: red'><em> Gabim query!</em></span>";
				else {
					echo "<span style='color: green'><em> Regjistruar!</em></span>";
					$kredencialet.="<p>Emri: $emri $mbiemri</p><p>Email: $email</p><p>Fjalekalimi: $fjalekalimi</p><hr>";
					}
			} 
			else {
				echo "</br>Emri: $emri Mbiemri: $mbiemri Email: $email";
				echo "<span style='color: red'><em> Gabim të dhënash!</em></span>";
			}
		}
		return $kredencialet;
	}


	public function shtoLende($filename) {
		$file = fopen($filename,"r");

			while(! feof($file))
			  {
			  $lenda=fgetcsv($file);
			 
			  if(strlen($lenda[0])<=6){
			  	$shto_qry= "INSERT into lende values ('".$lenda[0]."', '".$lenda[1]."', '".$lenda[2]."');";
				$query= mysqli_query($this->con, $shto_qry);
				echo "<br><strong>".$lenda[0]." </strong>";
				if ($query)
					echo "<span style='color: green'><em> Regjistruar!</em></span>";
				else
					echo "<span style='color: red'><em>".mysqli_error($this->con)."</em></span>";
			  	}
			  }
			
			fclose($file);
		}


	public function listaStudenteve(){
		$studentet=array();
		$query_lexo="SELECT * FROM perdorues WHERE roli='s' ORDER BY id_perdorues";
		$result=mysqli_query($this->con, $query_lexo);
		while($row=mysqli_fetch_array($result))
			$studentet[]=$row;
		return $studentet;	
	}

	
	public function listaPedagogeve(){
		$pedagoget=array();
		$query_lexo="SELECT * FROM perdorues WHERE roli='p' ORDER BY emri";
		$result=mysqli_query($this->con, $query_lexo);
		while($row=mysqli_fetch_array($result))
			$pedagoget[]=$row;
		return $pedagoget;	
	}

	public function regjistroStudentLende($id_studenti, $arraylendet) {
		$mesazh="";
		for($i=0; $i <count($arraylendet) ; $i++) { 
			if($arraylendet[$i]!=""){
				$query_shtimi="INSERT INTO regjistrim_lende VALUES('$arraylendet[$i]', '$id_studenti')";
				$result=mysqli_query($this->con, $query_shtimi);
				if(!$result)
					$mesazh.="Deshtoi regjistrimi ne ".$arraylendet[$i].": ".mysqli_error($this->con)."</b>";
				}
			 }if($mesazh=="")
			 	$mesazh="Regjistrimi u krye me sukses!";
			 return $mesazh;
		}

	public function regjistroPergjegjes($id_pedagogu, $lenda){
		$mesazh="Regjistrimi u krye me sukses!";
		$query_shtimi="INSERT INTO pergjegjes_lende VALUES('$lenda', '$id_pedagogu')";
		$result=mysqli_query($this->con, $query_shtimi);
		if(!$result)
			$mesazh="Deshtoi regjistrimi : ".mysqli_error($this->con)."</b>";
		return $mesazh;
	}


	public function resetLende($lendet){
		$str=join("', '", $lendet);
		$query="DELETE FROM  regjistrim_lende WHERE kod_lende IN ('".$str."'); ";
		$result=mysqli_query($this->con, $query);
		$query="DELETE FROM  dokument WHERE kod_lende IN ('".$str."'); ";
		$result=mysqli_query($this->con, $query);
		$query="DELETE FROM  post WHERE kod_lende IN ('".$str."'); ";
		$result=mysqli_query($this->con, $query);
		$query="DELETE FROM  test WHERE kod_lende IN ('".$str."'); ";
		$result=mysqli_query($this->con, $query);
		if(!$result){
			echo "errori ". mysqli_error($this->con);
			return array();
		}	
		return $lendet;	
	}

}


class Pedagog extends Roli {
	public function __construct($con){
		parent::__construct($con);
	}

	public function listaLendeve($id){
		$lendet=[];
	 	$qry="SELECT kod_lende FROM pergjegjes_lende WHERE id_pedagog='$id'";
	 	$result=mysqli_query($this->con, $qry);
		while($row=mysqli_fetch_array($result))
			$lendet[]=new Lende($this->con, $row[0]);
		return $lendet;
	}

	public function faqjaKryesore(){
		echo '<div class="container">
				<a href="cregjistrim.php" class="kutiLink">Ç regjistrime</a>
				<a href="hidhTest.php" class="kutiLink">Krijo Teste</a>
			</div>';
	}

	public function faqjetSpecifike(){

	}

	public function hidhDokument($file, $lenda){
		$fileName=$file['name'];//marrim emrin e dokumentit me prapashtese
		if($fileName!= ""){
			$target_dir = "dokumenta/";//pathi i folderit ku do ruhet fotoja
			if (!move_uploaded_file($file['tmp_name'], $target_dir.basename($fileName)))
					echo "Deshtoi uplodimi i dokumentit!";
			}
		$data=date("Y-m-d H:i:s");
	    $query = "INSERT INTO dokument VALUES('$data', '$fileName', '$lenda')";
	    $result=mysqli_query($this->con, $query);
	    if(!$result) echo "Deshtoi query i hedhjes se postimit ne databaze!";
	}

	public function listaStudenteve($lenda){
		$studentet=array();
		$query_lexo="SELECT id_perdorues, emri, mbiemri, email FROM regjistrim_lende LEFT JOIN perdorues ON id_student=id_perdorues WHERE kod_lende='$lenda' ORDER BY emri";
		$result=mysqli_query($this->con, $query_lexo);
		while($row=mysqli_fetch_assoc($result))
			$studentet[]=$row;
		return $studentet;	
	}

	public function cregjistroStudentin($kodLende, $studenti){
		$query="DELETE FROM regjistrim_lende WHERE kod_lende='$kodLende' AND id_student=$studenti";
		echo $query;
		$result=mysqli_query($this->con, $query);
		if(!$result)
			echo "gabim query fshirjes ".mysqli_error($this->con);
		return $result;	
	}

}

class Student extends Roli {
	public function __construct($con){
		parent::__construct($con);
	}

	public function listaLendeve($id){
		$lendet=[];
	 	$qry="SELECT kod_lende FROM regjistrim_lende WHERE id_student='$id'";
	 	$result=mysqli_query($this->con, $qry);
		while($row=mysqli_fetch_array($result))
			$lendet[]=new Lende($this->con, $row[0]);
		return $lendet;
	}

	public function faqjaKryesore(){

		echo '<div class="posti" style="text-align: center; font-family: Quicksand-Bold;">
				<img src="foto/default/fti.png"/ id="ftiFoto">
				<h1>Mirësevini në Faqe</h1>
				<h3>Këtu do të gjeni gjithë materialet e ecurisë së semestrit tuaj</h3>
			</div>';
	}


}

?>