<?php

require 'connection.php';

if ($_POST['pyetja']=="" || count($_POST['pergjigja'])<=1 || strlen($_POST['pergjigja'][0])==0 || strlen($_POST['pergjigja'][1])==0 ) {
	echo "Error";
	exit;
}
	$obj_testManager=new TestManager($connection, $_SESSION['id_perdorues'], $_SESSION['kodLende']);

	echo $obj_testManager->ngarkoPyetje($_POST['pyetja'], $_POST['id_testi'], $_POST['pergjigja'], $_POST['sakte']);

?>