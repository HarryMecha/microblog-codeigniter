<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

//The index of this controller checks to see if the user is logged in or not by checking the session data if they are it will take them to the post view otherwise it will take them to the login view
public function index(){
 $username = $this->session->userdata('username');
 if($username != null){
 
 $this->load->view('Post'); 
 }else{
 $this->load->view('Login');
 }
}

//The doPost function will post whatever is in the input box in the post view to the database using the insertMessage taking the current user from the session data and the text input.
public function doPost(){
$this->load->helper('url');
$username = $this->session->userdata('username');
 if($username != null){
 $poster = $this->session->userdata('username');
 $string = $this->input->post('message');
 $this->load->model('Messages_model');
 $this->Messages_model->insertMessage($poster,$string);
 redirect('/user/view/' . $poster);
 }else{
 //$this->load->view('Login');
 }

}

}
