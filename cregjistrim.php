<?php
require 'includes/headerIn.php';
//reset Handler
?>

<script type="text/javascript" src="js/cregjistro.js"></script>
<!-- kolona e dyte me vendin e postimeve -->
	<div class="kolonaKryesore column col-lg-7 offset-4">
				<h2>Ç regjistrim studentësh</h2>

				<p> Zgjidhni lëndën dhe më pas studentët që doni të cregjistroni nga lënda përkatëse. </p>
		<!--printimi i numrit te grupeve-->

<!--printimi i lendeve ne tabele-->
	<div class="posti">
		<form action="#" method="get">
				Zgjidh lëndën:  
				<select name="lendaCrregjistrim" onchange="getStudentet(this)">
					<option value=""></option>
<?php
					$lendet=$obj_perdorues->getLendet();
						for($i=0; $i<count($lendet);$i++)
							echo "<option value='".$lendet[$i]->getKodLende()."'>".$lendet[$i]->getEmertimi()."</option>";
?>
					</select>

					<hr>

					<p id="listaStudenteve">
					</p>

		</form>
	</div>
		
	</div><!-- mbyllja e kolones Kryesore te posteve -->

</div><!--wrapperi-->


</body>
</html> 