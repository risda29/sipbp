<?php

namespace Config;

use App\Filters\RoleFilter;
use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
    // Makes alias definitions available to use in the below filters.
    public $aliases = [
        'csrf'     => \CodeIgniter\Filters\CSRF::class,
        'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
        'honeypot' => \CodeIgniter\Filters\Honeypot::class,
        'role'     => RoleFilter::class, // Register the RoleFilter
    ];

    // Always applied before every request
    public $globals = [
        'before' => [
            // 'csrf',
        ],
        'after'  => [
            'toolbar',
            // 'honeypot',
        ],
    ];

    // Works on all of a particular HTTP method
    // (GET, POST, etc) as BEFORE filters only
    //     like: 'post' => ['CSRF', 'throttle'],
    public $methods = [];

    // List filter aliases and any before/after uri patterns
    // that they should run on, like:
    //    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
    public $filters = [];
}
