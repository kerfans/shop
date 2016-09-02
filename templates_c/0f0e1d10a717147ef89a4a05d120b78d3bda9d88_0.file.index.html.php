<?php
/* Smarty version 3.1.30, created on 2016-08-31 10:07:12
  from "D:\wamp\www\shop.yaofang.cn\application\views\admin\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57c6ac50027080_75023248',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f0e1d10a717147ef89a4a05d120b78d3bda9d88' => 
    array (
      0 => 'D:\\wamp\\www\\shop.yaofang.cn\\application\\views\\admin\\index.html',
      1 => 1472638029,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57c6ac50027080_75023248 (Smarty_Internal_Template $_smarty_tpl) {
?>
<extends file='public.html' />

<block name=body>
    <div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Dashboard <small>Summary of your App</small>
            </h1>
        </div>
    </div>
    <!-- /. ROW  -->

    <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-green">
                <div class="panel-body">
                    <i class="fa fa-bar-chart-o fa-5x"></i>
                    <h3>8,457</h3>
                </div>
                <div class="panel-footer back-footer-green">
                    Daily Visits

                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-blue">
                <div class="panel-body">
                    <i class="fa fa-shopping-cart fa-5x"></i>
                    <h3>52,160 </h3>
                </div>
                <div class="panel-footer back-footer-blue">
                    Sales

                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-red">
                <div class="panel-body">
                    <i class="fa fa fa-comments fa-5x"></i>
                    <h3>15,823 </h3>
                </div>
                <div class="panel-footer back-footer-red">
                    Comments

                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-brown">
                <div class="panel-body">
                    <i class="fa fa-users fa-5x"></i>
                    <h3>36,752 </h3>
                </div>
                <div class="panel-footer back-footer-brown">
                    No. of Visits

                </div>
            </div>
        </div>
    </div>


    <div class="row">


        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Bar Chart Example
                </div>
                <div class="panel-body">
                    <div id="morris-bar-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Donut Chart Example
                </div>
                <div class="panel-body">
                    <div id="morris-donut-chart"></div>
                </div>
            </div>
        </div>

    </div>
    <!-- /. ROW  -->

    <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tasks Panel
                </div>
                <div class="panel-body">
                    <div class="list-group">

                        <a href="#" class="list-group-item">
                            <span class="badge">7 minutes ago</span>
                            <i class="fa fa-fw fa-comment"></i> Commented on a post
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="badge">16 minutes ago</span>
                            <i class="fa fa-fw fa-truck"></i> Order 392 shipped
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="badge">36 minutes ago</span>
                            <i class="fa fa-fw fa-globe"></i> Invoice 653 has paid
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="badge">1 hour ago</span>
                            <i class="fa fa-fw fa-user"></i> A new user has been added
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="badge">1.23 hour ago</span>
                            <i class="fa fa-fw fa-user"></i> A new user has added
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="badge">yesterday</span>
                            <i class="fa fa-fw fa-globe"></i> Saved the world
                        </a>
                    </div>
                    <div class="text-right">
                        <a href="#">More Tasks <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-8 col-sm-12 col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Responsive Table Example
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>S No.</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>User Name</th>
                                <th>Email ID.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>John</td>
                                <td>Doe</td>
                                <td>John15482</td>
                                <td>name@site.com</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Kimsila</td>
                                <td>Marriye</td>
                                <td>Kim1425</td>
                                <td>name@site.com</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Rossye</td>
                                <td>Nermal</td>
                                <td>Rossy1245</td>
                                <td>name@site.com</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Richard</td>
                                <td>Orieal</td>
                                <td>Rich5685</td>
                                <td>name@site.com</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Jacob</td>
                                <td>Hielsar</td>
                                <td>Jac4587</td>
                                <td>name@site.com</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Wrapel</td>
                                <td>Dere</td>
                                <td>Wrap4585</td>
                                <td>name@site.com</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /. ROW  -->
    <footer><p>Copyright &copy; 2016.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p></footer>
</div>
</block><?php }
}
