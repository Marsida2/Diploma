<?php

trait NgarkimFILE {
	public function ngarkoFoto($fileUploaded, $folderiTarget){
		echo "u thirr ngarkofoto trait";
		$uploaded=$fileUploaded['name'];//marrim emrin e fotos me prapashtesen(.png/.jpg...)
		if($uploaded!= ""){
			$imageFileType=pathinfo($uploaded,PATHINFO_EXTENSION);
	 		if (strtolower($imageFileType)!="jpeg" && strtolower($imageFileType)!="jpg" && strtolower($imageFileType)!="png")//formati i fotos eshte i pasuportueshem
		 		$uploaded="";
		 	else {
		 		$uploaded=uniqid().basename($uploaded); 
		 	//uniqid() i shtonte emrit te fotos nje id prej 12 shifrash me duket qe jane unike qe mos perseriten emrat e fotove
				if (!move_uploaded_file($fileUploaded['tmp_name'], $folderiTarget.basename($uploaded)))
					$uploaded="";
			}
		}
		return $uploaded;//kthen emrin e ri te fotos
	}

	public function ngarkoDokument($file, $folderiTarget){
		$fileName=$file['name'];//marrim emrin e dokumentit me prapashtese
		if($fileName!= ""){
			if (!move_uploaded_file($file['tmp_name'], $folderiTarget.basename($fileName)))
				echo "Deshtoi uplodimi i dokumentit!";
				//throw new Exception("Error Processing Request", 1);
			}
		return $fileName;	
	}


	public function ngarkoDetyre(){
		//mund te jete e njejta me ate lart
	}

}
?>