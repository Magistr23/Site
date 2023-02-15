<?php
/* Smarty version 3.1.30, created on 2020-03-16 12:32:40
  from "/var/www/dcp/admin/templates/pages/groups.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e6f47b87519e5_50366928',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7ee7302b6b4f71841a82122c3118b9ff583eaf2' => 
    array (
      0 => '/var/www/dcp/admin/templates/pages/groups.html',
      1 => 1583045438,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e6f47b87519e5_50366928 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once '/var/www/dcp/libs/smarty/plugins/modifier.truncate.php';
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
			<?php if ($_smarty_tpl->tpl_vars['type']->value == "new") {?>
			<div class="card">
				<div class="card-header" data-background-color="purple">
					<h4 class="title">Добавление товара</h4>
					<p class="category">Добавление нового товара к продаже</p>
				</div>
				<div class="card-content table-responsive">
					<form method="post">
						<div class="form-group">
							<label class="control-label">Название группы</label>
							<input class="form-control" placeholder="Вип" type="text" name="name">
						</div>
						<div class="form-group">
							<label class="control-label">Цена</label>
							<input class="form-control" placeholder="100" type="text" name="price">
						</div>
						<div class="form-group">
							<label class="control-label">Доплата</label>
							<select name="surcharge" class="form-control">
								<option value="1">С доплатой</option>
								<option value="0">Без доплаты</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Команды, можно несколько через ; и без пробелов
								<br> [nick] - ник донатера</label>
							<input class="form-control" placeholder="pex user [nick] group set phpmc" type="text" name="cmd">
						</div>
						<div class="form-group">
							<label class="control-label">Категория</label>
							<input class="form-control" placeholder="Привилегии" type="text" name="category">
						</div>
						<div class="form-group">
							<label class="control-label">Группа PEX</label>
							<input class="form-control" placeholder="vip" type="text" name="pex">
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
						<div class="form-group">
							<label class="control-label">Изображение</label>
							<input class="form-control" placeholder="Введите URL" type="text" name="image">
						</div>
						<div class="form-group">
							<label class="control-label">Описание</label>
							<textarea class="form-control" name="text" placeholder="Введите описание"></textarea>
						</div>
						<button type="submit" class="btn btn-success btn-block" name="add_group"><i class="fa fa-plus" aria-hidden="true"></i> ДОБАВИТЬ ТОВАР</button>
					</form>
				</div>
			</div>
			<?php } elseif ($_smarty_tpl->tpl_vars['type']->value == "edit") {?>
			<div class="card">
				<div class="card-header" data-background-color="purple">
					<h4 class="title">Товар: <?php echo $_smarty_tpl->tpl_vars['group']->value['name'];?>
</h4>
					<p class="category">Редактирование товара</p>
				</div>
				<div class="card-content table-responsive">
					<form method="post">
						<input class="form-control" type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
">
						<div class="form-group">
							<label class="control-label">Название группы</label>
							<input class="form-control" placeholder="Вип" type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['group']->value['name'];?>
">
						</div>
						<div class="form-group">
							<label class="control-label">Цена</label>
							<input class="form-control" placeholder="100" type="text" name="price" value="<?php echo $_smarty_tpl->tpl_vars['group']->value['price'];?>
">
						</div>
						<div class="form-group">
							<label class="control-label">Доплата</label>
							<select name="surcharge" class="form-control">
								<option <?php if ($_smarty_tpl->tpl_vars['group']->value['surcharge'] == 1) {?>selected<?php }?> value="1">С доплатой</option>
								<option <?php if ($_smarty_tpl->tpl_vars['group']->value['surcharge'] == 0) {?>selected<?php }?> value="0">Без доплаты</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Команды, можно несколько через ; и без пробелов
								<br> [nick] - ник донатера</label>
							<input class="form-control" placeholder="pex user [nick] group set phpmc" type="text" name="cmd" value="<?php echo $_smarty_tpl->tpl_vars['group']->value['cmd'];?>
">
						</div>
						<div class="form-group">
							<label class="control-label">Категория</label>
							<input class="form-control" placeholder="Привилегии" type="text" name="category" value="<?php echo $_smarty_tpl->tpl_vars['group']->value['category'];?>
">
						</div>
						<div class="form-group">
							<label class="control-label">Группа PEX</label>
							<input class="form-control" placeholder="vip" type="text" name="pex" value="<?php echo $_smarty_tpl->tpl_vars['group']->value['pex'];?>
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
								<option <?php if ($_smarty_tpl->tpl_vars['group']->value['server'] == $_smarty_tpl->tpl_vars['sort']->value['id']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['sort']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['sort']->value['name'];?>
</option>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Изображение</label>
							<input class="form-control" placeholder="Введите URL" type="text" value="<?php echo $_smarty_tpl->tpl_vars['group']->value['image'];?>
" name="image">
						</div>
						<div class="form-group">
							<label class="control-label">Описание</label>
							<textarea name="text" class="form-control" placeholder="Введите описание"><?php echo $_smarty_tpl->tpl_vars['group']->value['text'];?>
</textarea>
						</div>
						<button type="submit" class="btn btn-success btn-block" name="edit_group"><i class="fa fa-edit" aria-hidden="true"></i> РЕДАКТИРОВАТЬ ТОВАР</button>
					</form>
				</div>
			</div>
			<?php } else { ?>
			<div class="card">
				<div class="card-header" data-background-color="purple">
					<h4 class="title">Товары в продаже <a href="/admin/?page=groups&type=new" rel="tooltip" class="btn btn-success btn-round" data-original-title="" title="" style="padding: 4px;"><i class="material-icons">add</i> Добавить</a></h4>
					<p class="category">Отображены все товары в продаже</p>
				</div>
				<div class="card-content">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, 'list', false, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value => $_smarty_tpl->tpl_vars['list']->value) {
?>
					<div class="card">
						<div class="card-header" data-background-color="<?php if ($_smarty_tpl->tpl_vars['category']->value == "-1") {?>orange<?php } else { ?>green<?php }?>">
						<h4 class="title"><?php if ($_smarty_tpl->tpl_vars['category']->value == "-1") {?>Сервер не обнаружен<?php } else { ?>Товары с сервера: <b><?php echo $_smarty_tpl->tpl_vars['category']->value;?>
</b><?php }?></h4>
					</div>
					<div class="card-content table-responsive">
						<table class="table">
							<thead class="text-primary">
							<tr>
								<th>Название</th>
								<th>Цена</th>
								<th>Доплата</th>
								<th>Категория</th>
								<th>Команды выдачи</th>
								<th>PeX</th>
								<th class="text-right">Действие</th>
							</tr>
							</thead>
							<tbody>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'group');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['group']->value['name'];?>
</td>
								<td><span class="label label-info"><?php echo $_smarty_tpl->tpl_vars['group']->value['price'];?>
Р</span></td>
								<td><span class="label label-warning"><?php if ($_smarty_tpl->tpl_vars['group']->value['surcharge'] == 1) {?>С доплатой<?php } else { ?>Без доплаты<?php }?></span></td>
								<td><span class="label label-primary"><?php echo $_smarty_tpl->tpl_vars['group']->value['category'];?>
</span></td>
								<td><span class="label label-success"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['group']->value['cmd'],35);?>
</span></td>
								<td><?php echo $_smarty_tpl->tpl_vars['group']->value['pex'];?>
</td>
								<td class="text-right" style="padding: 0;">
									<a href="/admin/?page=groups&type=edit&id=<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
" rel="tooltip" class="btn btn-success btn-round" data-original-title="" title="" style="padding: 4px;">
										<i class="material-icons">edit</i>
									</a>
									<a href="/admin/?page=groups&type=remove&id=<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
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
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</div>
		</div>
		<?php }?>
	</div>
</div>
</div><?php }
}
