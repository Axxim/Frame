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
    private $db;

    /**
     * Get the application ready for deployment, this won't actually do anything visible.
     */
    public function __construct() {
        // Register klein
        $this->klein = new Klein\Klein();

        // Init app
        $this->config = new Config();
    }

    /**
     * Visibly start the Frame engine
     */
    public function start() {
        $this->db = new DB\Connection($this->config);
        $this->router = new Router($this->klein, $this->config);
    }

    /**
     * Stop the app and clean it up.
     */
    public function stop() {
        $this->klein->dispatch();
    }

}
