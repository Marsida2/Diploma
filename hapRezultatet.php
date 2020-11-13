<?php
require 'includes/headerIn.php';

//kontrolloj nese e ka hapur njehere testin
//sdi si ta bej kete
$testi=new Test($connection, $_GET['idTesti']);
$obj_testManager=new TestManager($connection, $_SESSION['id_perdorues'], $_SESSION['kodLende']);
?>

	<div class="kolonaKryesore column col-lg-7 offset-4">
	<h2><?php echo $testi->getEmertimTesti();  ?></h2>
	</br>

	<div class="postim">
	<h4><strong>Tabela e rezultateve të studentëve</strong></h4>

	<table>
		<thead>
			<td>Nr.</td>
			<td style="padding: 10px 30px;">Studenti</td>
			<td>Pikët</td>
		</thead>
		<tbody>
<?php
		$pikeTotal=$testi->getPikeTotal();
		$rezultatet=$obj_testManager->getPiketStudentet($_GET['idTesti']);
		for ($i=0; $i<count($rezultatet) ; $i++) { 
?>
			<tr>
				<td><?php echo $i+1; ?></td>
				<td><?php echo $rezultatet[$i]['emri']." ".$rezultatet[$i]['mbiemri']; ?></td>
				<td><?php echo $rezultatet[$i]['piket']."/".$pikeTotal; ?></td>
			</tr>
<?php
		}
?>	
		</tbody>
	</table>
	</br>

	<h4><strong>Studentët jopjesëmarrës </strong></h4>
		<table>
			<thead>
				<td>Nr.</td>
				<td style="padding: 10px 30px;">Studenti</td>
			</thead>
			<tbody>
<?php
			$rezultatet=$obj_testManager->getJoPjesemarres($_GET['idTesti']);
			for($i=0; $i<count($rezultatet) ; $i++) { 
?>
				<tr>
					<td><?php echo $i+1; ?></td>
					<td><?php echo $rezultatet[$i]['emri']." ".$rezultatet[$i]['mbiemri']; ?></td>
				</tr>
<?php
			}
?>	
			</tbody>
		</table>

		</div>
		<form method="post" action="includes/shkarkoPjesemarres.php">
			<input type="text" name="emertim_testi" value="<?php echo $testi->getEmertimTesti(); ?>" hidden>
			<input type="text" id="butoniPost" name="butoniPost" value="" hidden>
			<input type="submit" value="Shkarko rezultatet PDF" class="btnShto">			
		</form>

		<script type="text/javascript"> 
			document.getElementById('butoniPost').value=document.getElementsByClassName('postim')[0].innerHTML;
		</script>
	</div>

</div><!--wrapperi-->

</body>
</html> 