<?php
/* Smarty version 3.1.30, created on 2019-01-29 14:02:29
  from "/var/www/html/console/templates/main/sidebar.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c5032c54add10_49691014',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb317849880c5a5642c63ffe146d25c720efad73' => 
    array (
      0 => '/var/www/html/console/templates/main/sidebar.html',
      1 => 1548759240,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c5032c54add10_49691014 (Smarty_Internal_Template $_smarty_tpl) {
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
