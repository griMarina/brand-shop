<?php

require_once './config/config.php';

use PHPUnit\Framework\TestCase;

class autoloadTest extends TestCase
{
    public function testAutoloadExistingClass(): void
    {
        $class_name = 'ExistingClass';
        $class_file = MODELS_DIR . 'entities/' . $class_name . '.php';

        // Create a dummy class file for the test
        file_put_contents($class_file, "<?php class $class_name {}");

        // Call the function to autoload the class
        $result = autoload($class_name);

        // Assert that the class file was found and loaded
        $this->assertTrue($result);

        // Clean up the dummy class file
        unlink($class_file);
    }

    public function testAutoloadNonexistentClass()
    {
        $class_name = 'NonexistentClass';
        $class_file = MODELS_DIR . 'entities/' . $class_name . '.php';

        $this->assertFalse(class_exists($class_name));
        $this->assertFalse(file_exists($class_file));

        $result = autoload($class_name);

        $this->assertFalse($result);
        $this->assertFalse(class_exists($class_name));
    }
}
