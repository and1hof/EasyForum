<!-- GLOBAL LAYOUT MANAGER -->
<?php include('../application.php'); ?>
<!-- HEADER -->
<?php echo get_content('../components/header.php'); ?>
<!-- NAV    -->
<?php echo '<script>var forumName = "'.$forumName.'";</script>'; ?>
<?php echo get_content('../components/nav.php'); ?>

<?php
  // first, check if the user is already signed in.
  session_start();
  if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
  {
      echo 'ERROR: You are already signed in!';
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
                <input type="text"  name="name" placeholder="Username">
              </label>
              <label>
                <input type="password" name="password" placeholder="Password">
              </label>
              <label>
                <input type="password"  name="confirmPassword" placeholder="Confirm Password">
              </label>
              <label>
                <input type="text"  name="email" placeholder="Email">
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
  //$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
  
  // insert code here, $database works

$name=(isset($_POST['name'])) ? $_POST['name'] : '';
$password=(isset($_POST['password'])) ? $_POST['password'] : '';
$confirmPassword=(isset($_POST['confirmPassword'])) ? $_POST['confirmPassword'] : '';
$email=(isset($_POST['email'])) ? $_POST['email'] : '';
$usernum = 0;
$passwordxx = sha1($password);
$query = "SELECT username FROM users WHERE username = '$name'";
$result = $database->query($query);
$row = $result->fetch_array(MYSQL_NUM);
if(!empty($row) || empty($name)) {
  echo "that name is not available!";
	die;
} else if($password != $confirmPassword || empty($password)) {
  echo "please confirm passwords match and are set!";
  die;
} else if(!preg_match('^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$^', $email)) {
  echo "that is an invalid email";
	die;
}
$cmd = "INSERT INTO users
  	VALUES('".$usernum."', '".$name."', '".$passwordxx."', '".$email."', '', '', 0, 0)";  
$stmt = $database->prepare($cmd);
if($stmt->execute()) {
	echo $database->affected_rows." successfull insert into the database";
} else {
	echo "wasn't able to connect to the database";
	die;
}
$stmt->close();
$database->close();

}

?>
<!-- FOOTER -->
<?php echo get_content('../components/footer.php'); ?>