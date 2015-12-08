<!-- GLOBAL LAYOUT MANAGER -->
<?php include('../application.php'); ?>
<!-- HEADER -->
<?php include('../components/header.php'); ?>
<!-- NAV    -->
<?php include('../components/nav.php'); ?>


<?php if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  echo'
  <div class="row">
      <div class="small-12 columns">
          <form method="post" action="">
            <fieldset class="panel">
              <center>
                <h1>Destroy your Forum?</h1><br>
              </center>
              <center>
                  <input type="submit" class="button" value="Yes">
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
    $db  = $mysqlDB;
    $dbport     = $mysqlPort;
    $database = new mysqli($servername, $username, $password, $db, $dbport);
    if ($database->connect_error) {
        echo "ERROR: Failed to connect to MySQL";
        die;
    }
    $query = "DROP DATABASE $db";
    if(!($result = $database->query($query))) {
        echo "unsuccessful deletion!";  
    } else {
        $config = "../config.php";
        $fh = fopen($config, 'w') or die("ERROR: config.php does not exist.");
        $label1         = "forumName";
        $label2         = "isConfigured";
        $label3         = "mysqlUsername";
        $label4         = "mysqlPassword";
        $label5         = "mysqlDB";
        $label6         = "mysqlPort";
        $configData = "
        <?php\n\n
            $$label1 = '';\n\n
            $$label2 = '';\n\n
            $$label3 = '';\n\n
            $$label4 = '';\n\n
            $$label5 = '';\n\n
            $$label6 = '';\n\n
        ?>";
        fwrite($fh, $configData);
        fclose($fh);
?>
<meta http-equiv="refresh" content="2;URL=../setup.php" />             
<?php        
    }
}
?>
?>
<?php echo get_content('../components/footer.php'); ?>