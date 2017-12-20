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
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Class</th>
                                <th>URL</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php for($i=0;$i<count($menu_items);$i++){?>
                                <tr>
                                    <td><?php echo $menu_items[$i]['id']?></td>
                                    <td><?php echo $menu_items[$i]['name']?></td>
                                    <td><?php echo $menu_items[$i]['parent']?></td>
                                    <td><?php echo $menu_items[$i]['class']?></td>
                                    <td><?php echo $menu_items[$i]['url']?></td>
                                    <td align="center">
                                        <a href="<?php echo base_url().'admin/edit_admin_menu/'.$menu_items[$i]['id'];?>" class="btn btn-success"><i class="icon icon-pencil"></i></a>
                                        <button class="btn btn-danger" onclick="validate(this)" value="<?php echo $menu_items[$i]['id']?>"><i class="icon icon-times"></i></button>
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
                text: "You want to delete this Menu Item!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete it!",
                closeOnConfirm: false }, function()
            {
                swal("Deleted!", "Menu Item has been Deleted.", "success");
                $(location).attr('href','<?php echo base_url()?>Admin/del_admin_menu/'+id);
            }
        );
    }
</script>
