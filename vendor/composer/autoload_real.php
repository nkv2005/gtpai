<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderIniteab1cca78cf35f6e6bc1b6463a100282
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

        spl_autoload_register(array('ComposerAutoloaderIniteab1cca78cf35f6e6bc1b6463a100282', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderIniteab1cca78cf35f6e6bc1b6463a100282', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticIniteab1cca78cf35f6e6bc1b6463a100282::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
