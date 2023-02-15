<?php
/* Smarty version 3.1.30, created on 2021-07-08 15:08:29
  from "/var/www/mdays/console/templates/main.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60e6eabdd42501_02313633',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd50b7849926b3ac617f1da2fb05310a06ddb7ce' => 
    array (
      0 => '/var/www/mdays/console/templates/main.html',
      1 => 1625672802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main/head.html' => 1,
    'file:error/".((string)$_smarty_tpl->tpl_vars[\'error\']->value).".html' => 1,
    'file:main/header.html' => 1,
    'file:main/sidebar.html' => 1,
    'file:pages/".((string)$_smarty_tpl->tpl_vars[\'page\']->value).".html' => 1,
    'file:main/footer.html' => 1,
  ),
),false)) {
function content_60e6eabdd42501_02313633 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<?php $_smarty_tpl->_subTemplateRender("file:main/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body class="hold-transition skin-blue sidebar-mini">

<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
	<?php $_smarty_tpl->_subTemplateRender("file:error/".((string)$_smarty_tpl->tpl_vars['error']->value).".html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php } else { ?>
	<div class="wrapper">
		<?php $_smarty_tpl->_subTemplateRender("file:main/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<?php $_smarty_tpl->_subTemplateRender("file:main/sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	  <div class="content-wrapper">
		<?php $_smarty_tpl->_subTemplateRender("file:pages/".((string)$_smarty_tpl->tpl_vars['page']->value).".html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

	  </div>
	  <footer class="main-footer">
		Разработано с<a href="//mdays.su">Любовью <3</a>
	  </footer>
	</div>
<?php }
$_smarty_tpl->_subTemplateRender("file:main/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html>

<?php }
}
