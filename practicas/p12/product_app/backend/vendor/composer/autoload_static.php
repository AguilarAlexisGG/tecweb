<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitff03330114133d2e729d611716ce8f5d
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MiNamespace\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MiNamespace\\' => 
        array (
            0 => __DIR__ . '/../..' . '/mi_carpeta',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitff03330114133d2e729d611716ce8f5d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitff03330114133d2e729d611716ce8f5d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitff03330114133d2e729d611716ce8f5d::$classMap;

        }, null, ClassLoader::class);
    }
}
