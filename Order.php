<?php namespace Laraerp\Ordination;

use Illuminate\Support\Facades\Input;

class Order {

    /**
     * The base path to assign to all URLs.
     *
     * @var string
     */
    protected $path = '/';

    /**
     * Render the url order.
     *
     * @param  string $column
     * @param  string $alias
     * @return string
     */
    public function url($column = null)
    {
        if (is_null($column))
            throw new \Exception('Column is null');

        return $this->path . '?' . http_build_query(array_merge(Input::query(), ['by' => $column, 'order' => Input::get('order')=='desc'?'asc':'desc']));
    }

    /**
     * Set the base path to assign to all URLs.
     *
     * @param  string  $path
     * @return $this
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

}

