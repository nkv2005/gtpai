<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteab1cca78cf35f6e6bc1b6463a100282
{
    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'Zeemo\\Gptai\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Zeemo\\Gptai\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/zeemo/gptai/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticIniteab1cca78cf35f6e6bc1b6463a100282::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteab1cca78cf35f6e6bc1b6463a100282::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticIniteab1cca78cf35f6e6bc1b6463a100282::$classMap;

        }, null, ClassLoader::class);
    }
}
