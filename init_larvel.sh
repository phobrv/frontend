#!/bin/bash
echo Enter project name:
read projectName
composer create-project laravel/laravel $projectName
cd $projectName
mkdir packages
cd packages
mkdir phont
cd phont
git clone git@github.com:phobrv/frontend.git
cp frontend/resources/exam/composer.json ../../composer.json
cd ../../
echo "$PWD"
composer update
php artisan jetstream:install livewire
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan elfinder:publish
php artisan vendor:publish --force --tag=frontend.source
php artisan vendor:publish --force --tag=brvcore.assets
npm install
npm run production
npm run build


