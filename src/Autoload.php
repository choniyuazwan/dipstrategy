<?php
    function autoload_class($class) {
        $directory = array(
            __DIR__,
        );

        $filenameformat = array(
            '%s.php',
            '%s.class.php',
            'class.%s.php',
            '%s.inc.php'
        );

        $path = str_replace('_', '/', $class);

        if (@include_once $path.'.php') {
            return;
        }

        foreach($directory as $location) {
            foreach($filenameformat as $format) {
                $path = $location.sprintf($format, $class);
                if (file_exists($path)) {
                    include_once $path;
                    return;
                }
            }
        }
    }

    function autoload_function($folder) {
        foreach (glob($folder.'/*.php') as $filename) {
            include_once $filename;
        }
    }

    spl_autoload_register('autoload_class');

