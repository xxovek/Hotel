       
         
        <ul class="breadcrumb">
                    <li><a href="<?php echo site_url();?>/Dashboard">Home</a></li>                    
                    <li class="active">Rooms</li>
                    <li class="active">Rooms Details</li>
        </ul>
              
                <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
       
<div class="row" id="tbl_row">
    <div class="col-md-12">

        <!-- START DATATABLE EXPORT -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">DataTable Export</h3>
                <div class="btn-group pull-right">
                    <button class="btn btn-success" onclick="window.location='<?php echo site_url('Roomdetails/add_roomdetails'); ?>'" ><i class="fa fa-bars"></i>New Room Info</button>

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
        $.ajax({
                url:base_url+'index.php/Roomdetails/getroomtypes',
                method:"POST",
                success: function(data){
                $("#roomtypeSel").html(data);
        }
        });
        }


function show_RoomDetails() {
    $.ajax({
        type: 'ajax',
        url: '<?php echo site_url('/Roomdetails/get_roomDetails'); ?>',
        async: true,
        dataType: 'json',
        success: function(response) {
            // alert(response);
            var html = '';
            var i;
            for (i = 0; i < response.length; i++) {
                html += '<tr>' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td>' + response[i].roomNumber + '</td>' +
                    '<td>' + response[i].roomType+'</td>' +
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
