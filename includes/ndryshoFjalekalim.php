
<?php


if (isset($_POST['ndrysho'])){
	$newFjalekalim=$_POST['newFjalekalim'];
	$newFjalekalim2=$_POST['newFjalekalim2'];
	$oldFjalekalim=$_POST['oldFjalekalim'];


	if(!isset($_COOKIE['$id_perdorues'])) {
		if ($newFjalekalim!=$newFjalekalim2)
			$_SESSION['errorFjalekalimi']="Fjalekalimet e reja nuk perputhen!";
		else if(!$obj_perdorues->isFjalekalimi($oldFjalekalim))
			$_SESSION['errorFjalekalimi']="Fjalekalimi i vjeter eshte i pasakte!";
		else{
			$result=$obj_perdorues->ndryshoFjalekalimin($newFjalekalim);
			if($result){
				setcookie($obj_perdorues->getID(), 1, time()+3600);
				$_SESSION['cookie']="ok";
			}
		}
	}
}	

?>