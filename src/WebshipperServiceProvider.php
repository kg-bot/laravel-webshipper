<?php

namespace Webshipper;


use Illuminate\Support\ServiceProvider;
class WebshipperServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $configPath = __DIR__.'/config/webshipper.php';

        if (function_exists('config_path')) {

            $publishPath = config_path('webshipper.php');

        } else {

            $publishPath = base_path('config/webshipper.php');

        }

        $this->publishes([$configPath => $publishPath], 'config');
    }
    public function register()
    {
    }
}