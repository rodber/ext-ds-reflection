<?php

use Ds\Map;

require 'vendor/autoload.php';

$map = new Map(['test']);
$reflection = new ReflectionObject($map);
exit(
    $reflection->getProperties() === []
        ? 255
        : 0
);
