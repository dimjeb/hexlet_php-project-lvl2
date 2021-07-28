<?php

namespace App\Tests;

require_once __DIR__ . '/../vendor/autoload.php';
require_once "../bin/gendiff";

use Webmozart\Assert\Assert;

//use function \gendiff;

$json1 =
'{
  "host": "hexlet.io",
  "timeout": 50,
  "proxy": "123.234.53.22",
  "follow": false
}';

$json2 =
'{
"timeout": 20,
"verbose": true,
"host": "hexlet.io"
}';

$result =
'{
    "  - follow": false,
    "    host": "hexlet.io",
    "  - proxy": "123.234.53.22",
    "  - timeout": 50,
    "  + timeout": 20,
    "  + verbose": true
}';
Assert::eq(\genDiff($json1, $json2), ['one', 'two']);