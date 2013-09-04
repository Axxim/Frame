<?php

namespace Frame\Controller;

use Klein;

/**
 * Class Base
 * This is what a controller should do. Render methods are underscored so we
 * don't conflict with /controller/render
 *
 * @package Frame\Controller
 */
abstract class Base {

    public $request;
    public $response;
    public $service;

    /**
     * Provide variables
     *
     * @param Klein\Request  $request
     * @param Klein\Response $response
     * @param                $service
     */
    public function __construct(Klein\Request $request, Klein\Response $response, $service) {

    }

    public function _preRender() {

    }

    public function _render() {

    }

    public function _postRender() {

    }

}
