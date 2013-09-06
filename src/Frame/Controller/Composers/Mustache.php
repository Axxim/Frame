<?php

namespace Frame\Controller\Composers;

use Mustache_Engine;

/**
 * Class Mustache
 * This View Composer handles Mustache support
 *
 * @package Frame\Controller\Composers
 */
class Mustache implements Composer {

    private $engine;

    public function __construct($options = array()) {
        if(!class_exists('Mustache_Engine')) {
            // No mustache
        }

        // Load the options
        $defaultOptions = array(
            'charset' => 'UTF-8',
            'escape' => function($value) {
                return htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
            },
        );
        $options = array_merge($defaultOptions, $options);

        $this->engine = new Mustache_Engine($options);
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
