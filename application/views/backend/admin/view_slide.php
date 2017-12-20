<div class="layout-content">
    <div class="layout-content-body">
        <div class="row">
            <div style="left: 50%; transform: translateX(-50%);" class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong><span class="icon icon-plus-circle"></span> SLIDE DETAIL</strong>
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
                                        <input class="form-control" type="text" name="title" placeholder="Title" value="<?= $slide_detail['title'] ?>">
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
                                        <input class="form-control" type="text" name="sub_title" placeholder="Sub Title" value="<?= $slide_detail['sub_title']?>">
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
                                        <input class="form-control" type="text" name="quote" placeholder="Quote" value="<?= $slide_detail['quote'] ?>">
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
                                        <input class="form-control" type="text" name="alt" placeholder="ALT Name" value="<?= $slide_detail['alt'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="width: 20%" for="alt">Added At</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                           <span class="input-group-addon">
                                               <span class="icon icon-th-large"></span>
                                           </span>
                                        <input class="form-control" type="text" name="added_at" placeholder="Added At" value="<?= $slide_detail['date_time'] ?>">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
