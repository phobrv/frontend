#!/bin/bash
echo Enter project name:
read projectName
echo "------------Create project $projectName"
composer create-project laravel/laravel $projectName
cd $projectName
echo "------------Create upload dir for elfinder "
rm -rf storage/app/.gitignore
rm -rf storage/app/public/.gitignore
mkdir storage/app/public/photos 
mkdir storage/app/public/photos/shares
echo "------------Install brvcore and frontend"
#composer require phont/frontend  dev-main 
#composer require phobrv/brvcore  dev-main 
php artisan vendor:publish --force --tag=frontend.source
php artisan vendor:publish --force --tag=brvcore.assets
php artisan vendor:publish --force --tag=frontend.view 
echo "------------Run composer udpate"
php artisan jetstream:install livewire
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan elfinder:publish
composer update
php artisan vendor:publish --force --tag=frontend.source
npm install
npm run production
