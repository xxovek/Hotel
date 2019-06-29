       
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
       
<div class="row" id="tbl_row">
    <div class="col-md-12">

        <!-- START DATATABLE EXPORT -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">DataTable Export</h3>
                <div class="btn-group pull-right">
                    <button class="btn btn-success" onclick="window.location='add_roomdetails'" ><i class="fa fa-bars"></i>New Room Info</button>
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


show_RoomDetails();

function getroomtype(){
    var base_url='<?php echo base_url(); ?>';
// var html='<option value="" selected>Select Room Type </option>';
// var html='<div class="btn-group bootstrap-select form-control select"><button type="button" class="btn dropdown-toggle selectpicker btn-default" data-toggle="dropdown" data-id="roomtypeSel" title="Select Room Type" aria-expanded="false"><span class="filter-option pull-left">Select Room Type</span>&nbsp;<span class="caret"></span></button><div class="dropdown-menu open"><div class="bootstrap-select-searchbox"><input type="text" class="input-block-level form-control" autocomplete="off"></div><ul class="dropdown-menu inner selectpicker" role="menu"></ul></div></div>';
$.ajax({
// type : "POST",
url:base_url+'index.php/Roomdetails/getroomtypes',
method:"POST",
// dataType: 'json',
success: function(data){
// alert("ok");

// var len = response.length;
// var i=0;
// if(len > 0){
// for(var i=0;i<len;i++){
//    html+='<option value="'+response[i].roomId+'">'+response[i].roomType+'</option>';
// //    html+='<div class="btn-group bootstrap-select form-control select"><button type="button" class="btn dropdown-toggle selectpicker btn-default" data-toggle="dropdown" data-id="roomtypeSel" title="Select Room Type" aria-expanded="false"><span class="filter-option pull-left">Select Room Type</span>&nbsp;<span class="caret"></span></button><div class="dropdown-menu open"><div class="bootstrap-select-searchbox"><input type="text" class="input-block-level form-control" autocomplete="off"></div><ul class="dropdown-menu inner selectpicker" role="menu"></ul></div></div>'
//     // $("#roomtypeSel").append('<option value="'+response[i].roomId+'">'+response[i].roomType+'</option>');
// }
   $("#roomtypeSel").html(data);
// }
// else{
// }
}
});
}


// function show_form(){
//    getroomtype();
//     $("#submit_formRow").show();
//     $("#tbl_row").hide();
// }


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
                    '<button class="btn btn-default btn-rounded btn-sm" title="Edit Customers Details" onclick="edit_room(' + response[i].roomId + ');"><i class="fa fa-edit"></i></button>' +
                    '<button  class="btn btn-danger btn-rounded btn-sm" title="Remove Customers Details" onclick="remove_room(' + response[i].roomId + ');"><i class="fa fa-times"></i></button>' +
                    '</div></td></tr>';
            }
            $('#Tbl_rooms_body').html(html);
            $('#Tbl_rooms').DataTable();
        }
    });
}


function remove_room(roomid) {
    $.ajax({
        type: 'POST',
        url: '<?php echo site_url('/Roomdetails/delete'); ?>',
        data: {
            roomid: roomid
        },
        success: function(response) {
            show_RoomDetails();
        }
    });
}

function edit_room(roomid) {
    window.location = "<?php echo site_url('Roomdetails/edit_roomdetails/'); ?>" + roomid;
}
</script>
