## Installation

```sh
composer install
```

```sh
cp .env.example .env
```

```sh
php artisan key:generate
```

```sh
chmod -R 775 -R .scripts storage bootstrap/cache
```

### Npm

```sh
npm install && npm run build
```

### Runing using PHP Serve

```sh
php artisan migrate
```

```sh
php artisan serve
```

### Running PHP Coding style

```sh
composer run-script php-fixer
```
