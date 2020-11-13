<?php

trait FormatimDATE {
	public function formatoDaten($date) {
		$koha="";//variabli qe do te ruaje kohen e postimit te formatuar
		$data_start= new DateTime($date);
		$data_end= new DateTime(date("Y-m-d H:i:s"));
		$interval= $data_start->diff($data_end);
		if($interval->y>=1){
			if($interval==1)
				$koha=$interval->y." vit";
			else $koha=$interval->y." vite";
		}
		else if ($interval->m>=1){
			if($interval->d==0)
				$dite="";
			else $dite=$interval->d." ditë";

			$koha=$interval->m." muaj ".$dite;
		}
		else if ($interval->d >=1){
			if($interval->d==1)
				$koha="dje";
			else $koha=$interval->d." ditë";
		}
		else if ($interval->h >=1)
			$koha=$interval->h." orë";
		else if ($interval->i >=1){
			if($interval->i==1)
				$koha="1 minut";
			else $koha=$interval->i." minuta";
		}
		else {
			if($interval->s<=30)
				$koha="tani";
			else $koha=$interval->s." sekonda";
		}
		return $koha;
  	}
}
?>