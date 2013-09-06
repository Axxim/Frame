<?php

namespace Frame\Controller;

/**
 * Class View
 * Renders HTML views
 *
 * @package Frame\Controller
 */
class View extends Base {

    /**
     * Layout for views
     * @var string
     */
    public $layout;

    /**
     * View file extensions
     * @var string
     */
    public $ext = 'phtml';

    /**
     * Which view composer?
     * @var string
     */
    public $composer = 'Frame\\Controller\\Composers\\Mustache';

    public $data;


    /**
     * Make the view
     *
     * @param       $view
     * @param array $data
     */
    public function make($view, $data = array()) {
        // If we have a layout
        if(!empty($this->layout)) {
            $this->service->layout($this->findView($this->layout));
        }

        ob_start();
        $this->service->render($this->findView($view), $data);
        $entire = ob_get_clean();

        $engine = $this->composer;
        $composer = new $engine;

        echo $composer->render($entire, $data);
    }

    /**
     * Find a view, this will be expanded in the future.
     *
     * @param $view
     *
     * @return string
     */
    private function findView($view) {
        $ext = $this->ext;
        $path = app_path("views/$view.$ext");

        return $path;
    }

}
