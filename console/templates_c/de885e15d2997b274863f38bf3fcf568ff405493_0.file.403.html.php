<?php
/* Smarty version 3.1.30, created on 2021-07-23 10:29:44
  from "/var/www/mdays/console/templates/error/403.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60fa6fe8421140_07686352',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de885e15d2997b274863f38bf3fcf568ff405493' => 
    array (
      0 => '/var/www/mdays/console/templates/error/403.html',
      1 => 1625672802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60fa6fe8421140_07686352 (Smarty_Internal_Template $_smarty_tpl) {
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
