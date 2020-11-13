<?php
require 'includes/connection.php';
//nuk funksionon mire ky funksioni

function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest';
    }

    $kerkim=$_GET['kerkim'];
    $kerkim=trim($kerkim);
    $kerkim=explode(" ", $kerkim);
    
    $kusht_query="";
    for ($i=0; $i<count($kerkim) ; $i++) { 
        $kusht_query.="kodi like '%".$kerkim[$i]."%' or emertimi like '%".$kerkim[$i]."%' or pershkrimi like '%".$kerkim[$i]."%'";
        if ($i!=count($kerkim)-1)
            $kusht_query.=" or ";
    }

    $limitSugjerimet=4;
    $query_kerkimi="SELECT * FROM lende WHERE $kusht_query ORDER BY emertimi LIMIT $limitSugjerimet";
    $result=mysqli_query($connection, $query_kerkimi);

    if (is_ajax_request()) {
        $sugjerimet=array();
        while($row=mysqli_fetch_assoc($result)){
            $sugjerimet[]=$row;
        }
        echo json_encode($sugjerimet);
    }
?>