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

    /**
     * @var \Klein\Request
     */
    public $request;

    /**
     * @var \Klein\Response
     */
    public $response;


    /**
     * @var \Klein\ServiceProvider
     */
    public $service;

    /**
     * Provide variables
     *
     * @param Klein\Request  $request
     * @param Klein\Response $response
     * @param                $service
     */
    public function __construct(Klein\Request $request, Klein\Response $response, Klein\ServiceProvider $service) {
        $this->request = $request;
        $this->response = $response;
        $this->service = $service;
    }

    public function _preRender() {

    }

    public function _render($out, $args) {

    }

    public function _postRender() {

    }

}
