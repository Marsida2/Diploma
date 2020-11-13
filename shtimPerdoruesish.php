<?php
require 'includes/headerIn.php';
require 'includes/funksione.php';

?>


	<div class="kolonaKryesore column col-lg-7 offset-4">
		<h2>Krijimi i kredencialeve të studentëve</h2>
		<!--printimi i numrit te grupeve-->
		<p>
			Për të krijuar accountet e studentëve të rinj, ngarkoni më poshtë file.csv me të dhënat e studentëve sipas renditjes emër, mbiemër, email. </br> Fjalëkalimi rastësor do ti dërgohet automatikisht studentit në email-in personal.</br> 
				
		</p>

		<div>
			<form method="post" action="#" enctype="multipart/form-data">
				<p><input type="file" name="csvUpload"></p>
				<p><input class="btnShto pink" type="submit" name="submitCSV" value="Krijo kredencialet"></p>
			</form>

<?php 
			$data=null;
			if(isset($_POST['submitCSV'])) {		
				$filename=$_FILES['csvUpload']['tmp_name'];	
				if($_FILES['csvUpload']['size'] > 0){
					$data=$obj_perdorues->roli->shtoPerdorues($filename, "s");	
				}
			}	 
 ?>

		</div>


<?php 
		if(isset($_POST['submitCSV'])) {
?>
		<form action="test.php" method="post">
			<input type="text" name="kredencialet" value="<?php  if(isset($data)) echo $data;  ?>" hidden>
			<input type="submit" value="Shkarko kredencialet PDF" class="btnShto">
		</form>
<?php
		}
?>
	</div>


</div><!--wrapperi-->

</body>
</html> 