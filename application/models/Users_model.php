<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
//This loads the database.
public function __construct() { $this->load->database(); }

//This function takes a username and password input, then queries the database to find the username that matches the input one, hashes the password and checks those together returning true if they both match.
public function checkLogin($username,$password){
$sql = "SELECT username,password FROM Users";
$query = $this->db->query($sql);
$logins = $query->result_array();
$this->load->helper('security');
$hashedpass = do_hash($password,'sha1');
foreach($logins as $row){
	if($row['username']==$username){
	if($row['password']==$hashedpass){
	return true;
	}
	}
}
return false;
}

//This function take the username of the user currently logged in and check whether the user they've followed the user they are viewing by querying the database, if they have it will return true and if not it will return false
//This will decide whether the follow button will show up or not.
public function isFollowing($follower,$followed){
$sql = "SELECT followed_username FROM User_Follows WHERE follower_username LIKE ?";
$query = $this->db->query($sql, array($follower));
$follow = $query->result_array();
foreach($follow as $row){
	if($row['followed_username']==$followed){
	return true;
	}	
}
if($followed == $this->session->userdata('username')){
	return true;
}
return false;
}

//This function will insert a row into the userfollows database using the user the user is viewing's username and their own username to confirm they are now following them.
public function follow($followed){
$follower =$this->session->userdata('username');
$sql = "INSERT INTO User_Follows (follower_username,followed_username) VALUES (?, ?)";
        $this->db->query($sql, array($follower, $followed));
		 redirect('/user/view/' . $followed);
  }
}






