<div class="layout-content">
    <div class="layout-content-body">
        <div class="row gutter-xs">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Manage Slider Images</strong>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?= base_url() . 'Admin/action' ?>">
                            <button class="btn-xs btn-info">IMPORT</button>
                            <button name="export" type="submit" class="btn-xs btn-success">EXPORT</button>
                        </form>
                        <table id="demo-datatables-fixedheader-2"
                               class="table table-bordered table-striped table-nowrap dataTable" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>ID#</th>
                                <th>Image</th>
                                <!--<th>Added At</th>-->
                                <th>Status</th>
                                <th>Enable/Disable</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php for ($i = 0; $i < count($slider); $i++) { ?>
                                <tr>
                                    <td><?php echo $slider[$i]['id'] ?></td>
                                    <td>
                                        <a class="file-link" href="<?= base_url() ?>uploads/<?= $slider[$i]['image'] ?>"
                                           title="0310728269.jpg">
                                            <div class="file-thumbnail"
                                                 style="background-image: url(<?= base_url() ?>uploads/<?= $slider[$i]['image'] ?>)"></div>
                                        </a>
                                    </td>
                                    <!--<td><?php /*echo $slider[$i]['date_time'] */?></td>-->
                                    <td align="center">
                                        <?php if($slider[$i]['status'] == "Enable") { ?>
                                        <span class="badge badge-success"><?= $slider[$i]['status'] ?></span>
                                        <?php }
                                        else {
                                        ?>
                                        <span class="badge badge-warning"><?= $slider[$i]['status'] ?></span>
                                        <?php } ?>
                                    </td>
                                    <td align="center">
                                        <button class="btn btn-info" title="Enable" onclick="validate1(this)"
                                                value="<?php echo $slider[$i]['id'] ?>"><i class="icon icon-toggle-on"></i>
                                        </button>
                                        <button class="btn btn-success" title="Disable" onclick="validate2(this)"
                                                value="<?php echo $slider[$i]['id'] ?>"><i class="icon icon-toggle-off"></i>
                                        </button>
                                    </td>
                                    <td align="center">
                                        <a href="<?php echo base_url() . 'Admin/view_slide_detail/' . $slider[$i]['id']; ?>"
                                           class="btn btn-info"><i class="icon icon-eye"></i></a>
                                        <a href="<?php echo base_url() . 'Admin/edit_slide_detail/' . $slider[$i]['id']; ?>"
                                           class="btn btn-success"><i class="icon icon-pencil"></i></a>
                                        <button class="btn btn-danger" onclick="validate(this)"
                                                value="<?php echo $slider[$i]['id'] ?>"><i class="icon icon-times"></i>
                                        </button>
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
<!--<script type="text/javascript" src="<? /*= base_url() */ ?>assets/<? /*= $theme */ ?>/js/jquery-3.2.1.min.js"></script>-->
<script src="<?php echo base_url() ?>assets/<?php echo $theme ?>/js/sweetalert.min.js"></script>
<script>

    function validate(a) {
        var id = a.value;

        swal({
                title: "Are you sure?",
                text: "You want to delete this Slider Image!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete it!",
                closeOnConfirm: false
            }, function () {
                swal("Deleted!", "Slider Image has been Deleted.", "success");
                $(location).attr('href', '<?php echo base_url()?>Admin/del_sliderImage/' + id);
            }
        );
    }
</script>
<script>
    function validate1(a) {
        var id = a.value;

        swal({
                title: "Are you sure?",
                text: "You want to Enable this Slider Image!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Enable it!",
                closeOnConfirm: false
            }, function () {
                swal("Enabled!", "Slider Image has been Enabled.", "success");
                $(location).attr('href', '<?php echo base_url()?>Admin/enable_slider_image/' + id);
            }
        );
    }
</script>
<script>
    function validate2(a) {
        var id = a.value;

        swal({
                title: "Are you sure?",
                text: "You want to Disable this Slider Image!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Disable it!",
                closeOnConfirm: false
            }, function () {
                swal("Disabled!", "Slider Image has been Disabled.", "success");
                $(location).attr('href', '<?php echo base_url()?>Admin/disable_slider_image/' + id);
            }
        );
    }
</script>