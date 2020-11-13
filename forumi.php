<?php 
require 'includes/headerIn.php'; 
require 'includes/shtoPostim.php';
require 'includes/shtoKoment.php';

$_SESSION['kodLende']=$_GET['kodLende'];
$obj_lende=new Lende($connection, $_GET['kodLende']);
$obj_forumManager=new ForumManager($connection, $_SESSION['id_perdorues'], $_SESSION['kodLende']);

?>
<script type="text/javascript" src="js/fshihKomentet.js"></script>
<script type="text/javascript" src="js/infiniteScrolling.js"></script>
 


<?php if(!$obj_perdorues->isAdmin()){ ?>
<div class="column teDhenaPersonale col3 col-lg-3">
	<div class="posti bg-portokalli">
		<p>
			<strong>
				<p style="text-align: center;"><!-- linku qe akseson dokumentat e lendes-->

					<a href="faqjaDokumentave.php?kodLende=<?php echo $obj_lende->getKodLende(); ?>">Leksionet</a>
				</p>
				<p style="text-align: center;">
					<?php if($obj_perdorues->isStudent()){ ?>
					<a href="testet2.php" >Testet</a>
					<?php } if($obj_perdorues->isPedagog()) {?>
					<a href="testetPedagogu.php" >Testet </a>
				<?php }?>
				</p>
			</strong>
		</p>
	</div>
</div>
<?php }?>


<!-- kolona e dyte me vendin e postimeve -->
	<div class="kolonaKryesore column col-lg-7 offset-4">
	
	<h2><?php echo $obj_lende->getEmertimi(); ?></h2>
	<hr/>
<!-- divi ku behet shtimi i posteve ne forum -->
	<div class="posti bg-portokalli">
		<form method="post" action="#" enctype="multipart/form-data">
			<p>
				<input type="text" name="kodLende" value="<?php echo $obj_lende->getKodLende(); ?>" hidden>
			</p>
			<p>
				<strong>Shkruaj në murin e lëndës</strong>
			</p>
			<p>
				<input type="text" name="titulli" id="titulli" size="50" placeholder="Subjekti"  autocomplete="off">
			</p>
			<p>
				<textarea rows="2" cols="60" name="permbajtja" id="permbajtja" placeholder="Përmbajtja e postit" required></textarea>
				<input type="file" name="fileUpload" id="fileUpload">
			</p>
			<p>
				<input class="btnShto pink" type="submit" name="posto" value="Posto">
			</p>	
		</form>
	</div>


<!-- divi ku do shfaqet secili prej posteve sipas kohes se postimit -->
	<div class="postimet">
		<?php
			$postet=$obj_forumManager->getPostet(3);
			$nr=count($postet);
			if($nr==0) 
				$k="kot";
				//echo "<p><em>Asnjë post në forum</em></p>";
			else{	
				for($i=0; $i<$nr; $i++){
					$post=$postet[$i];
		?>
					<div class=postim>
						<div class='posti'>	
							<p class='titullPosti'><?php echo $post->getTitulli(); ?></p>
							<p class='postues'><span class='paraPostues'>Nga: </span><?php echo $obj_forumManager->getFullName($post->getPostues());?>
							<span class='date'><?php echo $post->getFormatedData(); ?></span></p>
							<p class='permbajtjePosti'><?php echo $post->getPermbajtja(); ?></p>
							<?php if($post->kaFoto()) { ?>
								<p><a href='foto/poste/<?php echo $post->getUpload(); ?>'><img class='fotoPosti' src='foto/poste/<?php echo $post->getUpload(); ?>' alt='Problem ne hapjen e fotos'></p></a>
							<?php } ?>
						</div><!-- mbyllet div Posti -->
						<hr>
<!--  fundi i seksionit te postit fillimi i seksionit te komenteve --> 
						<div class='komentet fshih' id='<?php echo $post->getIdPost(); ?>'>

						<?php
								$komentet=$obj_forumManager->getKomentet($post->getIdPost());
								if(count($komentet)==0)
									echo "<p><em>Asnjë koment në këtë post</em></p>";
								for($j=0; $j<count($komentet); $j++){
									$komenti=$komentet[$j];
						?>
							<div class='komenti'>
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
						</div><!-- mbyllet div i komenteve  -->

 					<!--	ketu do vendoset forma qe zmadhon postin -->
 					<form action='post.php' method='get' class='formClass butonat'>
					<p>
						<input type='text' name='id_post' value='<?php echo $post->getIdPost(); ?>' hidden>

						<button type='button' class='btnShto lejla' name='<?php echo $post->getIdPost(); ?>' onclick="shfaqGjitheKomentet(this)"><i class='fa fa-plus-square fa-lg'></i> Lexo komentet
						</button><!-- nga hide ne shfaq -->
						<button type='submit' class='btnShto lejla' name='hapPost'><i class='fa fa-expand'></i> Shiko postin e plotë
						</button>
					</p>
				</form>
	
					</div><!-- mbyllet div i postim -->
<?php
				}//mbyllet cikli i perseritjes per cdo post
			}//mbyllet else per rastin kur lenda ka poste
	?>
		</div> <!-- mbyllja e Postimet  -->

	<!--kodi pergjegjes per infinite scrolling -->
		<p class="loadingParagraf" data-lastPostId="<?php echo $obj_forumManager->getlastPostId(); ?>" data-kodLende="<?php echo $obj_lende->getKodLende(); ?>">
			<img class="loadingGif" src="foto/default/loading.gif">
		</p>


	</div><!-- mbyllja e kolonaKryesore -->

</div><!--wrapperi-->

</body>
</html> 