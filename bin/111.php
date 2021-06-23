<?php

namespace PhpFormat;

require_once 'PhpFormatter.php';
function get_doc()
{
    return "\n    php-fmt\n\n    Usage:\n        php-fmt.php <filepath> [--inplace]\n\n    Options:\n        -h --help       Show this screen.\n        -i --inplace    Rewrite the file in place.\n    ";
}
class PhpFormatterClient
{
    public function __construct()
    {
        $this->formatter = new PHPFormatter();
    }
    public function run()
    {
        $params = array('help' => true, 'version' => 'php-auto-format 0.1');
        $args = \Docopt::handle(get_doc(), $params);
        if (isset($args['<filepath>'])) {
            $filepath = $args['<filepath>'];
            if (!file_exists($filepath)) {
                die("File {$filepath} does not exist\n");
            }
            $out = $this->formatter->parseFile($filepath);
            if ($args['--inplace']) {
                $handler = fopen($filepath, 'w+');
                fwrite($handler, $out);
                fclose($handler);
            } else {
                echo $out;
            }
        }
    }
}