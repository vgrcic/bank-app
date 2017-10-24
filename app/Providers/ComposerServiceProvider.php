<?php

namespace App\Providers;

use Auth;
use App\User;
use App\Bank;
use App\Account;
use App\Transaction;
use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {        
        View::composer('*', function($view) {
            $view->with('user', Auth::user());
        });
        
        View::composer('banks', function($view) {
            $view->with('banks', Bank::all());
        });

        View::composer('accounts', function($view) {
            $view->with('accounts', Auth::user()->accounts);
        });

        View::composer('users', function($view) {
            $view->with('users', User::all());
        });

        View::composer('admin.accounts', function($view) {
            $view->with('accounts', Account::all());
        });

        View::composer('admin.transactions', function($view) {
            $view->with('transactions', Transaction::all());
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
