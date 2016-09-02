<?php
/* Smarty version 3.1.30, created on 2016-09-01 08:42:20
  from "D:\wamp\www\shop.yaofang.cn\application\views\admin\addType.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57c7e9ec059cf1_08986433',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e8f045fa9bfd416427381cda9d060bb9c5f65cc' => 
    array (
      0 => 'D:\\wamp\\www\\shop.yaofang.cn\\application\\views\\admin\\addType.tpl',
      1 => 1472719317,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin\\public.tpl' => 1,
  ),
),false)) {
function content_57c7e9ec059cf1_08986433 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2501157c7e9ec059cf7_70315738', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:admin\public.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_2501157c7e9ec059cf7_70315738 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="col-lg-6">
        <h4>添加分类</h4>
        <form role="form" action="" method="">
            <fieldset>
                <div class="form-group">
                    <label for="disabledSelect">输入分类名称</label>
                    <input class="form-control" id="disabledInput" type="text" placeholder="请输入分类名称">
                </div>
                <div class="form-group">
                    <label for="disabledSelect">选择所属分类</label>
                    <select id="disabledSelect" name="" class="form-control">
                        <option value="">实体分类</option>
                        <option value="">虚拟分类</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">提交</button>
            </fieldset>
        </form>
    </div>
<?php
}
}
/* {/block 'content'} */
}
