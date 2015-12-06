<!-- GLOBAL LAYOUT MANAGER -->
<?php include('../application.php'); ?>
<!-- HEADER -->
<?php include('../components/header.php'); ?>
<!-- NAV    -->
<?php include('../components/nav.php'); ?>

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
                <h1>New Post</h1><br>
              </center>
              <label>
                <input type="text" id="title" name="title" placeholder="Post Title">
              </label>
              <label>
                <textarea type="text" id="content" name="content" placeholder="Post Body"></textarea>
              </label>
               <center>
                  <input type="submit" class="button" value="Create Post">
              </center>
            </div>

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
    $cmd = "INSERT INTO threads
        	VALUES('".date('Y-m-d H:i:s')."', 0, 0,'".$_POST['title']."', '".$_POST['content']."', '".$_SESSION['userId']."', null);"; 
    $database->query($cmd);
    echo "Post created!";
 
}

?>
<!-- FOOTER -->
<?php echo get_content('../components/footer.php'); ?>