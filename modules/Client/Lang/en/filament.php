<?php

declare(strict_types=1);

return [

    'manager' => [

        'client' => [

            'model'  => 'Client',
            'plural' => 'Clients',

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
                'status' => [
                    'label' => 'Status',
                ],
            ],

            'table' => [
                'th' => [
                    'id'     => 'ID',
                    'title'  => 'Title',
                    'status' => 'Status',
                ]
            ],
        ],


    ]
];
