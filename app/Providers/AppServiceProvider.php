<?php
// filepath: /home/martarodrigo/Escritorio/FarmaOfficeLogs/app/Providers/AppServiceProvider.php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Repositories\Interfaces\MetricRepositoryInterface;
use App\Repositories\MetricMysqlRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(MetricRepositoryInterface::class, MetricMysqlRepository::class);
    }

    public function boot()
    {
        Blade::component('forms::form', \App\View\Components\Form::class);
    }
}