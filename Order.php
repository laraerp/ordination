<?php namespace Laraerp\Ordination;

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
    public function url($column = null, $alias = null)
    {
        if (is_null($column))
            throw new \Exception('Column is null');

        return '<a href="">'.(!is_null($alias)?:$column).'</a>';
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

