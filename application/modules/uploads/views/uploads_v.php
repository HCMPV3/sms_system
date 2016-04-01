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
<h1 class="page-header">Upload Management<small></small></h1>
    <div class="panel panel-inverse panel-with-tabs" data-sortable-id="ui-unlimited-tabs-1">
        <div class="panel-heading p-0">
            
            <!-- begin nav-tabs -->
            <div class="tab-overflow">
                <ul class="nav nav-tabs nav-tabs-inverse">
                    <li class="prev-button"><a href="javascript:;" data-click="prev-tab" class="text-success"><i class="fa fa-arrow-left"></i></a></li>
                    <li class="active"><a href="#nav-tab-1" data-toggle="tab">Uploaded Files</a></li>
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
                                    <th>Uploader</th>
                                    <th>Description</th>
                                    <th>Date Uploaded</th>
                                    <th>File Size</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($uploads as $upload):?>
                                <tr>
                                    <td><?php echo $upload['email']; ?></td>
                                    <td><?php $desc = (isset($upload['description']))? $upload['description']: '-'; echo $desc; ?></td>
                                    <td><?php echo date('d M Y',strtotime($upload['date_uploaded'])); ?></td>
                                    <td><?php echo $upload['file_size']; ?> KB</td>
                                    <td> <a href="<?php echo base_url().'uploads/download_excel/'.$upload['upload_name']; ?>">Download File</a></td>
                                </tr>
                            <?php endforeach ?>
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