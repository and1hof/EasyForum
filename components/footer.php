<!-- Footer -->

<footer class="footer">

  <div class="row full-width">
    I am the footer.
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

