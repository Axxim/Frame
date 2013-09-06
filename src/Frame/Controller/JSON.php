<?php

namespace Frame\Controller;

/**
 * Class JSON
 * This will output pure json
 * @package Frame\Controller
 */
class JSON extends Base {

    public function _render($out, $args) {
        parent::_render($out, $args);

        $this->response->noCache();

        // Check if method is an object that has a toArray method
        if(method_exists($out, 'toArray')) {
            $out = $out->toArray();
        }

        // Make sure we're not jsoning json.
        if(!$this->isJson($out)) {
            $out = json_encode($out);
        }


        if(isset($args['prefix'])) {
            $prefix = $args['prefix'];

            $this->response->header('Content-Type', 'text/javascript; charset=' . $this->charset);
            $this->response->body("$prefix($out);");
        } else {
            $this->response->header('Content-Type', 'application/json; charset=' . $this->charset);
            $this->response->body($out);
        }

        $this->response->send();
    }

    /**
     * Check if string is JSON
     *
     * @param $string
     *
     * @return bool
     */
    private function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

}
