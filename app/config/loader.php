<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    array(
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->libraryDir,
        $config->application->cacheDir,
        $config->application->pluginsDir,
        $config->application->formsDir,
        $config->application->assetsDir
    )
)->register();
