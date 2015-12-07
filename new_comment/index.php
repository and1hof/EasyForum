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
  }
?>

<?php if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  echo'
  <div class="row">
      <div class="small-12 columns">
          <form method="post" action="">
            <fieldset class="panel">
              <center>
                <h1>Add Comment</h1><br>
              </center>
              <label>
                <textarea type="text" id="content" name="content" placeholder="Comment Body"></textarea>
              </label>
               <center>
                  <input type="submit" class="button" value="Add Comment">
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
  $pc =  $_POST['content'];
    $cmd = "INSERT INTO threadComments
        	VALUES(6, '".$pc."', 'title',".$_GET['id'].", ".$_SESSION['userId'].", '".date('Y-m-d H:i:s')."')";
    $database->query($cmd);
    echo "Comment Added!";
 
}

?>
<!-- FOOTER -->
<?php echo get_content('../components/footer.php'); ?>