<ul class="breadcrumb">
                    <li><a href="<?php echo site_url();?>/Dashboard">Home</a></li>                    
                    <li class="active">Rooms</li>
                    <li class="active">Rooms Amenties</li>
                </ul>

    <div class="page-content-wrap">


                        <div class="row">
                            <div class="col-md-12"  id="div_submitFrm">
                            <form class="form-horizontal"  class="form-horizontal" id="jvalidate" method="post">
        
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" id="formname"><strong>Rooms Amenity</strong> Add New</h3>
                                        <ul class="panel-controls">
                                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="panel-body">
                                        <p></p>
                                    </div>
                                    <input type="hidden" id="id" name="id"/>

                                    <div class="panel-body">                                                                        
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Amenity Name</label>
                                            
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="input-group">
                                                    <!-- <span class="input-group-addon"><span class="fa fa-pencil"></span></span> -->
                                                    <input type="text" class="form-control" id="amenityName" name="amenityName"/>
                                                </div>        

                                                <span class="help-block">Add Amenity Name as AC,TV etc.</span>&nbsp;<?php echo validation_errors(); ?>
                                                <br>
                                            <span id="errmsg" style="color: red;" ></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="panel-footer">
                                        <button class="btn btn-default" type="button" onClick="resetForm();">Clear Form</button>                                    
                                        <button type="button"  id="submitbtn" onclick="saveForm();" class="btn btn-primary pull-right">Submit</button>
                                        <button type="button" style="display:none" id="updateBtn" class="btn btn-primary pull-right">Save</button>
                                
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
                                <button class="btn btn-success" onclick="window.location='<?php echo site_url('Roomdetails/add_roomdetails'); ?>'" ><i class="fa fa-bars"></i>New Room Info</button>

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
                            <table id="Tbl_amenity" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Amenity Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="Tbl_amenity_body"></tbody>
                            </table>

                        </div>
                    </div>
                    <!-- END DATATABLE EXPORT -->
                </div>
            </div>



    </div>
    <script type='text/javascript' src='<?php echo base_url(); ?>js/plugins/jquery-validation/jquery.validate.js'></script>

    <script>

    
    
    $(function() {
                var jvalidate = $("#jvalidate").validate({
                    ignore: [],
                    rules: {
                     
                        amenityName:{
                            required: true,
                            number: false,
                            minlength: 3,
                            maxlength: 20

                        }
                    }
                });

            });

            function showTblData(){
        

            }

            function resetForm(){
                $('#jvalidate')[0].reset();
            }

            function saveForm(){
                var returnVal = $("#jvalidate").valid();
                //alert("ok");

                if (returnVal) {
                        var formData = {
                            roomno_input: ($('#amenityName').val().toUpperCase()).trim()
                        };


                        $.ajax({
                        type: 'POST',
                        url: '<?php echo site_url(); ?>/Roomamenties/create',
                        data: formData,
                        dataType: 'json',
                        success: function(response) {
                            // alert(response.msg);
                                            if(response.msg == false){
                                                $("#errmsg").html("That Amenity Name is already taken. Please Add different one.");
                                                setTimeout(function(){
                                                $("#errmsg").html("");
                                            }, 5000);
                                            }
                                            else{
                                                    $('#jvalidate')[0].reset();
                                                    window.location = "<?php echo site_url('Roomamenties/'); ?>";
                                                    showTblData();
                                                }
                            
                        },
                        error: function(xhr) {
                            alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                        }
                    });

                }else{}
                
            }

            function delete_row(){

            }

            function edit_row(){

            }

    </script>