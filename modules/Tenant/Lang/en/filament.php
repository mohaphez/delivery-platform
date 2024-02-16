<?php

declare(strict_types=1);

return [

    'manager' => [

        'tenant' => [

            'model'  => 'Tenant',
            'plural' => 'Tenants',

            'inputs' => [
                'id' => [
                    'label' => 'ID',
                ],
                'title' => [
                    'label' => 'Title',
                ],
                'description' => [
                    'label' => 'Description',
                ],
                'domain' => [
                    'label' => 'Domain',
                ],
                'status' => [
                    'label' => 'Status',
                ],
            ],

            'table' => [
                'th' => [
                    'id'     => 'ID',
                    'title'  => 'Title',
                    'domain' => 'Domain',
                    'status' => 'Status',
                ]
            ],
        ],


    ]
];
