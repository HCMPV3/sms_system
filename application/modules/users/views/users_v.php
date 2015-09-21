<style>
    .table{
        border:none;
    }
    .footer{
        border-top: none!important;
    }
    .margin-kiasi{
        margin: 10px 0;
    }
    .panel-new{
        background: #ffffff;
    }
</style>
<div id="content" class="content">
<h1 class="page-header">Administrator Management<small></small></h1>
    <div class="row">
        <div class="col-md-12">
            <!-- <button type="button" class="btn btn-success m-r-5 m-b-5">Add User</button> -->
            <a href="#modal-dialog" class="btn btn-sm btn-success margin-kiasi" data-toggle="modal">Add Administrator</a>
            <div class="panel-new panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">System Administrators</h4>
                </div>
                <div class="panel-new panel-body">
                    <div class="table-responsive">

                        <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <?php 
                                    foreach ($user_data as $key) {
                                        echo "<tr>";
                                         echo "<td>".$key['email']."</td>";
                                         if ($key['status'] == 2) {
                                         echo "<td>Deactivated</td>
                                                <td>
                                                <a href=".base_url().'users/change_status/users/inactive/'.$key['user_id'].">Activate</a>
                                                </td>";
                                         }elseif($key['status'] == 1){
                                         echo "<td>Active</td>
                                                <td>
                                                <a href=".base_url().'users/change_status/users/active/'.$key['user_id'].">Deactivate</a>
                                                </td>";
                                         }
                                         echo "<td>
                                                <a href=".base_url().'users/reset_password/'.$key['user_id'].">Reset Password</a>
                                         </td>";
                                        echo "</tr>";
                                     } ?>
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
                        <h4 class="modal-title">Add Administrator</h4>
                    </div>
                    <div class="modal-body">
                        <?php 
                        $attr = array('class' => 'add_users_form','id'=>'add_users_form');
                        echo form_open('users/add_admin',$attr); 
                        ?>
                        <div class="form-group">
                            <table class="table table-bordered nowrap col-md-12">
                                <tbody>
                                    <tr>
                                        <td><label for="email">Email</label></td>
                                        <td><input type="email" name="email" class="form-control email" id="email"required = "required"/></td>
                                    </tr>

                                    <tr>
                                        <td><label for="password">Password</label></td>
                                        <td><input type="password" name="password" class="form-control password" id="password"required = "required"/></td>
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

    </div>
</div>

<script>
    $(document).ready(function(){
        $('#data-table').DataTable( {
        dom: 'T<"clear">lfrtip',
        tableTools: {
            "sSwfPath": "<?php echo base_url().'assets/template/plugins/DataTables/TableTools/swf/copy_csv_xls_pdf.swf' ?>"
        }
    } );
        $(".submit").click(function(){
            // $('#add_users_form').submit();
        });
    });
</script>