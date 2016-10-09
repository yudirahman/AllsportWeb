      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong><?php echo $namatoko.' '.$tahuntoko ?> All rights reserved.
      </footer>

      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo ASSETS ?>backend/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo ASSETS ?>backend/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo ASSETS ?>backend/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo ASSETS ?>backend/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo ASSETS ?>backend/dist/js/app.min.js"></script>
    <!-- CK Editor -->
    <script src="<?php echo ASSETS ?>backend/plugins/ckeditor/ckeditor.js"></script>
    <!-- Set Active CK Editor -->
    <script>
      $(function(){
        CKEDITOR.replace('profil',{height:300});
      })
    </script>
  </body>
</html>
