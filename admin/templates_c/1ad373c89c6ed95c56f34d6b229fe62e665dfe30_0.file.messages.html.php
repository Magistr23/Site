<?php
/* Smarty version 3.1.30, created on 2021-07-29 17:41:59
  from "/var/www/mdays/admin/templates/messages.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6102be37405198_95129337',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ad373c89c6ed95c56f34d6b229fe62e665dfe30' => 
    array (
      0 => '/var/www/mdays/admin/templates/messages.html',
      1 => 1625672756,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6102be37405198_95129337 (Smarty_Internal_Template $_smarty_tpl) {
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
