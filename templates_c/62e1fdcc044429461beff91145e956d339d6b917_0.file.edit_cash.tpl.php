<?php
/* Smarty version 3.1.30, created on 2016-09-02 07:43:01
  from "D:\wamp\www\shop.yaofang.cn\application\views\admin\edit_cash.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57c92d85a1f1a1_42921612',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '62e1fdcc044429461beff91145e956d339d6b917' => 
    array (
      0 => 'D:\\wamp\\www\\shop.yaofang.cn\\application\\views\\admin\\edit_cash.tpl',
      1 => 1472802158,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin\\public.tpl' => 1,
  ),
),false)) {
function content_57c92d85a1f1a1_42921612 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1174357c92d85a1b329_98727626', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:admin\public.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_1174357c92d85a1b329_98727626 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="col-lg-6">
        <h4>编辑代金券商品</h4>
        <form role="form" action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group">
                    <label for="disabledSelect">标题名称</label>
                    <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input">
                </div>

                <div class="form-group">
                    <label for="disabledSelect">选择运营部</label>
                    <select id="disabledSelect" name="" class="form-control">
                        <option value="">移动</option>
                        <option value="">联通</option>
                        <option value="">电信</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="disabledSelect">输入流量大小</label>
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
