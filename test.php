<?php

require_once 'libs/mPDF/vendor/autoload.php';

$mpdf=new \Mpdf\Mpdf();
$data="<h1>Kredencialet e perdoruesve te rinj</h1><h4>FTI<em>uni</em> Sistemi i menaxhimit te mesimdhenies online</h4><hr>";
$data.=$_POST['kredencialet'];
$mpdf->WriteHTML($data);
$mpdf->Output("myfile.pdf", "D");

?>