 <?php
require 'includes/connection.php';
require 'includes/loginHandler.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hyr</title>
	<link rel="stylesheet" type="text/css" href="css/regjistrimi.css">
		<link rel="stylesheet" type="text/css" href="css/regjistrimi.css">
	<link rel="stylesheet" type="text/css" href="css/fonts/font-faces.css">
</head>
<body>

<!-- <script type="text/javascript" src="js/mouseMove.js"></script>
<table id="tabela">
			<tbody id="telajo">
			</tbody>
		</table> -->
	<div class="centerDiv">
		<div class="titullDiv">
			<h1 class="titull"><a href="index.php">FTI<em>uni</em></a></h1>
						<p>SISTEMI I MENAXHIMIT TË MËSIMDHËNIES</p>

		</div>
	


	<form action="#" method="post">

			<div id="first">

				<div class="labelat">
					<p><label for="username">Email </label></p>
					<p><label for="password">Fjalëkalimi </label></p>
				</div>

				<div class="inputet">
					<p><input type="text" name="hyr_email" size="20" value="<?php if(isset($_SESSION['hyr_email'])) echo $_SESSION['hyr_email']; ?>" required></p>
					<p><input type="password" name="hyr_fjalekalimi" size="20" required></p>
				</div>

				<div class="fundDiv">
					<input type="submit" class="btnCenter" name="hyr" value="HYR">
					<p id="pGabim"><?php if($gabimLogin==true) echo "<em>⚠ Email ose Fjalëkalim i pasaktë.</em>"; ?>
					</p>
				</div>

			</div>
	</form>
</div>


</body>
</html>
