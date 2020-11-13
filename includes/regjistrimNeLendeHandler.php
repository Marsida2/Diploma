<?php
if (isset($_POST['studentLende'])) {
	$id_studenti=explode("-",$_POST['studenti'])[0];
	$lendet=explode(",", $_POST['lendet']);
	$lendet[]=explode("-",$_POST['opsioniFundit'])[0];

	echo $obj_perdorues->roli->regjistroStudentLende($id_studenti, $lendet);	
}


if (isset($_POST['pedagogLende'])) {
	$id_pedagogu=explode("-",$_POST['pedagogu'])[0];
	$lenda=explode("-",$_POST['lenda'])[0];
	echo $obj_perdorues->roli->regjistroPergjegjes($id_pedagogu, $lenda);	
}

?>