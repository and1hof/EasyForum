<!-- end container -->
</div>
<footer class="footer" id="footer">
  <div class="row full-width">
    <a href="/">Home</a>
  </div>
</footer>
      <!-- SCRIPTS -->
      <script src="js/jquery.js"></script>
      <script src="js/foundation.js"></script>
      
      <script type="text/javascript">

        $(document).ready(function(){
            $(document).foundation();
        });

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

