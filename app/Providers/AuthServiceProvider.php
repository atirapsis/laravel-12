<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\InventoryPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Inventory::class => InventoryPolicy::class,
    ];
}