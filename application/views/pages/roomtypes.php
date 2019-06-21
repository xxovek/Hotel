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
                    <div class="col-md-12">
                        
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
                </div>      
                
                <div class="panel-body">
                                    <table id="customers2" class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Contact</th>
                                                <th>Email</th>
                                                <th>Registration Date</th>
                                        
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                            
                                            <?php foreach($roomtypes as $rt):?>
                                            <tr>
                                                <td><?php echo ucfirst($rt['roomType']);?></td>
                                                <td><?php echo ucwords($rt['roomType']);?></td>
                                                <td><?php echo $rt['roomType'];?></td>
                                                <td><?php echo $rt['created_at'];?></td>
                                                <td><?php echo $rt['updated_at'];?></td>
                                            </tr>
                                    <?php endforeach;?>
                                        </tbody>
</table> 
</div>
                
            </div>
            <!-- END PAGE CONTENT WRAPPER -->       