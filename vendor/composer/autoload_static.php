<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit937c78a3fd82821416d0273c1b8b2491
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit937c78a3fd82821416d0273c1b8b2491::$classMap;

        }, null, ClassLoader::class);
    }
}
