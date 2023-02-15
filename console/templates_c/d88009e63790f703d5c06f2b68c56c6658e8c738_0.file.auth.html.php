<?php
/* Smarty version 3.1.30, created on 2021-04-08 08:43:16
  from "/var/www/mdaysn/console/templates/error/auth.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_606e97f47596c1_43652864',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd88009e63790f703d5c06f2b68c56c6658e8c738' => 
    array (
      0 => '/var/www/mdaysn/console/templates/error/auth.html',
      1 => 1617634102,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_606e97f47596c1_43652864 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="login-box">
  <div class="login-logo">
    <a href="/console/"><?php echo $_smarty_tpl->tpl_vars['cfg']->value['console']['title_auth'];?>
</a>
  </div>
	  <div class="alert alert-dismissible alert-danger text-center">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		Для доступа вам необходимо войти, <br>для этого воспользуйтесь кнопкой ниже.
	  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
                <a href="https://oauth.vk.com/authorize?client_id=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['console']['vk_id'];?>
&scope=email,wall&redirect_uri=https://<?php echo $_smarty_tpl->tpl_vars['cfg']->value['console']['auth_url'];?>
/auth.php" class="btn btn-primary block full-width m-b">Войти через Вконакте</a><br><br>
                <a href="/" class="btn btn-warning block full-width m-b">Перейти к покупке доната</a>
        </div>
    </div>

  </div>
</div><?php }
}
