<!-- GLOBAL LAYOUT MANAGER -->
<?php include('../application.php'); ?>
<!-- HEADER -->
<?php include('../components/header.php'); ?>
<!-- NAV    -->
<?php include('../components/nav.php'); ?>

<?php

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
  $sql = "SELECT * FROM users WHERE userId = ".$_GET['id'].";";
  $result = mysqli_query($database, $sql);
  // for each post found
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $username = $row['username'];
        $avatar   = $row['avatar'];
        $description = $row['description'];
        $admin = $row['admin'];
        $moderator = $row['moderator'];
    }
    
    echo '<div class="small-12 columns">
            <div class="panel">
                <div class="row">
                    <center><h2>
                    '.$username.'s profile</center></h2>
                </div>
                
            </div>
        </div>
        
        
        <div class="small-12 columns">
            <div class="panel">
                <div class="row">
                    Bio: '.$description.'</br>
                </div>
                
            </div>
        </div>';
        
?>

<!-- FOOTER -->
<?php echo get_content('../components/footer.php'); ?>