<div class="app app-header-fixed animated bounceInDown">
    <div class="container w-xxl w-auto-xs" ng-controller="SigninFormController"
         ng-init="app.settings.container = false;">
        <a href class="navbar-brand block m-t"><?php echo lang('login'); ?></a>
        <div class="m-b-lg">
            <div class="wrapper text-center">
                <strong>Indocal Calibration Information System</strong>
            </div>
            <?php echo messages(); ?>
            <form role="form" method="post" class="form-validation">
                <div class="text-danger wrapper text-center" ng-show="authError">

                </div>
                <div class="list-group list-group-sm">
                    <div class="list-group-item">
                        <input class="form-control" placeholder="<?php echo lang('username'); ?>" name="username"
                               type="text" autofocus value="<?php echo (isset($username)) ? $username : ''; ?>">
                    </div>
                    <div class="list-group-item">
                        <input class="form-control" placeholder="<?php echo lang('password'); ?>" name="password"
                               type="password" value="">
                    </div>
                </div>


                <button type="submit" class="btn btn-lg btn-primary btn-block" ng-click="login()"
                        ng-disabled='form.$invalid'><?php echo lang('login'); ?>
                </button>
                
                <div class="text-center m-t m-b"><a href="<?php echo base_url(); ?>">Kembali ke Portal</a></div>


            </form>
        </div>

    </div>


</div>
