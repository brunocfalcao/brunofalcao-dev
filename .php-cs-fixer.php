<?php

use Jubeki\LaravelCodeStyle\Fixers\LaravelPhpdocAlignmentFixer;

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/bootstrap/app.php';

// Assuming your custom fixer is autoloaded via Composer, you don't need to require it manually

$jubekiConfig = (new Jubeki\LaravelCodeStyle\Config())
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->notName('*.blade.php')
            ->in(app_path())
            ->in(config_path())
            ->in(base_path('packages/eduka/*'))
            ->in(base_path('packages/brunocfalcao/*'))
            ->in(database_path('factories'))
            ->in(database_path('migrations'))
            ->in(database_path('seeders'))
            ->in(base_path('routes'))
            ->in(base_path('tests'))
    );

$myConfig = new PhpCsFixer\Config();
$myConfig->registerCustomFixers([
    new LaravelPhpdocAlignmentFixer()
]);

$myConfig->setRiskyAllowed(true);

$myConfig->setRules(array_merge(
    $jubekiConfig->getRules(),
    [
        'single_quote' => true,
        'ordered_traits' => true,
        'ordered_imports' => true,
        'no_unused_imports' => true,
        'ordered_interfaces' => true,
        'ordered_class_elements' => true,
        'blank_line_after_namespace' => true,
        'blank_line_after_opening_tag' => true,
        'ternary_to_null_coalescing' => true,
        'method_chaining_indentation' => false,
        'assign_null_coalescing_to_coalesce_equal' => true
    ]
));

$myConfig->setFinder($jubekiConfig->getFinder());

return $myConfig;
