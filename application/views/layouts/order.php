<?php
$name = '';
$role = '';
if ($this->auth->loggedin()) {
    $name = $auth_user['first_name'] . ' ' . $auth_user['last_name'];
    $role = $auth_user['role_name'];
    if (strlen(trim($name)) == 0) {
        $name = $auth_user['username'];
    }
}
?>
<!DOCTYPE html>
<html ng-app="app" lang="<?php echo $this->session->userdata('lang') ?>">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $template['metas']; ?>

    <title><?php echo $template['title'] ?></title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo bower_url('animate.css/animate.min.css') ?>">
    <link rel="stylesheet" href="<?php echo bower_url('font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?php echo bower_url('simple-line-icons/css/simple-line-icons.css') ?>">
    <link href="<?php echo bower_url('bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo bower_url('animate.css/animate.min.css') ?>" rel="stylesheet">

    <!-- Custom CSS -->

    <link href="<?php echo css_url('login/font') ?>" rel="stylesheet">
    <link href="<?php echo css_url('login/app') ?>" rel="stylesheet">

    <?php echo $template['css']; ?>

    <!-- Custom Fonts -->
    <link href="<?php echo bower_url('font-awesome/css/font-awesome.css') ?>" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
          type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo bower_url('jquery/dist/jquery.min.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo bower_url('bootstrap/dist/js/bootstrap.min.js') ?>"></script>

    <script src="<?php echo assets_url('js/login/ui-nav.js') ?>"></script>
    <script src="<?php echo assets_url('js/login/ui-toggle.js') ?>"></script>
    <script src="<?php echo assets_url('js/login/ui-client.js') ?>"></script>

    <!--vue js-->
    <script src="<?php echo bower_url('vue/dist/vue.js'); ?>"></script>

    <!--blockUI-->
    <script src="<?php echo bower_url('blockUI/jquery.blockUI.js'); ?>"></script>

    <!--jquery validation-->
    <script src="<?php echo bower_url('jquery-validation/dist/jquery.validate.min.js') ?>"></script>
    <script src="<?php echo bower_url('jquery-validation/src/localization/messages_id.js') ?>"></script>

    <!--toastr-->
    <link rel="stylesheet" href="<?php echo bower_url('toastr/toastr.min.css'); ?>">
    <script src="<?php echo bower_url('toastr/toastr.min.js'); ?>"></script>

    <script>
        var base_url = '<?php echo base_url(); ?>'; // get base url without index.php
        var site_url = '<?php echo site_url(); ?>'; // get site url with index.php
        var id = '<?php echo (isset($id)) ? $id : ''?>';
    </script>


    <?php echo $template['js_header']; ?>
</head>

<body>
<div class="app app-header-fixed app-aside-fixed">
    <header id="header" class="app-header navbar" role="menu">
        <!-- navbar header -->
        <div class="navbar-header bg-dark">
            <button class="pull-right visible-xs dk" ui-toggle-class="show" target=".navbar-collapse">
                <i class="glyphicon glyphicon-cog"></i>
            </button>
            <button class="pull-right visible-xs" ui-toggle-class="off-screen" target=".app-aside" ui-scroll="app">
                <i class="glyphicon glyphicon-align-justify"></i>
            </button>
            <!-- brand -->
            <a href="<?php echo site_url('/') ?>" class="navbar-brand text-lt">

                <img src="<?php echo assets_url('img/logo.png') ?>" alt="." class="hide">
                <span><?php echo $template['title']; ?></span>
            </a>
            <!-- / brand -->
        </div>
        <!-- / navbar header -->

        <!-- navbar collapse -->
        <div class="collapse pos-rlt navbar-collapse box-shadow bg-white">


            <!-- search form -->

            <!-- / search form -->

            <!-- nabar right -->
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                <img src="<?php echo assets_url('img/a0.jpg') ?>" alt="...">
                <i class="on md b-white bottom"></i>
              </span>
                        <span class="hidden-sm hidden-md"><?= $name ?></span> <b class="caret"></b>
                    </a>
                    <!-- dropdown -->
                    <ul class="dropdown-menu animated fadeInRight w">
                        <li class="wrapper b-b m-b-sm bg-light m-t-n-xs">
                            <div>
                                <p>300mb of 500mb used</p>
                            </div>
                            <div class="progress progress-xs m-b-none dker">
                                <div class="progress-bar progress-bar-info" data-toggle="tooltip"
                                     data-original-title="50%" style="width: 50%"></div>
                            </div>
                        </li>
                        <li>
                            <a href>
                                <span class="badge bg-danger pull-right">30%</span>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li>
                            <a ui-sref="app.page.profile">Profile</a>
                        </li>
                        <li>
                            <a ui-sref="app.docs">
                                <span class="label bg-info pull-right">new</span>
                                Help
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo site_url('auth/logout') ?>">Logout</a>
                        </li>
                    </ul>
                    <!-- / dropdown -->
                </li>
            </ul>
            <!-- / navbar right -->
        </div>
        <!-- / navbar collapse -->
    </header>



    <div id="content" class='' role="main">

        <div class="app-content-body">
            <div class="bg-auto app-header-fixed lter b-b wrapper-md" style="overflow: auto">
                <h1 class="m-n font-thin h3 pull-left"><?php echo (isset($page_title) || !empty($page_title)) ? $page_title : '' ?></h1>
                <div class="pull-right">
                    <?php echo (isset($page_icon)) ? $page_icon : ''; ?>
                </div>
            </div>
            <div class="wrapper-md">
                <?php echo $template['content']; ?>
            </div>
        </div>

    </div>
    <footer id="footer" class="app-footer" role="footer" style="margin:0">
        <div class="wrapper b-t bg-light text-center">
                <span class="pull-right">2.0 <a href="" ui-scroll="app" class="m-l-sm text-muted"><i
                            class="fa fa-long-arrow-up"></i></a></span>
            <?php echo $template['title']; ?> v.2 © 2016 Copyright.
        </div>
    </footer>
</div>

<!-- /#wrapper -->

<script src="<?php echo bower_url('lodash/dist/lodash.min.js') ?>"></script>

<script src="<?php echo bower_url('moment/min/moment.min.js') ?>"></script>
<script src="<?php echo bower_url('moment/min/moment-with-locales.min.js') ?>"></script>
<script src="<?php echo bower_url('moment/locale/id.js') ?>"></script>


<script type="text/javascript">
    moment().locale('id');
</script>


<?php echo $template['js_footer']; ?>


<script type="text/javascript">

    // load component block UI
    $(document).ajaxStart(function () {
        $.blockUI({
            message: '<span class="text-semibold">Loading...</span>',
            overlayCSS: {
                backgroundColor: '#000',
                opacity: 0.6,
                cursor: 'wait'
            },
            css: {
                border: 0,
                padding: '10px 15px',
                color: '#fff',
                '-webkit-border-radius': 2,
                '-moz-border-radius': 2,
                backgroundColor: '#333',
                'z-index': 2000
            }
        });
    }).ajaxStop(function () {
        $.unblockUI();
    });


    // auto validate email
    $.validator.methods.email = function (value, element) {
        return this.optional(element) || /[a-z]+@[a-z]+\.[a-z]+/.test(value);
    };


</script>

</body>

</html>
