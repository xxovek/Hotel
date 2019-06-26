<ul class="breadcrumb">
                <li><a href="<?php echo site_url();?>">Home</a></li>
                <li class="active">Edit Order</li>
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
                    <h3 class="panel-title"><strong>Edit Order</strong> </h3>
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
                      <label class="col-md-3 col-xs-12 control-label">Product Name</label>
                      <div class="col-md-6 col-xs-12">
                          <span id="errmsgproductname"></span>
                          <select class="form-control select" name="productName" data-live-search="true" id="productName">
                             <option value="">Select Product </option>
                             <?php
                            foreach($productname as $row)
                            {
                            echo '<option value="'.$row->ProductId.'">'.$row->productName.'-'.$row->productPrice.'</option>';
                            }
                            ?>
                          </select>
                          <span class="help-block">Select box example</span>
                      </div>
                  </div>
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
                        <label class="col-md-3 col-xs-12 control-label">Room No</label>
                        <div class="col-md-6 col-xs-12">
                            <span id="errmsgroomno"></span>
                            <select class="form-control select" data-live-search="true" name="roomno" id="roomno" >
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
                      <label class="col-md-3 col-xs-12 control-label">Quantity</label>
                      <div class="col-md-6 col-xs-12">
                        <span id="errmsgquantity"></span>
                        <input type="text" class="form-control"  id="quantity" placeholder="Enter Quantity"/>
                      </div>
                    </div>
                </div>



                <div class="panel-footer">
                    <button class="btn btn-default">Clear Form</button>
                    <button class="btn btn-primary pull-right" type="button" onclick="saveOrderDetail()">Submit</button>
                </div>
            </div>
            </form>

        </div>
    </div>

</div>


<script type='text/javascript'>
getorders();
function getorders(){
  var bookid = <?php echo $bookid; ?>;
  // alert(bookid);
  $.ajax({
  type : "POST",
  url  : "<?=base_url()?>index.php/Orders/orderDetail",
  data :{
    orderId:bookid
  },
   dataType: 'json',
  success: function(response){
     $("#productName").val(response.productId).trigger('change');
     $("#customerName").val(response.customerId).trigger('change');
     $("#roomno").val(response.roomId).trigger('change');
     $("#quantity").val(response.Quantity);

  }
});
}
function saveOrderDetail(){
 var productName =$("#productName").val();
 var customerName =$("#customerName").val();
 var roomno =$("#roomno").val();
 var quantity =$("#quantity").val();
 var bookid = <?php echo $bookid; ?>;
 if(productName===""){
   $("#errmsgproductname").html("<font color='red'>Please Select Product Name</font>");
 }
 else{
  $("#errmsgproductname").html("");
  if(customerName===""){
  $("#errmsgcustomername").html("<font color='red'>Please Select Customer Name</font>");
  }
  else
  {
  $("#errmsgcustomername").html("");
  if(roomno===""){
  $("#errmsgroomno").html("<font color='red'>Please Select Room No</font>");
  }
  else
  {
      $("#errmsgroomno").html("");
      if(quantity===""){
      $("#errmsgquantity").html("<font color='red'>Please Enter Quantity</font>");
      }
      else
      {
        $("#errmsgquantity").html("");
        $.ajax({
        type : "POST",
        url  : "<?=base_url()?>index.php/Orders/updateOrderDetail",
         // dataType: 'json',
         data :{
           orderId:bookid,
           productName:productName,
           customerName:customerName,
           roomNo:roomno,
           quantity:quantity
         },
        success: function(response){

        $("#showbtn").click();
        window.location.reload();
        }
        });

    }
  }
  }
 }
}
</script>
