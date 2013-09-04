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

        $prefix = null;
        if(isset($args['prefix'])) {
            $prefix = $args['prefix'];
        }

        $this->response->json($out, $prefix);
    }

}
