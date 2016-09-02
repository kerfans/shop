<?php
/* Smarty version 3.1.30, created on 2016-09-01 06:05:12
  from "D:\wamp\www\shop.yaofang.cn\application\views\admin\explain.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57c7c518dfec93_83931605',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c78b8806176fdf09003ec36ccc4285c5f58874da' => 
    array (
      0 => 'D:\\wamp\\www\\shop.yaofang.cn\\application\\views\\admin\\explain.tpl',
      1 => 1472709910,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin\\public.tpl' => 1,
  ),
),false)) {
function content_57c7c518dfec93_83931605 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_261357c7c518dfec91_83350409', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:admin\public.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_261357c7c518dfec91_83350409 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="col-lg-6">
        <h4>获取积分说明</h4>
        <form role="form" action="" method="post">
            <fieldset>
                <textarea name="" cols="60" rows="10"></textarea>
                <br><br>
                <button type="submit" class="btn btn-primary">提交</button>
            </fieldset>
        </form>
    </div>
<?php
}
}
/* {/block 'content'} */
}
