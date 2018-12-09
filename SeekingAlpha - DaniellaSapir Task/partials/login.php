<?php
//check whether Login form is sumitted and POST request sent 
if(isset($_POST['uname'])) {
  //find the user from the DB (sanitate and connect)
  $username = DB::escape($_POST['uname']);
  //fetch the received row as an array(results set):  
  $rs = DB::query("SELECT id FROM users where name='{$username}'");
  
  //var_dump(mysqli_error(DB::$c))
  //found current user id
  $row = mysqli_fetch_assoc($rs);
  //set the cookie to the current user
  $cookie_value = $row['id'];
  setcookie(COOKIE_NAME, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
  //redirect
  header('Location: index.php'); 
  die;
} 
?>

<div class="container">
    <div class="jumbotron">
      <h2 class="display-3">User Login - Please enter your name</h2>
      <p class="lead">Advanced Followers Manager</p>
      <hr class="my-4">
      <p class="lead">
        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;text-align:center;">Login</button>
      </p>
    </div>
</div>

<!-- LOGIN MODAL -->
<div id="id01" class="modal">
  <form class="modal-content animate center-form" action="#" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/kipod.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>



