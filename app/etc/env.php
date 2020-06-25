<?php
return [
    'backend' => [
        'frontName' => 'admin_1uevgv'
    ],
    'crypt' => [
        'key' => 'c65aadab38a1931f151bf245d04d05f1'
    ],
    'db' => [
        'table_prefix' => '',
        'connection' => [
            'default' => [
                'host' => 'localhost',
                'dbname' => 'emall_prod2',
                'username' => 'magento',
                'password' => 'M4gent0Us3r%6',
                'active' => '1'
            ]
        ]
    ],
    'resource' => [
        'default_setup' => [
            'connection' => 'default'
        ]
    ],
    'x-frame-options' => 'SAMEORIGIN',
    'MAGE_MODE' => 'default',
    'session' => [
        'save' => 'files'
    ],
    'cache_types' => [
        'config' => 1,
        'layout' => 1,
        'block_html' => 1,
        'collections' => 1,
        'reflection' => 1,
        'db_ddl' => 1,
        'eav' => 1,
        'customer_notification' => 1,
        'config_integration' => 1,
        'config_integration_api' => 1,
        'full_page' => 1,
        'config_webservice' => 1,
        'translate' => 1,
        'vertex' => 1,
        'compiled_config' => 1
    ],
    'install' => [
        'date' => 'Tue, 02 Jun 2020 23:33:51 +0000'
    ]
];
