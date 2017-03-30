<?php
	class Loader
{

    private static $library = [];

    protected static $classPath = __DIR__ . "/classes/";

    protected static $interfacePath = __DIR__ . "/classes/interfaces/";

    public $count = 1;

    public function __construct($requireInterface = true)
    {
        if(empty(static::$library)) {
            // Get all files inside the class folder
            foreach(array_map('basename', glob(static::$classPath . "*.php", GLOB_BRACE)) as $classExt) {
                // Get rid of php extension easily without pathinfo
                $classNoExt = substr($classExt, 0, -4);
                // Make sure the class is not already declared somewhere else
                if(!in_array($classNoExt, get_declared_classes())) {
                    $file = static::$classPath . $classExt;

                    if($requireInterface) {
                        // Get interface file
                        $interface = static::$interfacePath . $classExt;
                        // Check if interface file exists
                        if(!file_exists($interface)) {
                            // Throw exception
                            die("Unable to load interface file: " . $interface);
                        }

                        // Require interface
                        require_once $interface;
                        //Check if interface is set
                        if(!interface_exists("Interface" . $classNoExt)) {
                            // Throw exception
                            die("Unable to find interface: " . $interface);
                        }
                    }

                    // Require class
                    require_once $file;
                    // Check if class file exists
                    if(class_exists($classNoExt)) {
                        // Set class        // class.container.php
                        static::$library[$classNoExt] = new $classNoExt();
                        $this->count++;
                    } else {
                        // Throw error
                        die("Unable to load class: " . $classNoExt);
                    }

                }
            }
        }
    }
}
?>