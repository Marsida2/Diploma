<?php

if(isset($_POST['shtoKoment'])){

//mbledh te dhenat qe do te ruhen ne tabelen e komeeve
	$id_posti=$_POST['id_post'];//inputi i tipit hidden

	$permbajtja=strip_tags($_POST['komenti']);//heq taget
	$permbajtja=mysqli_real_escape_string($connection, $permbajtja);//rregullon thonjezat
	if($permbajtja!=""){
	
	$id_komentuesi=$obj_perdorues->getID();//ruajtur qe ne fillim te programit
	
	$data=date("Y-m-d H:i:s");//ora e hedhjes se komentit

    $query = "insert into koment values('$permbajtja', '$data', '$id_posti', '$id_komentuesi')";
    $result=mysqli_query($connection,$query);
    if(!$result) echo "Deshtoi query i hedhjes se komentit ne databaze!: ". mysqli_error($connection);
	}

} 

?>
