<div class="layout-content">
    <div class="layout-content-body">
        <div class="row gutter-xs">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Manage Admin Menus</strong>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?= base_url().'Admin/action' ?>">
                           <button class="btn-xs btn-info">IMPORT</button> <button name="export" type="submit" class="btn-xs btn-success">EXPORT</button>
                        </form>
                            <table id="demo-datatables-fixedheader-2" class="table table-bordered table-striped table-nowrap dataTable" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Added At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php for($i=0;$i<count($categories);$i++){?>
                                <tr>
                                    <td><?php echo $categories[$i]['id']?></td>
                                    <td>
                                            <a class="file-link" href="<?=base_url()?>uploads/<?= $categories[$i]['banner'] ?>" title="0310728269.jpg">
                                                <div class="file-thumbnail" style="background-image: url(<?=base_url()?>uploads/<?= $categories[$i]['banner'] ?>)"></div>
                                            </a>
                                    </td>
                                    <td><?= $categories[$i]['name'] ?></td>
                                    <td><?php echo $categories[$i]['date_time'] ?></td>
                                    <td align="center">
                                        <a href="<?php echo base_url().'Admin/edit_category/'.$categories[$i]['id'];?>" class="btn btn-success"><i class="icon icon-pencil"></i></a>
                                        <button class="btn btn-danger" onclick="validate(this)" value="<?php echo $categories[$i]['id']?>"><i class="icon icon-times"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<script type="text/javascript" src="<?/*= base_url() */?>assets/<?/*= $theme */?>/js/jquery-3.2.1.min.js"></script>-->
<script src="<?php echo base_url()?>assets/<?php echo $theme ?>/js/sweetalert.min.js"></script>
<script>
    $(function(){ TablesDatatables.init(); });
    function validate(a)
    {
        var id= a.value;

        swal({
                title: "Are you sure?",
                text: "You want to delete this Category",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete it!",
                closeOnConfirm: false }, function()
            {
                swal("Deleted!", "Category has been Deleted.", "success");
                $(location).attr('href','<?php echo base_url()?>Admin/delete_category/'+id);
            }
        );
    }
</script>
