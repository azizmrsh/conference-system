<?php
return [
    'datetime_format' => 'd/m/Y H:i:s',
    'date_format' => 'd/m/Y',

    'activity_resource' => \UnknowSk\FilamentLogger\Resources\ActivityResource::class,
    'scoped_to_tenant' => true,
    'navigation_sort' => 40,

    'resources' => [
        'enabled' => true,
        'log_name' => 'Resource',
        'logger' => \UnknowSk\FilamentLogger\Loggers\ResourceLogger::class,
        'color' => 'success',
        'exclude' => [],
        'cluster' => null,
        'navigation_group' => 'System',
    ],

    'access' => [
        'enabled' => true,
        'logger' => \UnknowSk\FilamentLogger\Loggers\AccessLogger::class,
        'color' => 'danger',
        'log_name' => 'Access',
    ],

    'notifications' => [
        'enabled' => true,
        'logger' => \UnknowSk\FilamentLogger\Loggers\NotificationLogger::class,
        'color' => null,
        'log_name' => 'Notification',
    ],

    'models' => [
        'enabled' => true,
        'log_name' => 'Model',
        'color' => 'warning',
        'logger' => \UnknowSk\FilamentLogger\Loggers\ModelLogger::class,
        'register' => [],
    ],

    'custom' => [],
];

