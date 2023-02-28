#!/bin/bash
echo Enter project name:
read projectName
echo "------------Create project $projectName"
composer create-project laravel/laravel:^9 $projectName
cd $projectName
echo "------------Create upload dir for elfinder "
rm -rf storage/app/.gitignore
rm -rf storage/app/public/.gitignore
mkdir storage/app/public/photos
mkdir storage/app/public/photos/shares
echo "------------Install brvcore and frontend"
composer require phobrv/brvcore  dev-main
composer require phont/frontend  dev-main
composer require barryvdh/laravel-debugbar --dev   
echo "------------Run composer udpate"
php artisan jetstream:install livewire
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan elfinder:publish
php artisan vendor:publish --force --tag=frontend.source
php artisan vendor:publish --force --tag=brvcore.assets
php artisan vendor:publish --force --tag=frontend.view
composer update
npm install
npm run production
