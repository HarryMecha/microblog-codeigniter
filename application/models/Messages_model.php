<?php 
class Messages_model extends CI_Model {
	public function __construct() { $this->load->database(); }
 
 //Returns all the messages posted by a user with the specified username ordered by date.
	public function getMessagesByPoster($name) {
	  $sql = "SELECT * FROM Messages WHERE user_username = ? ORDER BY posted_at DESC";
        $query = $this->db->query($sql, array($name));
        return $query->result_array();
  }

  //Returns all the messages that contain a specified string.
 public function searchMessages($string) {
	  $sql = "SELECT * FROM Messages WHERE text LIKE ? ORDER BY posted_at DESC";
        $query = $this->db->query($sql, array('%'.$string.'%'));
        return $query->result_array();
  }

  //This will insert a message into the database inputting the users name, given text and the current time value at which it was posted.
  public function insertMessage($name,$string){
  $sql = "INSERT INTO Messages (user_username, text, posted_at) VALUES (?, ?, CURRENT_TIMESTAMP())";
        $this->db->query($sql, array($name, $string));
  }

  //This will return all the messages sent by users following the user that is logged in.
  public function getFollowedMessages($name){
  $sql = "SELECT * FROM Messages WHERE user_username = ANY (SELECT followed_username FROM User_Follows WHERE follower_username = ?) ORDER BY posted_at DESC";
        $query = $this->db->query($sql, array($name));
        return $query->result_array();

  }

}
