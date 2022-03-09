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
  <li><a  href="/proj/comp5390/microblog/hm474/index.php/user/view/<?php echo $this->session->userdata('username')?>">Logged in as: <?php echo $this->session->userdata('username')?></a></li>
  <li><a class="active" id="SearchButton" href="/proj/comp5390/microblog/hm474/index.php/search" >Search</a></li>
  <li><a href="/proj/comp5390/microblog/hm474/index.php/Message">Post</a></li>
   <li><a href="/proj/comp5390/microblog/hm474/index.php/user/feed/<?php echo $this->session->userdata('username')?>">My Feed</a></li>
  <li><a id="LogoutButton" href="user/logout">Logout</a></li>
</ul>

<div style="margin-left:250px;padding:1px 16px;height:1000px;">
<h2>Search<h2>
<!-- This sets up the form giving an input box for the user to input text that they want to search this is then sent to the doSearch fucntion-->
 <form action="/proj/comp5390/microblog/hm474/index.php/search/doSearch" method="GET">
<input class="input-box" placeholder="Search" type="text" name="search"><br> 
 <input class="submit-button" type="submit" value="Find">
</form>
</div>
</body> </html>
