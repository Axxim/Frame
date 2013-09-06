<?php

namespace Frame\Controller;

use Frame\Router;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Klein;

/**
 * Class Resource
 * This controller type directly binds models to data
 *
 * @package Frame\Controller
 */
class Resource extends JSON {

    public $model = '';
    public $modelInstance;

    public function __construct(Klein\Request $request, Klein\Response $response, Klein\ServiceProvider $service) {
        parent::__construct($request, $response, $service);

        if($this->model == '') {
            throw new ModelNotFoundException();
        }

        $model = $this->model;
        $this->modelInstance = new $model();
    }

    public function index() {
        $records = $this->modelInstance->all();

        return $records;
    }

    public function show($id) {

    }

    public function create() {

    }

    public function update($id) {

    }

    public function delete($id) {

    }

    /**
     * Register the resource routes.
     */
    public static function _registerRoutes(Router $router, $basePath, $controller) {
        $routes = array(
            "GET $basePath" => "$controller@index",
            "GET $basePath/[i:id]" => "$controller@show",
            "POST $basePath" => "$controller@create",
            "PUT $basePath/[i:id]" => "$controller@update",
            "PATCH $basePath/[i:id]" => "$controller@update",
            "DELETE $basePath/[i:id]" => "$controller@delete",
        );

        $router->routes($routes);
    }

}
