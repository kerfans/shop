<?php
/* Smarty version 3.1.30, created on 2016-09-02 07:42:58
  from "D:\wamp\www\shop.yaofang.cn\application\views\admin\addCash.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57c92d828bf6b1_78937779',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f44efa65d231485c00ea0add30770dee0fee548' => 
    array (
      0 => 'D:\\wamp\\www\\shop.yaofang.cn\\application\\views\\admin\\addCash.tpl',
      1 => 1472802108,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin\\public.tpl' => 1,
  ),
),false)) {
function content_57c92d828bf6b1_78937779 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1797757c92d828bb839_47382001', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:admin\public.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_1797757c92d828bb839_47382001 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-lg-8">
            <form role="form" action="" method="">
                <div class="input-group">
                    <div class="input-group-btn">
                        <select type="button" name="" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <option value="">根据代金券ID查询</option>
                            <option value="">根据代金券名称查询</option>
                        </select>
                    </div><!-- /btn-group -->
                    <input type="text" name="" class="form-control" aria-label="..." placeholder="请输入代金券ID或名称">
                    <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">搜索</button>
                  </span>
                </div><!-- /input-group -->
            </form>
        </div><!-- /.col-lg-6 -->
    </div>
    <br>
    <!-- /.row -->
    
    <div class="panel panel-default">
        <!-- Table -->
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>商品ID</th>
                <th>商品SN</th>
                <th>商品标题</th>
                <th>商品图片</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>123</td>
                <td>1233424</td>
                <td>感冒颗粒</td>
                <td>@mdo</td>
                <td>
                    <a class="btn btn-sm btn-success" href="/index.php/admin/addCash/edit_cash">添加并编辑</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
<?php
}
}
/* {/block 'content'} */
}
