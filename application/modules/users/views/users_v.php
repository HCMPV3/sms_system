<style>
    .table{
        border:none;
    }
    .modal-footer{
        border-top: none!important;
    }
    .margin-kiasi{
        margin: 10px 0;
    }
</style>
<div id="content" class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- <button type="button" class="btn btn-success m-r-5 m-b-5">Add User</button> -->
            <a href="#modal-dialog" class="btn btn-sm btn-success margin-kiasi" data-toggle="modal">Add Recepient</a>
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Recepients</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">

                        <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Email Recieval</th>
                                    <th>Action Email</th>
                                    <th>SMS Recieval</th>
                                    <th>Action SMS</th>
                                    <th>Date added</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <?php 
                                    foreach ($user_data as $key) {
                                        echo "<tr>";
                                         echo "<td>".$key['fname']."</td>";
                                         echo "<td>".$key['lname']."</td>";
                                         echo "<td>".$key['email']."</td>";
                                         echo "<td>".$key['phone_no']."</td>";
                                         if ($key['email_status'] == 2) {
                                         echo "<td>No</td>
                                                <td>
                                                <a href=".base_url().'users/change_status/activate/email/'.$key['recipient_id'].">Activate Email Recieval</a>
                                                </td>";
                                         }elseif($key['email_status'] == 1){
                                         echo "<td>Yes</td>
                                                <td>
                                                <a href=".base_url().'users/change_status/deactivate/email/'.$key['recipient_id'].">Deactivate Email Recieval</a>
                                                </td>";
                                         }

                                         if ($key['sms_status'] == 2) {
                                         echo "<td>No</td>
                                                <td>
                                                <a href=".base_url().'users/change_status/activate/sms/'.$key['recipient_id'].">Activate SMS Recieval</a>
                                                </td>";
                                         }elseif($key['sms_status'] == 1){
                                         echo "<td>Yes</td>
                                                <td>
                                                <a href=".base_url().'users/change_status/deactivate/sms/'.$key['recipient_id'].">Deactivate SMS Recieval</a>
                                                </td>";
                                         }

                                         echo "<td>".$key['created_at']."</td>";
                                        echo "</tr>";
                                     } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Add User</h4>
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

                                            <label for="fname">First Name</label>
                                        </td>
                                        <td class="col-md-6">

                                            <input type="text" name="fname" class="form-control fname" id="fname"required = "required"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="fname">Last Name</label></td>
                                        <td><input type="text" name="lname" class="form-control lname" id="lname"required = "required"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email">Email</label></td>
                                        <td><input type="email" name="email" class="form-control email" id="email"required = "required"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="phone_no">Phone No</label></td>
                                        <td> <input type="number" name="phone_no" class="form-control phone_no" id="phone_no"required = "required"/></td>
                                    </tr>
                                    <div class="col-md-6">
                                        <tr>
                                            <td colspan="2"><label for="email_recieve">Recieve Sms</label></td>
                                        </tr>
                                        <tr>
                                            <td><p>Yes</p></td>
                                            <td>No</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="sms_recieve" value="1" required = "required"/></td>
                                            <td><input type="radio" name="sms_recieve" value="2" required = "required"/></td>
                                        </tr>
                                    </div>
                                    <div class="col-md-6">
                                        
                                    
                                        <tr>
                                            <td colspan="2"><label for="email_recieve">Recieve Emails</label></td>
                                        </tr>
                                        <tr>
                                            <td><p>Yes</p></td>
                                            <td>No</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="email_recieve" value="1" required = "required"/></td>
                                            <td><input type="radio" name="email_recieve" value="2" required = "required"/></td>
                                        </tr>
                                    </tr>
                                    <tr>
                                        <td><label>User Type</label></td>
                                        <td>
                                            <select class="form-control" name="user_type">
                                                <option value="2">Member</option>
                                                <option value="1">Administrator</option>
                                            </select>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="footer">
                        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" href="javascript:;" class="btn btn-sm btn-success submit">Submit</button>
                    </div>
                        <?php echo form_close(); ?>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(document).ready(function(){
        $(".submit").click(function(){
            $('#add_users_form').submit();
        });
    });
</script>