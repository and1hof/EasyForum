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
  $sql = "SELECT * FROM threads WHERE threadId = ".$_GET['id'].";";
  $result = mysqli_query($database, $sql);
  // for each post found
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $dateCreated = $row['dateCreated'];
    $likes       = $row['likes'];
    $threadId    = $row['threadId'];
    $title       = $row['title'];
    $content     = $row['content'];
    }
    
    echo '<div class="small-12 columns">
            <div class="panel">
                <div class="row">
                    <div class="small-2 columns">
                        <a class="th"><img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQLY7QoREZq_D68DE1dJF4g178hIxNW2fve63bsaiH79vMmy58KyMPhVA"  height="100%" width="100%"/></a>
                    </div>
                    <div class="small-10 columns">
                        <h5><a href="/user?id=25">Author</a> | '.$dateCreated.'</h5>
                        <p>'.$content.'</p>
                    </div>
                </div>
                
            </div>
        </div>'; ?>
        
  <?php
  $sql = "SELECT * FROM threadComments WHERE threadId = ".$_GET['id'].";";
  $result = mysqli_query($database, $sql);
  // for each post found
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo '
      <div class="row">
        <div class="small-12 columns">
            
          <div class="panel">
          '.$row['content'].'
        </div>
        </div>
      </div>
    ';
    }
        
?>

<?php
  $button = "";
  if ($_SESSION['signed_in']) {
    $button = '<center>
                <a href="/new_comment?id='.$_GET['id'].'"><button>New Comment</button></a>
              </center>';
  }
echo $button;
?>

<!-- FOOTER -->
<?php echo get_content('../components/footer.php'); ?>