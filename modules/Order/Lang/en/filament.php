<?php

declare(strict_types=1);

return [

    'agent' => [

        'order' => [

            'model'  => 'Order',
            'plural' => 'Orders',

            'inputs' => [
                'client_id' => [
                    'label' => 'Client',
                ],
                'truck_id' => [
                    'label' => 'Truck',
                ],
                'fuel_volume' => [
                    'label' => 'Fuel Volume',
                ],
                'unit_price' => [
                    'label' => 'Unit Price',
                ],
                'total_price' => [
                    'label' => 'Total Price',
                ],
                'latitude' => [
                    'label' => 'Latitude',
                ],
                'longitude' => [
                    'label' => 'Longitude',
                ],
                'address' => [
                    'label' => 'Address'
                ],
                'status' => [
                    'label' => 'Status'
                ],
                'delivery_date' => [
                    'label' => 'Delivery Date'
                ]
            ],

            'table' => [
                'th' => [
                    'client_id'   => 'Client',
                    'truck_id'    => 'Truck',
                    'fuel_volume' => 'Fuel Volume',
                    'total_price' => 'Total Price',
                    'status'      => 'Status'
                ]
            ],
        ],


    ]
];
