<!-- Footer -->

<footer class="footer">

  <div class="row full-width">

    <div class="small-12 medium-3 large-4 columns">

      <i class="fi-laptop"></i>

      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum maiores alias ea sunt facilis impedit fuga dignissimos illo quaerat iure in nobis id quos, eaque nostrum! Unde, voluptates suscipit repudiandae!</p>

    </div>

    <div class="small-12 medium-3 large-4 columns">

      <i class="fi-html5"></i>

      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit impedit consequuntur at! Amet sed itaque nostrum, distinctio eveniet odio, id ipsam fuga quam minima cumque nobis veniam voluptates deserunt!</p>

    </div>

    <div class="small-6 medium-3 large-2 columns">

      <h4>About</h4>

      <ul class="footer-links">

        <li><a href="#">FAQ</a></li>

      <ul>

    </div>

    <div class="small-6 medium-3 large-2 columns">

      <h4>Follow Us</h4>

      <ul class="footer-links">

        <li><a href="#">Social Link #1</a></li>

      <ul>

    </div>

  </div>

</footer>

      <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
      <script src="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
      <script>
         $(document).foundation();
         $(window).bind("load", function () {
		    var footer = $("#footer");
		    var pos = footer.position();
		    var height = $(window).height();
		    height = height - pos.top;
		    height = height - footer.height();
		    if (height > 0) {
		        footer.css({
		            'margin-top': height + 'px'
		        });
		    }
		});
      </script>
   </body>
</html>

