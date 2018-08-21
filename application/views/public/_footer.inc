</div> <!-- END .content-wrapper -->

<div id="footer-wrapper"> <!-- BEGIN #footer-wrapper -->
    <div id="footer"> <!-- BEGIN #footer -->
        <br/>
        <br/>
        <br/>
         <div id="footer-bottom" class="clearfix">
            <p class="fl"><?= DEFAULT_COPYRIGHT.'  '. SIGNATURE ?></p>
            <p class="go-up fr"><a href="#top" class="scrollup">En haut</a></p>
        </div>
    </div> <!-- END #footer -->
</div> <!-- END #footer-wrapper -->

<!--JavaScript-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js'></script>
<script src="<?php echo base_url('assets/js/public/superfish.js') ?>"></script>
<script src="<?php echo base_url('assets/js/public/jquery.prettyPhoto.js') ?>"></script>
<script src="<?php echo base_url('assets/js/public/jquery.flexslider-min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/public/tinynav.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/public/jquery.uniform.js') ?>"></script>
<script src="<?php echo base_url('assets/js/public/scripts.js') ?>"></script>
<script src="<?php echo base_url('assets/build2/js/besystem.js') ?>"></script>

<?php if(CURRENT_PAGE=='contact'): ?>
    <script type="text/javascript" src="js/contact.js"></script>
    <script src="js/lightbox/jquery.lightbox.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            $('.lightbox').lightbox();

        });
  </script>
<?php endif; ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54270512-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>