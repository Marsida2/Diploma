<?php
require 'includes/headerIn.php';
require 'includes/funksione.php';

$obj_testManager=new TestManager($connection, $_SESSION['id_perdorues'], $_SESSION['kodLende']);
?>
	<div class="kolonaKryesore column col-lg-7 offset-4">
		<h2>Testet e lëndës</h2>

			<?php
				$testet=$obj_testManager->getTestet();
				$nrTestesh=count($testet);
					for($j=0; $j<$nrTestesh; $j++){
						$testi=$testet[$j];
			?>
		<div class="posti"><!--testi-->
			<form action="testiHapur2.php" method="get">
				<input type="hidden" name="idTesti" value="<?php echo $testi->getIdTest(); ?>"/>
				<input type="hidden" name="mbarimi" value="<?php echo $testi->getMbarimi(); ?>"/>
				<p class="titullPosti">
					<?php echo $testi->getEmertimTesti(); ?>
				</p>
				<p class="postues">
					Koha e fillimit: <span class="date"><?php echo $testi->getFillimi(); ?></span>
				<p class="postues">
					Koha e mbarimit : <span class="date"><?php echo $testi->getMbarimi(); ?></span>
				</p><!--date class-->
			<div class="komentet">
					<p style="text-align: center;"><button type='submit' class='btnShto pink' name='hapTest'<?php 
							//kontrolloj nese e ka kryer njehere
							$kryer=$obj_testManager->kryer($testi->getIdTest());
							if($testi->paraAfati() || $testi->pasAfati() || $kryer) {
								echo " disabled" ;
							}
						?>
						>Fillo testin</button>
					</p>

						<?php 
							if($kryer)
								echo "<p>Testi i perfunduar me ".$obj_testManager->getPiket($testi->getIdTest())." pike ne total.</p>";
							else if(!$kryer && $testi->pasAfati())
								echo "<p>Ju nuk keni qene pjesemarres ne test.</p>";
						?>		
			</div>
		</form>
		</div>
			<?php } ?>
	
	</div>


</div><!--wrapperi-->

</body>
</html> 