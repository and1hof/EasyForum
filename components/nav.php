<?php 
  session_start();
  if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
  {
      include('nav_user.php');
  } else { include('nav_guest.php'); }
?>