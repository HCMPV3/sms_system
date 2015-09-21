<style>
    .previous_messages{
        background: #FFFFFF;
    }
</style>

<div class="content">
<h1 class="page-header">Send SMS - Category <small></small></h1>
    <div class="panel-body">
        <div class="table-responsive col-md-6">
            <table class="table">
            <thead>
                <th></th>
                <th></th>
            </thead>
                <tbody>
                <tr>
                    <td><b>Category</b></td>
                    <td>
                        <select class="form-control" id="category" required = "required">
                                <option>Select a Category</option>
                                <!-- <option value="individual"><b>Individual</b></option> -->
                                <option value="all"><b>All categories</b></option>
                            <?php foreach ($categories as $key) {?>
                            <option value="<?php echo $key['id']; ?>"><?php echo $key['category']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>

                <tr class="c-selection">
                    <td><b>County</b></td>
                    <td>
                        <select class="form-control" id="county" name="county">
                                <!-- <option value="0">Select a County</option> -->
                                <option value="all">All Counties</option>
                                <?php foreach ($county_data as $key) {?>
                                <option value="<?php echo $key['id']; ?>"><?php echo $key['county']; ?></option>
                                <?php } ?>
                        </select>
                    </td>
                </tr>

                <tr class="sc-selection">
                    <td><b>Sub County</b></td>
                    <td>
                        <select class="form-control" id="district" name="district">
                                <option>Select a Subcounty</option>
                        </select>
                    </td>
                </tr>
                    <tr>
                        <td class=""><b>Message</b></td>
                        <td class="">
                        <textarea  rows="4" cols="50" style="" class="form-control col-md-8" name="sms_message" id="sms_message" placeholder="Enter SMS Message here"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-sm btn-success send_sms"><i class="fa fa-paper-plane"></i> Send SMS </button>
                            <div class="empty_warning"></div>
                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <div class="col-md-12">
                    <h4 style="float:left;">Previous Messages</h4>
            <a style="float:right; padding: 10px;" href="<?php echo base_url().'sms/clear_message/NULL/all'; ?>">Clear All Previous Messages</a>
            </div>
            <table class="table table-bordered previous_messages" id="data-table">
                <thead>
                    <tr>
                    <th>Content</th>
                    <th>Date Sent</th>
                    <th>Category Sent To</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($past_messages as $key) {
                        $sms_content = (strlen($key['sms_content'])>15)? substr($key['sms_content'], 0,10)."...":$key['sms_content'];
                        echo "<tr>";
                        echo "<td>".$sms_content."</td>";
                        echo "<td>".date("Y-M-d",strtotime($key['date_sent']))."</td>";
                        echo "<td>";
                        if ($key['category'] =='') {
                            echo "All Categories";
                        }else{
                            echo $key['category'];
                        }
                        echo "</td>";
                        echo "<td>";
                        echo '<a href="" class="resend_msg" data-sms-id="'.$key['sms_id'].'">Resend</a> | ';
                        echo '<a href="'.base_url().'sms/clear_message/'.$key['sms_id'].'" class="clear_message" data-sms-id="'.$key['sms_id'].'">Clear</a>';
                        echo "</td>";

                        echo "</tr>";
                    }
                 ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    // $("#data-table").dataTable();
    $('#data-table').DataTable();
    $('.c-selection').hide();
    $('.sc-selection').hide();
    $('select').select2();
    var county,district;

    $('#county').change(function(){
            // alert($(this).find(':selected').attr("data-type"));
            county = $(this).find(':selected').val();
            // alert(county);return;
        });
    $('#district').change(function(){
            // alert($(this).find(':selected').attr("data-type"));
            district = $(this).find(':selected').val();
        });

    $(".send_sms").click(function(){
        var county = $("#county").val();
        var district = $("#district").val()

    var sms_body = $("#sms_message").val();
    var category = $("#category").val();
    // alert(category);return;
    if ($("#sms_message").val() == '' || $("#category").val() == '') {
        $(".send_sms").html('<i class="fa fa-exclamation"></i> Send SMS ');
        $(".empty_warning").html('<i class="fa fa-exclamation"></i> Kindly enter a message and select a category to send ');

        // alert("Kindly enter a message to send")
    }else{
    // alert(sms_body);return;
        $.ajax({
        type: "POST",
        url:"<?php echo base_Url().'sms/send_sms/NULL/NULL/category'; ?>",
        data:{
            sms_body:sms_body,
            category:category,
            county:county,
            district:district
        },
        beforeSend : function(){
            $(".send_sms").html('<i class="fa fa-cog fa-spin"></i> Sending SMS ');
        },
        success: function(msg){
            // alert(msg);
            console.log(msg);
            $(".send_sms").html('<i class="fa fa-check"></i> SMS Sent');
            $("#sms_message").val('');
            location.reload();
        }
    });//end of ajax
    }//end of else
    });//end of send sms .click

    $(".resend_msg").click(function(e){
        e.preventDefault();
        // alert($(this).attr("data-sms-id"));return;
        var msg_id = $(this).attr("data-sms-id");
        $.ajax({
        type: "POST",
        url:"<?php echo base_url().'sms/resend_sms';?>",
        data:{
            id:msg_id
        },
        beforeSend : function(){
            $(".send_sms").html('<i class="fa fa-cog fa-spin"></i> Sending SMS ');
        },
        success: function(msg){
            console.log(msg);
            $(".send_sms").html('<i class="fa fa-check"></i> SMS Sent');
            $("#sms_message").val('');
            // location.reload();
        }
        });//end of ajax

    });

        $('#category').change(function(){
            // alert($(this).find(':selected').attr("data-type"));
            var category = $(this).find(':selected').val();
            // alert(category);return;
            if (category == 1) {//same as above
                // alert("Recipient");
                $('.c-selection').show();
            }else{
                $('.c-selection').hide();
                $('.sc-selection').hide();
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
                    $("#district").append($('<option>',{
                            value:"all",
                            text:"All Sub Counties In This County"
                        }));
                    $.each(district_data,function(key,value){
                        $("#district").append($('<option>',{
                            value:value.id,
                            text:value.district
                        }));
                    $('#district').select2("val", "all");;
                        // console.log(value.id);
                    });//populate the option thing
                    // console.log(district_data);
                    $('.sc-selection').show();
                }
            });
        });//county change fn
});
</script>