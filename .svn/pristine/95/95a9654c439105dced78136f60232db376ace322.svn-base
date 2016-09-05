<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>积分商城</title>
    <!-- Bootstrap Styles-->
    <link href="{$smarty.const.CSS_ADMIN_URL}css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- Morris Chart Styles-->
    <link href="{$smarty.const.JS_ADMIN_URL}js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{$smarty.const.CSS_ADMIN_URL}css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.useso.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">药房网积分商城</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Doe</strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</div>
                            </a>
                        </li>
                        <li class="divider"></li>

                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">

                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">85% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                                            <span class="sr-only">85% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>

        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="#"><i class="fa fa-clone"></i>分类管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="/index.php/admin/typeList">添加分类</a>
                            </li>
                            <li>
                                <a href="/index.php/admin/typeList/type_list">分类列表</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i>添加积分商品<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/index.php/admin/addGoods">添加实体商品</a>
                            </li>
                            <li>
                                <a href="#">添加虚拟商品<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="/index.php/admin/addCash">添加代金券</a>
                                    </li>
                                    <li>
                                        <a href="/index.php/admin/addFlus">添加兑换流量</a>
                                    </li>
                                    <li>
                                        <a href="#">添加服务卡</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/index.php/admin/showList"><i class="fa fa-desktop"></i>兑换商品列表</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bars"></i>轮播广告<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="/index.php/admin/adsList">添加轮播</a>
                            </li>
                            <li>
                                <a href="/index.php/admin/adsList/ads_list">轮播列表</a>
                            </li>
                        </ul>
                    </li>


                </ul>
            </div>
        </nav>
        <!------------------------------- /. 内容部分开始----------------------------------------  -->
        <div id="page-wrapper">
           {block name=content}{/block}
        </div>
        <!------------------------------- /. 内容部分结束----------------------------------------  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="{$smarty.const.JS_ADMIN_URL}/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="{$smarty.const.JS_ADMIN_URL}/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="{$smarty.const.JS_ADMIN_URL}/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="{$smarty.const.JS_ADMIN_URL}/js/morris/raphael-2.1.0.min.js"></script>
    <script src="{$smarty.const.JS_ADMIN_URL}/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="{$smarty.const.JS_ADMIN_URL}/js/custom-scripts.js"></script>


</body>

</html>