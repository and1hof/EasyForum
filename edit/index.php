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
      //echo 'ERROR: You are already signed in!';
  }
?>

<?php if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  echo'
  <div class="row">
      <div class="small-12 columns">
          <form method="post" action="">
            <fieldset class="panel">
              <center>
                <h1>update bio</h1><br>
              </center>
              <label>
                <textarea name="bio" rows = "10" cols = "50" placeholder="Short Description(250 characters)"></textarea>
              </label>
              </center>
              <center>
                  <input type="submit" class="button" value="Update Bio">
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
    $myId = $_SESSION['userId'];
    $updatedBio = (isset($_POST['bio'])) ? $_POST['bio'] : '';
    $query = "UPDATE users SET description='$updatedBio' WHERE userId=$myId";
    if(!($result = $database->query($query))) {
        echo "unsuccessful update of bio!";  
    }
}

?>
<?php echo get_content('../components/footer.php'); ?>