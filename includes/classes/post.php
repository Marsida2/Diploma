<?php

class Post {
	use FormatimDATE;
	private $post;

	function __construct($post){
		$this->post=$post;
	}

	public function getIdPost(){
		return $this->post['id_post'];
	}

	public function getTitulli(){
		return $this->post['titulli'];
	}

	public function getPermbajtja(){
		return $this->post['permbajtja'];
	}

	public function getData(){
		return $this->post['data'];
	}
	public function getKodLende(){
		return $this->post['kod_lende'];
	}

	public function getPostues(){
		return $this->post['id_postues'];
	}	

	public function kaFoto(){
		return $this->getUpload()!="";
	}
	public function getUpload(){
		return $this->post['upload'];
	}

	public function getFormatedData(){
		return $this->formatoDaten($this->getData());
	}

}

?>