<?php
/* Smarty version 3.1.30, created on 2021-07-23 20:39:23
  from "/var/www/mdays/console/templates/main/sidebar.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60fafecbd1b180_51403008',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '906b8298d00d767ba8e2d8b258af0676af995ca5' => 
    array (
      0 => '/var/www/mdays/console/templates/main/sidebar.html',
      1 => 1625672802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60fafecbd1b180_51403008 (Smarty_Internal_Template $_smarty_tpl) {
?>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
		<div class="pull-left image">
		  <img src="https://minotar.net/avatar/<?php echo $_smarty_tpl->tpl_vars['user']->value['nick'];?>
/45" class="img-circle" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['nick'];?>
">
        </div>
        <div class="pull-left info">
          <p><?php echo $_smarty_tpl->tpl_vars['user']->value['nick'];?>
</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Онлайн</a>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="header">Навигация</li>
        <?php echo $_smarty_tpl->tpl_vars['get_buttons']->value;?>

      </ul>
    </section>
  </aside><?php }
}
