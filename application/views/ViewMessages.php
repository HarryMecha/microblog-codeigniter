<!DOCTYPE html>
<html>
<style>
body {
  margin: 0;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 250px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li #LogoutButton {
display: block;
 position: absolute;
  bottom: 0;

  padding: 8px 16px;
  ver
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #04AA6D;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}

li b:hover:not(.active) {
  background-color: #555;
  color: white;
}
</style>
<body>
 <!-- This code sets up each one of the elements in the contents bar, each acts like a button and when clicked redirects to a different page-->
<ul>

  <li><a class="active" href="#home">Logged in as: <?php echo $this->session->userdata('username')?></a></li> 
  
  <li> 
  <!-- This php code check if the current user is following user being accessed using the followboolean from the viewmessage function, it will display the list element if they are not following them -->
  <?php
  
  if ($followBool == false) : ?>
  <a  href="/proj/comp5390/microblog/hm474/index.php/User/follow/<?php echo $currentName ?><?php $username?>" >Follow</a> 
  <?php endif; ?>
  </li>
  <li><a id="SearchButton" href="/proj/comp5390/microblog/hm474/index.php/search" >Search</a></li> 
  <li><a href="/proj/comp5390/microblog/hm474/index.php/message">Post</a></li>
   <li><a href="/proj/comp5390/microblog/hm474/index.php/user/feed/<?php echo $this->session->userdata('username')?>">My Feed</a></li>
  <li><a id="LogoutButton" href="/proj/comp5390/microblog/hm474/index.php/user/logout">Logout</a></li>
</ul>
<div style="margin-left:250px;padding:1px 16px;height:1000px;">
<!-- This table takes the inputs from the SQL query made in the viewmessage function that was made into an array creating a new table column for each row of the database, this allows the user to see a variety of messages-->
 <table>
                <?php foreach ($results as $row) { ?>
                <tr>
                    <td class="column-1"><?php echo $row['user_username']; ?></td>
                    <td class="column-2"><?php echo $row['text']; ?></td>
                    <td class="column-3"><?php echo $row['posted_at']; ?></td>
                </tr>
                <?php } ?>
            </table>
</html>
