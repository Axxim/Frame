<?php

namespace Frame;

use Klein;

class Router {

    protected $routes;
    private $klein;

    /**
     * Load up our router
     *
     * @param Klein\Klein $klein
     * @param Config      $config
     */
    public function __construct(Klein\Klein $klein, Config $config) {
        $this->routes = $config->get('routes');
        $this->klein = $klein;

        $this->routes($this->routes);

    }

    /**
     * Route out our routes
     *
     * @param $routes
     */
    public function routes($routes) {
        foreach($routes as $route => $controllerAction) {
            // if we're dealing with a namespace
            if(is_array($controllerAction)) {

            } else {
                $explodedRoute = explode(' ', $route);
                list($method, $path) = $explodedRoute;

                // If it's a resource it'll register it's own routes
                if($method == 'RESOURCE') {
                    // Resource route registers don't have actions
                    $controller = $controllerAction;

                    // Handle resource controllers
                    require_once app_path("controllers/$controller.php");
                    $routes = $controller::_registerRoutes($this, $path, $controller);
                } else {
                    $explodedAction = explode('@', $controllerAction);
                    list($controller, $action) = $explodedAction;

                    $this->register($method, $path, $controller, $action);
                }
            }
        }
    }

    /**
     * Coming soon
     */
    public function dispatch() {

    }

    /**
     * Register a specific route and call it's renderers
     *
     * @param $method
     * @param $path
     * @param $controller
     * @param $action
     */
    private function register($method, $path, $controller, $action) {

        $this->klein->respond($method, $path, function($request, $response, $service) use($controller, $action) {
            require_once app_path("controllers/$controller.php");
            $class = new $controller($request, $response, $service);

            $class->_preRender();
            echo $class->_render($class->$action(), array());
            $class->_postRender();
        });

    }

}
