<?php

namespace Markustripp\Mongo;

use Illuminate\Support\ServiceProvider;

class MongoServiceProvider extends ServiceProvider {
    protected $defer = true;

	public function boot() {

		$this->publishes([
			__DIR__.'/../config/mongo.php' => config_path('mongo.php'),
		], 'mongo');
	}

    public function register() {
		$this->mergeConfigFrom( __DIR__.'/../config/mongo.php', 'mongo');

        $this->app->singleton('mongo', function($app) {
            $config = $app->make('config');

            $uri = $config->get('mongo.uri');
            $uriOptions = $config->get('mongo.uriOptions');
            $driverOptions = $config->get('mongo.driverOptions');

            return new MongoService($uri, $uriOptions, $driverOptions);
        });
    }

    public function provides() {
        return ['mongo'];
    }
}
