
<?php

if(isset($_POST['posto'])){

	$fileUploaded=$_FILES['fileUpload'];
	$titulli=$_POST['titulli'];
	$permbajtja=$_POST['permbajtja'];
	$kodLende=$_POST['kodLende'];

	$obj_perdorues->shtoPost($kodLende, $titulli, $permbajtja, $fileUploaded);
	
}

?>



