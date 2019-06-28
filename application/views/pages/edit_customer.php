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
  <script type="text/javascript" src="<?php echo base_url(); ?>js/plugins/dropzone/dropzone.min.js"></script>
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

                              <div class="col-md-6">

                                  <div class="form-group">
                                      <label class="col-md-4 control-label">First Name</label>
                                      <div class="col-md-6 col-xs-12">
                                          <div class="input-group">
                                              <input type="hidden" id="customerId" value="<?php echo $customer['customerId']; ?>" />
                                              <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $customer['FirstName']; ?>" />
                                          </div>
                                          <span class="help-block">min size = 2, max size = 8</span>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-md-4 control-label">Last Name</label>
                                      <div class="col-md-6 col-xs-12">
                                          <div class="input-group">

                                              <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $customer['lastName']; ?>" />
                                          </div>
                                          <span class="help-block">Password field sample</span>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-md-4 control-label">Address</label>
                                      <div class="col-md-6 col-xs-12">
                                          <textarea class="form-control" rows="5" name="address" id="address"><?php echo $customer['address']; ?></textarea>
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

                                              <input type="email" class="form-control" name="emailid" id="emailid" value="<?php echo $customer['email']; ?>" />
                                          </div>
                                          <span class="help-block">Enter correct email-id of Guest</span>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-md-4 col-xs-12 control-label">Contact Number</label>
                                      <div class="col-md-6 col-xs-12">
                                          <div class="input-group">

                                              <input type="text" class="form-control" name="contactNumber" id="contactNumber" value="<?php echo $customer['contactNumber']; ?>" />
                                          </div>
                                          <span class="help-block">Enter Guest Last Name atleast two characters long</span>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">

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
                                              <div id="results">
                                                  <?php
                                                  $url = 'upload/pic_'.$customer['customerId'].'.jpeg';
                                                  if(!file_exists(base_url($url))){?>
                                                    <img id="imageprev" src="<?php echo base_url($url);?>"/>
                                                  <?php }else{}?>
                                              </div>
                                              <span class="help-block">File</span>
                                          </div>
                                      </div>

                        </div>
                              </div>

                          </div>

                      </div>
                      <div class="panel-footer">
                          <button class="btn btn-default" type="reset">Clear Form</button>
                          <button class="btn btn-primary pull-right" type="button" onclick="saveSnap()">Submit</button>
                      </div>
                  </div>

          </div>
          </form>

          <div class="row">
              <div class="col-md-9">
                  <div class="panel panel-default">
                      <div class="panel-body">
                          <h3><span class="fa fa-download"></span> Documents Of Customer</h3>
                          <p>Click here and browse file or image from your machine </p>
                          <form action="<?php echo site_url('Customer/add_documents/' . $customer['customerId']); ?>" class="dropzone dropzone-mini" id="my-dropzone"></form>
                      </div>
                  </div>
              </div>
              <div class="col-md-3">
              </div>
              </form>

          </div>
      </div>


  </div>

  <script type='text/javascript' src='<?php echo base_url(); ?>js/plugins/jquery-validation/jquery.validate.js'></script>
  <script src="<?php echo base_url(); ?>js/webcam.min.js"></script>
  <script language="JavaScript">
      Webcam.set({
          width: 325,
          height: 250,
          image_format: 'jpeg',
          jpeg_quality: 90
      });

    Webcam.attach('#my_camera');

      function take_snapshot() {
          Webcam.snap(function(data_uri) {
              $(".image-tag").val(data_uri);
              document.getElementById('results').innerHTML = '<img id="imageprev" src="' + data_uri + '"/>';
          });
      }

      function saveSnap() {
          var returnVal = $("#jvalidate").valid();
          // Get base64 value from <img id='imageprev'> source
          if(returnVal){
          var formData = {
              fname: $('#firstname').val(),
              lname: $('#lastname').val(),
              address: $('#address').val(),
              emailid: $('#emailid').val(),
              contactNumber: $('#contactNumber').val(),
              customerId: $('#customerId').val()
          };
          $.ajax({
              type: 'POST',
              url: '<?php echo site_url(); ?>/Customer/update_details',
              data: formData,
              success: function(response) {
                var base64image = document.getElementById("imageprev").src;
          Webcam.upload(base64image, '<?php echo site_url(); ?>/Customer/save_customer'+customerId, function(code, text) {
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
                      minlength: 18,
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
                      number: true
                  }
              }
          });
      });

    Dropzone.options.myDropzone = {
    init: function() {
        thisDropzone = this;
        $.get('<?php echo site_url(); ?>/Customer/fetch/<?php echo $customer['customerId'];?>', function(data) {
            $.each(data, function(key,value){
                var mockFile = { name: value.name, size: value.size };
                thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "<?php echo base_url();?>/"+value.name);
            });

        });
    }
};
Dropzone.autoDiscover = false;
$(".dropzone").dropzone({
 addRemoveLinks: true,
 removedfile: function(file) {
   var name = file.name; 
   $.ajax({
    type: 'POST',
    url: '<?php echo site_url(); ?>/Customer/remove_customer_doc',
    data: {name:name},
    success: function(response) {
       
    }
    });
   var b;
   return file.previewElement && null != (b = file.previewElement) && b.parentNode.removeChild(file.previewElement), this._updateMaxFilesReachedClass()
 }
});
  </script>
