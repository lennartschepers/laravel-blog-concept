<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
    //
    Schema::defaultStringLength(191);
    Model::unguard();

    // define gate to conditionally show links that only admins should see (since middleware MustBeAdministrator.php that protects auth for admins can't really be referenced in views)
    // if the $user->username is equal to my name, gate returns that $user is an 'admin'
    Gate::define('admin', function (User $user) {
      return $user->username === 'lennart';
    });
  }
}
