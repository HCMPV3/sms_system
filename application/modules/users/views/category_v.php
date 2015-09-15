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
    <div class="row">
        <div class="col-md-6">
            <!-- <button type="button" class="btn btn-success m-r-5 m-b-5">Add User</button> -->
            <!-- <a href="#modal-dialog" class="btn btn-sm btn-success margin-kiasi" data-toggle="modal">Existent Categories</a> -->
            <div class="panel-new panel-inverse ">
                <div class="panel-heading">
                    <h4 class="panel-title">Existent Categories</h4>
                </div>
                <div class="panel-new panel-body">
                    <div class="table-responsive">

                        <table id="data-table" class="table table-bordered nowrap" width="100%">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <?php 
                                    foreach ($category_data as $key) {
                                        $name = $key['category'];
                                        echo "<tr>";
                                         echo "<td>".$key['category']."</td>";
                                         if ($key['status'] == 1) {
                                         echo "<td><a class=\"btn btn-sm btn-danger\" href=".base_url().'users/change_status/category/deactivate/'.$key['id'].">Deactivate</a></td>";
                                         }else{
                                         echo "<td><a class=\"btn btn-sm btn-success\" href=".base_url().'users/change_status/category/activate/'.$key['id'].">Activate</a></td>";
                                         }
                                         // echo "<td><a class=\"btn btn-sm btn-success update\" href=".base_url().'users/update_category/'.$key['id']." data-name = ".$key['category'].">Update</a></td>";
                                         echo "<td><a class=\"btn btn-sm btn-success\" href=".base_url().'users/delete_category/'.$key['id'].">Delete</a></td>";
                                        echo "</tr>";
                                     } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <!-- <button type="button" class="btn btn-success m-r-5 m-b-5">Add User</button> -->
            <!-- <a href="#modal-dialog" class="btn btn-sm btn-success margin-kiasi" data-toggle="modal"></a> -->
            <div class="panel-new panel-inverse ">
                <div class="panel-heading">
                    <h4 class="panel-title">Category Addition</h4>
                </div>
                <div class="panel-new panel-body">
                    <div class="table-responsive">
                    <?php echo form_open('users/add_category'); ?>
                        <table id="data-table" class="table table-bordered nowrap" width="100%">
                        <thead>
                            <tr>
                                <th colspan="2">Add categories below</th>
                            </tr>
                        </thead>
                            <tbody>
                            <tr>
                                <td><label for="category">Category Name</label></td>
                                <td><input class="form-control" name="category" /></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <button type="submit" class="btn btn-sm btn-success margin-kiasi">Add Category</button>
                                </td>
                            </tr>
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
        $(".update").click(function(){
            alert($(this).attr("data-name"));
        });
    });
</script>