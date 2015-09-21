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
    .cat-btns{
        margin:0 5px;
    }
</style>
<div id="content" class="content">
<h1 class="page-header">Category Management<small></small></h1>
    <div class="row">
        <div class="col-md-6">
            <!-- <button type="button" class="btn btn-success m-r-5 m-b-5">Add User</button> -->
            <!-- <a href="#modal-dialog" class="btn btn-sm btn-success margin-kiasi" data-toggle="modal">Add Category</a> -->
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <?php 
                                    foreach ($category_data as $key) {
                                        $name = $key['category'];

                                        echo "<tr>";
                                         echo "<td><div id=\"category_name_".$key['id']."\">".$key['category']."</div></td><td>";
                                         if ($key['status'] == 1) {
                                         // echo "<div class=\"col-md-4\"><a class=\"cat-btns btn btn-sm btn-danger\" href=".base_url().'users/change_status/category/deactivate/'.$key['id'].">Deactivate</a></div>";
                                         // echo "<div class=\"col-md-4\"><a class=\"cat-btns btn btn-sm btn-danger\" href=".base_url().'users/change_status/category/deactivate/'.$key['id'].">Deactivate</a></div>";
                                         echo "<div class=\"col-md-4\"><a id=".base_url().'users/change_status/category/deactivate/'.$key['id']." class=\"cat-btns btn btn-sm btn-danger\" data-toggle=\"modal\" href=\"#modal-confirm-cat\" data-status=\"active\">Deactivate</a></div>";
                                         }else{
                                         // echo "<div class=\"col-md-4\"><a class=\"cat-btns btn btn-sm btn-success\" href=".base_url().'users/change_status/category/activate/'.$key['id'].">Activate</a></div>";
                                         // echo "<div class=\"col-md-4\"><a class=\"cat-btns btn btn-sm btn-success\" href=".base_url().'users/change_status/category/activate/'.$key['id'].">Activate</a></div>";
                                         echo "<div class=\"col-md-4\"><a id=".base_url().'users/change_status/category/activate/'.$key['id']." class=\"cat-btns btn btn-sm btn-success\" data-toggle=\"modal\" href=\"#modal-confirm-cat\" data-status=\"inactive\">Activate</a></div>";
                                         }
                                         // echo "<td><a class=\"btn btn-sm btn-success update\" href=".base_url().'users/update_category/'.$key['id']." data-name = ".$key['category'].">Update</a></td>";
                                         echo "<div class=\"col-md-4 rename_div_".$key['id']."\"><a href=\"#modal-dialog\"  data-toggle=\"modal\" class=\"rename btn btn-sm btn-success\" id=\"".$key['category']."\" data-cat = \"category_name_".$key['id']."\" data-cat-id =".$key['id']." data-cat = \"rename_btn_".$key['id']."\">Rename</a></div></td>";
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
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

        <div class="modal fade" id="modal-dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Rename Category</h4>
                    </div>
                    <div class="modal-body">
                    <?php echo form_open("users/rename_category"); ?>
                        <table class="table table-bordered" style="border:none;">
                        <tbody>
                            
                            <tr>
                                <td><label class="form-control" style="border:none;"><b>New Category Name</b></label></td>
                                <td class="input_values"><input type="text" class="new_category_name form-control input" name="new_category_name" /></td>

                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <div class="footer">
                        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-sm btn-success submit">Submit</button>
                    </div>
                        <?php echo form_close(); ?>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-confirm-cat">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Deactivate Category Confirmation</h4>
                    </div>
                    <div class="modal-body">
                        <!-- <p>Are you sure you want to deactivate this category? All recipients in this category will no longer receive SMS messages</p> -->
                    </div>
                    <div class="footer">
                        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                        <a href="" class="cat_deactivate btn btn-sm btn-success submit">Proceed with Deactivation</a>
                    </div>

                </div>
            </div>
        </div>

<script>
    $(document).ready(function(){
        $("#data-table").DataTable();

        $(".rename").click(function(){
            // $("#category_name").html("I have been replaced");
            $(".category_id_renaming").remove();
            var finder = $(this).attr("data-cat");
            var cat_id = $(this).attr("data-cat-id");

            var name = $(this).attr("id");
            // alert(name);
            $("input[name^=new_category_name]").val(name);
            $(".input_values").append('<input type="hidden" class="category_id_renaming" name="category_id_renaming" value="'+cat_id+'"/>');
            // $('#'+finder).html("<input class=\"rename_category_input\" value=\""+name+"\"/>");
            // $(this).html("Set New Name");
            // $(".rename_div_"+cat_id).html('<a href="<?php echo base_url()."user/rename_category"; ?>" class="rename btn btn-sm btn-success">Set New Name</a>');
        });
        $(".cat-btns").click(function(e){
            e.preventDefault();
            var href = $(this).attr("id");
            var status = $(this).attr("data-status")
            // alert(href);
            if (status == "inactive") {
            $(".modal-body").html("Are you sure you want to activate this category? Recipients will now receive SMS messages");
            $(".cat_deactivate").html("Proceed with Activation");
            $(".cat_deactivate").removeClass("btn-danger");
            $(".cat_deactivate").addClass("btn-success");
            }else{
            $(".modal-body").html("Are you sure you want to deactivate this category? Recipients in this category will no longer receive SMS messages");
            $(".cat_deactivate").html("Proceed with Deactivation");
            $(".cat_deactivate").removeClass("btn-success");
            $(".cat_deactivate").addClass("btn-danger");
            };
            $(".cat_deactivate").attr("href",href);
            // window.location.href = href;
        });


    });
</script>