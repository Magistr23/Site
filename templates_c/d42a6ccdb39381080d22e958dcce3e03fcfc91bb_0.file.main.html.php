<?php
/* Smarty version 3.1.30, created on 2021-06-13 13:16:36
  from "/var/www/mdays/templates/custom/main.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60c5db04181125_16639896',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd42a6ccdb39381080d22e958dcce3e03fcfc91bb' => 
    array (
      0 => '/var/www/mdays/templates/custom/main.html',
      1 => 1623579178,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pages/".((string)$_smarty_tpl->tpl_vars[\'page\']->value).".html' => 1,
  ),
),false)) {
function content_60c5db04181125_16639896 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<?php echo '<script'; ?>
 async src="https://www.googletagmanager.com/gtag/js?id=UA-170112238-1"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
  window.dataLayer = window.dataLayer || [];
  function gtag(){ dataLayer.push(arguments); }
  gtag('js', new Date());

  gtag('config', 'UA-170112238-1');
<?php echo '</script'; ?>
>
    <link rel="shortcut icon" href="/styles/img/favicon/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">

    <title>MagicDays - Покупка доната на сервере Майнкрафт | Пожертвования</title>

    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
css/style.css?v=2">

    <?php echo '<script'; ?>
>theme_url = '<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
';<?php echo '</script'; ?>
>
<?php echo '</script'; ?>
>
</head>
<body>
<header>
    <div class="container">
        <div class="head">
            <a href="/" class="logo"><img src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
img/logo.svg" alt="logo"></a>
            <nav class="pc">
                <ul>
                    <li><a href="/?page=rules">Правила</a></li>
                    <li><a href="//vk.com/mdays_off" target="_blank" rel="nofollow">Мы ВКонтакте</a></li>
                    <li><a href="/console/">Консоль</a></li>
                    <li><a href="//mdays.su/discord" rel="nofollow" target="_blank">Наш Discord</a></li>
                </ul>
            </nav>
            <div class="online">
                <span class="players"><span id="online">-</span> игроков онлайн</span>
                <button class="copy clipboard" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['server']['ip'];?>
">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
img/copy.svg" alt="">
                    <span style="text-transform: uppercase;"><?php echo $_smarty_tpl->tpl_vars['cfg']->value['server']['ip'];?>
</span>
                </button>
            </div>
            <button class="mobile open">
                <img src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
img/open-button_mobile.svg" alt="">
            </button>
        </div>
    </div>
</header>
<nav class="mobile">
    <button class="mobile close">
        <img src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
img/close-button_mobile.svg" alt="">
    </button>
    <ul>
        <li><a href="/?page=rules">Правила</a></li>
        <li><a href="//vk.com/mdays_off" target="_blank" rel="nofollow">Мы ВКонтакте</a></li>
        <li><a href="/console/">Консоль</a></li>
        <li><a href="//mdays.su/hosting" target="_blank">Наш хостинг</a></li>
        <li><a href="//mdays.su/discord" target="_blank">Discord канал</a></li>
    </ul>
    <button class="copy">
        <img src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
img/copy.svg" alt="">
        <span style="text-transform: uppercase;"><?php echo $_smarty_tpl->tpl_vars['cfg']->value['server']['ip'];?>
</span>
    </button>
    <span class="players"><span id="online-mobile">-</span> игроков онлайн</span>
</nav>


<!-- JQuery -->
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
js/script.js?7"><?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:pages/".((string)$_smarty_tpl->tpl_vars['page']->value).".html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>



<footer>
    <div class="container">
        <div class="info">
            <a href="/"><img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
img/logo.svg" alt="logo"></a>
            <ul>
                <li><a href="/?page=rules">Соглашение</a></li>
                <li><a href="/?page=police">Условия возврата</a></li>
                <li><a href="//mdays.su/hosting" target="_blank">Наш хостинг</a></li>
                <li><a href="//vk.me/mdays_off" target="_blank" rel="nofollow">Задать вопрос</a></li>
            </ul>
            <a href="//mdays.su" class="made" rel="nofollow" target="_self">Сделано с <span class="blue">Любовью <3</span></a>
        </div>
        <div class="description">
            <p class="rights">2016-2021 © MagicDays | MDays.su не связан с MojangAB. Все средства идут на развитие проекта.</p>
            <a href="//mdays.su" class="made" rel="nofollow" target="_self">Сделано с <span class="blue">Любовью <3</span></a>
        </div>
    </div>
</footer>


</body>
</html>
<?php }
}
