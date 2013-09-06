<?php

namespace Frame\Controller\Composers;


use Twig_Environment;
use Twig_Loader_String;

class Twig implements Composer {

    private $loader;
    private $engine;

    public function __construct($options = array()) {
        if(!class_exists('Twig_Environment')) {
            // No mustache
        }

        // Load the options
        $defaultOptions = array(
        );
        $options = array_merge($defaultOptions, $options);

        $this->loader = new Twig_Loader_String();
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

        return $this->engine->render($file, $data);
    }

}
