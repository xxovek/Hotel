<ul class="breadcrumb">
    <li><a href="<?php echo site_url(); ?>/Dashboard">Home</a></li>
    <li class="active">Booking</li>
</ul>
<!-- END BREADCRUMB -->
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span>Payment Data</h2>
</div>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DATATABLE EXPORT -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">DataTable Export</h3>
                    <div class="btn-group pull-right">
                        <button class="btn btn-success" onclick="window.location='Payment/add_payment'"><i class="fa fa-bars"></i>New Payment</button>
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
                    <table id="customers2" class="table">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Name</th>
                                <th>Contact Number</th>
                                <th>Room Detail</th>
                                <th>Booking From</th>
                                <th>Booking Till</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="customerData">

                        </tbody>
                    </table>

                </div>
            </div>
            <!-- END DATATABLE EXPORT -->
        </div>
    </div>
</div>
<script>
    show_booking();
    function show_booking() {
        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('/Booking/get_booking'); ?>',
            async: true,
            dataType: 'json',
            success: function(response) {
                var html = '';
                var i;
                for (i = 0; i < response.length; i++) {
                    html += '<tr>' +
                        '<td>' + (i+1)+ '</td>' +
                        '<td>' + response[i].FirstName+' '+ response[i].lastName+ '</td>' +
                        '<td>' + response[i].contactNumber + '</td>' +
                        '<td>' + response[i].roomNumber +' '+ response[i].roomType + '</td>' +
                        '<td>' + response[i].FromDate + '</td>' +
                        '<td>' + response[i].UptoDate + '</td>' +

                        '<td><div class="btn-group btn-group-sm">' +
                        '<button class="btn btn-default btn-rounded btn-sm" title="Edit Booking Details" onclick="edit_booking(' + response[i].BookingId + ');"><i class="fa fa-edit"></i></button>' +
                        '<button  class="btn btn-danger btn-rounded btn-sm" title="Remove Booking Details" onclick="remove_booking(' + response[i].BookingId + ');"><i class="fa fa-times"></i></button>' +
                        '</div></td></tr>';
                }
                $('#customerData').html(html);
                $('#customers2').DataTable();
            }
        });
    }

    function remove_booking(BookingId) {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('/Booking/remove_booking'); ?>',
            data: {
              bookingId: BookingId
            },
            success: function(response) {
                show_booking();
            }
        });
    }

    function edit_booking(BookingId) {
        window.location = "<?php echo site_url('/Booking/edit_booking/'); ?>" + BookingId;
    }
</script>
