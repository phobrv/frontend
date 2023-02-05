# Frontend package note

### Step1: Replace the file from exam folder

```
composer.json with the file composer.json.exam
composer update
```

### Step2: Jetstream install and build your NPM dependencies

```
php artisan jetstream:install livewire

php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```

### Step3 elFinder Package for Laravel

```
php artisan elfinder:publish
```

### Step4 Publish access

```
php artisan vendor:publish --force --tag=frontend.source
php artisan vendor:publish --force --tag=brvcore.assets

frontend.source
```

### Step5: Run

```
npm install
npm run build
```
