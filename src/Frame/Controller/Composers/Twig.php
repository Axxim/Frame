<?php

namespace Frame\Controller\Composers;


use Twig_Environment;
use Twig_Loader_Filesystem;

class Twig extends Composer {

    private $views;

    private $loader;
    private $engine;

    public function __construct($views, $options = array()) {
        if(!class_exists('Twig_Environment')) {
            // No twig
        }

        $this->views = $views;

        // Load the options
        $defaultOptions = array(
            'charset' => 'utf-8'
        );
        $options = array_merge($defaultOptions, $options);

        try {
            $this->loader = new Twig_Loader_Filesystem(app_path('views'));
        } catch(\Twig_Error_Loader $e) {
            exit($e->getMessage());
        }

        $this->engine = new Twig_Environment($this->loader, $options);
    }

    /**
     * This renders the view file, you can pass in an array or object for $data
     *
     * @param $file
     * @param $data
     * @return string
     */
    public function render($file, $data) {
        $template = $this->engine->loadTemplate($file);

        return $template->render($data);
    }

}
