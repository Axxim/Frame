<?php

namespace Frame;

use Klein;

/**
 * Frame 
 * Frame is a super simple micro mvc framework. Routing is provided by Klein so it should be pretty fast.
 */
class Frame {

    public $klein;

    private $config;
    private $router;

    public function __construct() {
        // Register klein
        $this->klein = new Klein\Klein();

        // Init app
        $this->config = new Config();
    }

    public function start() {
        $this->router = new Router($this->klein, $this->config);
    }

    public function stop() {
        $this->klein->dispatch();
    }

}
