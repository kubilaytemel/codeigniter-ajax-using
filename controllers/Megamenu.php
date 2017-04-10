<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Megamenu extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("admin/Megamenu_Model");
		$this->load->helper('url');
		$this->load->library("pagination");

	}

	public function index(){
		$data["title"] = "Giriş";

		$data["veri"] = $this->Megamenu_Model->getCategory();
		$data["page_data"] = $this->Megamenu_Model->getPage();
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/megamenu/list',$data);
		$this->load->view('admin/footer');
	}

	public function getAjax(){
		$data["megamenu_item"] = $this->Megamenu_Model->getMegamenu();
		$this->load->view('admin/megamenu/ajax',$data);
	}


	public function insertMegamenu(){
			if($this->input->post('katid') == 0){ $catid=0;}else{$catid = $this->input->post('katid');}
			if($this->input->post('pageid')== 0){ $pageid=0;}else{$pageid = $this->input->post('pageid');}
			$data = array(
                'megamenu_name' =>  $this->input->post('modad'),
                'megamenu_html' => $this->input->post('htmlack'),
                'megamenu_cat' => $this->input->post('katid'),
                'megamenu_page' => $this->input->post('pageid'),
                'megamenu_statu' => $this->input->post('statu'),
                'megamenu_number' => $this->input->post('modsira'),
                'megamenu_type' => $this->input->post('pk')
                
            );
            print_r($data);
            $this->Megamenu_Model->insertMegamenu($data);
	}


	public function delete($id){
		 //Silme işlemi gerçekleşti ve ajax verisi döndürüldü
		$a = $this->Megamenu_Model->deleteMegamenu($id);
		if($a==true){ echo json_encode($a);}else{ return false;}
	}



	public function edit($id){
		$data["title"] = "Bilgileriniz Güncelleyeniz";
		$data["cat_data"] = $this->Megamenu_Model->getCategory();
		$data["page_data"] = $this->Megamenu_Model->getPage();
		$data["veri"] = $this->Megamenu_Model->getMegamenuEdit($id);
		
		foreach ($data["veri"] as $key) { $catid = $key->megamenu_cat; }

		$data["cat_veri"]= $this->Megamenu_Model->getMegaCategory($catid);

		foreach ($data["veri"] as $key) { $pageid = $key->megamenu_page; }
		$data["page_veri"]= $this->Megamenu_Model->getMegaPage($pageid);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/megamenu/edit',$data);
		$this->load->view('admin/footer');

	}

	public function editMegamenu(){
			if($this->input->post('katid') == 0){ $catid=0;}else{$catid = $this->input->post('katid');}
			if($this->input->post('pageid')== 0){ $pageid=0;}else{$pageid = $this->input->post('pageid');}
			$id = $catid = $this->input->post('mid');
			$data = array(
                'megamenu_name' =>  $this->input->post('modad'),
                'megamenu_html' => $this->input->post('htmlack'),
                'megamenu_cat' => $this->input->post('katid'),
                'megamenu_page' => $this->input->post('pageid'),
                'megamenu_statu' => $this->input->post('statu'),
                'megamenu_number' => $this->input->post('modsira'),
                'megamenu_type' => $this->input->post('pk')
                
            );
            print_r($data);
            $this->Megamenu_Model->updateMegamenu($data, $id);
	}

	public function getData(){
		//$data["title"] = "Kategoriler";
		//$result = $this->Category_Model->getCategory();
		//echo json_encode($result);

		$query = $this->db->select("*")
	              ->from('categories')
	              ->get();
		$data["veri"] = $query->result();

		print_r(json_encode($data["veri"]));

		//echo json_encode($data);
	}

}