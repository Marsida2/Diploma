<?php
require 'includes/headerIn.php';
$obj_lende=new Lende($connection, $_GET['kodLende']);
?>


	<div class="kolonaKryesore column col-lg-7 offset-4">

		<h2><?php echo $obj_lende->getEmertimi() ; ?></h2>
		<!--dokumentet e shkarkueshkme te lendes-->
		<hr>
		
<?php
	if($obj_perdorues->isPedagog()){
?>
		<div class="posti">
			<h4>Ngarko dokument tjetër</h4>
		<!--printimi i numrit te grupeve-->
	</br> 
			
	</p>
	<div>
		<form method="post" action="#" enctype="multipart/form-data">
			<p><input type="text" name="kodLende" value="<?php echo($kodLende); ?>" hidden></p>
			<p><input type="file" name="fileUpload" id="fileUpload"></p>
			<p><input class="btnShto pink" type="submit" name="submitFile" value="Ngarko"></p>
		</form>

<?php

	if(isset($_POST['submitFile'])){
	//upload dokumentin e ngarkuar nga mesuesi leksion/seminar
		$obj_perdorues->roli->hidhDokument($_FILES['fileUpload'], $obj_lende->getKodLende());
	}
?>
	</div>
			
		</div>

		<?php
}
			
			$query_leximi="SELECT * FROM dokument where kod_lende='".$obj_lende->getKodLende()."' ORDER BY data;";
			$result=mysqli_query($connection, $query_leximi);
			$nr=mysqli_num_rows($result);
			if($nr==0) echo "<p><em>Asnjë dokument i ngarkuar</em></p>";
			else{	

			while ($row=mysqli_fetch_array($result)) {
				echo "<div class='posti bg-portokalli'>
						<p class='date'><strong>Ngarkuar më </strong>$row[0]</p>
						<p><a href='dokumenta/$row[1]' target='blank' download='$row[1]'>$row[1]</a></p>
					</div>";
				}
			}
		?>

		
		

	</div>


</div><!--wrapperi-->

</body>
</html> 