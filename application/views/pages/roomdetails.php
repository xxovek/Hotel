       
               <!-- <script type='text/javascript' src='js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='js/plugins/validationengine/jquery.validationEngine.js'></script>      -->
        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
                    <li><a href="<?php echo site_url();?>/Dashboard">Home</a></li>                    
                    <li class="active">Rooms</li>
                    <li class="active">Rooms Details</li>
                </ul>
                <!-- END BREADCRUMB -->    

                <!-- <div class="page-title">
                  <h2><span class="fa fa-arrow-circle-o-left"></span>Customers Data</h2>
                </div> -->

                <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

       <div class="row" id="submit_formRow" style="display:none">
           <div class="col-md-12">
           <form class="form-horizontal" id="submit_form">
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
                                    <label class="col-md-3 col-xs-12 control-label">Room No.</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" id="roomno_input" class="form-control"/>
                                        </div>                                            
                                        <span class="help-block">This is room no of text field</span>
                                        <br><span id="roomno_input_err"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Room Type</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" id="roomtype_input" class="form-control"/>
                                        </div>                                            
                                        <span class="help-block">This is room type of text field</span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Room Price</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <!-- <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" id="roomprice_input" class="form-control"/>
                                        </div>  -->
                                        <div class="input-group">
                                                <input type="text" class="form-control" id="roomprice_input" >
                                                <span class="input-group-addon">.00</span>
                                            </div>                                           
                                        <span class="help-block">This is room price of text field</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Max Person Limit</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" id="roomlimit_input" class="form-control"/>
                                        </div>                                            
                                        <span class="help-block">This is room persons limit of text field</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Availability</label>
                                    <div class="col-md-6 col-xs-12">
                                        <label class="check"><input type="checkbox" id="checkbox_input" class="icheckbox" checked="checked"/>Check Availability</label>
                                        <span class="help-block">Check yes or no, easy to use</span>
                                    </div>
                                </div>
                            
                            </div>

                            <div class="panel-footer">
                                <button class="btn btn-default" type="reset" >Clear Form</button>  
                                <button class="btn btn-default" onClick="submit_form.resetForm();$('#gender').next('.bootstrap-select').removeClass('error').removeClass('valid')">Back</button>                                         
                                <button type="submit"  class="btn btn-primary pull-right">Submit</button>
                            </div>

                        </div>
                        </form>
           </div>

       </div>




<div class="row" id="tbl_row">
    <div class="col-md-12">

        <!-- START DATATABLE EXPORT -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">DataTable Export</h3>
                <div class="btn-group pull-right">
                    <button class="btn btn-success" onclick="show_form();" ><i class="fa fa-bars"></i>New Room Info</button>
                </div>
                <div class="btn-group pull-right">
                    <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                    <ul class="dropdown-menu">
                        <li><a href="#" onClick="$('#customers2').tableExport({type:'json',escape:'false'});"><img src='<?php echo base_url(); ?>img/icons/json.png' width="24" /> JSON</a></li>
                        <li><a href="#" onClick="$('#customers2').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src='<?php echo base_url(); ?>img/icons/json.png' width="24" /> JSON (ignoreColumn)</a></li>
                        <li><a href="#" onClick="$('#customers2').tableExport({type:'json',escape:'true'});"><img src='<?php echo base_url(); ?>img/icons/json.png' width="24" /> JSON (with Escape)</a></li>
                        <li class="divider"></li>
                        <li><a href="#" onClick="$('#customers2').tableExport({type:'xml',escape:'false'});"><img src='<?php echo base_url(); ?>img/icons/xml.png' width="24" /> XML</a></li>
                        <li><a href="#" onClick="$('#customers2').tableExport({type:'sql'});"><img src='<?php echo base_url(); ?>img/icons/sql.png' width="24" /> SQL</a></li>
                        <li class="divider"></li>
                        <li><a href="#" onClick="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src='<?php echo base_url(); ?>img/icons/csv.png' width="24" /> CSV</a></li>
                        <li><a href="#" onClick="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src='<?php echo base_url(); ?>img/icons/txt.png' width="24" /> TXT</a></li>
                        <li class="divider"></li>
                        <li><a href="#" onClick="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='<?php echo base_url(); ?>img/icons/xls.png' width="24" /> XLS</a></li>
                        <li><a href="#" onClick="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='<?php echo base_url(); ?>img/icons/word.png' width="24" /> Word</a></li>
                        <li><a href="#" onClick="$('#customers2').tableExport({type:'powerpoint',escape:'false'});"><img src='<?php echo base_url(); ?>img/icons/ppt.png' width="24" /> PowerPoint</a></li>
                        <li class="divider"></li>
                        <li><a href="#" onClick="$('#customers2').tableExport({type:'png',escape:'false'});"><img src='<?php echo base_url(); ?>img/icons/png.png' width="24" /> PNG</a></li>
                        <li><a href="#" onClick="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='<?php echo base_url(); ?>img/icons/pdf.png' width="24" /> PDF</a></li>
                    </ul>
                </div>

            </div>
            <div class="panel-body">
                <table id="Tbl_rooms" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Room No</th>
                            <th>Room Type</th>
                            <th>Price Per Night</th>
                            <th>Max Persons</th>
                            <th>Status</th>
                            <th>Availability</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="Tbl_rooms_body"></tbody>
                </table>

            </div>
        </div>
        <!-- END DATATABLE EXPORT -->
    </div>
</div>
</div>
<script>

function show_form(){
    $("#submit_formRow").show();
    $("#tbl_row").hide();
}

$(document).ready(function(){
    show_RoomDetails();
    // $("#submit_formRow").show();

});


$("#submit_form").on("submit",function(e){
    e.preventDefault();
    // alert("ok");

    var roomno_input = ($('#roomno_input').val().toUpperCase()).trim();
    alert(roomno_input);
    var roomtype_input = ($('#roomtype_input').val().toUpperCase()).trim();
    var roomprice_input = ($('#roomprice_input').val().toUpperCase()).trim();
    var roomlimit_input = ($('#roomlimit_input').val().toUpperCase()).trim();
    var checkbox_input = ($('#checkbox_input').val().toUpperCase()).trim();

    if(roomno_input != ""){
    var base_url='<?php echo base_url(); ?>';
    $.ajax({
        url:base_url+'index.php/Roomdetails/create',
        type:'POST',
        dataType:'json',
        data:{roomno_input:roomno_input,roomtype_input:roomtype_input,roomprice_input:roomprice_input,
        roomlimit_input:roomlimit_input,checkbox_input:checkbox_input
                },
                success:function(response){
                   if(response.msg == false){
                    //   $("#errmsg").html("That Type is already taken. Please Add different one");
                      setTimeout(function(){
                    // $("#errmsg").html("");
                  }, 5000);
                   }
                  else{
                        $('#submit_form')[0].reset();
                        // $("#errmsg").html("");
                        show_RoomDetails();
                      }
                  }
                  }); 
                    return false;
            }
                    //  else{
                    // $("#errmsg").html("Type is Required.");

                    //     setTimeout(function(){
                    //         $("#errmsg").html("");
                    //     //   window.location.reload(1);
                    //     }, 5000);

                    // }
});


// $("#submit_form").on("submit",function(e){
//     e.preventDefault();

//     var roomno_input = ($('#roomno_input').val().toUpperCase()).trim();
//     var roomtype_input = ($('#roomtype_input').val().toUpperCase()).trim();
//     var roomprice_input = ($('#roomprice_input').val().toUpperCase()).trim();
//     var roomlimit_input = ($('#roomlimit_input').val().toUpperCase()).trim();
//     var checkbox_input = ($('#checkbox_input').val().toUpperCase()).trim();
    

//     if(roomno_input != "" ){
//        $("#errmsgcustomername").html("<font color='red'>Please Select Customer Name</font>");

//     }else{
//        $("#errmsgcustomername").html("");
//             if(roomtype_input != ""){
//                 $("#errmsgcustomername").html("<font color='red'>Please Select Customer Name</font>");
//             }else{
//                     $("#errmsgcustomername").html("");
//                 if(roomprice_input != ""){
//                     $("#errmsgcustomername").html("<font color='red'>Please Select Customer Name</font>");
//                 }else{
//                     if(roomlimit_input != ""){

//                     }else{

//                 var base_url='<?php echo base_url(); ?>'
//                 $.ajax({
//                   url:base_url+'index.php/Roomdetails/create',
//                   type:'POST',
//                 dataType:'json',
//                 data:{roomno_input:roomno_input,roomtype_input:roomtype_input,roomprice_input:roomprice_input
//                     roomlimit_input:roomlimit_input,checkbox_input:checkbox_input
//                 },
//                   success:function(response){
//                    if(response.msg == false){
//                       $("#errmsg").html("That Type is already taken. Please Add different one");
//                       setTimeout(function(){
//                     $("#errmsg").html("");
//                   }, 5000);
//                    }
//                   else{
//                         $('#submit_form')[0].reset();
//                         // $("#errmsg").html("");
//                         show_RoomDetails();
//                       }
//                   }
//                   }); 
//                     return false;
//             }}}}
            
//                      else{
//                     $("#errmsg").html("Type is Required.");

//                         setTimeout(function(){
//                             $("#errmsg").html("");
//                         //   window.location.reload(1);
//                         }, 5000);

//                     }

// });




function show_RoomDetails() {
    $.ajax({
        type: 'ajax',
        url: '<?php echo site_url('/Roomdetails/get_roomDetails'); ?>',
        async: true,
        dataType: 'json',
        success: function(response) {
            var html = '';
            var i;
            for (i = 0; i < response.length; i++) {
                html += '<tr>' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td>' + response[i].roomNumber + '</td>' +
                    '<td>' + response[i].roomTypeId+'</td>' +
                    '<td>' + response[i].pricePerNight + '</td>' +
                    '<td>' + response[i].maxPersons + '</td>' +
                    '<td>' + response[i].status + '</td>' +
                    '<td>' + response[i].isAvailable + '</td>' +
                    '<td><div class="btn-group btn-group-sm">' +
                    '<button class="btn btn-default btn-rounded btn-sm" title="Edit Customers Details" onclick="edit_customer(' + response[i].roomId + ');"><i class="fa fa-edit"></i></button>' +
                    '<button  class="btn btn-danger btn-rounded btn-sm" title="Remove Customers Details" onclick="remove_customer(' + response[i].roomId + ');"><i class="fa fa-times"></i></button>' +
                    '</div></td></tr>';
            }
            $('#Tbl_rooms_body').html(html);
            $('#Tbl_rooms').DataTable();
        }
    });
}

function show_form(){
    $("#submit_formRow").show();
    $("#tbl_row").hide();
}


// var submit_form = $("#submit_form").validate({
//                 ignore: [],
//                 rules: {                                            
//                         login: {
//                                 required: true,
//                                 minlength: 2,
//                                 maxlength: 8
//                         },
//                         password: {
//                                 required: true,
//                                 minlength: 5,
//                                 maxlength: 10
//                         },
//                         're-password': {
//                                 required: true,
//                                 minlength: 5,
//                                 maxlength: 10,
//                                 equalTo: "#password2"
//                         },
//                         age: {
//                                 required: true,
//                                 min: 18,
//                                 max: 100
//                         },
//                         email: {
//                                 required: true,
//                                 email: true
//                         },
//                         date: {
//                                 required: true,
//                                 date: true
//                         },
//                         credit: {
//                                 required: true,
//                                 creditcard: true
//                         },
//                         site: {
//                                 required: true,
//                                 url: true
//                         }
//                     }                                        
//                 });  


// function remove_customer(customerId) {
//     $.ajax({
//         type: 'POST',
//         url: '<?php echo site_url('/Customer/remove_customer'); ?>',
//         data: {
//             customerId: customerId
//         },
//         success: function(response) {
//             show_customers();
//         }
//     });
// }

// function edit_customer(customerId) {
//     window.location = "<?php echo site_url('Customer/edit_customer/'); ?>" + customerId;
// }
</script>
