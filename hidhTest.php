<?php
require 'includes/headerIn.php';
require 'includes/funksione.php';

?>
<script type="text/javascript" src="js/hidhTest.js"></script>


	<div class="kolonaKryesore column col-lg-7 offset-4">
		<h2>Krijo një test online</h2>
		<!--printimi i numrit te grupeve-->
	</br>

	<form action="#" method="post" id="forma_testi">
			<p>Lënda: 	<select name="kod_lende" id="kod_lende">
							<?php
							$lendet=$obj_perdorues->getLendet();
							for($i=0; $i<count($lendet);$i++)
								echo "<option>".$lendet[$i]->getKodLende()."</option>";
							?>
						</select>

							<?php
							if(count($lendet)==0){
								echo "<p style='color: red'>Asnjë lëndë nuk është nën drejtimin tuaj. Ju smund të krijoni test!</p>";
								die();
								}
							?>	
			</p>
			<p>Emërtimi i testit: <input type="text" name="emertim_testi" autocomplete="off" required></p>
			<p>Fillimi: <input type="datetime-local" name="fillimi" placeholder="Koha e fillimit" required></p>
			<p>Mbarimi: <input type="datetime-local" name="mbarimi" placeholder="Koha e mbarimit" required></p>

			<input type="button" name="krijo_test" id="krijo_test" class="btnShto pink" value="Krijo Testin">
		
	</form>

	</br>

	<form action="#" method="post" id="forma_pyetjet">
		<p>Shkruani në kutitë përkatëse pyetjen dhe përgjigjet. Për të shtuar opsionet e përgjigjeve kliko mbi butonin e mëposhtëm dhe zgjidh përgjigjen e saktë. Pyetja duhet të përmbajë 2 përgjigje minimalisht.</p>
		<p><input type="text" name="id_testi" id="id_testi" value="0" hidden></p>
		<p>Pyetja <span id="nr_pyetjes">1</span>: <input type="text" name="pyetja" id="pyetja" size="60"></p>
		<div id="nenforma_pergjigjet">
			<p>
			Përgjigja: <input type="radio" name="sakte" value="0" checked> <input type="text" name="pergjigja[]" size="30">
			</p>
		</div>
		<p><button type="button" class="btnShto" id="shtoPergjigje" >
			<i class="fa fa-plus-square fa-lg"></i> Shto përgjigje
			</button>
		</p>
		<p>
		<input type="button" name="ruaj_pyetjen" id="ruaj_pyetjen" class="btnShto pink" value="Ruaj Pyetjen">
		</p>

		</br>
		<input type="submit" name="ruaj_testin" id="ruaj_testin" value="Perfundo Testin" class="btnShto pink">

	</form>
			
	</div>


</div><!--wrapperi-->

</body>
</html> 