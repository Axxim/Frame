<?php

function app_path($path = '') {
    return getcwd() . '/tests/Frame/Tests/app/' . $path;
}

$autoloader = require(__DIR__ . '/../vendor/autoload.php');
$autoloader->add('Frame\Tests', __DIR__);
