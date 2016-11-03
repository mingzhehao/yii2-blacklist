<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            // common configuration for masters
            'masterConfig' => [
                'username' => 'root',
                'password' => 'c0615a573d',
                'attributes' => [
                    PDO::ATTR_TIMEOUT => 10,
                ],
            ],

            // list of master configurations
            'masters' => [
                ['dsn' => 'mysql:host=127.0.0.1;dbname=yk_blacklist'],
            ],

            // common configuration for slaves
            'slaveConfig' => [
                'username' => 'root',
                'password' => 'c0615a573d',
                'attributes' => [
                    PDO::ATTR_TIMEOUT => 10,
                ],
            ],

            // list of slave configurations
            'slaves' => [
                ['dsn' => 'mysql:host=127.0.0.1;dbname=yk_blacklist'],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
