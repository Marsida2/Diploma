<?php
$obj_perdorues=new Perdorues($connection, $_SESSION['id_perdorues']);

if (isset($_POST['ndryshoFoton'])) {
	$fileUploaded=$_FILES['fileUpload'];
//	echo "po u vendos fotoja";
	if(!$obj_perdorues->setFoto($fileUploaded))
		echo "nuk u ndrysho fotoja ";
	}
	
?>