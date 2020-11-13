<?php

	$gabimLogin=false;//do tregoje nese ka gabim ne te dhenat e loginit ne html

	if (isset($_POST['hyr'])) {

		$email=$_POST['hyr_email'];
		$_SESSION['hyr_email']=$email;//ruaj perdoruesin ne session qe t rishkruaj ne tagun e inputit ne value

		$fjalekalimi=md5($_POST['hyr_fjalekalimi']);

		$query_kerkimi="SELECT * FROM perdorues WHERE email='$email' AND fjalekalimi='$fjalekalimi'";
		$result=mysqli_query($connection, $query_kerkimi);
		$num_rows=mysqli_num_rows($result);
		if($num_rows==1){
			$row=mysqli_fetch_array($result);
			$_SESSION['id_perdorues']=$row['id_perdorues'];
			if(isset($_SESSION['hyr_email'])) 
				unset($_SESSION['hyr_email']);
			header("Location: indexIn.php");//te con ne faqen main te loguar
		} else 
			$gabimLogin=true;
	}
?>
