<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
//This function will just display the search view when it's typed into the search bar
	 public function index(){
	 $this->load->view('Search');

	 }

	 //The doSearch function will get the text input into the search box on the search view and will then query the database to find any messages containing that word, it will then display the messages it finds.
	public function doSearch()
	{
	$this->load->model('Messages_model');
	$string = $_GET['search'];
	$data = $this->Messages_model->searchMessages($string);
	$viewData = array("results" => $data,"followBool"=>false,"currentName"=>$string);
    $this->load->view('ViewMessages', $viewData);
	}
}
