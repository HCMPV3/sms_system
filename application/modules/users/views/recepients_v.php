<style>
    .table{
        border:none;
    }
    .footer{
        border-top: none!important;
    }
    .margin-kiasi{
        margin: 0px 5px;
    }
    .panel-new{
        background: #ffffff;
    }
    .fxwdth{
        width:95px;
    }
</style>
<div id="content" class="content">
<h1 class="page-header" style="float:left">Recipient Management<small></small></h1>
            <a href="#modal-dialog" style="float:right;" class="btn btn-sm btn-success margin-kiasi" data-toggle="modal">Add Recipient</a>
            <a href="#modal-dialog-excel" style="float:right;" class="btn btn-sm btn-success margin-kiasi" data-toggle="modal">Upload Recipient Excel</a>
            <a href="<?php echo base_url().'users/download_excel'; ?>" style="float:right;" class="btn btn-sm btn-success margin-kiasi" data-toggle="modal">Download Excel Template</a>
    <div class="row">
        <div class="modal fade" id="modal-dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Add recipient</h4>
                    </div>
                    <div class="modal-body">
                        <?php 
                        $attr = array('class' => 'add_users_form','id'=>'add_users_form');
                        echo form_open('users/add_user',$attr); 
                        ?>
                        <div class="form-group">
                            <table class="table table-bordered nowrap col-md-12">
                                <tbody>
                                    <tr>
                                        <td class="col-md-6">

                                            <label for="fname">Full Name</label>
                                        </td>
                                        <td class="col-md-6">

                                            <input type="text" name="fname" class="form-control fname" id="fname"required = "required" placeholder="Enter Full Name"/>
                                        </td>
                                    </tr>
                                    <!--                                     
                                    <tr>
                                        <td><label for="fname">Last Name</label></td>
                                        <td><input type="text" name="lname" class="form-control lname" id="lname"required = "required"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email">Email</label></td>
                                        <td><input type="email" name="email" class="form-control email" id="email"required = "required"/></td>
                                    </tr> 
                                    -->
                                    <tr>
                                        <td><label for="phone_no">Phone No</label></td>
                                        <td> <input type="number" name="phone_no" class="form-control phone_no" id="phone_no"required = "required" placeholder="254XXXXXXXXX"/></td>
                                    </tr>
                                    <!-- 
                                    <table class="table table-bordered col-md-6">
                                        <tr>
                                            <th colspan="2"><label for="email_recieve">Receive Sms</label></th>
                                        </tr>
                                        <tr>
                                            <td><p>Yes</p></td>
                                            <td>No</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="sms_recieve" value="1" required = "required"/></td>
                                            <td><input type="radio" name="sms_recieve" value="2" required = "required"/></td>
                                        </tr>
                                    </table>
                                     -->

                                    <!-- <tr>
                                        <td><label><b>User Type</b></label></td>
                                        <td>
                                            <select class="form-control usertypes" id="usertypes" required = "required" name="usertypes">
                                                    <option>Select a User Type</option>
                                                    <?php foreach ($usertypes as $key) {?>
                                                    <option value="<?php echo $key['id']; ?>" data-type="<?php echo $key['user_type']; ?>"><?php echo $key['user_type']; ?></option>
                                                    <?php } ?>
                                            </select>
                                        </td>
                                    </tr> -->
                                    <tr class="category-selection">
                                        <td class="col-md-6"><label><b>Category Selection</b></label></td>
                                        <td class="col-md-6">
                                            <select class="form-control" id="category" required = "required" name="category">
                                                    <option value="0">Select a Category</option>
                                                    <?php foreach ($category_data as $key) {?>
                                                    <option value="<?php echo $key['id']; ?>" data-cat="<?php echo $key['category']; ?>"><?php echo $key['category']; ?></option>
                                                    <?php } ?>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr class="c-selection">
                                        <td><label><b>County</b></label></td>
                                        <td>
                                            <select class="form-control" id="county" name="county">
                                                    <option value="0">Select a County</option>
                                                    <?php foreach ($county_data as $key) {?>
                                                    <option value="<?php echo $key['id']; ?>"><?php echo $key['county']; ?></option>
                                                    <?php } ?>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr class="sc-selection">
                                        <td><label><b>Sub County</b></label></td>
                                        <td>
                                            <select class="form-control" id="district" name="district">
                                                    <option value="0">Select a Subcounty</option>
                                            </select>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="footer">
                        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-sm btn-success submit">Submit</button>
                    </div>
                        <?php echo form_close(); ?>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-dialog-excel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Upload Recipient Excel</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('users/upload_excel'); ?>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><label>Choose file:</label></td>
                                    <td><input type="file" name="recipient_excel" size="20"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><button type="submit" value='upload' name="submit">Upload</button></td>
                                </tr>
                            </tbody>
                        </table>
                            
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

                        <div class="panel panel-inverse panel-with-tabs" data-sortable-id="ui-unlimited-tabs-1">
                        <div class="panel-heading p-0">
                            <div class="panel-heading-btn m-r-10 m-t-10">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            </div>
                            <!-- begin nav-tabs -->
                            <div class="tab-overflow">
                                <ul class="nav nav-tabs nav-tabs-inverse">
                                    <li class="prev-button"><a href="javascript:;" data-click="prev-tab" class="text-success"><i class="fa fa-arrow-left"></i></a></li>
                                    <li class="active"><a href="#nav-tab-1" data-toggle="tab">Active Recipients</a></li>
                                    <li class=""><a href="#nav-tab-2" data-toggle="tab">Recipients Missing Information</a></li>
                                   
                                    <!-- <li class="next-button"><a href="javascript:;" data-click="next-tab" class="text-success"><i class="fa fa-arrow-right"></i></a></li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="nav-tab-1">
                                <div class="panel-new panel-body">
                                    <div class="table-responsive">
                                        <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Full Names</th>
                                                    <!-- <th>Last Name</th> -->
                                                    <th>County</th>
                                                    <th>Sub County</th>
                                                    <th>Category</th>
                                                    <!-- <th>Email</th> -->
                                                    <th>Phone</th>
                                                    <!-- <th>Email Recieval</th> -->
                                                    <!-- <th>Action Email</th> -->
                                                    <th>SMS Receival</th>
                                                    <th>Action</th>
                                                    <th>Date added</th>
                                                    <!-- <th>Delete</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    <?php 
                                                    foreach ($user_data as $key) {
                                                        echo "<tr>";
                                                         echo "<td>".$key['fname']."</td>";
                                                         $county = isset($key['county'])? $key['county'] : ' - ';
                                                         echo "<td>".$county."</td>";
                                                         $district = isset($key['district'])? $key['district'] : ' - ';
                                                         echo "<td>".$district."</td>";
                                                         // echo "<td>".$key['lname']."</td>";
                                                         echo "<td>".$key['category']."</td>";
                                                         // echo "<td>".$key['email']."</td>";
                                                         echo "<td>".$key['phone_no']."</td>";
                                                      /*   if ($key['email_status'] == 2) {
                                                         echo "<td>No</td>
                                                                <td>
                                                                <a href=".base_url().'users/change_status/activate/email/'.$key['recepient_id'].">Activate Email Recieval</a>
                                                                </td>";
                                                         }elseif($key['email_status'] == 1){
                                                         echo "<td>Yes</td>
                                                                <td>
                                                                <a href=".base_url().'users/change_status/deactivate/email/'.$key['recepient_id'].">Deactivate Email Recieval</a>
                                                                </td>";
                                                         }*/

                                                         if ($key['sms_status'] == '2') {
                                                            $stmt = "No";
                                                            $status = "<a class=\"btn btn-success fxwdth\" href=".base_url().'users/change_status/activate/sms/'.$key['recepient_id'].">Activate</a>";
                                                                
                                                         }elseif($key['sms_status'] == '1'){
                                                            $stmt = "Yes";
                                                            $status = "<a class=\"btn btn-info fxwdth\" href=".base_url().'users/change_status/deactivate/sms/'.$key['recepient_id'].">Deactivate</a>";    
                                                         }
                                                         echo "<td>".$stmt."</td>
                                                                <td>
                                                                ".$status."
                                                                <a class=\"btn btn-success\" href=".base_url().'users/delete_recipient/'.$key['recepient_id'].">Delete</a>
                                                                </td>
                                                                ";
                                                         echo "<td>".date("Y-m-d",strtotime($key['created_at']))."</td>";
                                                         /*echo "<td>
                                                                
                                                                </td>";*/
                                                        echo "</tr>";
                                                     } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade in" id="nav-tab-2">
                                <div class="panel-new panel-body">
                                    <div class="table-responsive">
                                        <table id="data-table-2" class="table table-striped table-bordered nowrap" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Full Names</th>
                                                    <!-- <th>Last Name</th> -->
                                                    <th>County</th>
                                                    <th>Sub County</th>
                                                    <th>Category</th>
                                                    <!-- <th>Email</th> -->
                                                    <th>Phone</th>
                                                    <!-- <th>Email Recieval</th> -->
                                                    <!-- <th>Action Email</th> -->
                                                    <th>Fault Type</th>
                                                    <!-- <th>Action</th> -->
                                                    <th>Date added</th>
                                                    <!-- <th>Delete</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    <?php 
                                                    foreach ($user_data_faulty as $key) {
                                                        echo "<tr>";
                                                         echo "<td>".$key['fname']."</td>";
                                                         $county = isset($key['county'])? $key['county'] : ' - ';
                                                         echo "<td>".$county."</td>";
                                                         $district = isset($key['district'])? $key['district'] : ' - ';
                                                         echo "<td>".$district."</td>";
                                                         // echo "<td>".$key['lname']."</td>";
                                                         echo "<td>".$key['category']."</td>";
                                                         // echo "<td>".$key['email']."</td>";
                                                         echo "<td>".$key['phone_no']."</td>";
                                                         echo "<td>".$key['fault_type']."</td>";
                                                        /*  
                                                        if ($key['email_status'] == 2) {
                                                         echo "<td>No</td>
                                                                <td>
                                                                <a href=".base_url().'users/change_status/activate/email/'.$key['recepient_id'].">Activate Email Recieval</a>
                                                                </td>";
                                                         }elseif($key['email_status'] == 1){
                                                         echo "<td>Yes</td>
                                                                <td>
                                                                <a href=".base_url().'users/change_status/deactivate/email/'.$key['recepient_id'].">Deactivate Email Recieval</a>
                                                                </td>";
                                                         }
                                                         echo "<td>".$stmt."</td>
                                                                <td>
                                                                ".$status."
                                                                <a class=\"btn btn-success\" href=".base_url().'users/delete_recipient/'.$key['recepient_id'].">Delete</a>
                                                                </td>
                                                                ";
                                                        */
                                                         echo "<td>".date("Y-m-d",strtotime($key['created_at']))."</td>";
                                                         /*echo "<td>
                                                                
                                                                </td>";*/
                                                        echo "</tr>";
                                                     } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>


<script>
    $(document).ready(function(){
        $('#data-table').DataTable({
        dom: 'T<"clear">lfrtip',
        tableTools: {
            "sSwfPath": "<?php echo base_url().'assets/template/plugins/DataTables/TableTools/swf/copy_csv_xls_pdf.swf' ?>"
        }
    });
        $('#data-table-2').DataTable({
        dom: 'T<"clear">lfrtip',
        tableTools: {
            "sSwfPath": "<?php echo base_url().'assets/template/plugins/DataTables/TableTools/swf/copy_csv_xls_pdf.swf' ?>"
        }
    });
        // $('.category-selection').hide();
        // $('.c-selection').hide();
        $('.sc-selection').hide();

        $('#usertypes').change(function(){
            // alert($(this).find(':selected').attr("data-type"));
            var usertype = $(this).find(':selected').val();
            // alert(usertype);return;
            if (usertype == 2) {//default for recipient in db,static to some extent but until other way is established,and more time allocated,will have to do
                // alert("Recipient");
                $('.category-selection').show();
            }else{
                $('.category-selection').hide();
                $('.sc-selection').hide();
            };
        });//usertype change fn

        $('#category').change(function(){
            // alert($(this).find(':selected').attr("data-type"));
            var category = $(this).find(':selected').val();
            // alert(category);return;
            if (category == 1) {//same as above
                // alert("Recipient");
                $('.c-selection').show();
            }else{
                $('.sc-selection').hide();
                $('.c-selection').hide();
                $("#county").val('0');
                $("#district").find('option').remove().end().append('<option',{
                        text:"Select Sub COunty"
                    });
            };
        });//category change fn

        $('#county').change(function(){
            // alert($(this).find(':selected').attr("data-type"));
            var county = $(this).find(':selected').val();
            // alert(county);return;

            $.ajax({
                type:"POST",
                url:"<?php echo base_url().'users/get_districts';?>",
                data:{
                    county:county
                },
                success: function(districts){
                    // alert(districts);return;
                    $("#district").find('option').remove().end().append('<option',{
                        text:"Select District"
                    });
                    var district_data =jQuery.parseJSON(districts);
                    $.each(district_data,function(key,value){
                        $("#district").append($('<option>',{
                            value:value.id,
                            text:value.district
                        }));
                        // console.log(value.id);
                    });//populate the option thing
                    // console.log(district_data);
                    $('.sc-selection').show();
                }
            });
        });//county change fn
    });
</script>