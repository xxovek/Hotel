<ul class="breadcrumb">
                    <li><a href="<?php echo site_url();?>/Dashboard">Home</a></li>                    
                    <li class="active">Rooms</li>
                    <li class="active">Rooms Details</li>
                </ul>



                <div class="page-content-wrap">


                <div class="row" id="submit_formRow">
           <div class="col-md-12">
           <form class="form-horizontal" id="jvalidate" role="form" action="javascript:alert('Form #validate2 submited');">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Room Details</strong> Add New</h3>
                                <ul class="panel-controls">
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <p></p>
                            </div>
                                <div class="panel-body">                                                                        
                                
                                <div class="form-group">
                                    <label class="col-md-3  control-label">Room No.</label>
                                    <div class="col-md-6 ">                                            
                                  
                                       
                                        <div class="input-group">
                                            <span class=""></span>
                                            <input type="text" id="roomno_input" name="roomno_input" class="form-control"/>
                                        </div>                                            
                                        <span class="help-block">This is room number of text field</span>
                                   
                                        <br>  <span id="roomno_input_err"></span>
                                         </div>
                                </div>

                          
                                
                                <div class="form-group">
                                <label class="col-md-3 control-label">Room Type</label>
                                <div class="col-md-3">
                                    <!-- <span id="errmsgroomno"></span> -->
                                    <!-- <select class="form-control" data-live-search="true" name="roomtypeSel" id="roomtypeSel" > -->
                                    <select class="form-control select" data-live-search="true" name="roomtypeSel" id="roomtypeSel">
                                   <option value="">Select Room Type</option>
                                    <?php
                                        foreach($roomtypes as $row)
                                        {
                                        echo '<option value="'.$row->roomId.'">'.$row->roomType.'</option>';
                                        }
                                    ?>
                                    </select>
                                    <span class="help-block">Select Room Type</span>
                                    <br><span id="roomtype_input_err"></span>

                                </div>
                            </div>

                            <!-- html+='<option value="'+response[i].roomId+'">'+response[i].roomType+'</option>'; -->



                                <div class="form-group">
                                    <label class="col-md-3  control-label">Room Price</label>
                                    <div class="col-md-6 ">                                            
                                        <!-- <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" id="roomprice_input" class="form-control"/>
                                        </div>  -->
                                        <div class="input-group">
                                                <input type="text" class="form-control" id="roomprice_input" name="roomprice_input" >
                                                <!-- <span class="input-group-addon">.00</span> -->
                                            </div>                                           
                                        <span class="help-block">This is room price of text field</span>
                                        <br><span id="roomprice_input_err"></span>

                                    </div>
                                </div>


                               
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Max Person Limit</label>
                                    <div class="col-md-6 ">                                            
                                        <div class="input-group">
                                            <!-- <span class="input-group-addon"><span class="fa fa-pencil"></span></span> -->
                                            <input type="text" id="roomlimit_input" name="roomlimit_input" class="form-control"/>
                                        </div>                                            
                                        <span class="help-block">This is room persons limit of text field</span>
                                        <br><span id="roomlimit_input_err"></span>
                                   
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3  control-label">Availability</label>
                                    <div class="col-md-6 ">
                                        <label class="check"><input type="checkbox" id="checkbox_input" name="checkbox_input" class="icheckbox" checked="checked"/>Check Availability</label>
                                        <span class="help-block">Check yes or no, Available to use</span>
                                    </div>
                                </div>
                            
                            </div>

                            <div class="panel-footer">
                                <button class="btn btn-default" type="button" onClick="resetForm();" >Clear Form</button>  
                                <button class="btn btn-default" type="button" onclick="window.location='<?php echo site_url('Roomdetails/'); ?>'" >Back</button>                                         
                                <button type="button"  class="btn btn-primary pull-right" onclick="saveForm();">Update</button>
                            </div>

                        </div>
                        </form>
           </div>

       </div>
       <!-- onclick="window.location= -->
                </div>
                <script type='text/javascript' src='<?php echo base_url(); ?>js/plugins/jquery-validation/jquery.validate.js'></script>


                <script>

$(function() {
          var jvalidate = $("#jvalidate").validate({
              ignore: [],
              rules: {
                roomno_input: {
                      required: true,
                      minlength: 2,
                      maxlength: 8
                  },
                  roomtypeSel: {
                      required: true
                    //   minlength: 3,
                    //   maxlength: 20
                  },
                  roomprice_input: {
                      required: true,
                      number: true,
                      minlength: 4,
                      maxlength: 8
                  },
                  roomlimit_input: {
                    required: true,
                      number: true,
                      minlength: 1,
                      maxlength: 1
                  },
               
                  checkbox_input: {
                    //   required: true
                    //   number: true,
                    //   minlength: 10,
                    //   maxlength: 11
                  }
              }
          });

      });
              

      $('#roomtypeSel').change(function(){
    // $('#roomtypeSel').next('.bootstrap-select').removeClass('error').removeClass('valid');
    $("#roomtypeSel").trigger("select");
    });
function saveForm(){
    var returnVal = $("#jvalidate").valid();
   
    // alert("retval"+returnVal);
    var checkbox_input = '';
                        if(document.getElementById("checkbox_input").checked){
                            checkbox_input = 'YES';
                        }else{
                            checkbox_input = 'NO';
                        }

    if (returnVal) {
              var formData = {
                 roomno_input: ($('#roomno_input').val().toUpperCase()).trim(),
                  roomtype_input: $('#roomtypeSel').val(),
                  roomprice_input: $('#roomprice_input').val(),
                  roomlimit_input: $('#roomlimit_input').val(),
                  checkbox_input: checkbox_input
              };

              $.ajax({
                  type: 'POST',
                  url: '<?php echo site_url(); ?>/Roomdetails/create',
                  data: formData,
                  dataType: 'json',
                  success: function(response) {
                    // alert(response.msg);
                                    if(response.msg == false){
                                        $("#roomno_input_err").html("That Room Number is already taken. Please Add different one.");
                                        setTimeout(function(){
                                        $("#roomno_input_err").html("");
                                    }, 5000);
                                    }
                                    else{
                                            $('#jvalidate')[0].reset();
                                            window.location = "<?php echo site_url('Roomdetails/'); ?>";
                                            show_RoomDetails();
                                        }
                    
                  },
                  error: function(xhr) {
                      alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                  }
              });

          }else{}

}


function resetForm(){
    $('#jvalidate')[0].reset();

    // $('#roomtypeSel').next('.bootstrap-select').removeClass('error').removeClass('valid');
    // $('#roomtypeSel').trigger();
    // $("#roomtypeSel").trigger("");
    // $("#roomtypeSel").options[1].selected = true;
}
                
                </script>