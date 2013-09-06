<?php

namespace Frame\Controller;

use Frame\Router;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Klein;

/**
 * Class Resource
 * This controller type directly binds models to data
 *
 * @package Frame\Controller
 */
class Resource extends JSON {

    /**
     * The name of the model
     *
     * @var string
     */
    public $model = '';

    /**
     * A working instantiation of the model.
     *
     * @var Model
     */
    public $modelInstance;

    /**
     * Init the resource controller.
     * Since this controller registers it's own routes and calls it's
     * own actions we need to call the parent construct and register
     * the Klein variables
     *
     * @param Klein\Request         $request
     * @param Klein\Response        $response
     * @param Klein\ServiceProvider $service
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function __construct(Klein\Request $request, Klein\Response $response, Klein\ServiceProvider $service) {
        parent::__construct($request, $response, $service);

        if($this->model == '') {
            throw new ModelNotFoundException();
        }

        $model = $this->model;
        $this->modelInstance = new $model();
    }

    /**
     * List all records in our table
     *
     * @return mixed
     */
    public function index() {
        $records = $this->modelInstance->all();

        return $records;
    }

    /**
     * Show a specific record.
     *
     * @param $id
     */
    public function show($id) {

    }

    /**
     * Creates a new record
     */
    public function create() {

    }

    /**
     * Update a record
     *
     * @param $id
     */
    public function update($id) {

    }

    /**
     * Delete a record
     *
     * @param $id
     */
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
