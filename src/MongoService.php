<?php

namespace Markustripp\Mongo;

use MongoDB\Client;

class MongoService {
    private $mongo;

    public function __construct($uri, $uriOptions, $driverOptions) {
        $this->mongo = new Client($uri = null, $uriOptions = [], $driverOptions = []);
    }

    public function get() {
        return $this->mongo;
    }
}
