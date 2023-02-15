<?php
/* Smarty version 3.1.30, created on 2019-01-29 14:02:29
  from "/var/www/html/console/templates/main/header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c5032c54ab986_12079522',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '389a6a1ac44ae395f133b1f0f0a5a7b60244c3df' => 
    array (
      0 => '/var/www/html/console/templates/main/header.html',
      1 => 1501931580,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c5032c54ab986_12079522 (Smarty_Internal_Template $_smarty_tpl) {
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
