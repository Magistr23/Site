<?php
/* Smarty version 3.1.30, created on 2021-01-26 10:00:37
  from "C:\laragon\www\mdays\admin\templates\pages\servers.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_600fbe15aa2953_39834505',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'efecf8797878372c68c0b31b2bc3d685af88c195' => 
    array (
      0 => 'C:\\laragon\\www\\mdays\\admin\\templates\\pages\\servers.html',
      1 => 1611576503,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600fbe15aa2953_39834505 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<style>
				.form-group {
					padding-bottom: 0;
					margin: 0;
				}
			</style>
			<?php if ($_smarty_tpl->tpl_vars['type']->value == "new/give") {?>
			<div class="card">
				<div class="card-header" data-background-color="purple">
					<h4 class="title">Добавление сервера</h4>
					<p class="category">Добавление нового сервера выдачи</p>
				</div>
				<div class="card-content table-responsive">
					<form method="post">
						<div class="alert alert-dismissible alert-warning">
							<center> Добавление РКОН данных сервера для выдачи</center>
						</div>
						<input class="form-control" type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['server']->value['id'];?>
">
						<div class="form-group">
							<label class="control-label">Название сервера</label>
							<input class="form-control" placeholder="Test" type="text" name="name">
						</div>
						<div class="form-group">
							<label class="control-label">Адрес сервера</label>
							<input class="form-control" placeholder="127.0.0.1" type="text" name="ip">
						</div>
						<div class="form-group">
							<label class="control-label">Порт сервера</label>
							<input class="form-control" placeholder="23141" type="text" name="port">
						</div>
						<div class="form-group">
							<label class="control-label">Пароль сервера</label>
							<input class="form-control" placeholder="12345612fd" type="text" name="pass">
						</div>
						<div class="form-group">
							<label class="control-label">Выдавать на товары с сервера</label>
							<select class="form-control" name="sorting">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sorting']->value, 'sort');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sort']->value) {
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['sort']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['sort']->value['name'];?>
</option>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							</select>
						</div>
						<button type="submit" class="btn btn-success btn-block" name="add_server"><i class="fa fa-plus" aria-hidden="true"></i> Добавить сервер</button>
					</form>
				</div>
			</div>
			<?php } elseif ($_smarty_tpl->tpl_vars['type']->value == "new/sort") {?>
			<div class="card">
				<div class="card-header" data-background-color="purple">
					<h4 class="title">Добавление сервера</h4>
					<p class="category">Добавление нового сервера сортировки</p>
				</div>
				<div class="card-content table-responsive">
					<form method="post">
						<div class="form-group">
							<label class="control-label">Название сервера</label>
							<input class="form-control" placeholder="Test" type="text" name="name">
						</div>
						<div class="form-group">
							<label class="control-label">Сервер в perms</label>
							<input class="form-control" placeholder="rp" type="text" name="perms">
						</div>
						<button type="submit" class="btn btn-success btn-block" name="add_sort"><i class="fa fa-plus" aria-hidden="true"></i> Добавить сервер</button>
					</form>
				</div>
			</div>
			<?php } elseif ($_smarty_tpl->tpl_vars['type']->value == "edit/give") {?>
			<div class="card">
				<div class="card-header" data-background-color="purple">
					<h4 class="title">Сервер: <?php echo $_smarty_tpl->tpl_vars['server']->value['name'];?>
</h4>
					<p class="category">Редактирование сервера</p>
				</div>
				<div class="card-content table-responsive">
					<form method="post">
						<div class="alert alert-dismissible alert-warning">
							<center> Редактирование РКОН данных сервера для выдачи</center>
						</div>
						<input class="form-control" type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['server']->value['id'];?>
">
						<div class="form-group">
							<label class="control-label">Название сервера</label>
							<input class="form-control" placeholder="Test" type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['server']->value['name'];?>
">
						</div>
						<div class="form-group">
							<label class="control-label">Адрес сервера</label>
							<input class="form-control" placeholder="127.0.0.1" type="text" name="ip" value="<?php echo $_smarty_tpl->tpl_vars['server']->value['ip'];?>
">
						</div>
						<div class="form-group">
							<label class="control-label">Порт сервера</label>
							<input class="form-control" placeholder="23141" type="text" name="port" value="<?php echo $_smarty_tpl->tpl_vars['server']->value['port'];?>
">
						</div>
						<div class="form-group">
							<label class="control-label">Пароль сервера</label>
							<input class="form-control" placeholder="12345612fd" type="text" name="pass" value="<?php echo $_smarty_tpl->tpl_vars['server']->value['pass'];?>
">
						</div>
						<div class="form-group">
							<label class="control-label">Выдавать на товары с сервера</label>
							<select class="form-control" name="sorting">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sorting']->value, 'sort');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sort']->value) {
?>
								<option <?php if ($_smarty_tpl->tpl_vars['server']->value['server'] == $_smarty_tpl->tpl_vars['sort']->value['id']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['sort']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['sort']->value['name'];?>
</option>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							</select>
						</div>
						<button type="submit" class="btn btn-success btn-block" name="edit_server"><i class="fa fa-edit" aria-hidden="true"></i> Редактировать сервер</button>
					</form>
				</div>
			</div>
			<?php } elseif ($_smarty_tpl->tpl_vars['type']->value == "edit/sort") {?>
			<div class="card">
				<div class="card-header" data-background-color="purple">
					<h4 class="title">Сортировка: <?php echo $_smarty_tpl->tpl_vars['sort']->value['name'];?>
</h4>
					<p class="category">Редактирование сервера сортировки</p>
				</div>
				<div class="card-content table-responsive">
					<form method="post">
						<input class="form-control" type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['sort']->value['id'];?>
">
						<div class="form-group">
							<label class="control-label">Название сервера</label>
							<input class="form-control" placeholder="Test" type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['sort']->value['name'];?>
">
						</div>
						<div class="form-group">
							<label class="control-label">Сервер в perms</label>
							<input class="form-control" placeholder="rp" type="text" name="perms" value="<?php echo $_smarty_tpl->tpl_vars['sort']->value['perms'];?>
">
						</div>
						<button type="submit" class="btn btn-success btn-block" name="edit_sort"><i class="fa fa-edit" aria-hidden="true"></i> Редактировать сервер</button>
					</form>
				</div>
			</div>
			<?php } else { ?>
			<div class="card">
				<div class="card-header" data-background-color="purple">
					<h4 class="title">1) Сервера сортировки <a href="/admin/?page=servers&type=new/sort" rel="tooltip" class="btn btn-success btn-round" data-original-title="" title="" style="padding: 4px;"><i class="material-icons">add</i> Добавить</a></h4>
					<p class="category">Отображены все сервера сортировки</p>
				</div>
				<div class="card-content table-responsive">
					<table class="table">
						<thead class="text-primary">
						<tr>
							<th>#</th>
							<th>Название</th>
							<th>Значение в perms</th>
							<th class="text-right">Действие</th>
						</tr>
						</thead>
						<tbody>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sorting']->value, 'sort');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sort']->value) {
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['sort']->value['id'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['sort']->value['name'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['sort']->value['perms'];?>
</td>
							<td class="text-right" style="padding: 0;">
								<a href="/admin/?page=servers&type=edit/sort&id=<?php echo $_smarty_tpl->tpl_vars['sort']->value['id'];?>
" rel="tooltip" class="btn btn-success btn-round" data-original-title="" title="" style="padding: 4px;">
									<i class="material-icons">edit</i>
								</a>
								<a href="/admin/?page=servers&type=remove/sort&id=<?php echo $_smarty_tpl->tpl_vars['sort']->value['id'];?>
" rel="tooltip" class="btn btn-danger btn-round" data-original-title="" title="" style="padding: 4px;">
									<i class="material-icons">close</i>
									<div class="ripple-container"></div>
								</a>
							</td>
						</tr>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</tbody>
					</table>
				</div>
			</div>
			<div class="card">
				<div class="card-header" data-background-color="purple">
					<h4 class="title">2) Сервера выдачи <a href="/admin/?page=servers&type=new/give" rel="tooltip" class="btn btn-success btn-round" data-original-title="" title="" style="padding: 4px;"><i class="material-icons">add</i> Добавить</a></h4>
					<p class="category">Отображены все сервера выдачи доната</p>
				</div>
				<div class="card-content table-responsive">
					<table class="table">
						<thead class="text-primary">
						<tr>
							<th>Название</th>
							<th>Сервер сортировки</th>
							<th>IP</th>
							<th class="text-right">Действие</th>
						</tr>
						</thead>
						<tbody>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['servers']->value, 'server');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['server']->value) {
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['server']->value['name'];?>
</td>
							<td>#<?php echo $_smarty_tpl->tpl_vars['server']->value['server'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['server']->value['ip'];?>
:<?php echo $_smarty_tpl->tpl_vars['server']->value['port'];?>
</td>
							<td class="text-right" style="padding: 0;">
								<a href="/admin/?page=servers&type=edit/give&id=<?php echo $_smarty_tpl->tpl_vars['server']->value['id'];?>
" rel="tooltip" class="btn btn-success btn-round" data-original-title="" title="" style="padding: 4px;">
									<i class="material-icons">edit</i>
								</a>
								<a href="/admin/?page=servers&type=remove/give&id=<?php echo $_smarty_tpl->tpl_vars['server']->value['id'];?>
" rel="tooltip" class="btn btn-danger btn-round" data-original-title="" title="" style="padding: 4px;">
									<i class="material-icons">close</i>
									<div class="ripple-container"></div>
								</a>
							</td>
						</tr>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</tbody>
					</table>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
</div><?php }
}
