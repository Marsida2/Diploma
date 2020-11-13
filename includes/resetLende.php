<?php

if (isset($_POST['resetLende'])) {
	$obj_perdorues->roli->resetLende($_POST['lendeResetimi']);
	$resetuar=mysqli_affected_rows($connection);
	echo "lendet affected : "$resetuar;
}


?>