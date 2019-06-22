    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
                    <li><a href="<?php echo site_url();?>/Dashboard">Home</a></li>                    
                    <li class="active">Payments</li>
                    <li class="active">Payments Types</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                   <!-- PAGE CONTENT WRAPPER -->
                   <div class="page-content-wrap">
                
                <div class="row">
                    <!-- <div class="col-md-12" id="div_submitFrm">
                        
                        <form class="form-horizontal" action="<?php echo site_url();?>/Payments/create" class="form-horizontal" method="post">
 
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Payments Types</strong> Add New</h3>
                                <ul class="panel-controls">
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <p></p>
                            </div>
                            <div class="panel-body">                                                                        
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Payment Type</label>
                                    
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" name="paymenttypeName"/>
                                        </div>        

                                        <span class="help-block">Add Payment Type as Cash,Card etc.</span>&nbsp;<?php echo validation_errors(); ?>
                                    </div>
                                </div>
                       
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-default" type="reset">Clear Form</button>                                    
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </div>

                        </form>
                        
                    </div> -->


                    <div class="col-md-12" id="div_submitFrm">
                        
                        <form class="form-horizontal" class="form-horizontal" id="submitFrm" method="post">
 
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Payments Types</strong> Add New</h3>
                                <ul class="panel-controls">
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <p></p>
                            </div>
                            <div class="panel-body">                                                                        
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Payment Type</label>
                                    
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" name="paymenttypeName" />
                                          
                                            <!-- <input type="text" onblur="checkTypeExists(this.value);" class="form-control" name="paymenttypeName" required/> -->
                                        </div>        

                                        <span class="help-block">Add Payment Type as Cash,Card etc.</span>&nbsp;<?php echo validation_errors(); ?>
                                    <br>
                                    <span id="errmsg" ></span>
                                    </div>
                                </div>
                       
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-default" type="reset">Clear Form</button>                                    
                                <button type="submit" id="submitbtn"  class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </div>

                        </form>
                        
                    </div>

                    <div class="col-md-12" id="div_editFrm" style="display:none">
                        
                        <form class="form-horizontal" action="<?php echo site_url();?>/Payments/update" class="form-horizontal" method="post">
 
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Payments Types</strong> Update </h3>
                                <ul class="panel-controls">
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <p></p>
                            </div>
                            <!-- <input type="hidden" name="id" value="<?php echo $fetchdata['paymentTypeId'];?>" /> -->
                            <input type="hidden" id="id" name="id"/>

                            <div class="panel-body">                                                                        
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Payment Type</label>
                                    
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <!-- <input type="text" class="form-control" name="paymenttypeName1" Value="<?php echo $fetchdata['paymentType']; ?>" /> -->
                                            <input type="text" class="form-control" id="paymenttypeName1" name="paymenttypeName1"  />
                                        
                                        </div>        

                                        <span class="help-block">Add Payment Type as Cash,Card etc.</span>&nbsp;<?php echo validation_errors(); ?>
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
                                    <table id="Tbl_paymenttypes" class="table datatable">
                                        <thead>
                                            <tr>
                                                <!-- <th>#</th> -->

                                                <th>Type</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                        
                                            </tr>
                                        </thead>
                                        <tbody id="Tbl_paymenttypes_body">
                                          
                                         </tbody>
</table> 
</div>
<!-- onclick="edit_row('<?php echo $pt['paymentTypeId'];?>'',''<?php echo $pt['paymentType'];?>');" -->
            </div>
            <!-- END PAGE CONTENT WRAPPER -->       
            <script>
               LoadTBLData();

            function edit_row(typeid,typename){
               
                // document.getElementsByName("id").value = typeid;
                document.getElementById("id").value = typeid;
  
                document.getElementById("paymenttypeName1").value = typename;
                $("#div_editFrm").show();
                $("#div_submitFrm").hide();
            }

            // function checkTypeExists(type){
            //  // alert(type);
            //  var base_url='<?php echo base_url(); ?>';
            //     $.ajax({
            //             type:'POST',
            //             url:base_url+'index.php/Payments/check_type_exists/type',
            //             data:{type:type},
            //             dataType:'json',
            //              success:function(response){
            //                 // window.location.reload();
            //                 if(response.status === true){
            //                     $("#errmsg").html("That Type is already taken. Please Add different one.");
            //                   // $('#submitFrm')[0].reset();

            //                     setTimeout(function(){
            //                     $("#errmsg").html("");
            //                    // $('#submitFrm')[0].reset();

            //                   //   window.location.reload(1);
            //                     }, 5000);
            //                 }else{

            //                 }
            //                 }
            //         });
            // }

            function delete_row(typeid){
                //alert(typeid);
                var base_url='<?php echo base_url(); ?>';
                $.ajax({
                        type:'POST',
                        url:base_url+'index.php/Payments/delete',
                        data:{typeid:typeid},
                         success:function(response){
                             window.location.reload();
                            }
                    });
            }

            $('#submitbtn').on('click',function(e){
                // alert("ok");
                    // $("#Tbl_paymenttypes_body").reload();

               e.preventDefault();
               var data = $('#submitFrm').serialize();
               var typename = $('input[name="paymenttypeName"]').val();
            //   alert(typename);

               if(typename != ""){
                var base_url='<?php echo base_url(); ?>'
                // action="<?php echo site_url();?>/Payments/create"
                $.ajax({
                  url:base_url+'index.php/Payments/create',
                  type:'POST',
                //   data:data,
                data:{typename:typename},
                  success:function(data){

                  $('#submitFrm')[0].reset();

                LoadTBLData();
                   // alert("ok"); // here what you want to do with response
                  }
                  }); 
              return false;
               }else{
                $("#errmsg").html("Type is Required.");

                setTimeout(function(){
                    $("#errmsg").html("");
                //   window.location.reload(1);
                  }, 5000);
               }
             
            });



            // functionname(\''+ issue_id +'\',\''+response[i]['IssuesDate']+'\')
            function LoadTBLData(){
                var base_url='<?php echo base_url();?>';
                    $.ajax({
                        type:'ajax',
                        // url:base_url+'<?php echo site_url('/Payments/getTypes');?>',
                        url:base_url+'index.php/Payments/getTypes',

                        async : true,
                        dataType:'json',
                         success:function(response){
                    var html = '';
                    var i;
                    for(i=0; i<response.length; i++){
                        html += '<tr>'+
                                '<td>'+response[i].paymentType+'</td>'+
                                '<td>'+response[i].created_at+'</td>'+
                                '<td><div class="btn-group">'+  
                                '<button class="btn btn-default btn-rounded btn-sm" onclick="edit_row(\''+response[i].paymentTypeId+'\',\''+response[i].paymentType+'\');"><span class="fa fa-edit"></span></button>'+
                                '<button  class="btn btn-danger btn-rounded btn-sm" onclick="delete_row('+response[i].paymentTypeId+');"><span class="fa fa-times"></span></button>'+
                                '</div></td></tr>';
                    }
                   $('#Tbl_paymenttypes_body').html(html);
                    $('#Tbl_paymenttypes').DataTable();
                    }
                    });
                }


            </script>