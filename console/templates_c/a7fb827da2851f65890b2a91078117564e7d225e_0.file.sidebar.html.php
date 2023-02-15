<?php
/* Smarty version 3.1.30, created on 2020-03-10 14:01:30
  from "/var/www/dcp/console/templates/main/sidebar.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e67738a747333_35629675',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7fb827da2851f65890b2a91078117564e7d225e' => 
    array (
      0 => '/var/www/dcp/console/templates/main/sidebar.html',
      1 => 1582818368,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e67738a747333_35629675 (Smarty_Internal_Template $_smarty_tpl) {
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
