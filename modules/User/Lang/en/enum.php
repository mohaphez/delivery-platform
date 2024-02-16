<?php

declare(strict_types=1);

return [
    'account_status' => [
        'free'       => 'Free',
        'limited'    => 'Limited',
        'banned'     => 'Banned',
        'removed'    => 'Removed',
        'classified' => 'Classified',

        'colors' => [
            'free'       => 'success',
            'limited'    => 'warning',
            'banned'     => 'danger',
            'removed'    => '',
            'classified' => 'info',
        ],
    ],

    'account_type' => [
        'driver'       => 'Driver',
        'client'       => 'Client',
        'agent'       => 'Agent',
        'manager'      => 'Manager',
        'system'       => 'System',
        'sudo'         => 'Sudo',

        'colors' => [
            'agent'       => 'warning',
            'manager'      => 'success',
            'system'       => 'primary',
            'sudo'         => 'danger',
            'driver'       => '',
            'client'       => '',
        ],
    ],
];
