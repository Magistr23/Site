<?php
/* Smarty version 3.1.30, created on 2021-04-08 21:25:38
  from "/var/www/mdaysn/console/templates/error/403.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_606f4aa2d88ba7_44083710',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '935cc0aa4a887d3396b04abf35997c006717cdf2' => 
    array (
      0 => '/var/www/mdaysn/console/templates/error/403.html',
      1 => 1617634102,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_606f4aa2d88ba7_44083710 (Smarty_Internal_Template $_smarty_tpl) {
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
