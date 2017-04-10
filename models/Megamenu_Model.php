<?php

class Megamenu_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	public function getCategory(){
        $sql = "SELECT cat_id, cat_name FROM categories";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function getPage(){
		$sql = "SELECT pid, page_name FROM pages";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function getMegamenu(){
		$sql = "SELECT * FROM megamenu";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function getMegaCategory($id){
		$sql = "SELECT cat_id, cat_name FROM categories where cat_id='".$id."'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function getMegaPage($id){
		$sql = "SELECT pid, page_name FROM pages where pid='".$id."'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function deleteMegamenu($id){
		/*$sql = "SELECT * FROM megamenu WHERE megamenu_parent='".$id."'";
		$query = $this->db->query($sql);
		return $query->result();*/
	
		$this->db->where('megamenu_id', $id);
		$this->db->delete("megamenu");
        return true;
	    
	}
	
	public function getMegamenuEdit($id){
		$sql = "SELECT * FROM megamenu where megamenu_id='".$id."'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function insertMegamenu($data){
		$this->db->insert("megamenu", $data);
        return true;
	}

	public function updateMegamenu($data, $id){
		$this->db->where('megamenu_id', $id);
		$this->db->update("megamenu", $data);
        return true;
	}

	

}

?>