<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf30829b65cc33876627790ad61733902
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Alura\\MVC\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Alura\\MVC\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitf30829b65cc33876627790ad61733902::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf30829b65cc33876627790ad61733902::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf30829b65cc33876627790ad61733902::$classMap;

        }, null, ClassLoader::class);
    }
}
