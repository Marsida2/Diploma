<?php
	$pyetjet=$_SESSION['pyetjet'];//ruajtur nga faqja e meparshme pergjigjet e sakta

	if(isset($_POST['submitTest'])){

		$count=0;

		if (isset($_POST['pergjigjet'])) {
			
			// print_r($_POST['pergjigjet']);
			// print_r($pyetjet);

			foreach ($pyetjet as $pyetje => $pergjigje) {
				if(isset($_POST['pergjigjet'][$pyetje]) && $_POST['pergjigjet'][$pyetje]==$pergjigje)
					$count++;
			}
		}
		//echo " kemi gjetur ".$count." pergjigje te sakta";
		$id_testi=$_POST['id_testi'];
		$id_studenti=$_POST['id_studenti'];		
		$query="INSERT INTO pike VALUES('$id_testi', '$id_studenti', '$count')";
		//echo $query;
		$result=mysqli_query($connection, $query);
		if(!$result){
			echo mysqli_error($connection);
		}
	}

?>
