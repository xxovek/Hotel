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
                  <div class="row">
                    <div class="col-sm-4">
                      <label>Customer Name</label>
                      <span id="errmsgbookingname"></span>
                      <select class="form-control select" name="BookingName" data-live-search="true" id="BookingName" onchange="checkbookinfo()">
                         <option value="">Select Customer Name </option>
                         <?php
                        foreach($customer as $row)
                        {
                        echo '<option value="'.$row->customerId.'">'.$row->FirstName.'-'.$row->lastName.'</option>';
                        }
                        ?>
                      </select>
                      <input type="hidden" id="totalbookid" />
                      <input type="hidden" id="totalorderid" />
                    </div>

                    <div class="col-sm-4">
                      <label>Payment Type</label>
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

                    <div class="col-sm-4">
                      <label>Paying Bill Amount</label>
                      <span id="erramount"></span>
                      <input type="text" class="form-control"  id="amount" placeholder="Enter Amount" style="color: black;" readonly/>

                    </div>
                  </div>
                     <div class="row">
                       <div class="form-group">
                       </br>
                       </div>
                     </div>
                      <div class="row">
                    <span id="roomDetail"></span>  </div>
                     <div class="row">
                    <span id="orderDetail"></span>
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
$("#BookingName").val('<?php echo $customerId;?>').trigger('change');
function orderDetail(price){
  var BookingName =$("#BookingName").val();
   $.ajax({
  type : "POST",
  url  : "<?=base_url()?>index.php/Payment/getOrderDetailCustomer",
   dataType: 'json',
   data :{
     BookingName:BookingName
   },
  success: function(response){
    // alert(response);
    var html='';
    var price1 = 0;
    var total = 0;
    var count = response.length;
    $("#totalorderid").val(count);
    for(var i=0;i<count;i++){
    html+='<div class="col-md-4 scCol">';
    html+='    <div class="panel panel-primary">';
    html+='        <div class="panel-heading">';
    html+='            <h3 class="panel-title">Order ID: <span id=orderid'+(i+1)+'>'+response[i].orderId+'</span></h3>';
    html+='        </div>';
    html+='        <div class="panel-body">';
    html+='        <div class="row"><label>Item Name</label>        '+response[i].productName+'</div>';
    html+='        <div class="row"><label>Item Price</label>            '+response[i].productPrice+'</div>';
    html+='        <div class="row"><label>Quantity</label>            '+response[i].Quantity+'</div>';
    html+='        <div class="row"><label>Total Cost</label>         '+(response[i].Quantity*response[i].productPrice)+'</div>';
    html+='        </div>';
    html+='    </div>';
    html+='</div>';
    price1 += response[i].Quantity*response[i].productPrice;
    }
    $("#orderDetail").html(html);
    total = price1 + price;
    $("#amount").val(total);
  }
});
}
function checkbookinfo(){
        var BookingName =$("#BookingName").val();
        // // alert(BookingName);
        //  orderDetail();
        $.ajax({
        type : "POST",
        url  : "<?=base_url()?>index.php/Payment/getPaymentDetailCustomer",
         dataType: 'json',
         data :{
           BookingName:BookingName
         },
        success: function(response){
          // alert(response);
          var count = response.length;
          // alert(count);
          $("#totalbookid").val(count);
          var price = 0;
          var html='';
          for(var i=0;i<count;i++){
            // alert(response[i].customerId);
            html+='<div class="col-md-4 scCol">';
            html+='    <div class="panel panel-primary">';
            html+='        <div class="panel-heading">';
            html+='            <h3 class="panel-title">Booking ID: <span id=bookid'+(i+1)+'>'+response[i].BookingId+'</span></h3>';
            html+='        </div>';
            html+='        <div class="panel-body">';
            html+='        <div class="row"><label>Room No</label>        '+response[i].roomNumber+'</div>';
            html+='        <div class="row"><label>From Date</label>            '+response[i].FromDate+'</div>';
            html+='        <div class="row"><label>Upto Date</label>              '+response[i].UptoDate+'</div>';
            html+='        <div class="row"><label>Rate / Night</label>         '+response[i].pricePerNight+'</div>';
            html+='        <div class="row"><label>Total Days</label>         '+response[i].Nights+'</div>';
            html+='        <div class="row"><label>Total Cost</label>         '+(response[i].Nights*response[i].pricePerNight)+'</div>';
            html+='        </div>';
            html+='    </div>';
            html+='</div>';
            price += response[i].Nights*response[i].pricePerNight;
          }
          $("#roomDetail").html(html);
           $("#amount").val(price);
           orderDetail(price);
        }
        });
}
function savepaymentDetail(){
 var customerId =$("#BookingName").val();
 // var customerid =$("#customerid").val();
 var paymentType =$("#paymentType").val();
 var amount =$("#amount").val();
 var totalbookid=$("#totalbookid").val();
 var totalorderid=$("#totalbookid").val();
 // alert(totalbookid);
 var bookingarr = [];
 for(var i=1;i<=2;i++){
   var bookid = $("#bookid"+i).text();
   bookingarr.push(bookid);
 }
 var orderarr = [];
 for(var i=1;i<=2;i++){
   var orderid = $("#orderid"+i).text();
   orderarr.push(orderid);
 }
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
               bookingId:bookingarr,
               orderId:orderarr,
               customerid:customerId,
               paymentType:paymentType,
               amount:amount
             },
            success: function(response){
            // alert(response);
            $("#showbtn").click();
            window.location = "<?php echo site_url('Payment');?>";
            }
            });
          }
        }
    }

 }

</script>
