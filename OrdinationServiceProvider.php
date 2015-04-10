<?php namespace Laraerp\Ordination;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\ServiceProvider;

class OrdinationServiceProvider extends ServiceProvider {


	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

        $this->app->bind('order', function()
        {

            $order = new Order();
            $order->setPath($this->app['request']->url());
            return $order;
        });
	}

}

