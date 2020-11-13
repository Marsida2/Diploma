<?php 
require 'includes/headerIn.php'; 
?>


<!-- kolona e dyte me vendin e postimeve -->
	<div class="kolonaKryesore column col-lg-7 offset-4">

		<h2>Ndrysho foton e profilit</h2>

		<div class="komentet">
			<img src="foto/uploaded/<?php echo $obj_perdorues->getFoto() ?>" alt="fotoja e profilit"/ height="400px">

			<form method="post" action="#" enctype="multipart/form-data">
				<p>
					<input type="file" name="fileUpload" id="fileUpload">
				</p>
				<p>
				<input class="btnShto pink" type="submit" name="ndryshoFoton" value="Ndrysho foton">
				</p>

			</form>
			
			<?php
				require 'includes/ndryshoFoton.php';
			?>
		</div>

	
	</div><!-- mbyllja e kolones gjigande te posteve -->

</div><!--wrapperi-->


</body>
</html> 