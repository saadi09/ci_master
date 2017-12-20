<div class="layout-content">
    <div class="layout-content-body">
        <div class="row">
            <div style="left: 50%; transform: translateX(-50%);" class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong><span class="icon icon-plus-circle"></span> ADD SLIDER IMAGE</strong>
                    </div>
                    <div class="card-body">
                        <?php if (isset($success)) { ?>
                            <div class="alert alert-success" role="alert">
                                <div class="row vertical-align">
                                    <div class="col-xs-1 text-center">
                                        <i class="icon icon-check fa-2x" ></i>
                                    </div>
                                    <div class="col-xs-11">
                                        <strong>Success:</strong> <?php print_r($success) ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if (isset($errors)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <div class="row vertical-align">
                                    <div class="col-xs-1 text-center">
                                        <i class="icon icon-exclamation-triangle icon-2x"></i>
                                    </div>
                                    <div class="col-xs-11">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <?php print_r($errors) ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <form class="form form-horizontal" style="margin-top: 30px" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="width: 20%;" for="title">Title</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                          <span class="input-group-addon">
                                                <span class="icon icon-th-large"></span>
                                          </span>
                                        <input class="form-control" type="text" name="title" placeholder="Title">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="width: 20%;" for="sub_title">Sub Title</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                           <span class="input-group-addon">
                                               <span class="icon icon-th-large"></span>
                                           </span>
                                        <input class="form-control" type="text" name="sub_title" placeholder="Sub Title">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="width: 20%;" for="quote">Quote</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                           <span class="input-group-addon">
                                               <span class="icon icon-th-large"></span>
                                           </span>
                                        <input class="form-control" type="text" name="quote" placeholder="Quote">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="width: 20%" for="alt">ALT</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                           <span class="input-group-addon">
                                               <span class="icon icon-th-large"></span>
                                           </span>
                                        <input class="form-control" type="text" name="alt" placeholder="ALT Name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="width: 20%" for="alt">Link</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                           <span class="input-group-addon">
                                               <span class="icon icon-th-large"></span>
                                           </span>
                                        <input class="form-control" type="text" name="link" placeholder="Button Link">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-sm-3 control-label" style="width: 20%;" for="form-control-17">Alignment</label>
                                <div class="col-sm-9">
                                    <select id="demo-select2-1" class="form-control" name="align">
                                        <option value="0">DATA ALIGNMENT</option>
                                        <option value="center">CENTER</option>
                                        <option value="left">LEFT</option>
                                        <option value="right">RIGHT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="width: 20%;">Select Image</label>
                                <div class="col-sm-9">
                                    <input id="form-control-9" style="padding-top: 9px" type="file" name="image"
                                           accept="image/*">
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <button class="btn btn-primary" style="margin-left: 250px;padding: 6px 25px;!important;"
                                        type="submit">Add
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
