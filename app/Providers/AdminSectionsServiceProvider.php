<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        //\App\User::class => 'App\Http\Sections\Users',
        \App\Thooth::class => 'App\Http\Admin\Thooth',
        \App\Patient::class => 'App\Http\Admin\Patient',
        \App\Doctor::class => 'App\Http\Admin\Doctor',
        \App\User::class => 'App\Http\Admin\User',
        \App\Clinic::class => 'App\Http\Admin\Clinic',
        \App\Users_theeth::class => 'App\Http\Admin\Users_theeth',
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}
