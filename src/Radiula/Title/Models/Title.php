<?php namespace Radiula\Title\Models;

use Config;

class Title {

    protected $layout;
    protected $segmentSeperator;
    protected $siteName;
    protected $segments = [];

    public function __construct()
    {
        $this->layout = Config::get('title::config.layout');
        $this->segmentSeperator = Config::get('title::config.segmentSeperator');
    }

    /**
     * Set the site name
     *
     * @return void
     */
    public function siteName($name)
    {
        $this->siteName = $name;
    }

    /**
     * Set the segments for the page title
     *
     * @return void
     */
    public function segment()
    {
        $this->segments = array_merge(func_get_args(), $this->segments);
    }

    /**
     * Override the layout
     *
     * @return void
     */
    public function layout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * Build the site title using the segments and title
     *
     * @return string
     */
    public function make()
    {
        $segments = implode($this->segmentSeperator, $this->segments);

        return sprintf($this->layout, $segments, $this->siteName);
    }
}
