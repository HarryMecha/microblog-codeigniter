<!DOCTYPE html>
<html lang="en">
<head>
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
</style>
<body>
 <!-- This code sets up each one of the elements in the contents bar, each acts like a button and when clicked redirects to a different page-->
<ul>
  <li><a class="active" href="#home">Login</a></li>
</ul>

<div style="margin-left:250px;padding:1px 16px;height:1000px;">

<h2>Login</h2>

<div class="container">
<!-- This code contains each of the input box's and buttons required to sign in, these values are used in the doLogin function when the button is clicked -->
<form action="/proj/comp5390/microblog/hm474/index.php/User/doLogin" method="POST">
    <label for="uname"><b>Username</b></label>
    <input class="username" placeholder="Username" type="username" name="username"><br> 
    <label for="psw"><b>Password</b></label>
<input class="password" placeholder="Password" type="password" name="password"><br> 
<input class="submit-button" type="submit" value="Login">
   </form> 
  </div>
  </div>
  </body>
</html>
