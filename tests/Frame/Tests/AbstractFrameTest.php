<?php

namespace Frame\Tests;

use Frame\Frame;
use PHPUnit_Framework_TestCase;

abstract class AbstractFrameTest extends PHPUnit_Framework_TestCase {

    protected $frameApp;

    protected function setUp() {
        $this->frameApp = new Frame();
    }

}
