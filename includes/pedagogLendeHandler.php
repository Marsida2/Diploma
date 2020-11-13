<?php

if (isset($_POST['pedagogLende'])) {
	$id_pedagogu=explode("-",$_POST['pedagogu'])[0];
	$lenda=explode("-",$_POST['lenda'])[0];

	$obj_perdorues->roli->regjistroPergjegjes($id_pedagogu, $lenda);	
}

?>