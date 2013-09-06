<?php

namespace Frame\Tests;

use Frame\Frame;
use Goutte\Client;
use PHPUnit_Framework_TestCase;

abstract class AbstractFrameTest extends PHPUnit_Framework_TestCase {

    protected $frameApp;

    /**
     * @var Client
     */
    protected $browser;

    protected function setUp() {
        // This isn't ready
        $this->frameApp = new Frame();
        $this->browser = new Client();
    }

}
