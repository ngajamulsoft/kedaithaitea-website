<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadmin' => [
            'stock' => 'c,r,u,d',
            'product' => 'c,r,u,d',
            'selling' => 'c,r,u,d',
            'cms' => 'c,r,u,d',
            'user' => 'c,r,u,d',
            'hr' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'admin' => [
            'stock' => 'c,r,u',
            'product' => 'c,r,u',
            'selling' => 'c,r,u',
            'cms' => 'c,r,u,d',
            'hr' => 'c,r',
            'profile' => 'r,u'
        ],
        'karyawan' => [
            'stock' => 'r',
            'product' => 'r',
            'selling' => 'c,r,u',
            'hr' => 'c,r',
            'profile' => 'r,u'
        ],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
