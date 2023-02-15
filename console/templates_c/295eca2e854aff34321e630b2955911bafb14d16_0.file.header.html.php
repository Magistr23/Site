<?php
/* Smarty version 3.1.30, created on 2021-07-23 20:39:23
  from "/var/www/mdays/console/templates/main/header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60fafecbd15090_65116649',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '295eca2e854aff34321e630b2955911bafb14d16' => 
    array (
      0 => '/var/www/mdays/console/templates/main/header.html',
      1 => 1625672802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60fafecbd15090_65116649 (Smarty_Internal_Template $_smarty_tpl) {
?>
  <header class="main-header">
    <a href="/console/" class="logo">
      <span class="logo-mini"><?php echo $_smarty_tpl->tpl_vars['cfg']->value['console']['title_small'];?>
</span>
      <span class="logo-lg"><?php echo $_smarty_tpl->tpl_vars['cfg']->value['console']['title_size'];?>
</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
  </header><?php }
}
