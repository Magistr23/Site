<?php

$config = array (
        'db' => array ( //Данные от базы сайта
                'host'     => 'localhost',
                'user'     => 'user',
                'pass'     => 'pass',
                'base'     => 'base',
        ),
        'perms' => array (      //Данные от базы luck perms
                'host'     => '',
                'user'     => '',
                'pass'     => '',
                'base'     => '',
        ),

        'template' => 'custom',

        'blocked_groups' => array("build","owner"), //Группы, при наличии которых донат будет нельзя приобрести

        'payments_methods' => [
            'yoomoneycard' => [   
                'enabled' => true,
                'name' => 'Банковские Карты, ЮMoney',
                'method' => 'yoomoney_card',
                'params' => [
               ],
            ],
            'anypay' => [
                'enabled' => true,
                'name' => 'Мегафон, ApplePay, GooglePay',
                'method' => 'anypay',
                'params' => [  
                    'method' => '', // Метод оплаты, список методов и их коды https://anypay.io/doc/sci/method-list
                ]
            ],


            'samsungpay' => [
                'enabled' => false,
                'name' => 'Samsung Pay',
                'method' => 'unitpay',
                'params' => [
                    // Список доступных способов оплаты и их коды https://help.unitpay.money/book-of-reference/payment-system-codes
                    'code' => 'samsungpay',
                ],
            ],
            'anyumoney' => [
                'enabled' => false,
                'name' => 'ЮMoney',
                'method' => 'anypay',
                'params' => [
                    // Список доступных способов оплаты и их коды https://help.unitpay.money/book-of-reference/payment-system-codes
                    'method' => 'ym',
                    // Список операторов и их коды https://help.unitpay.money/book-of-reference/operator-codes
                    'operator' => 'mf',
                ]
            ],
           'qiwicard' => [
                'enabled' => false,
                'name' => 'Банковские карты',
                'method' => 'qiwi',
                'params' => [
                    // Фильтр способов оплаты. Доступно только для qiwi. card - карта, qw - счет qiwi
                    'paySourcesFilter' => 'card',
                ],
            ],
           'anycard' => [
                'enabled' => false,
                'name' => 'Банковские карты (способ #2)',
                'method' => 'anypay',
                'params' => [
                    // Фильтр способов оплаты. Доступно только для qiwi. card - карта, qw - счет qiwi
                    'method' => 'card',
                ],
            ],
            'anyqiwi' => [
                'enabled' => false,
                'name' => 'QIWI',
                'method' => 'anypay',
                'params' => [
                    'method' => 'qiwi', // Метод оплаты, список методов и их коды https://anypay.io/doc/sci/method-list
                ]
            ],

            'qiwi' => [
                'enabled' => true,
                'name' => 'Киви',
                'method' => 'qiwi',
                'params' => [
                    // Фильтр способов оплаты. Доступно только для qiwi. card - карта, qw - счет qiwi
                    'paySourcesFilter' => 'qw',
                ]
            ],

            'yoomoney' => [
                'enabled' => false,
                'name' => 'ЮMoney',
                'method' => 'yoomoney',
                'params' => [
               ],
            ],

            'yoomoney_mobile' => [
                'enabled' => false,
                'name' => 'Билайн, МТС',
                'method' => 'yoomoney_mobile',
                'params' => [
               ],
            ],
            'unitpay' => [
                'enabled' => false,
                'name' => 'PayPal',
                'method' => 'unitpay',
                'params' => [
                   'code' => 'paypal',
               ],
            ],

            'megafon' => [
                'enabled' => false,
                'name' => 'МегаФон',
                'method' => 'anypay',
                'params' => [
                    // Список доступных способов оплаты и их коды https://help.unitpay.money/book-of-reference/payment-system-codes
                    'method' => 'megafon',
                    // Список операторов и их коды https://help.unitpay.money/book-of-reference/operator-codes
                    'operator' => 'mf',
                ]
            ],
        ],

        'payment_gateways' => [
            'unitpay' => [
                'project_id' => '', // ID(Номер) проекта || demo - в случае тестого платежа
                'key' => '', // Секретный ключ
            ],
            'qiwi' => [
                'public_key' => '',
                'secret_key' => '',
                'theme_code' => '',
            ],
            'anypay' => [
                'merchant_id' => '', // Идентификатор проекта
                'secret_key' => '',
                //'hash_method' => 'sha256', // Алгоритм контрольной подписи. Доступны md5 и sha256
            ],
            'yoomoney' => [
                'wallet' => '' // Кошелёк yoomoney
            ]
        ],

        'admin' => array (
                'access' => array("491554160"), //ID вк с доступом к панели
                'domain' => "https://mdays.su", //Полный домен без / на конце
        ),

        'server' => array (
                'ip' => 'mc.mdays.su', //IP сервера
                'name' => 'MagicDays', //Название сервера
                'monic' => 'mc.mdays.su', //ip for monic
                'monicPort' => 25565
        ),

        'vk' => array (
                'token' => '5ce85227d54f07db44d9b6cbe0da12294d5013c67f5fed709983dda84ab0b63c74280b259ecea5c877191', //токен
                'users' => array ("491554160", "307375489"), //кому приходят уведомления об оплате
                'v' => '5.92',
        ),

        'console' => array ( //CONSOLE SETTINGS
                'auth_url' => 'mdays.su/console', //AUTH URL (DEFAULT: URL_SITE)
                'vk_id' => '7146658', //VK APP ID
                'vk_secret' => 'yXct0NWJggXek7UNWeWG', //VK APP SECRET
                'name' => 'MagicDays', //CONSOLE TITLE
                'title_small' => '<b>M</b>D', //CONSOLE SMALL TITLE
                'title_size' => '<b>Magic</b>Days', //CONSOLE SIZE TITLE
                'title_site' => 'MagicDays', //CONSOLE TITLE ALL PAGES
                'title_auth' => '<b>Magic</b>Days', //CONSOLE TITLE AUTH PAGE

                'server' => array ( //CONSOLE RCON SERVER SETTINGS
                        'ip' => '213.32.6.174', //IP
                        'port' => '25548', //RCON PORT
                        'password' => '5#DP!HfExBR@Bg0x%#AP' //RCON PASS
                ),
        ),

        'commentsBlock' => array(
                1 => array(
                        'name' => 'Андрей Бадреев', //Имя
                        'buy' => 'Министр', //Что покупал
                        'image' => 'https://pp.userapi.com/c855036/v855036269/42a70/KkcZ46NoCVs.jpg', //Картинка
                        'comment' => 'Все в порядке! Покупаю не первый раз и все работает! Если доплаты нет, обратитесь в группу вам помогут (не удевляйтесь что вам говорят купить превелегию на другой ник... Все норм)', //Отзыв (можно html)
                ),
                2 => array(
                        'name' => 'Денис Вернер', //Имя
                        'buy' => 'Президент', //Что покупал
                        'image' => 'https://pp.userapi.com/c855136/v855136350/e624/PEMv4CF9JdQ.jpg', //Картинка
                        'comment' => 'Всё в полном порядке. Покупал донаты/кейсы всё пришло! Если нету доплаты, обращайтесь в группу. Вам там ответят!)', //Отзыв (можно html)
                ),
                3 => array(
                        'name' => 'Игорь Кот', //Имя
                        'buy' => 'Хелпер', //Что покупал
                        'image' => 'https://pp.userapi.com/c848524/v848524319/93e3a/hCOdBJQtLlQ.jpg?ava=1', //Картинка
                        'comment' => 'Все круто, купил хелпера, скидка хорошая была. Донат приходит моментально. Покупал префикс все сделали, очень доволен. Друзьям покупал донаты все быстро приходило, они были довольны. Топ сервер без обмана.', //Отзыв (можно html)
                ),
        ),
);
