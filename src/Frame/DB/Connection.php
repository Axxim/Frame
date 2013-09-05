<?php

namespace Frame\DB;

use Frame\Config;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Connection {

    private $capsule;

    public function __construct(Config $config) {
        $this->capsule = new Capsule;

        $this->capsule->addConnection($config->get('database'));
        $this->capsule->setEventDispatcher(new Dispatcher(new Container));
        $this->capsule->setAsGlobal();

        $this->capsule->bootEloquent();
    }

}
