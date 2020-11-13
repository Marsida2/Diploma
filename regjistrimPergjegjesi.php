<?php
require 'includes/headerIn.php';
?>

<div class="kolonaKryesore column col-lg-7 offset-4">
		<h2>Regjistrimi i përgjegjësve të lëndëve</h2>
	
		<div>
			<form method="post" action="#">
				<p>
					Zgjidhni përgjegjësin: 
					<input type="text" name="pedagogu" id="pedagogu" list="emraPedagogesh" style="width:40%" required />
						<datalist id="emraPedagogesh">
						<?php
							$pedagoget=$obj_perdorues->roli->listaPedagogeve();
							for($i=0; $i<count($pedagoget); $i++)
							echo "<option value='".$pedagoget[$i]['id_perdorues']."-".$pedagoget[$i]['emri']." ".$pedagoget[$i]['mbiemri']."'>";
						?>
						</datalist>
				</p>
				<p>
					Zgjidhni lëndën: 
					<input type="text" name="lenda" id="lendaFundit" list="opsioneLendesh" style="width:40%" />
							<datalist id="opsioneLendesh">
								<?php
									$lendet=$obj_perdorues->getLendet();
									$length=count($lendet);
									for($j=0; $j<$length; $j++)
									echo "<option value='".$lendet[$j]->getKodLende()."-".$lendet[$j]->getEmertimi()."'/>";
								?>
							</datalist>
				</p>
				<p>
					<input type="submit" name="pedagogLende" value="Ruaj zgjedhjen" class="btnShto pink">
				</p>
			</form>

	<?php
		require 'includes/regjistrimNeLendeHandler.php';
	?>

		</div>
	</div>


</div><!--wrapperi-->

</body>
</html> 