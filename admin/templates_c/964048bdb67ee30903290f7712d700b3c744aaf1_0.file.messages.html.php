<?php
/* Smarty version 3.1.30, created on 2020-02-29 05:04:46
  from "C:\OpenServer\domains\mdays.loc\admin\templates\messages.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e59c6bea6d576_76706790',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '964048bdb67ee30903290f7712d700b3c744aaf1' => 
    array (
      0 => 'C:\\OpenServer\\domains\\mdays.loc\\admin\\templates\\messages.html',
      1 => 1582811168,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e59c6bea6d576_76706790 (Smarty_Internal_Template $_smarty_tpl) {
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
