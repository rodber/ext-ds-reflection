<?php

use Ds\Map;

require 'vendor/autoload.php';

$map = new Map(['test']);
$reflection = new ReflectionClass($map);
dump($reflection->getProperties());
exit(
    $reflection->getProperties() === []
        ? 255
        : 0
);
