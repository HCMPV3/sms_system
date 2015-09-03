<style>
    .previous_messages{
        background: #FFFFFF;
    }
</style>
<div class="content">
    <div class="panel-body">
        <div class="table-responsive col-md-7">
            <table class="table">
            <thead>
                <th></th>
                <th></th>
            </thead>
                <tbody>
                <tr class="col-md-12">
                    <td>Recepients Category: </td>
                    <td>
                        <select class="form-control" id="category" required = "required">
                                <option>Select a Category</option>
                                <option value="all"><b>All categories</b></option>
                            <?php foreach ($categories as $key) {?>
                            <option value="<?php echo $key['id']; ?>"><?php echo $key['category']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                    <tr class="col-md-12">
                        <td class="col-md-3">Message</td>
                        <td class="col-md-9">
                        <textarea  rows="4" cols="50" class="form-control col-md-8" name="sms_message" id="sms_message" placeholder="Enter SMS Message here"></textarea>
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
        <div class="col-md-5">
                    <h4>Previous Messages</h4>
            <table class="table table-bordered previous_messages" id="data-table">
                <thead>
                    <tr>
                    <th class="col-md-8">Content</th>
                    <th class="col-md-4">Date Sent</th>
                    <th class="col-md-4">Category Sent To</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($past_messages as $key) {
                        echo "<tr>";
                        echo "<td>".$key['sms_content']."</td>";
                        echo "<td>".$key['date_sent']."</td>";
                        echo "<td>";
                        if ($key['category'] =='') {
                            echo "All Categories";
                        }else{
                            echo $key['category'];
                        }
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
    $(".send_sms").click(function(){
    var sms_body = $("#sms_message").val();
    var category = $("#category").val();
    // alert(category);return;
    if ($("#sms_message").val() == '' ) {
        $(".send_sms").html('<i class="fa fa-exclamation"></i> Send SMS ');
        $(".empty_warning").html('<i class="fa fa-exclamation"></i> Kindly enter a message to send ');

        // alert("Kindly enter a message to send")
    }else{
    // alert(sms_body);return;
        $.ajax({
        type: "POST",
        url:'sms/send_sms',
        data:{
            sms_body:sms_body,
            category:category
        },
        beforeSend : function(){
            $(".send_sms").html('<i class="fa fa-cog fa-spin"></i> Sending SMS ');
        },
        success: function(msg){
            console.log(msg);
            $(".send_sms").html('<i class="fa fa-check"></i> SMS Sent');
            $("#sms_message").val('');
            location.reload();
        }
    });//end of ajax
    }//end of else
    });//end of send sms .click
});
</script>