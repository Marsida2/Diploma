<?php
require 'includes/headerIn.php';
//reset Handler
if (isset($_POST['resetLende'])) {
	$resetuar=$obj_perdorues->roli->resetLende($_POST['lendeResetimi']);
}
?>

 <script type="text/javascript" src="js/resetLende.js"></script>

<!-- kolona e dyte me vendin e postimeve -->
	<div class="kolonaKryesore column col-lg-7 offset-4">
				<h2>Reset grup lënde </h2>

				<p> Resetimi i një lënde crregjistron automatikisht studentët e rregjistruar në të dhe formaton forumin e lëndës. </p>
		<!--printimi i numrit te grupeve-->

<!--printimi i lendeve ne tabele-->
	<div class="komentet">
		<form method="post" action="#">
			<table class='tabele'>
				<thead>
					<th>
						<input type="checkbox" name="resetAll" value="*" id="resetAll" onchange="selektoTeGjitha(this)"> 
					</th>
					<th>
						<label for="resetAll">
							Zgjidh të gjitha
						</label>
					</th>
					<th>
<?php 
						if (isset($resetuar)) {
							echo "U resetuan ". count($resetuar)." lëndë.";
						}
?>
					</th>
				</thead>
				<tbody>
<?php
		$lendet=$obj_perdorues->getLendet();
		for($i=0; $i<count($lendet); $i++) {
			$lenda=$lendet[$i];
?>			
			<tr>
				<td>
					<input type="checkbox" name="lendeResetimi[]" value="<?php echo $lenda->getKodLende(); ?>" 
							id="<?php echo $lenda->getKodLende(); ?>">
				</td>
				<td>
					<label for="<?php echo $lenda->getKodLende(); ?>">
						<?php echo $lenda->getEmertimi(); ?>
					</label>
				</td>
				<td>
					<?php if(isset($resetuar) && in_array($lenda->getKodLende(), $resetuar)) 
								echo "<h5 style='color: green; font-style: italic;'>Lënda u resetua me sukses!</h5>"; 
					?>
				</td>
			</tr>
<?php
		}
?>
				</tbody>
			</table>
			<input class="btnShto pink" type="submit" name="resetLende[]" value="Reset lëndët e zgjedhura">
		</form>


	</div>
		
	</div><!-- mbyllja e kolones Kryesore te posteve -->

</div><!--wrapperi-->


</body>
</html> 