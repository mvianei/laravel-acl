<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Notice;
use App\Permission;
use App\User;
use Mockery\Matcher\Not;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // App\Notice::class => App\Policies\NoticePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('notice-update', function (User $user, Notice $notice) {
        //     return $user->id == $notice->user_id;
        // });
       
        $permissions = Permission::with('roles')->get();
        //dd($permissions);
        foreach ($permissions as $permission){
            Gate::define($permission->name, function (User $user) use ($permission) {
                return $user->hasPermission($permission);
            });
        }
    }
}
