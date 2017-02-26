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

    <link href="<?php echo css_url('login/font') ?>" rel="stylesheet">
    <link href="<?php echo css_url('login/app') ?>" rel="stylesheet">

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


<div id="content">
    <?php echo $template['content']; ?>
</div>


<!-- Footer -->


<!-- jQuery -->
<script src="<?php echo bower_url('jquery/dist/jquery.min.js') ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo bower_url('bootstrap/dist/js/bootstrap.min.js') ?>"></script>

<script src="<?php echo assets_url('js/login/ui-load.js')?>"></script>
<script src="<?php echo assets_url('js/login/ui-jp.config.js')?>"></script>
<script src="<?php echo assets_url('js/login/ui-jp.js')?>"></script>
<script src="<?php echo assets_url('js/login/ui-nav.js')?>"></script>
<script src="<?php echo assets_url('js/login/ui-toggle.js')?>"></script>
<script src="<?php echo assets_url('js/login/ui-client.js')?>"></script>

<?php echo $template['js_footer']; ?>

</body>

</html>
