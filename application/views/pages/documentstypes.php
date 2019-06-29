    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
                    <li><a href="<?php echo site_url();?>/Dashboard">Home</a></li>                    
                    <li class="active">Documents</li>
                    <li class="active">Documents Types</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">
                
                <div class="row">
                    <div class="col-md-12" id="div_submitFrm">

                    <form class="form-horizontal" id="submitFrm" class="form-horizontal" method="post">
 
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Documents Types</strong> Add New</h3>
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
                                    <label class="col-md-3 col-xs-12 control-label">Document Type</label>
                                    
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" id="documenttypeName" name="documenttypeName"/>
                                        </div>        

                                        <span class="help-block">Add Document Type as Aadhar,PAN etc.</span>&nbsp;<?php echo validation_errors(); ?>
                                        <br>
                                    <span id="errmsg" ></span>
                                    </div>
                                </div>

                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-default" type="reset">Clear Form</button>                                    
                                <button type="submit"  id="submitbtn"  class="btn btn-primary pull-right">Submit</button>
                                <button type="submit" style="display:none" id="updateBtn" class="btn btn-primary pull-right">Save</button>
                            </div>
                        </div>

                        </form>
                   
                    </div>


                  

                </div>      
                
                <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                <div class="panel-body">
                                    <table id="Tbl_documenttypes" class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>

                                                <th>Type</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                        
                                            </tr>
                                        </thead>
                                        <tbody id="Tbl_documenttypes_body">
                                          
                                           
                                        
                                        </tbody>
</table> 
</div>

</div>
            </div>
        </div>
                
            </div>
            <!-- END PAGE CONTENT WRAPPER -->              

            <script>

            LoadTBLData();

            function edit_row(typeid,typename){
               
                document.getElementById("id").value = typeid;
  
                document.getElementById("documenttypeName").value = typename;
                $("#updateBtn").show();
               $("#submitbtn").hide();
            }

            function delete_row(typeid){
                // alert(typeid);
                var base_url='<?php echo base_url(); ?>';
                $.ajax({
                        type:'POST',
                        url:base_url+'index.php/Documents/delete',
                        data:{typeid:typeid},
                         success:function(response){
                             window.location.reload();
                            }
                    });
            }



            $('#updateBtn').on('click',function(e){
              
              e.preventDefault();
              var typename = ($('input[name="documenttypeName"]').val().toUpperCase()).trim();
              var typeid = $('#id').val();
              if(typename != ""){
               var base_url='<?php echo base_url(); ?>'
               $.ajax({
                 url:base_url+'index.php/Documents/update',
                 type:'POST',
               dataType:'json',
               data:{typename:typename,typeid:typeid},
                 success:function(response){
              
                    LoadTBLData();
                       $('#submitFrm')[0].reset();
                       $("#errmsg").html("");
                       $("#updateBtn").hide();
                      $("#submitbtn").show();
                    
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

            $('#submitbtn').on('click',function(e){
              
               e.preventDefault();
               var typename = ($('input[name="documenttypeName"]').val().toUpperCase()).trim();

               if(typename != ""){
                var base_url='<?php echo base_url(); ?>'
                $.ajax({
                  url:base_url+'index.php/Documents/create',
                  type:'POST',
                dataType:'json',
                data:{typename:typename},
                  success:function(response){
                   if(response.msg == false){
                      $("#errmsg").html("That Type is already taken. Please Add different one");
                      setTimeout(function(){
                    $("#errmsg").html("");
                  }, 5000);
                   }
                  else{
                        $('#submitFrm')[0].reset();
                        $("#errmsg").html("");
                        LoadTBLData();
                      }
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
                        // url:base_url+'<?php echo site_url('/Documents/getTypes');?>',
                        url:base_url+'index.php/Documents/getTypes',
                        async : true,
                        dataType:'json',
                         success:function(response){
                    var html = '';
                    var i;
                    for(i=0; i<response.length; i++){
                        html += '<tr>'+
                                '<td>'+(i + 1)+'</td>'+

                                '<td>'+response[i].DocumentType+'</td>'+
                                '<td>'+response[i].created_at+'</td>'+
                                '<td><div class="btn-group">'+  
                                '<button class="btn btn-default btn-rounded btn-sm" onclick="edit_row(\''+response[i].DocumentId+'\',\''+response[i].DocumentType+'\');"><span class="fa fa-edit"></span></button>'+
                                '<button  class="btn btn-danger btn-rounded btn-sm" onclick="delete_row('+response[i].DocumentId+');"><span class="fa fa-times"></span></button>'+
                                '</div></td></tr>';
                    }
                   $('#Tbl_documenttypes_body').html(html);
                    $('#Tbl_documenttypes').DataTable();
                    }
                    });
                }
            </script>