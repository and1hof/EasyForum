<!-- GLOBAL LAYOUT MANAGER -->
<?php include('application.php'); ?>


<!-- HEADER -->
<?php echo get_content('components/header.php'); ?>
<!-- NAV    -->
<?php echo get_content('components/nav.php'); ?>


<div class="callout large primary">
   <div class="row column text-center">
      <h1>EasyForum</h1>
      <h2 class="subheader">Curated Web Forum</h2>
   </div>
</div>


<div class="row">

      <div class="medium-6 large-4 columns">
        <article class="post-card">
          <div class="card-content">
            <img class="post-icon" src="http://placehold.it/125x125" alt="foundation icon">
            <p class="post-author">By <a href="#">Username</a></p>
            <h4>Title</h4>
            <p>Teaser Text</p>
            <p>
              <a href="#">View Post...</a> 
            </p>
          </div>
      </div>
      </article>

</div>

<!-- FOOTER -->
<?php echo get_content('components/footer.php'); ?>