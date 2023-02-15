<?php
/* Smarty version 3.1.30, created on 2019-01-29 14:13:11
  from "/var/www/html/console/templates/error/403.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c503547181e03_03817455',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '492bed7d09a5013758a6f8ee863704b3446792bd' => 
    array (
      0 => '/var/www/html/console/templates/error/403.html',
      1 => 1503606600,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c503547181e03_03817455 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="login-box">
  <div class="login-logo">
    <a href="/console/"><?php echo $_smarty_tpl->tpl_vars['cfg']->value['console']['title_auth'];?>
</a>
  </div>
	  <div class="alert alert-dismissible alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Ошибка</strong>, у вас нет доступа к данной странице.
	  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
                <a href="/" class="btn btn-warning block full-width m-b">Купить доступ к консоли</a><br><br>
                <a href="/console/" class="btn btn-warning block full-width m-b">Перейти к главной</a>
        </div>
    </div>

  </div>
</div><?php }
}
