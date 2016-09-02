<?php
/* Smarty version 3.1.30, created on 2016-09-01 07:15:04
  from "D:\wamp\www\shop.yaofang.cn\application\views\admin\addAds.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57c7d57876a345_42301066',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6588c72ed29ea055dfa3d913484c0307816d012' => 
    array (
      0 => 'D:\\wamp\\www\\shop.yaofang.cn\\application\\views\\admin\\addAds.tpl',
      1 => 1472708217,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin\\public.tpl' => 1,
  ),
),false)) {
function content_57c7d57876a345_42301066 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2647857c7d57876a343_83833005', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:admin\public.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_2647857c7d57876a343_83833005 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="col-lg-6">
        <h4>添加轮播图</h4>
        <form role="form" action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group">
                    <label for="disabledSelect">标题名称</label>
                    <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input">
                </div>

                <div class="form-group">
                    <label for="disabledSelect">链接地址</label>
                    <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input">
                </div>

                <div class="form-group">
                    <label for="disabledSelect">上传图片</label>
                    <input  type="file" name="">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">提交</button>
            </fieldset>
        </form>
    </div>
<?php
}
}
/* {/block 'content'} */
}
