<?php

require 'connection.php';
$obj_perdorues=new Perdorues($connection, $_SESSION['id_perdorues']);


function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest';
    }

   
if (isset($_GET['kod_lende'])) {
	$studentet=$obj_perdorues->roli->listaStudenteve($_GET['kod_lende']);
	if(is_ajax_request()){
        echo json_encode($studentet);
	}
	else echo "bosh";
}


if(isset($_GET['studenti']) && isset($_GET['kodLende'])){
	$res=$obj_perdorues->roli->cregjistroStudentin($_GET['kodLende'], $_GET['studenti']);
	echo $res;
}

?>