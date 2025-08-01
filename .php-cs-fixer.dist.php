<?php
// Файл: .php-cs-fixer.dist.php

$finder = PhpCsFixer\Finder::create()
    // 1. Указываем, что искать нужно во всём проекте
    ->in(__DIR__)

    // 2. Явно говорим, что нас интересуют только папки 'src' и 'bin'
    ->path([
        'src',
        'bin',
    ])

    // 3. А теперь явно исключаем подпапки, которые нам не нужны
    ->notPath([
//        'src/Generated',
        'src/cpp',
    ])

    // 4. Для надежности ищем только .php файлы
    ->name('*.php');


return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PER-CS' => true,
        'array_indentation' => true,
        'assign_null_coalescing_to_coalesce_equal' => true,
        'native_function_invocation' => [
            'include' => ['@compiler_optimized'],
            'scope' => 'namespaced',
            'strict' => true,
        ],
        'static_lambda' => true,
        'ternary_to_null_coalescing' => true,
        'void_return' => true,
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'no_unused_imports' => true,
        'strict_param' => true,
        'concat_space' => ['spacing' => 'one'],
    ])
    ->setFinder($finder);