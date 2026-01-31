<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in(__DIR__)
    ->exclude(['vendor', 'storage', 'bootstrap/cache']);

return (new Config())
    ->setRiskyAllowed(true)
    ->setUsingCache(true)
    ->setRules([
        '@PhpCsFixer' => true,
        '@PhpCsFixer:risky' => true,
        'array_syntax' => ['syntax' => 'short'],
        'binary_operator_spaces' => ['default' => 'single_space'],
        'blank_line_before_statement' => ['statements' => ['return']],
        'concat_space' => ['spacing' => 'one'],
        'method_argument_space' => ['on_multiline' => 'ensure_fully_multiline'],
        'no_unused_imports' => true,
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'single_import_per_statement' => true,
        'single_trait_insert_per_statement' => true,
        'visibility_required' => true,
        'yoda_style' => false,
    ])
    ->setFinder($finder);
