<?php

	if(isset($_POST['submitTest'])){

		$testi=new Test($connection, $_POST['id_testi']);
		$pergjigjePerdoruesi=[];
		if (isset($_POST['pergjigjet'])) 
			$pergjigjePerdoruesi=$_POST['pergjigjet'];
		$piket=$testi->vleresoPergjigjet($pergjigjePerdoruesi);

		if(!$obj_testManager->setPiket($_POST['id_testi'], $piket))
			echo "nuk u regjistrun piket";			
		}

?>
