<?php
/* Smarty version 3.1.30, created on 2019-06-14 21:11:16
  from "/var/www/html/admin/templates/messages.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d03e3444fbe05_91238351',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2da0ac4aa24698e40a44cd4ad27d357b97bcf53d' => 
    array (
      0 => '/var/www/html/admin/templates/messages.html',
      1 => 1549446638,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d03e3444fbe05_91238351 (Smarty_Internal_Template $_smarty_tpl) {
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
