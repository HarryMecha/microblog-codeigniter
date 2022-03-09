<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 //This will display the login view
	public function login(){
	 $this->load->view('Login');
	 }

	 //If the user is logged in it will log them out, clearing their current session.
	 public function logout(){
	  $sessionData = array('username', 'logged_in');
        $this->session->unset_userdata($sessionData);
        $this->load->view('Login');
	 }

	 //The view function allows the user to both check if they are following a specific user, specified by the $name variable, which will return a boolean that will make the follow button visible or invisible depending, and also allow
	 //the user to view any post that a specific user has sent by using the getMessagesByPoster function again using the $name varibale.
	public function view($name)
	{
	$username = $this->session->userdata('username');
	$this->load->model('Users_model');
	$followBool = $this->Users_model->isFollowing($username,$name);
	if($name==null){$this->load->view('Search');}else{
	$this->load->model('Messages_model');
	$data = $this->Messages_model->getMessagesByPoster($name);
	$viewData = array("results" => $data,"followBool"=>$followBool,"currentName"=>$name);
	$this->load->view('ViewMessages', $viewData);
	} 
	}
	
	//This function loads Users_model and calls the checklogin function to check the inputted username and password against the database, if it comes back false it will return them to the login screen and if it comes back true it
	//will then take them back to the corresponding view page to see their messages.
	 public function doLogin(){
	 $username = $this->input->post('username');
     $password = $this->input->post('password');
	 $this->load->model('Users_model');
	 $loginSuccess = $this->Users_model->checkLogin($username,$password);
	 if($loginSuccess == false){
	 $this->load->view('Login');
	 }
	 if($loginSuccess == true){
	 $this->session->set_userdata('username', $username);
	 $username = $this->session->userdata('username');
	 $this->view($username);
	 }
	}

	//This function allows the user to follow certain users when viewing their messages when the follow button is clicked, ammending the data in the database.
	public function follow($followed){
		$this->load->model('Users_model');
		$data = $this->Users_model->follow($followed);
	$viewData = array("results" => $data);
	$this->load->view('ViewMessages', $viewData);
	}

	//The feed function uses the isFollowing function to get all the users following the logged in user and then display all their messages with the getFollowedMessages method using $name as the input.
	public function feed($name){
	$username = $this->session->userdata('username');
	$this->load->model('Users_model');
	$followBool = $this->Users_model->isFollowing($username,$name);
	$this->load->model('Messages_model');
	$data = $this->Messages_model->getFollowedMessages($name);
	$viewData = array("results" => $data,"followBool"=>$followBool,"currentName"=>$name);
	$this->load->view('ViewMessages', $viewData);

	}

}
