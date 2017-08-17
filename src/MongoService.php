<?php

namespace Markustripp\Mongo;

use MongoDB\Client;

class MongoService {
    private $mongo;

    public function __construct($uri, $uriOptions, $driverOptions) {
		$mUri = $this->validate($uri, null);
		$mUriOptions = $this->validate($uriOptions, [], true);
		$mDriverOptions = $this->validate($driverOptions, [], true);

        $this->mongo = new Client($mUri, $mUriOptions, $mDriverOptions);
    }

	private function validate($val, $default, $json = false) {
		if (!empty($val) && is_string($val)) {
			if ($json) {
				return json_decode($val, true);
			}

			return $val;
		}

		return $default;
	}

    public function get() {
        return $this->mongo;
    }
}
