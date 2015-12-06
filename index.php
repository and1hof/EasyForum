<!-- GLOBAL LAYOUT MANAGER -->
<?php include('application.php'); ?>
<!-- HEADER -->
<?php include('components/header.php'); ?>
<!-- NAV    -->
<?php include('components/nav.php'); ?>

<?php if (!isSet($isConfigured) || $isConfigured != 'true') {
echo "<script>window.location='/setup.php';</script>";
} ?>

<div class="row">

    <div class="small-12 columns">
        <div class="icon-bar three-up">
          <a class="item">
            <i class="fi-home"></i>
            <label>Sort Newest</label>
          </a>
          <a class="item">
            <i class="fi-bookmark"></i>
             <label>Sort Popular</label>
          </a>
          <a class="item">
            <i class="fi-info"></i>
             <label>Sort Oldest</label>
          </a>
        </div>
    </div>
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
  $sql = "SELECT * FROM threads;";
  $result = mysqli_query($database, $sql);
  // for each post found
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $dateCreated = $row['dateCreated'];
    $likes       = $row['likes'];
    $threadId    = $row['threadId'];
    $title       = $row['title'];
    $content     = $row['content'];
    $id          = $row['userId'];
  $sql = "SELECT username FROM users WHERE userId = ".$id.";";
  $result2 = mysqli_query($database, $sql);
  while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
        $username     = $row['username'];
    } // store some data about the user
    
    echo '<div class="small-12 columns">
            <div class="panel">
                <div class="row">
                    <div class="small-2 columns">
                        <a class="th"><img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQLY7QoREZq_D68DE1dJF4g178hIxNW2fve63bsaiH79vMmy58KyMPhVA"  height="100%" width="100%"/></a>
                    </div>
                    <div class="small-10 columns">
                        <h5>'.$title.' | <a href="/user?id='.$id.'">'.$username.'</a> | '.$dateCreated.'</h5>
                        <p>'.$content.'<a href="/post?id='.$threadId.'"> ... Read More...</a></p>
                    </div>
                </div>
                
            </div>
        </div>';
  } 
  
?>
<center>
  <a href="/new_post"><button>New Post</button></a>
</center>
</div>

<!-- FOOTER -->
<?php echo get_content('components/footer.php'); ?>