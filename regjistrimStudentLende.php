<?php
require 'includes/headerIn.php';
//require studentLendeHAndler me poshte
?>
	<script type="text/javascript" src="js/shtoRreshtLende.js"></script>

	<div class="kolonaKryesore column col-lg-7 offset-4">
		<h2>Regjistrimi i studentëve në lëndë</h2>
		<!--printimi i numrit te grupeve-->
	

		<div>
			<form method="post" action="#" enctype="multipart/form-data">
				<p>
					<label for="studenti">Studenti: 
						<input type="text" name="studenti" id="studenti" list="emraStudentesh" style="width:100%" required />
							<datalist id="emraStudentesh">
							<?php
								$studentet=$obj_perdorues->roli->listaStudenteve();
								for($i=0; $i<count($studentet); $i++)
								echo "<option value='".$studentet[$i]['id_perdorues']."-".$studentet[$i]['emri']." ".$studentet[$i]['mbiemri']."'>";
							?>
						</datalist>
					</label>
				</p>
				<p><input type="text" name="lendet" id="lendet" style="width:100%" hidden/></p>
				
				<span id="lendePlus">
					<p>
						<label for="lenda">Lënda: 
							<input type="text" name="opsioniFundit" id="lendaFundit" list="opsioneLendesh" style="width:100%" />
								<datalist id="opsioneLendesh">
								<?php
									$lendet=$obj_perdorues->getLendet();
									$length=count($lendet);
									for($j=0; $j<$length; $j++)
									echo "<option value='".$lendet[$j]->getKodLende()."-".$lendet[$j]->getEmertimi()."'/>";
								?>
							</datalist>
						</label>
					</p>
				</span>
			
				<p><button class="btnShto" id="shtoRreshtLende" type="button"><i class="fa fa-plus-square fa-lg"></i> Lëndë tjetër</button></p>
				<p>
					<input type="submit" name="studentLende" value="Ruaj zgjedhjet" class="btnShto pink">
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