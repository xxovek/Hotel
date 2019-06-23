</div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->



        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="<?php echo site_url();?>/Login/logout" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="<?php echo base_url();?>audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="<?php echo base_url();?>audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <!-- <script type="text/javascript" src="<?php echo base_url();?>js/plugins/jquery/jquery.min.js"></script> -->
        <script type="text/javascript" src="<?php echo base_url();?>js/plugins/jquery/jquery-ui.min.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url();?>js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->
      
        <!-- START THIS PAGE PLUGINS-->
        <script type='text/javascript' src='<?php echo base_url();?>js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/plugins/scrolltotop/scrolltopcontrol.js"></script>

        <script type="text/javascript" src="<?php echo base_url();?>js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/plugins/morris/morris.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='<?php echo base_url();?>js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url();?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
        <script type='text/javascript' src='<?php echo base_url();?>js/plugins/bootstrap/bootstrap-datepicker.js'></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/plugins/owl/owl.carousel.min.js"></script>

        <!-- <script type="text/javascript" src="<?php echo base_url();?>js/plugins/moment.min.js"></script> -->
        <!-- <script type="text/javascript" src="<?php echo base_url();?>js/plugins/daterangepicker/daterangepicker.js"></script> -->
        <!-- END THIS PAGE PLUGINS-->

           <!-- START THIS PAGE PLUGINS-->

        <script type="text/javascript" src="<?php echo base_url();?>js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/plugins/tableexport/tableExport.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/plugins/tableexport/jquery.base64.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/plugins/tableexport/html2canvas.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/plugins/tableexport/jspdf/libs/sprintf.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/plugins/tableexport/jspdf/jspdf.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/plugins/tableexport/jspdf/libs/base64.js"></script>
        <!-- END THIS PAGE PLUGINS-->

        <!-- START TEMPLATE -->
        <!-- <script type="text/javascript" src="<?php echo base_url();?>js/settings.js"></script> -->

        <script type="text/javascript" src="<?php echo base_url();?>js/plugins.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/actions.js"></script>

        <script type="text/javascript" src="<?php echo base_url();?>js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->
   <!-- THIS PAGE PLUGINS -->




        <script type="text/javascript" src="<?php echo base_url();?>js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <!-- END THIS PAGE PLUGINS -->

    </body>
</html>
