<?php
/* Smarty version 3.1.30, created on 2021-07-23 20:39:23
  from "/var/www/mdays/console/templates/pages/console.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60fafecbd23586_77396603',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'afdb7a02447c12250e992f67027247d8026955e1' => 
    array (
      0 => '/var/www/mdays/console/templates/pages/console.html',
      1 => 1625672802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60fafecbd23586_77396603 (Smarty_Internal_Template $_smarty_tpl) {
?>

    <section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box">
            <div class="box-header">
               <h3 class="box-title">Консоль</h3>
            </div>
            <div class="box-body">
				<form method="POST" action="/console/ajax.php?type=send" id="phpmc-console">
					<div class="input-group">
						<input type="text" class="form-control" id="cmd" name="cmd" placeholder="Введите команду">
						<div class="input-group-btn">
							<button type="submit" class="btn btn-primary" id="cmd_send" tabindex="-1"><i class="fa fa-arrow-right" aria-hidden="true"></i> Отправить</button>
						</div>
					</div>
				</form>
				<div id="console-msg" class="bg-black-gradient"></div>
				<hr>
               <ul class="list-group" id="console">
					<li class="list-group-item list-group-item-danger">Загружаем историю...</li>
					<li class="list-group-item list-group-item-success">Готово к использованию.</li>
					<li class="list-group-item list-group-item-success">Подключились к серверу.</li>
					<li class="list-group-item list-group-item-warning">Консоль запущена.</li>
			   </ul>
            </div>
            <!-- /.box-body -->
         </div>
         <!-- /.box -->
      </div>
      <div class="col-md-4">
         <div class="box">
            <div class="box-header">
               <h3 class="box-title">Доступные команды</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
               <table class="table table-striped table-hover ">
				  <tbody>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['commands']->value, 'cmd');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cmd']->value) {
?>
						<tr class="info">
						  <td>/<?php echo $_smarty_tpl->tpl_vars['cmd']->value['query'];?>
</td>
						  <td><?php echo $_smarty_tpl->tpl_vars['cmd']->value['use'];?>
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
      </div>
   </div>
</section><?php }
}
