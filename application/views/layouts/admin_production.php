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

    <?php echo $template['js_header_lib']?>


    <script>
        var base_url = '<?php echo site_url(); ?>';
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
            <!-- buttons -->
            <div class="nav navbar-nav hidden-xs">
                <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="app-aside-folded" target=".app">
                    <i class="fa fa-dedent fa-fw text"></i>
                    <i class="fa fa-indent fa-fw text-active"></i>
                </a>
                <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="show" target="#aside-user">
                    <i class="icon-user fa-fw"></i>
                </a>
            </div>
            <!-- / buttons -->

            <!-- link and dropdown -->
            <ul class="nav navbar-nav hidden-sm">

            </ul>
            <!-- / link and dropdown -->

            <!-- search form -->

            <!-- / search form -->

            <!-- nabar right -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        <i class="icon-bell fa-fw"></i>
                        <span class="visible-xs-inline">Notifications</span>
                        <span class="badge badge-sm up bg-danger pull-right-xs">2</span>
                    </a>
                    <!-- dropdown -->
                    <div class="dropdown-menu w-xl animated fadeInUp">
                        <div class="panel bg-white">
                            <div class="panel-heading b-light bg-light">
                                <strong>You have <span>2</span> notifications</strong>
                            </div>
                            <div class="list-group">
                                <a href class="list-group-item">
                    <span class="pull-left m-r thumb-sm">
                      <img src="<?php echo assets_url('img/a0.jpg') ?>" alt="..." class="img-circle">
                    </span>
                                    <span class="clear block m-b-none">
                      Use awesome animate.css<br>
                      <small class="text-muted">10 minutes ago</small>
                    </span>
                                </a>
                                <a href class="list-group-item">
                    <span class="clear block m-b-none">
                      1.0 initial released<br>
                      <small class="text-muted">1 hour ago</small>
                    </span>
                                </a>
                            </div>
                            <div class="panel-footer text-sm">
                                <a href class="pull-right"><i class="fa fa-cog"></i></a>
                                <a href="#notes" data-toggle="class:show animated fadeInRight">See all the
                                    notifications</a>
                            </div>
                        </div>
                    </div>
                    <!-- / dropdown -->
                </li>
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
    <aside id="aside" class="app-aside hidden-xs bg-dark">
        <div class="aside-wrap">
            <div class="navi-wrap">
                <!-- user -->
                <div class="clearfix hidden-xs text-center hide" id="aside-user">
                    <div class="dropdown wrapper">
                        <a href="app.page.profile">
                <span class="thumb-lg w-auto-folded avatar m-t-sm">
                  <img src="<?php echo assets_url('img/a0.jpg') ?>" class="img-full" alt="...">
                </span>
                        </a>
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle hidden-folded">
                <span class="clear">
                  <span class="block m-t-sm">
                    <strong class="font-bold text-lt">John.Smith</strong>
                    <b class="caret"></b>
                  </span>
                  <span class="text-muted text-xs block">Art Director</span>
                </span>
                        </a>
                        <!-- dropdown -->
                        <ul class="dropdown-menu animated fadeInRight w hidden-folded">
                            <li class="wrapper b-b m-b-sm bg-info m-t-n-xs">
                                <span class="arrow top hidden-folded arrow-info"></span>
                                <div>
                                    <p>300mb of 500mb used</p>
                                </div>
                                <div class="progress progress-xs m-b-none dker">
                                    <div class="progress-bar bg-white" data-toggle="tooltip" data-original-title="50%"
                                         style="width: 50%"></div>
                                </div>
                            </li>
                            <li>
                                <a href>Settings</a>
                            </li>
                            <li>
                                <a href="page_profile.html">Profile</a>
                            </li>
                            <li>
                                <a href>
                                    <span class="badge bg-danger pull-right">3</span>
                                    Notifications
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="page_signin.html">Logout</a>
                            </li>
                        </ul>
                        <!-- / dropdown -->
                    </div>
                    <div class="line dk hidden-folded"></div>
                </div>
                <!-- / user -->

                <!-- nav -->
                <nav ui-nav class="navi clearfix">
                    <ul class="nav">
                        <?php

                        function set_active($menus, $curr_uri)
                        {
                            foreach ($menus as $index => $menu) {
                                $is_active = false;
                                $has_children = isset($menu['children']) and is_array($menu['children']);
                                if ($has_children) {
                                    $menus[$index]['children'] = set_active($menus[$index]['children'], $curr_uri);
                                    foreach ($menus[$index]['children'] as $menu_item) {
                                        if ($menu_item['is_active']) {
                                            $is_active = true;
                                            break;
                                        }
                                    }
                                } else {
                                    $is_active = strpos($curr_uri, $menu['uri']) === 0;
                                }
                                $menus[$index]['is_active'] = $is_active;
                            }
                            return $menus;
                        }

                        function display_menu_item($from_children = false, $menu, $curr_uri)
                        {
                            if (empty($curr_uri))
                                $curr_uri = 'home';
                            $is_active = (isset($menu['is_active']) && $menu['is_active']);
                            $has_children = isset($menu['children']) and is_array($menu['children']);

                            if ($from_children) {

                            } else {

                            }

                            echo '<li' . ($is_active ? ' class="active"' : ' ') . '>';

                            echo '<a class="auto" href="' . ((isset($menu['uri']) and !empty($menu['uri'])) ? site_url($menu['uri']) : '#') . '"' . '>';
                            echo '<span class="pull-right text-muted">' .
                                '<i class="fa fa-fw fa-angle-right text"></i>' .
                                '<i class="fa fa-fw fa-angle-down text-active"></i>' .
                                '</span>';
                            if (isset($menu['icon']) && !empty($menu['icon']))
                                echo '<i class="' . $menu['icon'] . '"></i>';
                            echo '<span>' . $menu['title'] . '</span>';
                            echo '</a>';
                            if ($has_children) {
                                echo '<ul class="nav nav-sub dk">';
                                foreach ($menu['children'] as $menu_item) {
                                    display_menu_item($has_children, $menu_item, $curr_uri);
                                }
                                echo '</ul>';
                            }
                        }

                        $curr_uri = $this->uri->uri_string();
                        if (empty($curr_uri))
                            $curr_uri = 'home';
                        $this->load->config('navigation');
                        $navigation = set_active($this->config->item('navigation'), $curr_uri);
                        foreach ($navigation as $menu) {
                            display_menu_item(false, $menu, $curr_uri);
                        }
                        ?>
                    </ul>
                </nav>
                <!-- nav -->


            </div>
        </div>
    </aside>


    <div id="content" class="app-content" role="main">

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
    <footer id="footer" class="app-footer" role="footer">
        <div class="wrapper b-t bg-light">
                <span class="pull-right">2.0 <a href="" ui-scroll="app" class="m-l-sm text-muted"><i
                            class="fa fa-long-arrow-up"></i></a></span>
            <?php echo $template['title']; ?> v.2 © 2016 Copyright.
        </div>
    </footer>
</div>

<!-- /#wrapper -->

<?php echo $template['js_footer_lib']; ?>

<script type="text/javascript">
    moment().locale('id');
</script>


<?php echo $template['js_footer']; ?>


</body>

</html>
