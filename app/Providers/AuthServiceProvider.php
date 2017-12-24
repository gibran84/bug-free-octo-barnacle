<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Place;
use App\Policies\PlacePolicy;
use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Place::class => PlacePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        
        $this->registerPolicies();
        
        \Gate::define('update-place', function ($user, $place) {
            
            return $user->id == $place->user_id;
            
        });
        
        foreach ($this->getPermissions() as $permission) {
            
            \Gate::define($permission->name, function($user) use ($permission) {
                
                return $user->hasRole($permission->roles);
                
            });
            
        }
        
    }
    
    protected function getPermissions()
    {
        
        return Permission::with('roles')->get();
        
    }
}
