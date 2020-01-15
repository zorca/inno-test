<?php

namespace InnoTest;

use Psr\Container\ContainerInterface;

class App implements ContainerInterface {

    protected $config;
    protected $database;

    public function __construct()
    {
        $this->config = new Config();
        $this->database = new Database();
        $this->database->createConnection(
            $this->config->get('database', 'dns'),
            $this->config->get('database', 'user'),
            $this->config->get('database', 'password')
        );
    }

    public function get($id) {}

    public function has($id) {}
}
