<!-- GLOBAL LAYOUT MANAGER -->
<?php include('../application.php'); ?>
<!-- HEADER -->
<?php echo get_content('../components/header.php'); ?>
<!-- NAV    -->
<?php echo get_content('../components/nav.php'); ?>

<div class="callout large primary">
   <div class="row column text-center">
      <h1>Sign Up</h1>
   </div>
</div>

<div class="large-3 large-centered columns">
  <div class="login-box">
  <div class="row">
  <div class="large-12 columns">
    <form>
        
       <div class="row">
         <div class="large-12 columns">
             <input type="text" name="username" placeholder="Username" />
         </div>
       </div>
       
      <div class="row">
         <div class="large-12 columns">
             <input type="text" name="email" placeholder="Email" />
         </div>
      </div>
      
      <div class="row">
         <div class="large-12 columns">
             <input type="password" name="password" placeholder="Password" />
         </div>
      </div>
      
      <div class="row">
        <div class="large-12 large-centered columns">
          <input type="submit" class="button expand" value="Sign Up"/>
        </div>
      </div>
      
    </form>
    
  </div>
</div>
</div>
</div>

<!-- FOOTER -->
<?php echo get_content('../components/footer.php'); ?>