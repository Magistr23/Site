<?php
/* Smarty version 3.1.30, created on 2021-04-04 12:53:51
  from "D:\_SOFT\laragon\www\mdays\admin\templates\pages\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60698cafc633d3_12601610',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8bcf4667321a834dee6d9e80f322b9a3ed37fc8f' => 
    array (
      0 => 'D:\\_SOFT\\laragon\\www\\mdays\\admin\\templates\\pages\\index.html',
      1 => 1617523004,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60698cafc633d3_12601610 (Smarty_Internal_Template $_smarty_tpl) {
?>

               <div class="container-fluid">
                  <div class="row">
                     <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                           <div class="card-header" data-background-color="orange">
                              <i class="material-icons">content_copy</i>
                           </div>
                           <div class="card-content">
                              <p class="category">Счетов</p>
                              <h3 class="title"><?php echo $_smarty_tpl->tpl_vars['statistics']->value['orders'];?>
</h3>
                           </div>
                           <div class="card-footer">
                              <div class="stats">
                                 <i class="material-icons">date_range</i> За сегодня
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                           <div class="card-header" data-background-color="green">
                              <i class="material-icons">store</i>
                           </div>
                           <div class="card-content">
                              <p class="category">Доход</p>
                              <h3 class="title"><?php echo $_smarty_tpl->tpl_vars['statistics']->value['profit'];?>
<small>Р</small></h3>
                           </div>
                           <div class="card-footer">
                              <div class="stats">
                                 <i class="material-icons">date_range</i> За сегодня
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                           <div class="card-header" data-background-color="blue">
                              <i class="material-icons">info_outline</i>
                           </div>
                           <div class="card-content">
                              <p class="category">Купивших</p>
                              <h3 class="title"><?php echo $_smarty_tpl->tpl_vars['statistics']->value['buyers'];?>
</h3>
                           </div>
                           <div class="card-footer">
                              <div class="stats">
                                 <i class="material-icons">date_range</i> За сегодня
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                           <div class="card-header" data-background-color="orange">
                              <i class="fa fa-users"></i>
                           </div>
                           <div class="card-content">
                              <p class="category">В ожидании</p>
                              <h3 class="title"><?php echo $_smarty_tpl->tpl_vars['statistics']->value['wait'];?>
</h3>
                           </div>
                           <div class="card-footer">
                              <div class="stats">
                                 <i class="material-icons">date_range</i> За сегодня
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-header" data-background-color="purple">
                              <h4 class="title">Донатеры</h4>
                              <p class="category">Отображен весь список людей, купивших донат</p>
                           </div>
                           <div class="card-content">
                              <div class="material-datatables">
                                 <table id="donaters" class="table table-striped table-no-bordered table-hover">
                                    <thead>
                                       <tr>
                                          <th style="width: 10px">#</th>
                                          <th>Ник</th>
                                          <th>Группа</th>
                                          <th style="width: 40px">Доход</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['donaters']->value, 'donater');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['donater']->value) {
?>
										 <tr>
											<td><?php echo $_smarty_tpl->tpl_vars['donater']->value['id'];?>
</td>
											<td><?php echo $_smarty_tpl->tpl_vars['donater']->value['nick'];?>
 <small>[<?php echo $_smarty_tpl->tpl_vars['donater']->value['date'];?>
 <?php echo $_smarty_tpl->tpl_vars['donater']->value['time'];?>
]</small></td>
											<td><?php echo $_smarty_tpl->tpl_vars['donater']->value['group'];?>
</td>
											<td><span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['donater']->value['profit'];?>
 рублей</span></td>
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
                  </div>
               </div><?php }
}
