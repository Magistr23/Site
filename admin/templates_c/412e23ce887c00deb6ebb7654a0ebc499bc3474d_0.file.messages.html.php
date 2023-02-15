<?php
/* Smarty version 3.1.30, created on 2021-04-04 12:53:47
  from "D:\_SOFT\laragon\www\mdays\admin\templates\messages.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60698cab4f1384_94823602',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '412e23ce887c00deb6ebb7654a0ebc499bc3474d' => 
    array (
      0 => 'D:\\_SOFT\\laragon\\www\\mdays\\admin\\templates\\messages.html',
      1 => 1617523004,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60698cab4f1384_94823602 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages_list']->value, 'message');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['message']->value) {
?>
<center>
<?php if ($_smarty_tpl->tpl_vars['message']->value['err']) {?>
<div class="alert alert-dismissible alert-danger text-center">
    <strong>Ошибка!</strong> <?php echo $_smarty_tpl->tpl_vars['message']->value['text'];?>

</div>
<?php } else { ?>
<div class="alert alert-dismissible alert-success text-center">
    <strong>Успешно!</strong> <?php echo $_smarty_tpl->tpl_vars['message']->value['text'];?>

</div>
<?php }?>
</center>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
}
}
