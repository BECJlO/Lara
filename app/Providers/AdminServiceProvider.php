<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->menuItem();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function menuItem(){
        View::composer('layouts.admin', function ($view) {
            $view->with('pages', [
                [
                    'url' => 'admin.index',
                    'title' => 'Home',
                    'icon' => 'fa-home',
                    'subItems' => false
                ],
                [
                    'url' => 'admin.index',
                    'title' => 'Profile',
                    'icon' => 'fa-user',
                    'subItems' => false
                ],
                [
                    'url' => 'admin.warning.index',
                    'title' => 'Profile',
                    'icon' => 'fa-user',
                    'subItems' => false
                ],
                [
                    'url' => 'admin.order.index',
                    'title' => 'Orders',
                    'icon' => 'fa-book',
                    'subItems' => false
                ],
                [
                    'url' => 'admin.worker.index',
                    'title' => 'Worker',
                    'icon' => 'fa-map-o',
                    'subItems' => false
                ],
                [
                    'url' => 'admin.service.index',
                    'title' => 'Service',
                    'icon' => 'fa-map-o',
                    'subItems' => false
                ],
                [
                    'url' => 'admin.task.index',
                    'title' => 'Worker',
                    'icon' => 'fa-map-o',
                    'subItems' => false
                ],
                [
                    'url' => 'admin.image.index',
                    'title' => 'Images',
                    'icon' => 'fa-map-o',
                    'subItems' => false
                ],
            ]);
        });
    }
}
