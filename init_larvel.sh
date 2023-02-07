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
echo "------------Frontend package"
mkdir packages
mkdir packages/phont
cd packages/phont
git clone git@github.com:phobrv/frontend.git
cp frontend/resources/exam/composer.json ../../composer.json
cd ../../
echo "------------Run composer udpate"
composer update
php artisan jetstream:install livewire
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan elfinder:publish
php artisan vendor:publish --force --tag=frontend.source
php artisan vendor:publish --force --tag=brvcore.assets
npm install
npm run production
