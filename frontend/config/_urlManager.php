<?php
return [
    'class' => yii\web\UrlManager::class,
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => false,
    'baseUrl' => getenv('FRONTEND_HOST_URL'),
    'rules' => [
        ['pattern' => '/', 'route' => 'site/index'],
        ['pattern' => '/download', 'route' => 'download/index'],
        ['pattern' => '/<action>', 'route' => 'site/<action>'],
    ],
];
