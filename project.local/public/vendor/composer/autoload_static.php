<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita26a22d18213c5de7a9bb037346388d9
{
    public static $files = array (
        '7b11c4dc42b3b3023073cb14e519683c' => __DIR__ . '/..' . '/ralouphie/getallheaders/src/getallheaders.php',
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php',
        '09fc349b549513bf7f4291502426f919' => __DIR__ . '/..' . '/embed/embed/src/functions.php',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions_include.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Http\\Client\\' => 16,
        ),
        'N' => 
        array (
            'Nyholm\\Psr7\\' => 12,
        ),
        'M' => 
        array (
            'ML\\JsonLD\\' => 10,
        ),
        'H' => 
        array (
            'HtmlParser\\' => 11,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
            'GuzzleHttp\\Promise\\' => 19,
            'GuzzleHttp\\' => 11,
        ),
        'E' => 
        array (
            'Embed\\' => 6,
        ),
        'C' => 
        array (
            'Composer\\CaBundle\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-factory/src',
            1 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Psr\\Http\\Client\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-client/src',
        ),
        'Nyholm\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/nyholm/psr7/src',
        ),
        'ML\\JsonLD\\' => 
        array (
            0 => __DIR__ . '/..' . '/ml/json-ld',
        ),
        'HtmlParser\\' => 
        array (
            0 => __DIR__ . '/..' . '/oscarotero/html-parser/src',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
        'GuzzleHttp\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/promises/src',
        ),
        'GuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
        ),
        'Embed\\' => 
        array (
            0 => __DIR__ . '/..' . '/embed/embed/src',
        ),
        'Composer\\CaBundle\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/ca-bundle/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'ML\\IRI' => 
            array (
                0 => __DIR__ . '/..' . '/ml/iri',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita26a22d18213c5de7a9bb037346388d9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita26a22d18213c5de7a9bb037346388d9::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInita26a22d18213c5de7a9bb037346388d9::$prefixesPsr0;
            $loader->classMap = ComposerStaticInita26a22d18213c5de7a9bb037346388d9::$classMap;

        }, null, ClassLoader::class);
    }
}
