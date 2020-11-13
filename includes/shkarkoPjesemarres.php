<?php

require_once '../libs/mPDF/vendor/autoload.php';

$mpdf=new \Mpdf\Mpdf();
$data="<h2>".$_POST['emertim_testi']."</h2>";
$data.="<hr>";
$data.=$_POST['butoniPost'];
$mpdf->WriteHTML($data);
$mpdf->Output("pjesemarres.pdf", "D");

?>