<?php

require 'connection.php';
 
function is_ajax_request() {
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest';
	}
if ($_POST['emertim_testi']=="" || $_POST['kod_lende']=="" || $_POST['fillimi']=="" || $_POST['mbarimi']=="") {
	echo "Error";
	exit;
}
	$_SESSION['kodLende']= $_POST['kod_lende'];
	$obj_testManager=new TestManager($connection, $_SESSION['id_perdorues'], $_POST['kod_lende']);

	echo $obj_testManager->ngarkoTest($_POST['emertim_testi'], $_POST['kod_lende'], $_POST['fillimi'], $_POST['mbarimi']);

?>