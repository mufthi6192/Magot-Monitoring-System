<?php

namespace App\Providers;


use App\Interfaces\Api\ApiRepositoryInterface;
use App\Interfaces\Auth\Login\LoginRepositoryInterface;
use App\Interfaces\Merge\MergeRepositoryInterface;
use App\Interfaces\Message\MessageRepositoryInterface;
use App\Interfaces\Output\OutputRepositoryInterface;
use App\Interfaces\Sensor\Humidity\HumidityRepositoryInterface;
use App\Interfaces\Sensor\Temperature\TemperatureRepositoryInterface;
use App\Interfaces\Test\TestRepositoryInterface;
use App\Interfaces\User\UserSeederRepositoryInterface;
use App\Repositories\Api\ApiRepositoryImpl;
use App\Repositories\Auth\Login\LoginRepositoryImpl;
use App\Repositories\Merge\MergeRepsoitoryImpl;
use App\Repositories\Message\MessageRepositoryImpl;
use App\Repositories\Output\OutputRepositoryRepositoryImpl;
use App\Repositories\Sensor\Temperature\TemperatureRepositoryImpl;
use App\Repositories\Sensor\Humidity\HumidityRepositoryImpl;
use App\Repositories\Test\TestRepositoryImp;
use App\Repositories\User\UserSeederRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserSeederRepositoryInterface::class, UserSeederRepositoryImpl::class);
        $this->app->bind(LoginRepositoryInterface::class, LoginRepositoryImpl::class);
        $this->app->bind(OutputRepositoryInterface::class, OutputRepositoryRepositoryImpl::class);
        $this->app->bind(MessageRepositoryInterface::class,MessageRepositoryImpl::class);
        $this->app->bind(TemperatureRepositoryInterface::class,TemperatureRepositoryImpl::class);
        $this->app->bind(HumidityRepositoryInterface::class,HumidityRepositoryImpl::class);
        $this->app->bind(TestRepositoryInterface::class,TestRepositoryImp::class);
        $this->app->bind(MergeRepositoryInterface::class,MergeRepsoitoryImpl::class);
        $this->app->bind(ApiRepositoryInterface::class, ApiRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
