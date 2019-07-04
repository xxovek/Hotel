  <!-- START BREADCRUMB -->
  <style type="text/css">
      #results {
          padding: 1px;
          border: 1px solid;
          background: #ccc;
      }
  </style>
  <ul class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li><a href="#">Customer</a></li>
      <li class="active"><a href="#">add custmer</a></li>

  </ul>
  <!-- END BREADCRUMB -->

  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">
      <div class="row">
          <div class="col-md-12">

              <form class="form-horizontal" id="jvalidate" role="form">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h3 class="panel-title"><strong>New Guest</strong> Registration</h3>
                          <ul class="panel-controls">
                              <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                          </ul>
                      </div>

                      <div class="panel-body">

                          <div class="row">

                              <div class="col-md-4">

                                  <div class="form-group">
                                      <label class="col-md-4 control-label">First Name</label>
                                      <div class="col-md-6 col-xs-12">
                                          <div class="input-group">

                                              <input type="text" class="form-control" name="firstname" id="firstname" />
                                          </div>
                                          <span class="help-block">min size = 2, max size = 8</span>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-md-4 control-label">Last Name</label>
                                      <div class="col-md-6 col-xs-12">
                                          <div class="input-group">

                                              <input type="text" class="form-control" name="lastname" id="lastname" />
                                          </div>
                                          <span class="help-block">Password field sample</span>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-md-4 control-label">Address</label>
                                      <div class="col-md-6 col-xs-12">
                                          <textarea class="form-control" rows="5" name="address" id="address"></textarea>
                                          <span class="help-block">Default textarea field</span>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-md-4 col-xs-12 control-label">Registration Date</label>
                                      <div class="col-md-6 col-xs-12">
                                          <div class="input-group">

                                              <input type="text" class="form-control datepicker" value="2014-11-01" name="regDate" id="regDate">
                                          </div>
                                          <span class="help-block">Click on input field to get datepicker</span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-md-4 col-xs-12 control-label">Email Id</label>
                                      <div class="col-md-6 col-xs-12">
                                          <div class="input-group">

                                              <input type="email" class="form-control" name="emailid" id="emailid" onchange="checkAvailablity(this.value);" />
                                          </div>
                                          <span class="help-block" id="help">Enter correct email-id of Guest</span>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-md-4 col-xs-12 control-label">Contact Number</label>
                                      <div class="col-md-6 col-xs-12">
                                          <div class="input-group">

                                              <input type="text" class="form-control" name="contactNumber" id="contactNumber" onchange="checkAvailablityContact(this.value);" />
                                          </div>
                                          <span class="help-block" id="help1">Enter Guest Last Name atleast two characters long</span>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <button type="button" class="btn btn-primary" onClick="start_camera()" id="startC">Capture Photo</button>
                                  <div id="cam">
                                      <div class="form-group">
                                          <label class="col-md-3 col-xs-12 control-label">File</label>

                                          <div class="col-md-6 col-xs-12">
                                              <div id="my_camera"></div>
                                              <button type="button" class="btn btn-block btn-primary" name="filename" id="filename" title="Capture Image" onClick="take_snapshot()">Capture Image</button>
                                              <span class="help-block">Input type file</span>
                                              <input type="hidden" name="image" class="image-tag">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-md-3 col-xs-12 control-label">Checkbox</label>
                                          <div class="col-md-3 col-xs-3">
                                              <div id="results">Your captured image will appear here...</div>
                                              <span class="help-block">Checkbox sample, easy to use</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <button type="button" class="btn btn-primary" onClick="start_camera_doc()" id="startD">Capture Document</button>
                                  <div id="camD">
                                      <div class="form-group">
                                          <label class="col-md-3 col-xs-12 control-label">File</label>

                                          <div class="col-md-6 col-xs-12">
                                              <div id="my_camera_doc"></div>
                                              <button type="button" class="btn btn-block btn-primary" name="filenameDoc" id="filenameDoc" title="Capture Image" onClick="take_snapshot_doc()">Capture Image</button>
                                              <span class="help-block">Input type file</span>
                                              <input type="hidden" name="imageD[]" class="image-tag-d">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-md-3 col-xs-12 control-label">Checkbox</label>
                                          <div class="col-md-3 col-xs-3">
                                              <div id="resultsD">Your captured image will appear here...</div>
                                              <span class="help-block">Checkbox sample, easy to use</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                          </div>

                      </div>
                      <div class="panel-footer">
                          <button class="btn btn-default">Clear Form</button>
                          <button class="btn btn-primary pull-right" type="button" onclick="saveSnap()">Submit</button>
                      </div>
                  </div>
              </form>

          </div>
      </div>


  </div>

  <script type='text/javascript' src='<?php echo base_url(); ?>js/plugins/jquery-validation/jquery.validate.js'></script>
  <script src="<?php echo base_url(); ?>js/webcam.min.js"></script>
  <script language="JavaScript">
      function checkAvailablity(emailId) {
          $.ajax({
              url: '<?php echo site_url(); ?>/Customer/checkAvailablity',
              type: 'POST',
              data: {
                  emailId: emailId
              },
              dataType: 'json',
              success: function(response) {
                  if (response.flag) {
                      $('#help').html('<code>Email Id allready Exists <u>' + emailId + '</u></code>');
                      $('#emailid').val('');
                  } else {
                      $('#help').css('color', 'green').html('Username Available');
                  }
              }
          });
      }

      function checkAvailablityContact(contactNumber) {
          $.ajax({
              url: '<?php echo site_url(); ?>/Customer/checkAvailablityContact',
              type: 'POST',
              data: {
                  contactNumber: contactNumber
              },
              dataType: 'json',
              success: function(response) {
                  if (response.flag) {
                      $('#help1').html('<code>Contact Number allready Exists <u>' + contactNumber + '</u></code>');
                      $('#contactNumber').val('');
                  } else {
                      $('#help1').html(' ');
                  }
              }
          });
      }

      $('#cam').hide();
      Webcam.set({
          width: 325,
          height: 250,
          image_format: 'jpeg',
          jpeg_quality: 90
      });

      function start_camera() {
          $('#cam').show();
          Webcam.attach('#my_camera');
          $('#startC').hide();
      }
      $('#camD').hide();
      function start_camera_doc() {
          $('#camD').show();
          Webcam.attach('#my_camera_doc');
          $('#startD').hide();
      }


      function take_snapshot() {
          Webcam.snap(function(data_uri) {
              $(".image-tag").val(data_uri);
              document.getElementById('results').innerHTML = '<img id="imageprev" src="' + data_uri + '"/>';
          });
      }
      function take_snapshot_doc() {
          Webcam.snap(function(data_uri) {
              $(".image-tag-d").val(data_uri);
              document.getElementById('resultsD').innerHTML = '<img id="imageprevD" src="' + data_uri + '"/>';
          });
      }

      function saveSnap() {
          var returnVal = $("#jvalidate").valid();
          // Get base64 value from <img id='imageprev'> source
          if (returnVal) {
              var formData = {
                  fname: $('#firstname').val(),
                  lname: $('#lastname').val(),
                  address: $('#address').val(),
                  emailid: $('#emailid').val(),
                  contactNumber: $('#contactNumber').val()
              };
              $.ajax({
                  type: 'POST',
                  url: '<?php echo site_url(); ?>/Customer/add_details',
                  data: formData,
                  dataType: 'json',
                  success: function(response) {
                      var base64image = document.getElementById("imageprev").src;
                      var base64imageD = document.getElementById("imageprevD").src;
                      Webcam.upload(base64image, "<?php echo site_url(); ?>/Customer/save_customer/" + response.customerId, function(code, text) {
                          console.log('Save successfully');
                      });
                      Webcam.upload(base64imageD, "<?php echo site_url(); ?>/Customer/add_documents/" + response.customerId, function(code, text) {
                          console.log('Save successfully');
                      });
                  },
                  error: function(xhr) {
                      alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                  }
              });

          }
      }
      $(function() {
          var jvalidate = $("#jvalidate").validate({
              ignore: [],
              rules: {
                  firstname: {
                      required: true,
                      minlength: 2,
                      maxlength: 8
                  },
                  lastname: {
                      required: true,
                      minlength: 3,
                      maxlength: 20
                  },
                  address: {
                      required: true,
                      minlength: 5,
                      maxlength: 100
                  },
                  emailid: {
                      required: true,
                      email: true
                  },
                  regDate: {
                      required: true,
                      date: true
                  },
                  contactNumber: {
                      required: true,
                      number: true,
                      minlength: 10,
                      maxlength: 11
                  }
              }
          });

      });
  </script>