<?php
/* Smarty version 3.1.30, created on 2020-03-10 14:01:30
  from "/var/www/dcp/console/templates/main/header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e67738a742fc4_30538205',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ffc2d5cc1b392de0450ceca1bf4d423251fcf77' => 
    array (
      0 => '/var/www/dcp/console/templates/main/header.html',
      1 => 1582818368,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e67738a742fc4_30538205 (Smarty_Internal_Template $_smarty_tpl) {
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
