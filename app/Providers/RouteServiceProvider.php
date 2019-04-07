<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {

        $routes = [
            [
                'prefix' => null,
                'middleware' => [
                    'web',
                ],
                'namespace' => '',
                'routeFile' => 'web.php'
            ],
            [
                'prefix' => 'customer',
                'middleware' => [
                    'web',
                    'auth',
                ],
                'namespace' => '\Customer',
                'routeFile' => 'customer.php'
            ],
            [
                'prefix' => 'supporter',
                'middleware' => [
                    'web',
                    'auth',
                    'supporter'
                ],
                'namespace' => '\Supporter',
                'routeFile' => 'supporter.php'
            ],
            [
                'prefix' => 'admin',
                'middleware' => [
                    'web',
                    'auth',
                    'admin'
                ],
                'namespace' => '\Admin',
                'routeFile' => 'admin.php'
            ]
        ];

        foreach ($routes as $item => $value) {
            $this->routeRegister($value['prefix'], $value['middleware'], $value['namespace'], $value['routeFile']);
        }

    }

    protected function routeRegister($prefix = null, array $middleware, $namespace = '', $routeFile)
    {
        if ($prefix)
            Route::prefix($prefix)
                ->middleware($middleware)
                ->namespace($this->namespace.$namespace)
                ->group(base_path('routes\\'.$routeFile));
        else
            Route::middleware($middleware)
                ->namespace($this->namespace.$namespace)
                ->group(base_path('routes\\'.$routeFile));
    }
}
