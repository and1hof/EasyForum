<!-- GLOBAL LAYOUT MANAGER -->
<?php include('application.php'); ?>
<!-- HEADER -->
<?php echo get_content('components/header.php'); ?>
<!-- NAV    -->
<?php echo get_content('components/nav.php'); ?>





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
    

        <div class="small-12 columns">
            <div class="panel">
                <div class="row">
                    <div class="small-2 columns">
                        <a class="th"><img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQLY7QoREZq_D68DE1dJF4g178hIxNW2fve63bsaiH79vMmy58KyMPhVA"  height="100%" width="100%"/></a>
                    </div>
                    <div class="small-10 columns">
                        <h5><a href="/user?id=25">Author</a></h5>
                        <p>Teaser Text<a href="/post?id=25"> ... Read More...</a></p>
                    </div>
                </div>
                
            </div>
        </div>

</div>

<!-- FOOTER -->
<?php echo get_content('components/footer.php'); ?>