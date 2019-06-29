    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
                    <li><a href="<?php echo site_url();?>/Dashboard">Home</a></li>
                    <li class="active">Orders</li>
                    <li class="active">Products</li>
                </ul>
                <!-- END BREADCRUMB -->

               <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
                
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" id="jvalidate" role="form" >
                            <input type="hidden" id="productid">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title" id="formname" ><strong>Product Details</strong> Add New</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <p></p>
                                </div>
                                    <div class="panel-body">      
                                    <div class="form-group">
                                        <label class="col-md-3  control-label">Product Name</label>
                                        <div class="col-md-6 ">              
                                            <div class="input-group">
                                                <span class=""></span>
                                                <input type="text" id="productname_input" name="productname_input" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">This is Product Name of text field</span>
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Product Price</label>
                                        <div class="col-md-6 ">                                            
                                            <div class="input-group">
                                                <input type="text" id="productprice_input" name="productprice_input" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">This is Product Price of text field</span>                                   
                                        </div>
                                    </div>

                                    <div class="panel-footer">
                                        <button class="btn btn-default" type="button" onClick="resetForm();" >Clear Form</button>
                                        <button type="submit" style="display:none" id="updateBtn" onclick="update();" class="btn btn-primary pull-right">Save</button>

                                        <!-- <button class="btn btn-default" type="button" onclick="window.location='<?php echo site_url('Products/'); ?>'" >Back</button>                                          -->
                                        <button type="button"  class="btn btn-primary pull-right" id="submit_btn" onclick="saveForm();">Submit</button>
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
                <!-- <div class="btn-group pull-right">
                    <button class="btn btn-success" onclick="window.location='add_product'" ><i class="fa fa-bars"></i>New Product</button>
                </div> -->

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
                <table id="Tbl_products" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Created On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="Tbl_products_body"></tbody>
                </table>

            </div>
        </div>
        <!-- END DATATABLE EXPORT -->
    </div>
</div>

            </div>
            <!-- END PAGE CONTENT WRAPPER -->
            <script type='text/javascript' src='<?php echo base_url(); ?>js/plugins/jquery-validation/jquery.validate.js'></script>

<script>

        $(function() {
            var jvalidate = $("#jvalidate").validate({
                ignore: [],
                rules: {
                    productname_input: {
                        required: true,
                        minlength: 4,
                        maxlength: 20
                    },
                    productprice_input: {
                        required: true,
                        minlength: 1,
                        maxlength: 3
                    }

                }
            });

        });
              
        function update(){
            var returnVal = $("#jvalidate").valid();
    
            if (returnVal) {
                    var formData = {
                        productname_input: ($('#productname_input').val().toUpperCase()).trim(),
                        productprice_input: $('#productprice_input').val(),
                        productid:$('#productid').val()
                    };

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo site_url('/Products/edit_product'); ?>',
                        data: formData,
                        dataType: 'json',
                        success: function(response) {
                            $('#jvalidate')[0].reset();
                            $("#updateBtn").hide();
                            $("#submit_btn").show();
                            show_Products();
                        },
                        error: function(xhr) {
                            // alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                        }
                    });

                }else{}
        }

        function saveForm(){

            var returnVal = $("#jvalidate").valid();
    
                if (returnVal) {
                        var formData = {
                            productname_input: ($('#productname_input').val().toUpperCase()).trim(),
                            productprice_input: $('#productprice_input').val()
                        };

                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url(); ?>/Products/create',
                            data: formData,
                            dataType: 'json',
                            success: function(response) {
                            
                                    $('#jvalidate')[0].reset();
                                    window.location = "<?php echo site_url('Products/'); ?>";
                                    show_Products();
                            },
                            error: function(xhr) {
                                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                            }
                        });

                    }else{}
        }

        function resetForm(){
            $('#jvalidate')[0].reset();
            $("#updateBtn").hide();
            $("#submit_btn").show();
        }
   
         show_Products();

            function show_Products(){
                $.ajax({
                    type: 'ajax',
                    url: '<?php echo site_url('/Products/getproducts'); ?>',
                    async: true,
                    dataType: 'json',
                    success: function(response) {
                        var html = '';
                        var i;
                        for (i = 0; i < response.length; i++) {
                            html += '<tr>' +
                                '<td>' + (i + 1) + '</td>' +
                                '<td>' + response[i].productName + '</td>' +
                                '<td>' + response[i].productPrice+'</td>' +
                                '<td>' + response[i].created_at + '</td>' +
                                '<td><div class="btn-group btn-group-sm">' +
                                '<button class="btn btn-default btn-rounded btn-sm" title="Edit Customers Details" onclick="edit_product(\''
                                +response[i].ProductId+'\',\''+response[i].productName+'\',\''+response[i].productPrice+'\');"><i class="fa fa-edit"></i></button>' +
                                '<button  class="btn btn-danger btn-rounded btn-sm" title="Remove Customers Details" onclick="remove_product(' + response[i].ProductId + ');"><i class="fa fa-times"></i></button>' +
                                '</div></td></tr>';
                        }
                        $('#Tbl_products_body').html(html);
                        $('#Tbl_products').DataTable();
                    }
                });
            }


        function remove_product(productid) {
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('/Products/delete'); ?>',
                data: {
                    productid: productid
                },
                success: function(response) {
                    show_Products();
                }
            });
        }

        function edit_product(productid,productname,price) {
            $('#productname_input').val(productname);
            $('#productprice_input').val(price);
            $('#productid').val(productid)

            $("#updateBtn").show();
            $("#submit_btn").hide();
        }

</script>