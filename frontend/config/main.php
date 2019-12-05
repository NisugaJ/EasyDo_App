<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'name' => 'EasyDo',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'rmqRnZFncKKsi26Mzi3ei1ycxYXsZEvt',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],

        //swiftMailer Conf
        'mailer' => [
            // 'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            // 'useFileTransport' => false,
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',  
                'username' => 'nisujdev@gmail.com',
                'password' => '',
                'port' => '465',
                'encryption' => 'ssl',
                'streamOptions' => [ 
                    'ssl' => [ 
                    'allow_self_signed' => true,
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    ],
                ]
            ]
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                
                //Rule 1
                /**
                 * This make the URL more prettier for API.
                 * For all the api features of Notes    
                 *  
                 *  app/notes [GET]               =  app/notes [GET]    
                 *  app/note/create?id=5 [POST]   =  app/notes/5 [POST]  
                 *  app/note/update?id=5 [PUT]    =  app/notes/5 [PUT]   
                 *  app/note/view?id=5 [GET]      =  app/notes/5 [GET]   
                 *  app/note/delete?id=5 [DELETE] =  app/notes/5 [DELETE]
                 */
                [
                    'class' => 'yii\rest\UrlRule', 'controller' => ['note', 'category'] 
                ],

                //Rule 2
                /**
                 * Easy URL Rule to get notes of a particular category
                 */
                [
                    'pattern' => 'categories/<categoryId:\d+>/notes',
                    'route' => 'note/index',
                    // 'defaults' => ['categoryId' => 2],
                    // 'mode' => \yii\web\UrlRule::PARSING_ONLY
                ],

            ],
        ],
    ],
    'params' => $params,

    
];
