
<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="/"><?php echo $forumName ?></a></h1>
    </li>
  </ul>
  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
      <li><a href="/sign_out.php">Sign Out</a></li>
    </ul>
    <ul class="right">
      <li><a href="../edit/index.php">Edit Profile</a></li>
    </ul>
    <?php
      $curid = $_SESSION['userId']; 
      if($curid == 1) {
        echo 
        '<ul class="right">
          <li><a href="../destroy/index.php">Master Exploder</a></li>
         </ul>'; 
      }
    
    ?>
  </section>
  
</nav>
 <!-- Open Container -->
 <div class="container">