<?php

class JSONController extends Frame\Controller\JSON {

    public function index() {
        $array = ['testing' => 'success'];

        return $array;
    }

}
