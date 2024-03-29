<ul class="breadcrumb">
                    <li><a href="<?php echo site_url();?>/Dashboard">Home</a></li>
                    <li class="active">Rooms</li>
                    <li class="active">Rooms Details</li>
                </ul>

                <div class="page-content-wrap">


                <div class="row" id="submit_formRow">
           <div class="col-md-12">
           <form class="form-horizontal" id="jvalidate" role="form" >
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Room Details</strong> Update</h3>
                                <ul class="panel-controls">
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                </ul>
                            </div>
                            <div class="panel-body"><p></p></div>

                                <div class="panel-body">
                                <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Room No.</label>
                                    <div class="col-md-6 ">

                                        <div class="input-group">
                                            <span class=""></span>
                                            <input type="text" id="roomno_input" readonly name="roomno_input" class="form-control"/>
                                        </div>
                                        <span class="help-block">Change not allowd,This is room number text</span>

                                        <br><span id="roomno_input_err"></span>
                                         </div>
                                </div>




                                <div class="form-group">
                                <label class="col-md-3 control-label">Room Type</label>
                                <div class="col-md-6">
                                    <!-- <span id="errmsgroomno"></span> -->
                                    <!-- <select class="form-control" data-live-search="true" name="roomtypeSel" id="roomtypeSel" > -->
                                    <select class="form-control select" data-live-search="true" name="roomtypeSel" id="roomtypeSel">
                                   <option value="">Select Room Type</option>
                                    <?php
                                        foreach($roomtypes as $row)
                                        {
                                        echo '<option value="'.$row->roomId.'">'.$row->roomType.'</option>';
                                        }
                                    ?>
                                    </select>
                                    <span class="help-block">Select Room Type</span>
                                    <br><span id="roomtype_input_err"></span>

                                </div>
                            </div>

                            <!-- html+='<option value="'+response[i].roomId+'">'+response[i].roomType+'</option>'; -->

                                <div class="form-group">
                                    <label class="col-md-3  control-label">Room Price</label>
                                    <div class="col-md-6 ">
                                        <!-- <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" id="roomprice_input" class="form-control"/>
                                        </div>-->
                                        <div class="input-group">
                                                <input type="text" class="form-control" id="roomprice_input" name="roomprice_input" >
                                                <!-- <span class="input-group-addon">.00</span> -->
                                            </div>
                                        <span class="help-block">This is room price of text field</span>
                                        <br><span id="roomprice_input_err"></span>

                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-md-3 control-label">Max Person Limit</label>
                                    <div class="col-md-6 ">
                                        <div class="input-group">
                                            <!-- <span class="input-group-addon"><span class="fa fa-pencil"></span></span> -->
                                            <input type="text" id="roomlimit_input" name="roomlimit_input" class="form-control"/>
                                        </div>
                                        <span class="help-block">This is room persons limit of text field</span>
                                        <br><span id="roomlimit_input_err"></span>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3  control-label">Availability</label>
                                    <div class="col-md-6 ">
                                        <label class="check">
                                         <input type="checkbox" id="checkbox_input"  name="checkbox_input" class="icheckbox" /></label>

                                         Check Availability

                                        <span class="help-block">Check yes or no, Available to use</span>
                                    </div>
                                </div>

                            </div>
                            <!-- </div> -->

                            <div class="col-md-6">
                                <div class="row">
                                <div class="col-md-6">
                                            <div class="form-group">
                                                      <label class="col-md-3 control-label">Item List</label>

                                                    <div class="col-md-8">
                                                    <span id="ItemSel_err"></span>
                                                        <select class="form-control select" data-live-search="true" name="item_input" id="item_input">
                                                        <option value="">Select Item</option>
                                                        <?php
                                                            foreach($amenities as $row)
                                                            {
                                                            echo '<option value="'.$row->amentyId.'">'.$row->name.'</option>';
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                            <div class="form-group">
                                                      <label class="col-md-3 control-label">Quantity</label>
                                                    <div class="col-md-6">

                                                        <div class="input-group">
                                                            <span class=""></span>
                                                            <input type="text" id="quntity_input" name="quntity_input" id="quntity_input" class="form-control"/>
                                                        </div>

                                                           <!-- <span class="help-block">Text Total Quantity is required </span> -->

                                                           <br>  <span id="roomno_input_err"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                    <div class="form-group">
                                                        <button type="button"  id="add-row" onclick="add_row();" class="btn btn-success btn-rounded btn-sm" ><i class="fa fa-plus"></i></button>
                                                    </div>
                                            </div>

                                </div>



                                <br>

                                <div class="form-group">
                                <div class="table-responsive"  id="sampleTbl2">
                                    <table class="table table-bordered" id="Tab_logic">

                                            <div class="scrollcell">
                                                <tbody id="fetchcellvalue2">

                                                </tbody>
                                            </div>
                                    </table>
                                </div>
                            </div>



                            </div>


                            <div class="panel-footer">
                                <button class="btn btn-default" type="button" onClick="resetForm();" >Clear Form</button>
                                <button class="btn btn-default" type="button" onclick="window.location='<?php echo site_url('Roomdetails/'); ?>'" >Back</button>
                                <button type="button"  class="btn btn-primary pull-right" onclick="updateForm();">Save</button>
                            </div>

                        </div>
                        </form>
           </div>

       </div>
                </div>
                <script type='text/javascript' src='<?php echo base_url(); ?>js/plugins/jquery-validation/jquery.validate.js'></script>


<script>

fetchroomtypename();

function fetchroomtypename(){
  var roomid = <?php echo $roomid; ?>;
//   alert(roomid);

  $.ajax({
  type : "POST",
//   url  : "<?=base_url()?>index.php/Roomdetails/fetchRoomtypename",
  url  : '<?php echo site_url(); ?>/Roomdetails/fetchRoomtypename',
  data :{roomid:roomid},
   dataType: 'json',
  success: function(response){

    fetchRoomInfo(roomid);

    $("#roomtypeSel").val(response.roomTypeId).trigger('change');
  }
});

}



function add_row(){
    var returnVal = $("#jvalidate").valid();
    if (returnVal) {
        var selectedVal = document.getElementById('item_input').value;

        // var item_input = $('#item_input').val().text();

        var selectedText = $("#item_input option:selected").html();

        var qty_input = document.getElementById('quntity_input').value;

            // var markup = "<tr ><td contenteditable='false'  data-id='"+ Component_id +"'>" + Component_val + "</td><td contenteditable='false' data-id='"+ percentVal +"'>"+percentVal+"</td><td onkeypress='return isNumberKey(event);' style='background-color:#eee;opacity:1'  data-id='"+ Amount_val +"'>" + Amount_val
            // + "</td><td class=''><button type='button' class='btn btn-danger' id='remove' onclick='remove_row(this);'><i class='fa fa-minus'></i></button></td></tr>";

         var markup = "<tr><td  data-id='"+ selectedVal +"'>"+selectedText+"</td><td data-id='"+ qty_input +"' >"+qty_input+"</td><td><button type='button' onclick='remove_row(this);' class='btn btn-danger btn-rounded btn-sm'><i class='fa fa-times'></i></button></td></tr>";
            $("#Tab_logic").append(markup);


            // $("#item_input").val("");
            // $("#item_input").trigger('change').val("");

            $("#quntity_input").val("");

            var myTab = document.getElementById('Tab_logic');
            var a, sum = 0;
    //         for (var i = 0; i < myTab.rows.length; i++) {
    //             var objCells = myTab.rows.item(i).cells;

    // }
    }else{

    }

}


function storeTblValuesItem() {
    var TableData = new Array();
    $('#sampleTbl2 tr').each(function(row, tr) {
    let cmt = $(tr).find('td:eq(0)').data('id');
    let amt = $(tr).find('td:eq(1)').data('id');
    //   let perc = $(tr).find('td:eq(1)').data('id')
    TableData[row] = {
                    "item": cmt,
                    "qty": amt,
                }
    });
    return TableData;
}

function remove_row(param) {
    var row = param.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

$("#item_input").on('change',function(){
        var arr = $(this).val() || "";
        // str = arr.split('-');

        var TableData1;
        TableData1 = storeTblValuesItem();
        // alert(TableData1.[0]['compo']);
        for (let i = 0; i < TableData1.length; i++) {
        //alert(TableData1[i]['compo']);
        if(TableData1[i]['item'] == arr ){
            arr = "";
        }
        }

        if(arr === ""){
        $('#ItemSel_err').html("<font color='red'>Already Selected</font>");
                setTimeout( function(){
                    //$("#item_input").trigger('change').val("");
                    $('#ItemSel_err').html("");
                },1000);
        }else {

       // $("#cm").val(str[1]);
        //  $("#cm").text(str[1]);
        // $("#options").trigger('change').val("");
      //  $('#cm').attr('name', str[0]);
        }
        // debugger
});




$(function() {
          var jvalidate = $("#jvalidate").validate({
              ignore: [],
              rules: {
                roomno_input: {
                      required: true,
                      minlength: 2,
                      maxlength: 8
                  },
                  roomtypeSel: {
                      required: true

                  },
                  roomprice_input: {
                      required: true,
                      number: true,
                      minlength: 4,
                      maxlength: 8
                  },
                  roomlimit_input: {
                    required: true,
                      number: true,
                      minlength: 1,
                      maxlength: 1
                  },

                  checkbox_input: {

                  }
              }
          });

      });


 function fetchamenitiesTblData(roomid){
   // var roomid = <?php echo $roomid; ?>;
   var formData = {
     roomid:roomid
   };

   $.ajax({
     type: 'POST',
     url: '<?php echo site_url(); ?>/Roomdetails/showtbldata',
     data: formData,
     dataType: 'json',
     success: function(response){
    //    alert(response[0].parameter);
     // [
     //   {"room-amentiesId":7,"roomId":25,"parameter":"1","value":"2","created_at":"2019-07-04 09:42:39","updated_at":"2019-07-04 09:42:39"},
     //   {"room-amentiesId":8,"roomId":25,"parameter":"3","value":"2","created_at":"2019-07-04 09:42:39","updated_at":"2019-07-04 09:42:39"},
     //   {"room-amentiesId":9,"roomId":25,"parameter":"4","value":"1","created_at":"2019-07-04 09:42:39","updated_at":"2019-07-04 09:42:39"},
     //   {"room-amentiesId":10,"roomId":25,"parameter":"5","value":"1","created_at":"2019-07-04 09:42:39","updated_at":"2019-07-04 09:42:39"}
     // ]
       var markup = "";

           for(var i=0 ; i < response.length ; i++){
             markup += "<tr><td  data-id='"+ response[i].parameter +"'>"+response[i].name+"</td><td data-id='"+ response[i].value +"' >"+response[i].value+"</td><td><button type='button' onclick='remove_row(this);' class='btn btn-danger btn-rounded btn-sm'><i class='fa fa-times'></i></button></td></tr>";
           }
           $("#Tab_logic").append(markup);

     },
     error: function(xhr) {
         alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
     }

   });

 }

 function fetchRoomInfo(roomid){

 $.ajax({
 type : "POST",
 url  : '<?php echo site_url(); ?>/Roomdetails/fetch_roomdetails',
 data :{roomid:roomid},
 dataType: 'json',
 success: function(response){
     $("#roomno_input").val(response.roomNumber);
     $("#roomprice_input").val(response.pricePerNight);
     $("#roomlimit_input").val(response.maxPersons);
     // $("#").val(response.);
     // alert(response.isAvailable);

     if(response.isAvailable === 0){
                     //   alert("if");
         // $("#checkbox_input").prop("checked", false);
         // document.getElementById("checkbox_input").checked = false;
                     // checkbox_input = 'YES';
                     $("#checkbox_input").prop("checked", false);

         // document.getElementById('checkbox_input').removeAttribute('checked');
                 }else{
                     //   alert("else");
                     $("#checkbox_input").prop("checked", true);

                     // checkbox_input = 'NO';
         // document.getElementById("checkbox_input").checked = true;
         // document.getElementById('checkbox_input').setAttribute('checked', 'checked');
                 }
                 fetchamenitiesTblData(roomid);
 }
 });

 }



function updateForm(){

    var returnVal = $("#jvalidate").valid();
    var roomid = <?php echo $roomid; ?>;
    TableDataArr = storeTblValuesItem();

    var checkbox_input = '';
                        if(document.getElementById("checkbox_input").checked){
                            // checkbox_input = 'YES';
                            checkbox_input = 1;
                        }else{
                            // checkbox_input = 'NO';
                            checkbox_input = 0;
                        }

    if (returnVal) {
              var formData = {
                  roomno_input: ($('#roomno_input').val().toUpperCase()).trim(),
                  roomtype_input: $('#roomtypeSel').val(),
                  roomprice_input: $('#roomprice_input').val(),
                  roomlimit_input: $('#roomlimit_input').val(),
                  checkbox_input: checkbox_input,
                  roomid:roomid,
                  TableDataArr:TableDataArr
              };

              $.ajax({
                  type: 'POST',
                  url: '<?php echo site_url(); ?>/Roomdetails/update',
                  data: formData,
                  dataType: 'json',
                  success: function(response) {
                    // alert(response.msg);
                                    if(response.msg == false){
                                        $("#roomno_input_err").html("That Room Number is already taken. Please Add different one.");
                                        setTimeout(function(){
                                        $("#roomno_input_err").html("");
                                    }, 5000);
                                    }
                                    else{
                                            $('#jvalidate')[0].reset();
                                            window.location = "<?php echo site_url('Roomdetails/'); ?>";
                                            //show_RoomDetails();
                                        }

                  },
                  error: function(xhr) {
                      alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                  }
              });

          }else{}

}


function resetForm(){
    $('#jvalidate')[0].reset();
}

                </script>
