<?php
/* Smarty version 3.1.30, created on 2016-09-01 09:20:17
  from "D:\wamp\www\shop.yaofang.cn\application\views\admin\typeList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57c7f2d1331577_72970592',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f8967c5b7cf0ba21e9a56db1929a6dff2203a325' => 
    array (
      0 => 'D:\\wamp\\www\\shop.yaofang.cn\\application\\views\\admin\\typeList.tpl',
      1 => 1472721615,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin\\public.tpl' => 1,
  ),
),false)) {
function content_57c7f2d1331577_72970592 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_319457c7f2d132d6e4_78348470', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:admin\public.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_319457c7f2d132d6e4_78348470 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">实体分类</div>
                <!-- Table -->
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>实体</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>|-Mark</td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">虚拟分类</div>

                <!-- Table -->
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>虚拟</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>|-Otto</td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>

    </div>



<?php
}
}
/* {/block 'content'} */
}
