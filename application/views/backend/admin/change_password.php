<div class="layout-content">
    <div class="layout-content-body">
        <div class="row">
            <div style="left: 50%; transform: translateX(-50%);" class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong><span class="icon icon-plus-circle"></span> CHANGE PASSWORD</strong>
                    </div>
                    <div class="card-body">
                        <?php if (isset($errors)) { ?>
                            <div class="alert alert-danger">
                                <?php print_r($errors); ?>
                            </div>
                        <?php } ?>
                        <?php if (isset($success)) { ?>
                            <div class="alert alert-success">
                                <?php print_r($success); ?>
                            </div>
                        <?php } ?>
                        <form class="form form-horizontal" style="margin-top: 30px" method="POST">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="width: 20%;" for="email">Email</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                          <span class="input-group-addon">
                                                <span class="icon icon-envelope"></span>
                                          </span>
                                        <input class="form-control" type="email" name="email" value="<?php echo $email ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="width: 20%;" for="old_pass">Old Password</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                          <span class="input-group-addon">
                                                <span class="icon icon-lock"></span>
                                          </span>
                                        <input class="form-control" type="password" name="old_pass" placeholder="Current Password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="width: 20%;" for="new_pass">New Password</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                          <span class="input-group-addon">
                                                <span class="icon icon-lock"></span>
                                          </span>
                                        <input class="form-control" type="password" name="new_pass" placeholder="New Password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="width: 20%;" for="confirm_pass">Confirm Password</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                          <span class="input-group-addon">
                                                <span class="icon icon-lock"></span>
                                          </span>
                                        <input class="form-control" type="password" name="confirm_pass" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <button class="btn btn-primary" style="margin-left: 250px;padding: 6px 25px;!important;"
                                        type="submit">Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
