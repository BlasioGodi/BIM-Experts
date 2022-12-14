<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitaf352a92fbb0f0d01c1fb9de14e284cf
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitaf352a92fbb0f0d01c1fb9de14e284cf', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitaf352a92fbb0f0d01c1fb9de14e284cf', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitaf352a92fbb0f0d01c1fb9de14e284cf::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
