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
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <?php 
                                    foreach ($category_data as $key) {
                                        echo "<tr>";
                                         echo "<td>".$key['category']."</td>";
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
        $(".submit").click(function(){
            $('#add_users_form').submit();
        });
    });
</script>