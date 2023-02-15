<?php
/* Smarty version 3.1.30, created on 2019-06-15 14:05:32
  from "/var/www/html/admin/templates/pages/promo.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d04d0fcdcdba5_15347041',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99c96539cf0b80187e3a8045dcedcd3a9306278a' => 
    array (
      0 => '/var/www/html/admin/templates/pages/promo.html',
      1 => 1549446638,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d04d0fcdcdba5_15347041 (Smarty_Internal_Template $_smarty_tpl) {
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
               <h4 class="title">Добавление купона</h4>
               <p class="category">Добавление нового купона</p>
            </div>
            <div class="card-content table-responsive">
				<form method="post">
					<div class="form-group">
						<label class="control-label">Купон</label>
						<input class="form-control" placeholder="sale" type="text" name="name">
					</div>
					<div class="form-group">
						<label class="control-label">Скидка в %</label>
						<input class="form-control" placeholder="10" type="number" name="disc">
					</div>
					<button type="submit" class="btn btn-success btn-block" name="add_coupon"><i class="fa fa-plus" aria-hidden="true"></i> Добавить купон</button>
				</form>
            </div>
         </div>
		<?php } elseif ($_smarty_tpl->tpl_vars['type']->value == "edit") {?>
         <div class="card">
            <div class="card-header" data-background-color="purple">
               <h4 class="title">Купон: <?php echo $_smarty_tpl->tpl_vars['server']->value['name'];?>
</h4>
               <p class="category">Редактирование купона</p>
            </div>
            <div class="card-content table-responsive">
				<form method="post">
					<input class="form-control" type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['promo']->value['id'];?>
">
					<div class="form-group">
						<label class="control-label">Купон</label>
						<input class="form-control" placeholder="sale" type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['promo']->value['name'];?>
">
					</div>
					<div class="form-group">
						<label class="control-label">Скидка в %</label>
						<input class="form-control" placeholder="10" type="number" name="disc" value="<?php echo $_smarty_tpl->tpl_vars['promo']->value['disc'];?>
">
					</div>
					<button type="submit" class="btn btn-success btn-block" name="edit_coupon"><i class="fa fa-edit" aria-hidden="true"></i> Редактировать купон</button>
				</form>
            </div>
         </div>
		<?php } else { ?>
         <div class="card">
            <div class="card-header" data-background-color="purple">
               <h4 class="title">Купоны <a href="/admin/?page=promo&type=new" rel="tooltip" class="btn btn-success btn-round" data-original-title="" title="" style="padding: 4px;"><i class="material-icons">add</i> Добавить</a></h4>
               <p class="category">Отображены все купоны</p>
            </div>
            <div class="card-content table-responsive">
               <table class="table">
                  <thead class="text-primary">
                     <tr>
                        <th>Купон</th>
                        <th>Скидка</th>
                        <th class="text-right">Действие</th>
                     </tr>
                  </thead>
                  <tbody>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['promos']->value, 'promo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['promo']->value) {
?>
                     <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['promo']->value['name'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['promo']->value['disc'];?>
%</td>
                        <td class="text-right" style="padding: 0;">
                           <a href="/admin/?page=promo&type=edit&id=<?php echo $_smarty_tpl->tpl_vars['promo']->value['id'];?>
" rel="tooltip" class="btn btn-success btn-round" data-original-title="" title="" style="padding: 4px;">
                           <i class="material-icons">edit</i>
                           </a>
                           <a href="/admin/?page=promo&type=remove&id=<?php echo $_smarty_tpl->tpl_vars['promo']->value['id'];?>
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
