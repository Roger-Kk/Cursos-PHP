<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf6769d50f485290b1c8a1dbd90120a66
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Alura\\Pdo\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Alura\\Pdo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf6769d50f485290b1c8a1dbd90120a66::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf6769d50f485290b1c8a1dbd90120a66::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf6769d50f485290b1c8a1dbd90120a66::$classMap;

        }, null, ClassLoader::class);
    }
}
