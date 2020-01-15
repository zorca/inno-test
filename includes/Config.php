<?php

namespace InnoTest;

use Exception;

class Config {

     private $config;

    public function __construct() {
        $this->config = include BASE_PATH . '/config.php';
    }

    /**
     * @param string $id
     * @return array|Exception
     */
    public function get($firstId, $secondId) {
        if (is_array($this->config) && array_key_exists($firstId, $this->config)) {
            if (is_array($this->config[$firstId]) && array_key_exists($secondId, $this->config[$firstId])) return $this->config[$firstId][$secondId];
        }
        return new \Exception('Config not exists');
    }
}
