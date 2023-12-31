<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8d4b3d22890f3eda8f30e4cae30ebb64
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/api',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8d4b3d22890f3eda8f30e4cae30ebb64::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8d4b3d22890f3eda8f30e4cae30ebb64::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8d4b3d22890f3eda8f30e4cae30ebb64::$classMap;

        }, null, ClassLoader::class);
    }
}
