<?php

$config = require '.env.php';

return [
    'host' => $config['DB_HOST'],
    'dbname' => $config['DB_NAME'],
    'password' => $config['DB_PASSWORD'],
    'user' => $config['DB_USER'],
];
