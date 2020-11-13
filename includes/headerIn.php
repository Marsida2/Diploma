<?php
require 'connection.php';

if(isset($_SESSION['id_perdorues']))
	$obj_perdorues=new Perdorues($connection, $_SESSION['id_perdorues']);
else 
	header("Location: index.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>FTIuni</title>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/fonts/font-faces.css">
	<link rel="stylesheet" type="text/css" href="css/loggedIn.css">
</head>
<body>
	
	<script type="text/javascript" src="js/ngjyrosSearch.js"></script>

	<script type="text/javascript" src="js/sugjerime.js"></script>

	<div class="top_bar">
		<div class="logo">
			<a href="indexIn.php">FTI<em>uni</em></a>
		</div>

<!-- implementimi i search-it  -->
		<div class="search">
			<form action="kerkim.php" method="get" name="frmKerko">
				<input type="text" name="kerkim" placeholder="Kërko lëndë..." autocomplete="off" id="kerko_inputin">
				<button type="submit" class="btnKerkimi">
					<i class="fa fa-search fa-lg"></i>
				</button>
			</form>
				<ul id=sugjerime>
				</ul>

		</div>


		<nav>

  			<div class="dropdown">
  				<a href="indexIn.php" id="cours" class="navLink droplink">LËNDËT</a>  
				<div class="dropdown-content">
					<?php
						$rezultatet=$obj_perdorues->getLendet();
						for($i=0; $i<count($rezultatet); $i++) {
							echo "<a href='forumi.php?kodLende=".$rezultatet[$i]->getKodLende()."'>".$rezultatet[$i]->getKodLende()."</a>";
		}
						if(count($rezultatet)==0) echo "<p style='color: black'>Asnje lende</p>";
					?>
					    
					</div>
  			</div>

  			<div class="dropdown">
  				<a href="#" id="settings" class="navLink droplink">NDRYSHIME</a>
				<div class="dropdown-content">
					    <a href="ndryshofjalekalimin.php">Ndrysho fjalëkalimin</a>
					    <a href="ndryshoFoton.php">Ndrysho foton</a>
					</div>
  			</div>
			
			<div class="dropdown">
				<a href="includes/logout.php" id="dil" class="navLink" >DIL</a>
			</div>
			
		</nav>
	<img src="foto/default/logo2.png" id="logoFTI">
	</div><!-- mbyllet koka lart -->


	<div class="wrapper container">
		


<!-- kolona e pare me te dhenat e perdoruesit -->
	<div class="teDhenaPersonale column col-lg-3 offset-1">
		
		<a href='foto/uploaded/<?php echo $obj_perdorues->getFoto(); ?>'><img  id="fotoProfili" src="foto/uploaded/<?php echo $obj_perdorues->getFoto() ?>" alt="fotoja e profilit"/></a>
		<!-- <form action="#" method="post" id="formaFoto">
			<label for="imagep">
		     	<input type="file" name="image" id="imagep" style="display:none;" />
		     	<input type="text" name="id_perdorues" value="<?php echo $obj_perdorues->getId() ?>" hidden/>
		     	<img  id="fotoProfili" src="foto/uploaded/<?php echo $obj_perdorues->getFoto() ?>" alt="fotoja e profilit"/>
		     	<input type="button" name="submitFoto" id="submitFoto" style="display:none;">
	   		</label>
	   	</form> -->
		<!-- <a h ref="#"><img class="fotoProfili" src="foto/default/<?php echo $perdorues['foto_profili']; ?>" alt="fotoja e profilit"></a> -->
		<p>
			<?php echo "<strong>Loguar:</strong><br>". $obj_perdorues->getFullName() ?>
		</p>	
		
		<p>
			<?php echo "<strong>Email:</strong><br>".$obj_perdorues->getEmail()?>
		</p>		

 	</div>
