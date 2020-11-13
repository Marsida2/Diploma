<?php
require 'includes/headerIn.php';
?>


<!-- kolona e dyte me vendin e postimeve -->
	<div class="kolonaKryesore column col-lg-7 offset-4">
		<h2><em><strong>Rezultatet e kërkimit</strong></em></h2>
		<br>

		<?php 
		$kerkim=$_GET['kerkim'];
		$kerkim=trim($kerkim);
		$kerkim=explode(" ", $kerkim);
		
		$kusht_query="";
		for ($i=0; $i<count($kerkim) ; $i++) { 
			$kusht_query.="kodi like '%".$kerkim[$i]."%' or emertimi like '%".$kerkim[$i]."%' or pershkrimi like '%".$kerkim[$i]."%'";
			if ($i!=count($kerkim)-1)
				$kusht_query.=" or ";
		}
		
		$query_kerkimi="SELECT * FROM lende WHERE $kusht_query ORDER BY kodi";
		$result=mysqli_query($connection, $query_kerkimi);
		?>

		<div class="postim">
				<?php
					while($row=mysqli_fetch_assoc($result)){
				?>

				<div class='posti'>	
					<p class='titullPosti'><a href="lende.php?kodLende=<?php echo $row['kodi']; ?>"><?php echo $row['emertimi']; ?></a></p>
					<p class='postues'></span><?php echo $row['kodi']; ?>
					 </span></p>
					 <hr>
					 <p class='permbajtjePosti'><?php echo substr($row['pershkrimi'], 0, strpos(wordwrap($row['pershkrimi'],600,"\n",false), "\n")); ?>...</p>
				</div><!-- mbyllet div Posti -->
				<hr>
				<?php
					}
				?>

		
		</div><!-- divi ku do shfaqet secili nga rezutatet e gjetura -->

	</div><!-- mbyllja e kolones gjigande te posteve -->

</div><!--wrapperi-->


</body>
</html> 