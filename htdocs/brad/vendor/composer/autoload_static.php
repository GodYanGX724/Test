<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit54847d6030d29731b0e767d050d22a36
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Workerman\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Workerman\\' => 
        array (
            0 => __DIR__ . '/..' . '/workerman/workerman/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit54847d6030d29731b0e767d050d22a36::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit54847d6030d29731b0e767d050d22a36::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit54847d6030d29731b0e767d050d22a36::$classMap;

        }, null, ClassLoader::class);
    }
}
