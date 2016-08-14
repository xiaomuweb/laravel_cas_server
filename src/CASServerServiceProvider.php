<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/13
 * Time: 17:49
 */

namespace Leo108\CAS;

use Illuminate\Support\ServiceProvider;

/**
 * Class CASServerServiceProvider
 * @package Leo108\CAS
 */
class CASServerServiceProvider extends ServiceProvider
{
    /**
     * @inheritdoc
     */
    public function register()
    {
        // TODO: Implement register() method.
    }

    /**
     * @inheritdoc
     */
    public function boot()
    {
        require __DIR__.'/Utils/helpers.php';

        if (!$this->app->routesAreCached()) {
            require __DIR__.'/Http/routes.php';
        }

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'cas');

        $this->publishes(
            [
                __DIR__.'/../config/cas.php' => config_path('cas.php'),
            ],
            'config'
        );

        $this->publishes(
            [
                __DIR__.'/../database/migrations/' => database_path('migrations'),
            ],
            'migrations'
        );
    }
}
