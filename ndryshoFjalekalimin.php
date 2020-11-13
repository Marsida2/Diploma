<?php 

require 'includes/headerIn.php'; 
require 'includes/ndryshoFjalekalim.php';

?>

<script type="text/javascript"> document.getElementsByClassName("fa-cog")[0].setAttribute("style", "color: black;");</script>


<!-- kolona e dyte me vendin e postimeve -->
	<div class="kolonaKryesore column col-lg-7 offset-4">
		
		
		<form action="#" method="post">
			<p><input type="password" name="newFjalekalim" placeholder="Fjalëkalimi i ri" 
				<?php if (isset($_COOKIE[$obj_perdorues->getID()]) || isset($_SESSION['cookie']) )
						echo "disabled"; 
				?> required>
			</p>
			<p><input type="password" name="newFjalekalim2" placeholder="Konfirmo fjalëkalimin" 
				<?php if(isset($_COOKIE[$obj_perdorues->getID()]) || isset($_SESSION['cookie']))
						echo "disabled";
				?> required>
			</p>
			<p><input type="password" name="oldFjalekalim" placeholder="Fjalëkalimi i vjeter" 
				<?php if (isset($_COOKIE[$obj_perdorues->getID()]) || isset($_SESSION['cookie']))
						echo "disabled"; 
				?> required>
			</p>
			<p><input type="submit" name="ndrysho" value="Ndrysho" 
				<?php if (isset($_COOKIE[$obj_perdorues->getID()]) || isset($_SESSION['cookie']))
						echo "disabled"; 
				?>>
			</p>
		</form>

			<p>
				
				<?php
					if(isset($_SESSION['cookie'])){
						echo "Fjalëkalimi i ndryshuar me sukses!";
						unset($_SESSION['cookie']);
						}
					else if(isset($_COOKIE[$obj_perdorues->getID()]))
							echo "Fjalëkalimi s'mund të ndryshohet përsëri brenda një ore!"; 
					else if(isset($_SESSION['errorFjalekalimi'])) {
						echo $_SESSION['errorFjalekalimi'];
						unset($_SESSION['errorFjalekalimi']);
					}
				?>
			</p>
 
		
	</div><!-- mbyllja e kolones gjigande te posteve -->

</div><!--wrapperi-->


</body>
</html> 