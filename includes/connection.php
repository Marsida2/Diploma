 <?php
 //traits te perdorura
require 'classes/formatimData.php'; 
require 'classes/ngarkimFILE.php'; 
//klasat e perdorura
require 'classes/connectDB.php';
require 'classes/perdorues.php';
require 'classes/lende.php';
require 'classes/post.php';
require 'classes/koment.php';
require 'classes/forumManager.php';
require 'classes/test.php';
require 'classes/pyetje.php';
require 'classes/pergjigje.php';
require 'classes/testManager.php';

//hapim sesionin e pwrdoruesit
session_start();
//vendosim zonen e kohes 
$timezone= date_default_timezone_set("Europe/Berlin");
//krijojme lidhjen me db me ane te objektit Singleton
$instance = ConnectDb::getInstance();
$connection = $instance->getConnection();
if(!$connection)
	die ("Lidhja me databazen deshtoi.");
?>