    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>/Dashboard">Home</a></li>
        <li class="active">Customers</li>
    </ul>
    <!-- END BREADCRUMB -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span>Customers Data</h2>
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
                            <button class="btn btn-success" onclick="window.location='Customer/add_customer'"><i class="fa fa-bars"></i>New Customer</button>
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
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Registration Date</th>
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
        show_customers();
        
        function show_customers() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('/Customer/get_customer'); ?>',
                async: true,
                dataType: 'json',
                success: function(response) {
                    var html = '';
                    var i;
                    for (i = 0; i < response.length; i++) {
                        html += '<tr>' +
                            '<td>' + response[i].FirstName + ' ' + response[i].lastName + '</td>' +
                            '<td>' + response[i].address + '</td>' +
                            '<td>' + response[i].contactNumber + '</td>' +
                            '<td>' + response[i].email + '</td>' +
                            '<td>' + response[i].created_at + '</td>' +
                            '<td><div class="btn-group btn-group-sm">' +
                            '<button class="btn btn-default btn-rounded btn-sm" title="Edit Customers Details" onclick="edit_customer(' + response[i].customerId + ');"><i class="fa fa-edit"></i></button>' +
                            '<button  class="btn btn-danger btn-rounded btn-sm" title="Remove Customers Details" onclick="remove_customer(' + response[i].customerId + ');"><i class="fa fa-times"></i></button>' +
                            '</div></td></tr>';
                    }
                    $('#customerData').html(html);
                    $('#customers2').DataTable();
                }
            });
        }

        function remove_customer(customerId) {
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('/Customer/remove_customer'); ?>',
                data: {
                    customerId: customerId
                },
                success: function(response) {
                    show_customers();
                }
            });
        }

        function edit_customer(customerId) {
            window.location = "<?php echo site_url('Customer/edit_customer/');?>" + customerId;
        }
    </script>