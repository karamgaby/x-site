<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8dd3885789107d9f76937655836e6427
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'StageZero\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'StageZero\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core-php',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8dd3885789107d9f76937655836e6427::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8dd3885789107d9f76937655836e6427::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8dd3885789107d9f76937655836e6427::$classMap;

        }, null, ClassLoader::class);
    }
}
