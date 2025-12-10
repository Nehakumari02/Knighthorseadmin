<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in(__DIR__)
    ->exclude(['vendor']);

return (new Config())
    ->setRules([
        '@PSR12' => true,
        'binary_operator_spaces' => [
            'default' => 'align_single_space_minimal',
            'operators' => ['=>' => 'align_single_space'],
        ],
    ])
    ->setFinder($finder);
