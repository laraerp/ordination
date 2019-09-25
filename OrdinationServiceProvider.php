<?php namespace Laraerp\Ordination;

use lluminate\Http\Request;
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

