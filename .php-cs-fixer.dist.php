<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/bootstrap/app.php';

return (new Jubeki\LaravelCodeStyle\Config())
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->notName('*.blade.php')
            ->in(app_path())
            ->in(config_path())
            ->in(database_path('factories'))
            ->in(database_path('migrations'))
            ->in(database_path('seeders'))
            ->in(lang_path())
            ->in(base_path('packages/brunocfalcao/*'))
            ->in(base_path('packages/eduka/*'))
            ->in(base_path('routes'))
    )
    ->setRules([
        // Here you can adjust the rules as much as needed
    ]);
