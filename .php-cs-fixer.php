<?php

$finder = PhpCsFixer\Finder::create()
    ->in([
        'app/Http/Controllers',

    ])
    ->exclude('vendor')
    ->exclude('storage');

$config = (new PhpCsFixer\Config())
    ->setParallelConfig(PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect());

$config->setRules([
    '@PSR12' => true,
])
    ->setFinder($finder);

return $config;
