<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>
// getcustomer();
$(document).ready(function(){
    getcustomer();
});
function getcustomer(){

 $.ajax({
 type : "POST",
 url  : "<?=base_url()?>index.php/Booking/customerDetails",
  dataType: 'json',
 success: function(response){
  var len = response.length;
  var i=0,html="";
  if(len > 0){
   for(var i=0;i<len;i++){
    html+='<option value="'+response[i].customerId+'">'+response[i].FirstName+' '+response[i].lastName+'</option>';
   }
   alert(html);
    // $("#customerName").html(html);
  }else{
  }
 }
 });
}
function checkroomavability(){
  var FromDate =$("#FromDate").val();
  var UptoDate =$("#UptoDate").val();
  var roomNo =$("#roomno").val();
  if(FromDate===""){
  $("#errmsgfromdate").html("<font color='red'>Please Select From Date</font>");
  }
  else
  {
  $("#errmsgfromdate").html("");
  if(UptoDate===""){
  $("#errmsguptodate").html("<font color='red'>Please Select Upto Date</font>");
  }
  else
  {
      $("#errmsguptodate").html("");
      if(roomNo===""){
      $("#errmsgroomno").html("<font color='red'>Please Select Room No</font>");
      }
      else
      {
        $("#errmsgroomno").html("");
        $.ajax({
        type : "POST",
        url  : "<?=base_url()?>index.php/Booking/checkroomavaiableBookingDetail",
         dataType: 'json',
         data :{
           roomNo:roomNo,
           FromDate:FromDate,
           UptoDate:UptoDate
         },
        success: function(response){
           // alert(response);
           if(response===0){
             $("#notificationmsg").html("<font color='blue'>Room is Available</font>");
             $("#notificationval").val(1);
           }
           else {
             $("#notificationmsg").html("<font color='red'>Room is UnAvailable</font>");
                $("#notificationval").val("");
           }

        }
        });
      }
    }
  }
}
function saveBookingDetail(){
 var customerName =$("#customerName").val();
 // alert(customerName);
 var roomNo =$("#roomno").val();
 var FromDate =$("#FromDate").val();
 var UptoDate =$("#UptoDate").val();
 var notificationval = $("#notificationval").val();
 // alert(notificationval);
 if(customerName===""){
   $("#errmsgcustomername").html("<font color='red'>Please Select Customer Name</font>");
 }
 else{
  $("#errmsgcustomername").html("");
  if(FromDate===""){
  $("#errmsgfromdate").html("<font color='red'>Please Select From Date</font>");
  }
  else
  {
  $("#errmsgfromdate").html("");
  if(UptoDate===""){
  $("#errmsguptodate").html("<font color='red'>Please Select Upto Date</font>");
  }
  else
  {
      $("#errmsguptodate").html("");
      if(roomNo===""){
      $("#errmsgroomno").html("<font color='red'>Please Select Room No</font>");
      }
      else
      {
        $("#errmsgroomno").html("");
        if(notificationval=="")
        {

        }
        else{
        $.ajax({
        type : "POST",
        url  : "<?=base_url()?>index.php/Booking/saveBookingDetail",
         // dataType: 'json',
         data :{
           customerName:customerName,
           roomNo:roomNo,
           FromDate:FromDate,
           UptoDate:UptoDate
         },
        success: function(response){

        $("#showbtn").click();
        }
        });
      }
    }
  }
  }
 }
}
</script>

    <ul class="breadcrumb">
                    <li><a href="<?php echo site_url();?>">Home</a></li>
                    <li class="active">Booking</li>
    </ul>
    <div class="page-content-wrap">
        <div class="row" >
        <div class="col-sm-12">
           <button type="button" style="display:none;" id="showbtn" class="btn btn-success mb-control" data-box="#message-box-success">Success</button>
        </div>
      </div>
        <div class="row">
            <div class="col-md-12">

                <form class="form-horizontal">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>One Column</strong> Layout</h3>
                        <ul class="panel-controls">
                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                        </ul>
                    </div>
                    <!-- <div class="panel-body">
                        <p>This is non libero bibendum, scelerisque arcu id, placerat nunc. Integer ullamcorper rutrum dui eget porta. Fusce enim dui, pulvinar a augue nec, dapibus hendrerit mauris. Praesent efficitur, elit non convallis faucibus, enim sapien suscipit mi, sit amet fringilla felis arcu id sem. Phasellus semper felis in odio convallis, et venenatis nisl posuere. Morbi non aliquet magna, a consectetur risus. Vivamus quis tellus eros. Nulla sagittis nisi sit amet orci consectetur laoreet. Vivamus volutpat erat ac vulputate laoreet. Phasellus eu ipsum massa.</p>
                    </div> -->
                    <div class="message-box message-box-success animated fadeIn" id="message-box-success">
                        <div class="mb-container">
                            <div class="mb-middle">
                                <div class="mb-title"><span class="fa fa-check"></span> Success</div>
                                <div class="mb-content">
                                    <p>Successfully Saved Content.</p>
                                </div>
                                <div class="mb-footer">
                                    <button class="btn btn-default btn-lg pull-right mb-control-close">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Customer Name</label>
                            <div class="col-md-6 col-xs-12">
                                <span id="errmsgcustomername"></span>
                                <select class="form-control select" name="customerName" data-live-search="true" id="customerName">
                                   <option value="">Select Customer </option>

                                   <?php

                                  foreach($customername as $row)
                                  {
                                  echo '<option value="'.$row->customerId.'">'.$row->FirstName.'-'.$row->lastName.'</option>';
                                  }
                                  ?>
                                </select>


                                <span class="help-block">Select box example</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">From Date</label>
                            <div class="col-md-6 col-xs-12">
                                <span id="errmsgfromdate"></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    <input type="text" class="form-control datepicker" value="" id="FromDate" >
                                </div>
                                <span class="help-block">Click on input field to get datepicker</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Upto Date</label>
                            <div class="col-md-6 col-xs-12">
                              <span id="errmsguptodate"></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    <input type="text" class="form-control datepicker" value="" id="UptoDate" >
                                </div>
                                <span class="help-block">Click on input field to get datepicker</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Room No</label>
                            <div class="col-md-6 col-xs-12">
                                <span id="errmsgroomno"></span>
                                <select class="form-control select" data-live-search="true" name="roomno" id="roomno" onchange="checkroomavability()">
                                   <option value="">Select Room No </option>
                                  <?php
                                  foreach($roomname as $row)
                                  {
                                  echo '<option value="'.$row->roomId.'">'.$row->roomNumber.'</option>';
                                  }
                                  ?>
                                </select>
                                <span class="help-block">Select box example</span>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-3 col-xs-12 control-label">Room Status</label>
                          <div class="col-md-6 col-xs-12">
                            <span class="help-block" id="notificationmsg">Searching</span>
                            <input type="hidden" id="notificationval" />
                          </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-default">Clear Form</button>
                        <button class="btn btn-primary pull-right" type="button" onclick="saveBookingDetail()">Submit</button>
                    </div>
                </div>
                </form>

            </div>
        </div>

    </div>
