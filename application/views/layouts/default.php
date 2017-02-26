<!DOCTYPE html>
<html lang="<?php echo $this->session->userdata('lang') ?>">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php echo $template['metas']; ?>

    <title><?php echo $template['title']; ?></title>



    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo bower_url('animate.css/animate.min.css')?>" >
    <link rel="stylesheet" href="<?php echo bower_url('font-awesome/css/font-awesome.min.css')?>" >
    <link rel="stylesheet" href="<?php echo bower_url('simple-line-icons/css/simple-line-icons.css')?>" >
    <link href="<?php echo bower_url('bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom CSS -->

    <link href="<?php echo css_url('landing/font') ?>" rel="stylesheet">
    <link href="<?php echo css_url('landing/app') ?>" rel="stylesheet">

	<?php echo $template['css']; ?>

    <!-- Custom Fonts -->
    <link href="<?php echo bower_url('font-awesome/css/font-awesome.css') ?>" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<?php echo $template['js_header']; ?>
</head>

<body>

    <!-- Navigation -->
    <header id="header" class="navbar navbar-fixed-top bg-white-only padder-v"  data-spy="affix" data-offset-top="1">
        <div class="container">
            <div class="navbar-header">
                <button class="btn btn-link visible-xs pull-right m-r" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a href="<?php echo base_url(); ?>" class="navbar-brand m-r-lg"><img src="img/logo.png" class="m-r-sm hide"><span class="h3 font-bold"><?php echo $template['title']; ?></span></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav font-bold">
                    <li>
                        <a href="#what" data-ride="scroll">Layanan</a>
                    </li>
                    <li>
                        <a href="#why" data-ride="scroll">Dokumen</a>
                    </li>
                    <li>
                        <a href="#features" data-ride="scroll">Customer Service</a>
                    </li>
<!--                    <li>-->
<!--                        <a href="http://themeforest.net/item/angulr-bootstrap-admin-web-app-with-angularjs/8437259">Download</a>-->
<!--                    </li>-->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <div class="m-t-sm">
                            <a href="<?php echo site_url('dashboard/home')?>" class="btn btn-sm btn-success btn-rounded m-l"><strong>Masuk</strong></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div id="content">
        <?php echo $template['content']; ?>
    </div>


    <!-- Footer -->
    <footer id="footer">
        <div class="bg-info">
            <div class="container">
                <div class="row m-t-xl m-b-xl">
                    <div class="col-sm-6 text-white text-center">
                        <h4 class="m-b">Are you ready to enjoy?</h4>
                    </div>
                    <div class="col-sm-6 text-center">
                        <a href="http://themeforest.net/item/angulr-bootstrap-admin-web-app-with-angularjs/8437259?ref=flatfull" class="btn btn-lg btn-default btn-rounded">Get Angulr Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white">
            <div class="container">
                <div class="row m-t-xl m-b-xl">
                    <div class="col-sm-3">
                        <h4 class="text-u-c m-b font-thin"><span class="b-b b-dark font-bold">Version</span> options</h4>
                        <ul class="list-unstyled">
                            <li><a href="../angular"><i class="fa fa-angle-right m-r-sm"></i>Angular App</a></li>
                            <li><a href="../html"><i class="fa fa-angle-right m-r-sm"></i>Html Template</a></li>
                            <li><a href="../angular/#music/home"><i class="fa fa-angle-right m-r-sm"></i>Music single page application</a></li>
                            <li><a href="#"><i class="fa fa-angle-right m-r-sm"></i>App landing page</a></li>
                        </ul>
                        <p class="m-b-xl">More coming...</p>
                    </div>
                    <div class="col-sm-3">
                        <h4 class="text-u-c m-b font-thin"><span class="b-b b-dark font-bold">Find</span> Us</h4>
                        <p class="text-sm">23 soe Midlokls <br>
                            120002 Loki — UNITED KINGDOM <br>
                            +333 432 321 322
                        </p>
                        <p>Sale: <a href="mailto:hey@example.com">info@example.com</a></p>
                        <p class="m-b-xl">Job: <a href="mailto:hey@example.com">job@example.com</a></p>
                    </div>
                    <div class="col-sm-3">
                        <h4 class="text-u-c m-b-xl font-thin"><span class="b-b b-dark font-bold">Follow</span> Us</h4>
                        <div class="m-b-xl">
                            <a href="#" class="btn btn-icon btn-rounded btn-dark"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="btn btn-icon btn-rounded btn-dark"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="btn btn-icon btn-rounded btn-dark"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="btn btn-icon btn-rounded btn-dark"><i class="fa fa-linkedin"></i></a>
                            <a href="#" class="btn btn-icon btn-rounded btn-dark"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <h4 class="text-u-c m-b font-thin"><span class="b-b b-dark font-bold">News</span> Letter</h4>
                        <p>Do not want to miss anything? Subscribe to our newsletter box</p>
                        <form class="form-inline m-t m-b text-center m-b-xl">
                            <div class="aside-xl inline">
                                <div class="input-group">
                                    <input type="text" id="address" name="address" class="form-control btn-rounded" placeholder="Your email">
                                    <span class="input-group-btn">
                      <button class="btn btn-default btn-rounded" type="submit">Subscribe</button>
                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-light dk">
            <div class="container">
                <div class="row padder-v m-t">
                    <div class="col-xs-8">
                        <ul class="list-inline">
                            <li><a href="#">Sales</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">API</a></li>
                            <li><a href="#">Contact us</a></li>
                            <li><a href="#">Job</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-4 text-right">
                        Angulr &copy; 2015
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?php echo bower_url('jquery/dist/jquery.min.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo bower_url('bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo bower_url('jquery_appear/jquery.appear.js') ?>"></script>

    <script src="<?php echo assets_url('js/landing.js')?>"></script>
    <?php echo $template['js_footer']; ?>

</body>

</html>
