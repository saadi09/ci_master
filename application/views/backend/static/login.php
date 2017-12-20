<body>
<div class="login">
    <?php if(isset($success)){?>
        <div class="alert alert-danger">
            <?php print_r($success);?>
        </div>
    <?php }?>
    <?php if(isset($errors)){?>
        <div class="alert alert-danger">
            <?php print_r($errors);?>
        </div>
    <?php }?>
    <div class="login-body">
        <a class="login-brand" href="<?= base_url() ?>">
            <img class="img-responsive" src="<?= base_url() ?>assets/<?= $theme ?>/img/logo.svg" alt="Elephant">
        </a>
        <div class="login-form">
            <form data-toggle="validator" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" type="email" name="email" spellcheck="false" autocomplete="off" data-msg-required="Please enter your email address." required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" class="form-control" type="password" name="password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
                </div>
                <div class="form-group">
                    <label class="custom-control custom-control-primary custom-checkbox">
                        <input class="custom-control-input" type="checkbox" checked="checked">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-label">Keep me signed in</span>
                    </label>
                    <span aria-hidden="true"> · </span>
                    <a href="password-2.html">Forgot password?</a>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Login</button>
            </form>
        </div>
    </div>
</div>
<!--<script type="text/javascript" src="<?/*=  base_url()*/?>assets/<?php /*$theme */?>/js/jquery-3.2.1.min.js"></script>-->
<script type="text/javascript" src="<?=  base_url()?>assets/<?php echo $theme ?>/js/vendor.min.js"></script>
<script type="text/javascript" src="<?=  base_url()?>assets/<?php echo $theme ?>/js/elephant.min.js"></script>
</body>
</html>