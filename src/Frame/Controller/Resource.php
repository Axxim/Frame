<?php

namespace Frame\Controller;

use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class Resource
 * This controller type directly binds models to data
 *
 * @package Frame\Controller
 */
class Resource extends Base {

    public $model = '';

    public function __construct() {
        if($this->model == '') {
            throw new ModelNotFoundException();
        }
    }

    public function index() {

    }

    public function show($id) {

    }

    public function create() {

    }

    public function update($id) {

    }

    public function delete($id) {

    }

}
