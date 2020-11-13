<?php
require 'includes/headerIn.php';
// require 'includes/komento.php';

$obj_forumManager=new ForumManager($connection, $_SESSION['id_perdorues'], $_SESSION['kodLende']);

?>
<script type="text/javascript" src="js/komento.js"></script>



<!-- kolona e dyte me vendin e postimeve -->
	<div class="kolonaKryesore column col-lg-7 offset-4">
		
<!-- divi ku do shfaqet posti i cili u klikua "Shiko te plote" -->
		<div class="postimet">
		
		<?php
			$id_post=$_GET['id_post'];
			$post=$obj_forumManager->getPost($id_post);
		?>
			<div class=postim>
				<div class='posti' id="<?php echo $post->getIdPost(); ?>">	
					<p class='titullPosti'><?php echo $post->getTitulli(); ?></p>
					<p class='postues'><span class='paraPostues'>Nga: </span><?php echo $obj_forumManager->getFullName($post->getPostues());?>
					<span class='date'><?php echo $post->getFormatedData(); ?></span></p>
					<p class='permbajtjePosti'><?php echo $post->getPermbajtja(); ?></p>
					<?php if($post->kaFoto()) { ?>
						<p><a href='foto/poste/<?php echo $post->getUpload(); ?>'><img class='fotoPosti' src='foto/poste/<?php echo $post->getUpload(); ?>' alt='Problem ne hapjen e fotos' style='max-width: 500px; max-height: 300px; margin:5px auto;'></p></a>
					<?php } ?>
				</div><!-- mbyllet div Posti -->
			
<!-- fillimi i komenteve-->
 			 	<hr>
				<div class='komentet'>
					<?php
						$komentet=$obj_forumManager->getKomentet($id_post);
						
						for($i=0; $i<count($komentet); $i++){
							$komenti=$komentet[$i];
					?>
					<div class='koment'>
						<p>
							<?php echo $komenti->getPermbajtja() ?>
						</p>
						<p class='postues'>
						<?php echo $obj_forumManager->getFullName($komenti->getIdPostues()); ?>
							<span class='date'>
								<?php echo $komenti->getFormatedData(); ?>
							</span>
						</p>
					</div>
					<?php } ?>	

				</div><!--div i komenteve-->


				<!-- pjesa e inputit te komentit te perdoruesit -->
				<form action='#' method='post' class='formClass'><p>
				 	<input type='text' name='id_post' value='<?php echo $post->getIdPost(); ?>' hidden>
				 	<input type='text' name='id_komentues' value='<?php echo $obj_perdorues->getID(); ?>' hidden>

					<input type='text' name='komenti' class='komenti' placeholder='Shkruaj nje pergjigje...' style='width: 75%;' autocomplete="off">
					<button type='submit' class='btnShto lejla' name='shtoKoment' id='btn_komenti' ><i class='fa fa-plus-square fa-lg'></i> Pergjigju</button></p>
				</form>
			</div><!-- mbyllja e div postim -->
		</div><!-- div postimet -->
		
	</div><!-- mbyllja e kolones Kryesore te posteve -->

</div><!--wrapperi-->


</body>
</html> 