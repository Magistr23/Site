<?php
/* Smarty version 3.1.30, created on 2020-02-29 05:54:12
  from "C:\OpenServer\domains\mdays.loc\console\templates\error\auth.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e59d2549a4ba5_25632464',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0744a0ada4d19458df0d2a460fcb0e817a34edd1' => 
    array (
      0 => 'C:\\OpenServer\\domains\\mdays.loc\\console\\templates\\error\\auth.html',
      1 => 1582811168,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e59d2549a4ba5_25632464 (Smarty_Internal_Template $_smarty_tpl) {
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
