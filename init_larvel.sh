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
composer require phobrv/frontend 
composer require phobrv/brvcore
php artisan vendor:publish --force --tag=frontend.source
echo "------------Run composer udpate"
composer update
php artisan jetstream:install livewire
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan elfinder:publish

php artisan vendor:publish --force --tag=brvcore.assets
npm install
npm run production
