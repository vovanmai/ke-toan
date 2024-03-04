<?php

use App\Models\Admin;

return [
    'admin' => [
        Admin::ROLE_SUPPER_ADMIN => [
            'method' => [
                'GET',
                'POST',
                'PUT',
                'DELETE',
            ]
        ],
        Admin::ROLE_ADMIN => [
            'method' => [
                'GET',
                'POST',
                'PUT',
                'DELETE',
            ]
        ],
        Admin::ROLE_EDITOR => [
            'method' => [
                'GET',
                'POST',
                'PUT',
            ]
        ],
        Admin::ROLE_VIEWER => [
            'method' => [
                'GET',
            ]
        ],
    ]
];
