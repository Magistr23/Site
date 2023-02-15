<?php
/* Smarty version 3.1.30, created on 2021-04-05 15:02:26
  from "C:\laragon\www\mdays\templates\custom\pages\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_606afc52346fa2_63476180',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '61d1dc6044f36a7f240f6040844300dca2fabda5' => 
    array (
      0 => 'C:\\laragon\\www\\mdays\\templates\\custom\\pages\\index.html',
      1 => 1617623783,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_606afc52346fa2_63476180 (Smarty_Internal_Template $_smarty_tpl) {
?>
<main>
    <!-- SLIDER START -->
    <section class="slider" id="banner">
        <div class="container">
            <div class="slider_cover">
                <div class="slider">
                  <div class="banner blue active">
                        <div class="content">
                            <h2>Весенняя скидка</h2>
                            <h3>Префикс всего за 99 ₽ <span class="vanish">149 ₽</span></h3>
                            <div class="buy">
                                <button class="modal-open" data-by="slider" data-id="825">Купить</button>
                                <span>Акция продлится пару дней</span>
                            </div>
                            <div class="discount">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
img/start_discount.svg" alt="">
                                <span>Выгода!</span>
                            </div>
                        </div>
                    </div>
                    <div class="banner purple">
                        <div class="content">
                            <h2>Выгодное предложение!</h2>
                            <h3>Цены на донат снижены</h3>
                            <div class="buy">
                                <span>Акция продлится несколько дней</span>
                            </div>
                            <div class="discount">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
img/start_discount.svg" alt="">
                                <span>Stonks</span>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="forward"></button>
            </div>
        </div>
    </section>
    <!-- SLIDER END -->

    <section id="params">
        <div class="container">
            <div class="params_list">
                <div class="point server">
                    <h3>Выбор сервера</h3>
                    <div class="switch">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, 'list', false, 'id', 'servers', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_servers']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_servers']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_servers']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_servers']->value['index'];
?>
                            <button class="<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_servers']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_servers']->value['first'] : null)) {?>active<?php }?>"><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
</button>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </div>
                </div>
                <div class="point category buttons">
                    <h3>Категории товаров</h3>
                    <?php $_smarty_tpl->_assignInScope('i', 0);
?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, 'list', false, 'id', 'servers', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_servers']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_servers']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_servers']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_servers']->value['index'];
?>
                            <div class="switch <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_servers']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_servers']->value['first'] : null)) {?>show<?php }?>">
                                <div class="buttons">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value['groups'], 'list', false, 'category', 'categories', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['index'];
?>
                                    <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);
?>
                                        <button data-target-category="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" class="<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['first'] : null)) {?>active<?php }?>"><?php echo $_smarty_tpl->tpl_vars['category']->value;?>
</button>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </div>
                                <select>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value['groups'], 'list', false, 'category', 'categories', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['index'];
?>
                                        <option data-target-category="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['iteration'] : null)*(isset($_smarty_tpl->tpl_vars['__smarty_foreach_servers']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_servers']->value['iteration'] : null);?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value;?>
</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </select>
                            </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </div>
            </div>
        </div>
    </section>

    <section id="items">
        <div class="container">
            <?php $_smarty_tpl->_assignInScope('i', 0);
?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, 'list', false, 'id', 'servers', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_servers']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_servers']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_servers']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_servers']->value['index'];
?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value['groups'], 'list', false, 'category', 'categories', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['index'];
?>
                    <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);
?>
                    <div data-id-category="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" class="items_list">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'group');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
?>
                            <div class="item modal-open" data-id="<?php echo $_smarty_tpl->tpl_vars['group']->value->id;?>
">
                                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['group']->value->id;?>
">
                                <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['group']->value->name;?>
">
                                <input type="hidden" name="price" value="<?php echo $_smarty_tpl->tpl_vars['group']->value->price;?>
">
                                <input type="hidden" name="image" value="<?php echo $_smarty_tpl->tpl_vars['group']->value->image;?>
">
                                <textarea name="text" style="display:none;"><?php echo $_smarty_tpl->tpl_vars['group']->value->text;?>
</textarea>

                                <div class="img_block"><img src="<?php echo $_smarty_tpl->tpl_vars['group']->value->image;?>
" alt=""></div>

                                <div class="description">
                                    <h6 class="name"><?php echo $_smarty_tpl->tpl_vars['group']->value->name;?>
</h6>
                                    <div>
                                        <span class="cost"><?php echo $_smarty_tpl->tpl_vars['group']->value->price;?>
 ₽</span>
                                        <span class="duration">навсегда</span>
                                    </div>
                                </div>
                            </div>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </div>
    </section>

    <section id="live">
        <div class="container">
            <div class="live_block">
                <div class="title">
                    <h3>Сейчас покупают</h3>
                    <div class="live">
                        <div class="indicator"></div>
                        <span>LIVE</span>
                    </div>
                </div>
                <div class="buyer_list" id="donaters"></div>
            </div>
        </div>
    </section>

    <section class="slider" id="comments">
        <div class="container">
            <div class="comments_block">
                <div class="title">
                    <h3>Игроки о сервере</h3>
                    <a href="https://vk.com/topic-167500386_38250788?offset=0" rel="nofollow" target="_blank">Больше отзывов</a>
                </div>
                <div class="slider_block">
                    <div class="slider_cover">
                        <div class="slider">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cfg']->value['commentsBlock'], 'comment', false, 'key', 'comments', array (
  'first' => true,
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_comments']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_comments']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_comments']->value['index'];
?>
                                <div class="banner <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_comments']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_comments']->value['first'] : null)) {?>active<?php }?>">
                                    <div class="title">
                                        <div class="img" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['comment']->value['image'];?>
')"></div>
                                        <div class="info">
                                            <span class="name"><?php echo $_smarty_tpl->tpl_vars['comment']->value['name'];?>
</span>
                                            <span class="about">Покупал привилегию <span class="blue"><?php echo $_smarty_tpl->tpl_vars['comment']->value['buy'];?>
</span></span>
                                        </div>
                                    </div>
                                    <p class="comment"><?php echo $_smarty_tpl->tpl_vars['comment']->value['comment'];?>
</p>
                                </div>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </div>
                    </div>
                    <button class="forward"><span>Следующий отзыв</span></button>
                </div>
            </div>
        </div>
    </section>

    <section id="modal">
        <div class="block">
            <button class="close"><img src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
img/close_modal.svg" alt=""></button>
            <div class="top">
                <h3 id="modal-title"></h3>
                <form action="" id="modal-form">
                    <input type="hidden" name="group" id="modal-id" value="0">
                    <input type="text" name="nick" required placeholder="Никнейм на сервере" class="name">
                    <select type="text" name="payment_way" required class="way">
                        <option selected disabled>Способ оплаты</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cfg']->value['payments_methods'], 'method', false, 'code');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['code']->value => $_smarty_tpl->tpl_vars['method']->value) {
?>
                            <?php if ($_smarty_tpl->tpl_vars['method']->value['enabled']) {?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['code']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['method']->value['name'];?>
</option>
                            <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </select>
                    <input type="text" name="promo" placeholder="Промокод (если есть)" class="code">
                    <button type="submit" id="modal-price">Купить за 0 ₽</button>
                    <div id="modal-message"></div>
                </form>
            </div>
            <div class="bottom" id="modal-text"></div>
        </div>
    </section>
</main>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
js/index.js"><?php echo '</script'; ?>
>
<?php }
}
