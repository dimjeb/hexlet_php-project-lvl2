<?php

$json1 = '{
    "host": "hexlet.io",
  "timeout": 50,
  "proxy": "123.234.53.22",
  "follow": false
}';

$json2 = '{
    "timeout": 20,
  "verbose": true,
  "host": "hexlet.io"
}';
$json_1 = json_decode($json1);
$json_2 = json_decode($json2);
print_r($json_1);
// print_r(array_diff($json_1, $json_2));
