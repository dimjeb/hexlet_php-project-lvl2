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
$json_1 = json_decode($json1, true);
$json_2 = json_decode($json2, true);
foreach ($json_1 as $key => $item) {
    if (array_key_exists($key, $json_2) && $json_2[$key] == $item) {
        $result[] = $key . ': ' . $item;
    } elseif (!array_key_exists($key, $json_2)) {
        $result[] = '- ' . $key . ': ' . $item;
    } elseif ($json_2[$key] != $item) {
        $result[] = '- ' . $key . ': ' . $item;
        $result[] = '+ ' . $key . ': ' . $json_2[$key];
    }
}
$json2_diff = array_diff_key($json_2, $json_1);
foreach ($json2_diff as $key => $item) {
    $result[] = '+ ' . $key . ': ' . $item;
}
sort($result);

print_r($result);
