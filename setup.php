<!-- GLOBAL LAYOUT MANAGER -->
<?php include('application.php'); ?>
<!-- HEADER -->
<?php echo get_content('components/header.php'); ?>
<!-- NAV    -->
<?php echo get_content('components/nav.php'); ?>

<div class="row">
    <div class="small-12 columns">
        <form>
          <fieldset class="panel">
            <center>
              <h1>Initial Configuration</h1><br>
            </center>

            <hr>
            <p>IMPORTANT: This installer will create a configuration file, "config.php" at the root directory of your installation.</p>
            <hr>

            <h5>MySQL Configuration</h5>
            <label>
              <input type="text" id="username" placeholder="MySQL Username">
            </label>
            <label>
              <input type="password" id="password" placeholder="MySQL Password">
            </label>

            <h5>Forum Admin</h5>
            <label>
              <input type="text" id="username" placeholder="Admin Username">
            </label>
            <label>
              <input type="password" id="password" placeholder="Admin Password">
            </label>
            <label>
              <input type="password" id="password" placeholder="Admin Password (Repeat)">
            </label>

            <h5>Global Variables</h5>
            <label>
              <input type="text" id="forumname" placeholder="Forum Name">
            </label>


            <center>
                <a href="#" type="submit" class="button">Configure Forum</a>
            </center>
          </fieldset>
        </form>
    </div>
</div>

<!-- FOOTER -->
<?php echo get_content('components/footer.php'); ?>