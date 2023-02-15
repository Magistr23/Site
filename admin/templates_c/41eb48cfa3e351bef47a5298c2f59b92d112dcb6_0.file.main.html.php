<?php
/* Smarty version 3.1.30, created on 2021-01-26 10:00:35
  from "C:\laragon\www\mdays\admin\templates\main.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_600fbe13c06aa3_26143811',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '41eb48cfa3e351bef47a5298c2f59b92d112dcb6' => 
    array (
      0 => 'C:\\laragon\\www\\mdays\\admin\\templates\\main.html',
      1 => 1611576503,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.html' => 1,
    'file:pages/".((string)$_smarty_tpl->tpl_vars[\'page\']->value).".html' => 1,
  ),
),false)) {
function content_600fbe13c06aa3_26143811 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <link rel="apple-touch-icon" sizes="76x76" href="../admin/assets/img/apple-icon.png" />
      <link rel="icon" type="image/png" href="../admin/assets/img/favicon.png" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title><?php echo $_smarty_tpl->tpl_vars['cfg']->value['server']['name'];?>
 - Панель управления</title>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
      <meta name="viewport" content="width=device-width" />
      <!-- Bootstrap core CSS     -->
      <link href="../admin/assets/css/bootstrap.min.css" rel="stylesheet" />
      <!--  Material Dashboard CSS    -->
      <link href="../admin/assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
      <!--  CSS for Demo Purpose, don't include it in your project     -->
      <link href="../admin/assets/css/demo.css" rel="stylesheet" />
      <!--     Fonts and icons     -->
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
   </head>
   <body>
      <div class="wrapper">
         <div class="sidebar" data-color="purple" data-image="../admin/assets/img/sidebar-1.jpg">
            <div class="logo">
               <a href="/admin/" class="simple-text">
               <?php echo $_smarty_tpl->tpl_vars['cfg']->value['server']['name'];?>

               </a>
            </div>
            <div class="sidebar-wrapper">
               <ul class="nav">
                  <li <?php if ($_smarty_tpl->tpl_vars['page']->value == 'index') {?>class="active"<?php }?>>
                     <a href="/admin/">
                        <i class="material-icons">dashboard</i>
                        <p>Главная</p>
                     </a>
                  </li>
                  <li <?php if ($_smarty_tpl->tpl_vars['page']->value == 'servers') {?>class="active"<?php }?>>
                     <a href="/admin/?page=servers">
                        <i class="material-icons">content_paste</i>
                        <p>Сервера</p>
                     </a>
                  </li>
                  <li <?php if ($_smarty_tpl->tpl_vars['page']->value == 'groups') {?>class="active"<?php }?>>
                     <a href="/admin/?page=groups">
                        <i class="material-icons">library_books</i>
                        <p>Товары</p>
                     </a>
                  </li>
                  <li <?php if ($_smarty_tpl->tpl_vars['page']->value == 'promo') {?>class="active"<?php }?>>
                     <a href="/admin/?page=promo">
                        <i class="material-icons">star_rate</i>
                        <p>Купоны</p>
                     </a>
                  </li>
                  <li class="active-pro">
                     <a href="https://vk.com/phpmc">
                        <i class="fa fa-link" aria-hidden="true"></i>
                        <p>PHPMC VK</p>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
               <div class="container-fluid">
                  <div class="navbar-header">
                     <button type="button" class="navbar-toggle" data-toggle="collapse">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     </button>
                     <a class="navbar-brand" href="#"> Панель управления </a>
                  </div>
                  <div class="collapse navbar-collapse">
                     <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="/admin/?logout">
                                <i class="material-icons">exit_to_app</i>
                                <p class="hidden-lg hidden-md">Выйти</p>
                            </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </nav>
            <div class="content">
				<?php $_smarty_tpl->_subTemplateRender("file:messages.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

				<?php $_smarty_tpl->_subTemplateRender("file:pages/".((string)$_smarty_tpl->tpl_vars['page']->value).".html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            </div>
            <footer class="footer">
               <div class="container-fluid">
                  <p class="copyright pull-right">
                     &copy; 
                     <?php echo '<script'; ?>
>
                        document.write(new Date().getFullYear())
                     <?php echo '</script'; ?>
>
                     , разработано в <a href="https://phpmc.ru/" target="_blank">PHPMC</a>
                  </p>
               </div>
            </footer>
         </div>
      </div>
   </body>
   <!--   Core JS Files   -->
   <?php echo '<script'; ?>
 src="../admin/assets/js/jquery-3.2.1.min.js" type="text/javascript"><?php echo '</script'; ?>
>
   <?php echo '<script'; ?>
 src="../admin/assets/js/bootstrap.min.js" type="text/javascript"><?php echo '</script'; ?>
>
   <?php echo '<script'; ?>
 src="../admin/assets/js/material.min.js" type="text/javascript"><?php echo '</script'; ?>
>
   <!--  Dynamic Elements plugin -->
   <?php echo '<script'; ?>
 src="../admin/assets/js/arrive.min.js"><?php echo '</script'; ?>
>
   <!--  PerfectScrollbar Library -->
   <?php echo '<script'; ?>
 src="../admin/assets/js/perfect-scrollbar.jquery.min.js"><?php echo '</script'; ?>
>
   <!--  Notifications Plugin    -->
   <?php echo '<script'; ?>
 src="../admin/assets/js/bootstrap-notify.js"><?php echo '</script'; ?>
>
   <!-- Material Dashboard javascript methods -->
   <?php echo '<script'; ?>
 src="../admin/assets/js/material-dashboard.js?v=1.2.0"><?php echo '</script'; ?>
>
   <!-- Material Dashboard DEMO methods, don't include it in your project! -->
   <?php echo '<script'; ?>
 src="../admin/assets/js/demo.js"><?php echo '</script'; ?>
>
   <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"><?php echo '</script'; ?>
>
   <?php echo '<script'; ?>
>
      $(document).ready(function() {
      		$('#donaters').DataTable({
      			language: {
      				processing: "Выполняется обработка...",
      				search: "Поиск: ",
      				lengthMenu: "Показать _MENU_ записей",
      				info: "Записи с _START_ до _END_ из _TOTAL_ записей",
      				infoEmpty: "Записи с 0 до 0 из 0 записей",
      				infoFiltered: "<br>(отфильтровано из _MAX_ записей)",
      				infoPostFix: "",
      				loadingRecords: "Загрузка...",
      				zeroRecords: "Записи не обнаружены",
      				emptyTable: "Нет доступных в таблице данных",
      				paginate: {
      					first: "Первая",
      					previous: "Назад",
      					next: "Вперед",
      					last: "Последняя"
      				},
      				aria: {
      					sortAscending: ": активировать для сортировки столбца по возрастанию",
      					sortDescending: ": активировать для сортировки столбцов по убыванию"
      				}
      			}
      		});
      });
   <?php echo '</script'; ?>
>
</html>
<?php }
}
