<?php
require 'includes/headerIn.php';

//kontrolloj nese e ka hapur njehere testin
//sdi si ta bej kete
$testi=new Test($connection, $_GET['idTesti']);
$testi->ngarkoPyetjet();//ngarkon pyetjet=pergjigjet ne objekt

if($obj_perdorues->isStudent()){
?>
<script type="text/javascript" src="js/paraqitjaTesti.js"></script>
<?php } ?>

<div class="kolonaKryesore column col-lg-7 offset-4">
	<h2><?php echo $testi->getEmertimTesti();  ?></h2>
	<form action="rezultati.php" method="post">
		<input type="text" name="id_testi" value="<?php echo $testi->getIdTest(); ?>" hidden>
		<input type="text" name="id_studenti" value="<?php echo $obj_perdorues->getId(); ?>" hidden>
	
<?php
	$pyetjet=array();
	if(isset($_GET['hapTest'])){
		$_SESSION['id_testi']=$_GET['idTesti'];
		$pyetjet=$testi->getPyetjet();
		for($i=0; $i<count($pyetjet); $i++) {
			$pyetja=$pyetjet[$i];
?>
			<div class="posti">
				<h3> <?php echo $pyetja->getPyetje(); ?></h3>

				<div class="komentet">
<?php
				$pergjigjet=$pyetja->getPergjigjet();
				for($j=0; $j<count($pergjigjet); $j++) {
					$pergjigja=$pergjigjet[$j];
?>	
				<p><input type="radio" name="<?php echo"pergjigjet[".$pyetja->getIdPyetje()."]"; ?>" value="<?php echo $pergjigja->getIdPergjigje(); ?>" id="<?php echo $pergjigja->getIdPergjigje(); ?>"> <label for="<?php echo $pergjigja->getIdPergjigje(); ?>"> <?php echo $pergjigja->getPergjigja(); ?> </label></p>

<?php
				}
?>
			</div>
		</div>
<?php
		}
	}
 ?>		

<?php
		if($obj_perdorues->isStudent()){
 ?>		 
			<p>
				<input type="button" id="para" value="Para" class="btnShto pink">
				<input type="button" id="pas" value="Pas" class="btnShto pink" style="position: absolute;  right: 70px;">
			</p>
			<input type="submit" name="submitTest" id="submitTest" value="Perfundo" class="btnShto pink" data-mbarimi="<?php echo $_GET['mbarimi']; ?>">
<?php
		}
 ?>			
		</form>


	</div>

</div><!--wrapperi-->

</body>
</html> 