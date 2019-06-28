<ul class="breadcrumb">
                <li><a href="<?php echo site_url();?>">Home</a></li>
                <li class="active">Payment Process</li>
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
                    <h3 class="panel-title"><strong>New Payment</strong></h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>

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
                      <label class="col-md-3 col-xs-12 control-label">Booking Name</label>
                      <div class="col-md-6 col-xs-12">
                          <span id="errmsgbookingname"></span>

                          <select class="form-control select" name="BookingName" data-live-search="true" id="BookingName" onchange="checkbookinfo()">
                             <option value="">Select Booking </option>
                             <?php
                            foreach($payment as $row)
                            {
                            echo '<option value="'.$row->BookingId.'">'.$row->BookingId.'-'.$row->FirstName.'-'.$row->lastName.'</option>';
                            }
                            ?>
                          </select>
                          <input type="hidden" id="customerid" />
                          <span class="help-block">Select box example</span>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">From Date</label>
                    <div class="col-md-6 col-xs-12">
                      <!-- <span id="errmsgquantity"></span> -->
                      <input type="text" class="form-control"  id="fromdate" placeholder="Enter From Date" style="color: black;" readonly/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Upto Date</label>
                    <div class="col-md-6 col-xs-12">
                      <!-- <span id="errmsgquantity"></span> -->
                      <input type="text" class="form-control"  id="uptodate" placeholder="Enter Upto Date" style="color: black;" readonly/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Room No</label>
                    <div class="col-md-6 col-xs-12">
                      <!-- <span id="errmsgquantity"></span> -->
                      <input type="text" class="form-control"  id="roomno" placeholder="Enter Room" style="color: black;" readonly/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Rate / Night</label>
                    <div class="col-md-6 col-xs-12">
                      <!-- <span id="errmsgquantity"></span> -->
                      <input type="text" class="form-control"  id="ratepernight" placeholder="Enter Amount" style="color: black;" readonly/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Total Days</label>
                    <div class="col-md-6 col-xs-12">
                      <!-- <span id="errmsgquantity"></span> -->
                      <input type="text" class="form-control"  id="totaldays" placeholder="Enter Total Days" style="color: black;"  readonly/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Payment Type</label>
                    <div class="col-md-6 col-xs-12">
                      <span id="errpaymenttype"></span>
                      <select class="form-control select" name="paymentType" data-live-search="true" id="paymentType" >
                         <option value="">Select Payment Type </option>
                         <?php
                        foreach($paymentType as $row)
                        {
                        echo '<option value="'.$row->paymentTypeId.'">'.$row->paymentType.'</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                    <div class="form-group">
                      <label class="col-md-3 col-xs-12 control-label">Amount</label>
                      <div class="col-md-6 col-xs-12">
                        <span id="erramount"></span>
                        <!-- <span id="errmsgquantity"></span> -->
                        <input type="text" class="form-control"  id="amount" placeholder="Enter Amount" style="color: black;"/>
                      </div>
                    </div>
                </div>



                <div class="panel-footer">
                    <button class="btn btn-default">Clear Form</button>
                    <button class="btn btn-primary pull-right" type="button" onclick="savepaymentDetail()">Submit</button>
                </div>
            </div>
            </form>

        </div>
    </div>

</div>


<script type='text/javascript'>
function checkbookinfo(){
        var BookingName =$("#BookingName").val();
        // alert(BookingName);
        $.ajax({
        type : "POST",
        url  : "<?=base_url()?>index.php/Payment/getPaymentDetail",
         dataType: 'json',
         data :{
           BookingName:BookingName
         },
        success: function(response){
          $("#customerid").val(response.customerId);
          $("#fromdate").val(response.FromDate);
          $("#uptodate").val(response.UptoDate);
          $("#roomno").val(response.roomNumber);
          $("#ratepernight").val(response.pricePerNight);
          $("#totaldays").val(response.Nights);
          $("#amount").val(response.pricePerNight*response.Nights);
          // $("#fromdate").val();
        }
        });
}
function savepaymentDetail(){
 var BookingName =$("#BookingName").val();
 var customerid =$("#customerid").val();
 var paymentType =$("#paymentType").val();
 var amount =$("#amount").val();

 if(BookingName===""){
   $("#errmsgbookingname").html("<font color='red'>Please Select Customer Name</font>");
 }
 else{
        $("#errmsgbookingname").html("");
        if(paymentType===""){
        $("#errpaymenttype").html("<font color='red'>Please Select Payment Type</font>");
        }
        else{
          $("#errpaymenttype").html("");
          if(amount==="")
          {
            $("#erramount").html("<font color='red'>Please Enter Amount</font>");
          }
          else
          {
            $("#erramount").html("");
            $.ajax({
            type : "POST",
            url  : "<?=base_url()?>index.php/Payment/savePaymentDetail",
             // dataType: 'json',
             data :{
               BookingName:BookingName,
               customerid:customerid,
               paymentType:paymentType,
               amount:amount
             },
            success: function(response){
            // alert(response);
            $("#showbtn").click();
            }
            });
          }
        }
    }

 }

</script>
