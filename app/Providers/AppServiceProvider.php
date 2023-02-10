<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;

use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Gate::define('admin', function(User $user){
            return $user->is_admin;
         });

        Gate::define('penyedia', function(User $user){
            return $user->role === 'penyedia';
         });

         Gate::define('pekerja', function(User $user){
            return $user->role === 'pekerja';
         });

        Blade::directive('currency', function ( $expression ) 
         { 
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>"; 
         });
    }
}
