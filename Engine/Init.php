<?php

/**
 * Autoloader
 */
spl_autoload_register(function ($class_name)
    {
        //class autoload rules
        $file_paths = array(
        ROOT.DS.'Engine'.DS.'Core'.DS.ucfirst(strtolower($class_name)) . '.core.php',
        ROOT.DS.'app'.DS.'Controllers'.DS.ucfirst(strtolower($class_name)) . 'Controller.php',
        ROOT.DS.'app'.DS.'Models'.DS.ucfirst(strtolower($class_name)) . '.php',
        );

        $class_not_found = true;
        foreach ($file_paths as $file_path) {

            if ( file_exists($file_path) ){
                $class_not_found = false;
                require_once($file_path);

            }

            if ( $class_not_found ) {
                throw new Exception('Failed to include class: '.$class_name);
            }
        }

    }
);