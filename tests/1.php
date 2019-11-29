<?php

require_once __DIR__ . '/../vendor/autoload.php';

$host = 'localhost';
$port = 6379;
$password = null;
$database = 0;

$redis = new \Moon\Cache\Redis($host, $port, $password, $database);

$user_id = 1;

$user = $redis->cache('test', 10, function () use ($user_id) {
    // some db query or other code ...
    $user = [
        'id' => $user_id,
        'username' => 'xiaoming',
        'sex' => 1,
        'crated_at' => time()
    ];
    return $user;
});

var_dump($user);