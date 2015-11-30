<!-- GLOBAL LAYOUT MANAGER -->
<?php include('../application.php'); ?>
<!-- HEADER -->
<?php echo get_content('../components/header.php'); ?>
<!-- NAV    -->
<?php echo '<script>var forumName = "'.$forumName.'";</script>'; ?>
<?php echo get_content('../components/nav.php'); ?>

<?php
  // first, check if the user is already signed in.
  if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
  {
      echo 'You are already signed in, you can <a href="signout.php">sign out</a> if you want.';
  }
?>

<?php if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  echo'
  <div class="row">
      <div class="small-12 columns">
          <form method="post" action="">
            <fieldset class="panel">
              <center>
                <h1>Sign In</h1><br>
              </center>
              <label>
                <input type="text" id="username" name="username" placeholder="Username">
              </label>
              <label>
                <input type="password" id="password" name="password" placeholder="Password">
              </label>
              <center>
                  <input type="submit" class="button" value="Sign In">
              </center>
            </fieldset>
          </form>
      </div>
  </div>';
} else {
  // the user has already filled out the form.
  // pull in database info from config.php
  $servername = getenv('IP');
  $username   = $mysqlUsername;
  $password   = $mysqlPassword;
  $database   = $mysqlDB;
  $dbport     = $mysqlPort;
  $database = new mysqli($servername, $username, $password, $database, $dbport);
  if ($database->connect_error) {
    echo "ERROR: Failed to connect to MySQL";
	die;
  }
  $sql = "SELECT userId, username, admin, moderator FROM users WHERE username = '".$_POST['username']."' AND password = '".sha1($_POST['password'])."';";
  $result = mysqli_query($database, $sql);
  //$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
  
  if (!$result) {
    echo 'ERROR: Sign in could not be proccessed. Try again later.';
  } else {
    if (sizeof(mysqli_fetch_array($result, MYSQLI_ASSOC)) == 0) {
      echo 'ERROR: Username / Password combo incorrect. Please try again.';
    } else {
      // set the sign in to true.
      session_start();
      $_SESSION['signed_in'] = true;

      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $_SESSION['userId']     = $row['userId'];
        $_SESSION['username']   = $row['username'];
        $_SESSION['admin']      = $row['admin'];
        $_SESSION['moderator']  = $row['moderator'];
      } // store some data about the user 
      echo 'Sign in successful,'.$_SESSION['username']."!";
    }
  }
}

?>
<!-- FOOTER -->
<?php echo get_content('../components/footer.php'); ?>