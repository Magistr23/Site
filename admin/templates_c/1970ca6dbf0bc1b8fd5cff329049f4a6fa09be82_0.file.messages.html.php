<?php
/* Smarty version 3.1.30, created on 2021-01-26 09:49:33
  from "C:\laragon\www\mdays\admin\templates\messages.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_600fbb7d87f389_18019284',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1970ca6dbf0bc1b8fd5cff329049f4a6fa09be82' => 
    array (
      0 => 'C:\\laragon\\www\\mdays\\admin\\templates\\messages.html',
      1 => 1611576503,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600fbb7d87f389_18019284 (Smarty_Internal_Template $_smarty_tpl) {
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
