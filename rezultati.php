<?php
require 'includes/headerIn.php';

$obj_testManager=new TestManager($connection, $_SESSION['id_perdorues'], $_SESSION['kodLende']);

require 'includes/testHandler2.php';

?>


	<div class="kolonaKryesore column col-lg-7 offset-4">
		<h2>Testet e lëndës</h2>

			
		<div class="posti"><!--testi-->
			<?php
				echo "Ju perfunduat testin me ".$obj_testManager->getPiket($_SESSION['id_testi'])." pike ne total.";
			?>

		</div>
	
	</div>


</div><!--wrapperi-->

</body>
</html> 