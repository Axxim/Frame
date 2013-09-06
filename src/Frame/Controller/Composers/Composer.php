<?php

namespace Frame\Controller\Composers;


abstract class Composer {

    public function render($file, $data) {

    }

    public function findView($view) {
        $ext = $this->ext;
        $path = app_path("views/$view.$ext");

        return $path;
    }

}
