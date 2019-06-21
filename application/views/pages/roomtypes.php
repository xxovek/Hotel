    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
                    <li><a href="<?php echo site_url();?>/Dashboard">Home</a></li>                    
                    <li class="active">Rooms</li>
                    <li class="active">Rooms Types</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                 <!-- PAGE CONTENT WRAPPER -->
                 <div class="page-content-wrap">
                
                <div class="row">
                    <div class="col-md-12"  id="div_submitFrm">
                        
                        <form class="form-horizontal" action="<?php echo site_url();?>/rooms/create" class="form-horizontal" method="post">
                       <!-- <form action="<?php echo site_url();?>/Login/authentication" class="form-horizontal" method="post"> -->
 
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Room Types</strong> Add New</h3>
                                <ul class="panel-controls">
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <p></p>
                            </div>
                            <div class="panel-body">                                                                        
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Room Type</label>
                                    
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" name="roomtypeName"/>
                                        </div>        

                                        <span class="help-block">Add Room Type as Single,Double etc.</span>&nbsp;<?php echo validation_errors(); ?>
                                    </div>
                                </div>
                       
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-default" type="reset">Clear Form</button>                                    
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </div>

                        </form>
                        
                    </div>


                    <div class="col-md-12"  id="div_editFrm" style="display:none">
                        
                        <form class="form-horizontal" action="<?php echo site_url();?>/rooms/update" class="form-horizontal" method="post">
 
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Room Types</strong> Add New</h3>
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
                                    <label class="col-md-3 col-xs-12 control-label">Room Type</label>
                                    
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" id="roomtypeName1" name="roomtypeName1"/>
                                        </div>        

                                        <span class="help-block">Add Room Type as Single,Double etc.</span>&nbsp;<?php echo validation_errors(); ?>
                                    </div>
                                </div>
                       
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-default" type="reset">Clear Form</button>                                    
                                <button type="submit" class="btn btn-primary pull-right">Save</button>
                            </div>
                        </div>

                        </form>
                        
                    </div>

                </div>      
                
                <div class="panel-body">
                                    <table id="Tbl_roomtypes" class="table datatable">
                                        <thead>
                                            <tr>
                                                <!-- <th>#</th> -->
                                                <th>Type</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                        
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php foreach($roomtypes as $rt):?>
                                            <tr>
                                                <td><?php echo ucfirst($rt['roomType']);?></td>
                                                
                                                <td><?php echo $rt['created_at'];?></td>
                                                <td><div class="btn-group btn-group-sm"> 
                                                <button class="btn btn-default btn-rounded btn-sm" onclick='edit_row("<?php echo $rt['roomId']; ?>" , "<?php echo $rt['roomType'];?>");' ><span class="fa fa-pencil"></span></button>
                                                <?php echo form_open('/Rooms/delete/'.$rt['roomId']); ?>
                                                
                                                <button class="btn btn-danger btn-rounded btn-sm" ><span class="fa fa-times"></span></button>
                                                </form>
                                                
                                                </div></td>
                                            </tr>
                                    <?php endforeach;?>
                                        </tbody>
</table> 
</div>
                
            </div>
            <!-- END PAGE CONTENT WRAPPER -->       

            <script>
            function edit_row(typeid,typename){
               
              
                document.getElementById("id").value = typeid;
  
                document.getElementById("roomtypeName1").value = typename;
                $("#div_editFrm").show();
                $("#div_submitFrm").hide();
            }

            // function delete_row(typeid){
            //     alert(typeid);
            // }
            </script>