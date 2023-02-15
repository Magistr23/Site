<?php
/* Smarty version 3.1.30, created on 2021-04-08 20:34:27
  from "/var/www/mdaysn/console/templates/main/header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_606f3ea3da57b3_37077214',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0474714b738316eb9407b75a714c8d96075d9c8' => 
    array (
      0 => '/var/www/mdaysn/console/templates/main/header.html',
      1 => 1617634102,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_606f3ea3da57b3_37077214 (Smarty_Internal_Template $_smarty_tpl) {
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
