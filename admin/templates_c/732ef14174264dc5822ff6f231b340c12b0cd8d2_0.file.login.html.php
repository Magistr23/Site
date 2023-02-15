<?php
/* Smarty version 3.1.30, created on 2021-04-04 12:53:47
  from "D:\_SOFT\laragon\www\mdays\admin\templates\login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60698cab44ef67_68195235',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '732ef14174264dc5822ff6f231b340c12b0cd8d2' => 
    array (
      0 => 'D:\\_SOFT\\laragon\\www\\mdays\\admin\\templates\\login.html',
      1 => 1617523004,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.html' => 1,
  ),
),false)) {
function content_60698cab44ef67_68195235 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../admin/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../admin/assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Авторизация - Админ-панель</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="../admin/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../admin/assets/css/material-kit.css" rel="stylesheet"/>

</head>

<body class="signup-page">
    <div class="wrapper">
		<div class="header header-filter" style="background-image: url('../admin/assets/img/city.jpg'); background-size: cover; background-position: top center;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form class="form" method="post" action="">
								<div class="header header-primary text-center">
									<h4>Авторизация</h4>
								</div>
								<div class="footer text-center">
									<?php echo '<script'; ?>
 src="//ulogin.ru/js/ulogin.js"><?php echo '</script'; ?>
>
									<div id="uLogin" data-ulogin="display=buttons;fields=first_name,last_name,phone;redirect_uri=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['domain'];?>
/admin/;">
										<button type="button" data-uloginbutton = "vkontakte" class="btn btn-info btn-primary">ВОЙТИ ЧЕРЕЗ <i class="fa fa-vk" aria-hidden="true"></i></button>
									</div>
								</div>
							</form>
						</div>
							<?php $_smarty_tpl->_subTemplateRender("file:messages.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

					</div>
				</div>
			</div>

			<footer class="footer">
		        <div class="container">
		            <div class="copyright pull-right">
                        &copy; 
						<?php echo '<script'; ?>
>
                            document.write(new Date().getFullYear())
                        <?php echo '</script'; ?>
>
						, разработано в <a href="https://phpmc.ru/" target="_blank">PHPMC</a>
		            </div>
		        </div>
		    </footer>

		</div>

    </div>


</body>
	<?php echo '<script'; ?>
 src="../admin/assets/js/jquery.min.js" type="text/javascript"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../admin/assets/js/bootstrap.min.js" type="text/javascript"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../admin/assets/js/material.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../admin/assets/js/nouislider.min.js" type="text/javascript"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../admin/assets/js/bootstrap-datepicker.js" type="text/javascript"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../admin/assets/js/material-kit.js" type="text/javascript"><?php echo '</script'; ?>
>

</html>
<?php }
}
