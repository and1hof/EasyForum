<!-- end container -->
</div>
<footer class="footer" id="footer">
  <div class="row full-width">
    <p><a href="#">ABOUT</a> | <a href="#">TOS</a> | <a href="#">PRIVACY</a> | <a href="#">FAQ</a> | <a href="#">CONTACT</a></p>
  </div>
</footer>
      <!-- SCRIPTS -->
      <script src="/js/jquery.js"></script>
      <script src="/js/foundation.js"></script>
      
      <script type="text/javascript">

        $(document).ready(function(){
            $(document).foundation();
        });

        $(window).bind("load", function () {
		    var footer = $("#footer");
		    var pos = footer.position();
		    var height = $(window).height();
		    height = height - pos.top + 45; // offset for linux systems
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

