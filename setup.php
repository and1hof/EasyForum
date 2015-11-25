<!-- GLOBAL LAYOUT MANAGER -->
<?php include('application.php'); ?>
<!-- HEADER -->
<?php echo get_content('components/header.php'); ?>
<!-- NAV    -->
<?php echo get_content('components/nav.php'); ?>

<div class="row">
    <div class="small-12 columns">
        <form action="installer.php" method="post">
          <fieldset class="panel">
            <center>
              <h1>Initial Configuration</h1><br>
            </center>

            <hr>
            <p>IMPORTANT: This installer will create a configuration file, "config.php" at the root directory of your installation.</p>
            <hr>

              <h5>MySQL Configuration</h5>
              <label>
                <input type="text" name="mysqlUsername" placeholder="MySQL Username">
              </label>
              <label>
                <input type="password" name="mysqlPassword" placeholder="MySQL Password">
              </label>

              <h5>Forum Admin</h5>
              <label>
                <input type="text" name="adminUsername" placeholder="Admin Username">
              </label>
              <label>
                <input type="password" name="adminPassword" placeholder="Admin Password">
              </label>
              <label>
                <input type="password" name="adminPassword2" placeholder="Admin Password (Repeat)">
              </label>

              <h5>Global Variables</h5>
              <label>
                <input type="text" name="forumName" placeholder="Forum Name">
              </label>


              <center>
                  <input type="submit" class="button">
              </center>
            </fieldset>
        </form>
    </div>
</div>

<!-- FOOTER -->
<?php echo get_content('components/footer.php'); ?>