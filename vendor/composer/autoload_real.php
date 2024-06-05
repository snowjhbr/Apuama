<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit3d30a8704470b92deb78a60c67b2e144
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

        spl_autoload_register(array('ComposerAutoloaderInit3d30a8704470b92deb78a60c67b2e144', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit3d30a8704470b92deb78a60c67b2e144', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit3d30a8704470b92deb78a60c67b2e144::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
