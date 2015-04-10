<?php namespace Laraerp\Ordination;

use Illuminate\Support\ServiceProvider;

class OrdinationServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->singleton('Laraerp\Ordination\Order', function($app)
        {
            $order = new Order();
            $order->setPath($app['request']->url() . '?'  .http_build_query($app['input']->query(), null, '&'));

            return $order;
        });
	}

}

