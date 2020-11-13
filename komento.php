<?php
require 'includes/connection.php';
//nuk funksionon mire ky funksioni
$obj_perdorues=new Perdorues($connection, $_SESSION['id_perdorues']);

function is_ajax_request() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest';
  }


  $id_posti=$_POST['id_post'];//inputi i tipit hidden
  $permbajtja=$_POST['komenti'];//heq taget
  $data=date("Y-m-d H:i:s");

  $result=$obj_perdorues->shtoKoment($id_posti, $permbajtja, $data);
    if(!$result){
        echo "";
        exit;
    } 

    $query="SELECT * FROM koment WHERE data='$data' AND id_postues='".$obj_perdorues->getID()."'";
    $result=mysqli_query($connection, $query);
    $komenti=new Koment(mysqli_fetch_assoc($result));

    if(is_ajax_request()){
        $id_komentues=$obj_perdorues->getFullName();
        $result_array=array("permbajtja"=>$komenti->getPermbajtja(), "data"=>$komenti->getFormatedData(), "emriPlote"=>$obj_perdorues->getFullName());
        echo json_encode($result_array);
    }

?>