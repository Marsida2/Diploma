<?php
require 'includes/headerIn.php';
// require 'includes/komento.php';

$obj_forumManager=new ForumManager($connection, $_SESSION['id_perdorues'], $_GET['kodLende']);
$obj_lende=new Lende($connection, $_GET['kodLende']);

?>


<!-- kolona e dyte me vendin e postimeve -->
	<div class="kolonaKryesore column col-lg-7 offset-4">
		
<!-- divi ku do shfaqet posti i cili u klikua "Shiko te plote" -->

	<div class="postim">
		<div class='posti'>	
			<p class='titullPosti'><?php echo $obj_lende->getEmertimi(); ?></p>
			<p class='postues'></span><?php echo $obj_lende->getKodLende(); ?>
			 </span></p>
			 <hr>
			 <p class='permbajtjePosti'><?php echo $obj_lende->getPershkrimi(); ?></p>
		</div><!-- mbyllet div Posti -->
		
<!-- fillimi i komenteve-->
			 	<hr>
			
			<form action='forumi.php' method='get'>
				<input type="text" name="kodLende" value="<?php echo $obj_lende->getKodLende();?>" hidden>
			 	<input type='submit' value='Shko në forum' class='btnShto pink' <?php if(!$obj_forumManager->ndjekLenden()) echo "disabled";?> >
			</form>
		</div><!-- mbyllja e div postim -->
		
	</div><!-- mbyllja e kolones Kryesore te posteve -->

</div><!--wrapperi-->


</body>
</html> 