<!-- GLOBAL LAYOUT MANAGER -->
<?php include('../application.php'); ?>
<!-- HEADER -->
<?php echo get_content('../components/header.php'); ?>
<!-- NAV    -->
<?php echo '<script>var forumName = "'.$forumName.'";var userI</script>'; ?>
<?php session_start();
  if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) { echo get_content('../components/nav_user.php'); }
  else { echo get_content('../components/nav.php'); }
?>
umName.'";</script>'; ?>
<?php echo get_content('../components/nav.php'); ?>

<div class="row">
    <div class="small-12 columns">
        <form>
          <fieldset class="panel">
            <center>
              <h1>Sign Up</h1><br>
            </center>
            <label>
              <input type="text" id="username" placeholder="Username">
            </label>
            <label>
              <input type="text" id="email" placeholder="Email">
            </label>
            <label>
              <input type="password" id="password" placeholder="Password">
            </label>
            <center>
                <a href="#" type="submit" class="button">Sign In</a>
            </center>
          </fieldset>
        </form>
    </div>
</div>

<!-- FOOTER -->
<?php echo get_content('../components/footer.php'); ?>