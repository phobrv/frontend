# Frontend package note

### Step1: Replace the file

```
composer.json with the file composer.json.exam
.env with the file .env.exam
webpack.mix.js with the file webpack.mix.js.exam
package.json with the file package.json.exam

```

Run

```
npm install
npm run watch
```

### Step2: Run composer update

### Step3 Publish brvcore access

```
php artisan vendor:publish --force
Choose tag: brvcore.assets
```

### Step5: Jetstream install and build your NPM dependencies

```
php artisan jetstream:install livewire
npm install
npm run build
```
