<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>On the Go | Admin</title>
    <!-- <link rel="icon" href="{{ asset("/images/favicon.ico") }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset("/images/favicon-152.png") }}"> -->

    <link href="/css/full_sparkle.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">
    <script src="/js/jquery-full.js"></script>

</head>

<?php require '../includes/env.php';
require '../includes/functions.php'; 

if (!isset($_SESSION["user_id"])) {
    header('location:admin/login.php');
}
?>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/" class="site_title">
                            <!-- <img src="{{ url('/images/ET-logo-color-notag.png') }}" id="full"> -->
                            <span>On the Go</span>
                        </a>
                    </div>

                    <div class="clearfix"></div>
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li><a href="/admin"><i class="fa fa-home"></i> Dashboard</a></li>
                                <li><a href="/admin/photos"><i class="fa fa-shopping-cart"></i> Photos</a></li>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <?php echo getUser($_SESSION["user_id"]); ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="logout.php">
                                            <i class="fa fa-sign-out pull-right"></i> Log Out
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
            <div class="right_col" role="main">
            