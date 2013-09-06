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
     * View path
     * @var string
     */
    public $views = 'views';

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
     * Make the view.
     * Since templating engines like twig use the view path they already
     * have, we pass in a relative path "home.phtml" instead of the
     * app_path() + views
     *
     * @param       $view
     * @param array $data
     * @param array $options View Composer options
     */
    public function make($view, $data = array(), $options = array()) {

        $engine = $this->composer;
        $composer = new $engine(app_path($this->views), $options);

        // return
        $output = $composer->render($this->viewPath($view), $data);
        $this->response->body($output);
        $this->response->send();
    }

    private function viewPath($view) {
        return $view . '.' . $this->ext;
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
