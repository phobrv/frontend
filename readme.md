# Frontend package note

### Step1: Replace the file from exam folder

```
composer.json with the file composer.json.exam
.env with the file .env.exam
webpack.mix.js with the file webpack.mix.js.exam
package.json with the file package.json.exam
User.php with the file User.php.exam


```

```
copy en.json and vi.json to lang folder
```

### Step2 Publish access

```
php artisan vendor:publish --force
Choose tag:
brvcore.assets
frontend.assets
```

### Step3: Jetstream install and build your NPM dependencies

```
php artisan jetstream:install livewire

```

```
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```

Add the necessary trait to your User model:

```
use Spatie\Permission\Traits\HasRoles;

use HasRoles;
```

### Step4 elFinder Package for Laravel

```
php artisan elfinder:publish
php artisan vendor:publish --provider='Barryvdh\Elfinder\ElfinderServiceProvider' --tag=config
change elfinder.php with the file exam/elfinder.php
```

### Step5: Run

```
composer update
```

```
npm install
npm run build
```
