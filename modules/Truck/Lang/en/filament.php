<?php

declare(strict_types=1);

return [

    'agent' => [

        'truck' => [

            'model'  => 'Truck',
            'plural' => 'Trucks',

            'inputs' => [
                'name' => [
                    'label' => 'Name'
                ],
                'driver_id' => [
                    'label' => 'Driver'
                ],
                'brand' => [
                    'label' => 'Brand'
                ],
                'model' => [
                    'label' => 'Model'
                ],
                'plate_number' => [
                    'label' => 'Plate Number'
                ],
                'color' => [
                    'label' => 'Color'
                ],
                'status' => [
                    'label' => 'Status'
                ],
            ],

            'table' => [
                'th' => [
                    'name'         => 'Name',
                    'driver'       => 'Driver',
                    'brand'        => 'Brand',
                    'model'        => 'Model',
                    'plate_number' => 'Plate Number',
                    'color'        => 'Color',
                    'status'       => 'Status',
                ]
            ],
        ],


    ]
];
