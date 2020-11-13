<?php
require 'includes/headerIn.php';
require 'includes/funksione.php';

?>


	<div class="kolonaKryesore column col-lg-7 offset-4">
		<h2>Regjistrim lëndësh</h2>
		<!--printimi i numrit te grupeve-->
	<p>
		Për të krijshtuar lëndë të reja në katalogun e universitetit, ngarkoni më poshtë file.csv me të dhënat sipas renditjes kodi i lëndës, emërtimi i lëndës, syllabus i shkurtër.
			
	</p>
	<div>
		<form method="post" action="#" enctype="multipart/form-data">
			<p><input type="file" name="csvUpload"></p>
			<p><input class="btnShto pink" type="submit" name="submitCSV" value="Shto lëndët"></p>
		</form>

		
	<?php 
	if(isset($_POST['submitCSV'])) {
				
		$filename=$_FILES['csvUpload']['tmp_name'];	

		if($_FILES['csvUpload']['size'] > 0)
			$obj_perdorues->roli->shtoLende($filename);
	}		 
 ?>

	</div>

	</div>


</div><!--wrapperi-->

</body>
</html> 