# SETUP GUIDE

### PHP version

```sh
"php": "^8.2",
"laravel/framework": "^11.31"
```

### Required php-extentions

```sh
apt install php8.2
```

php.ini
```
extension=pdo_mysql
```

### MySQL

add UTC timezone in my.ini
```sh
[mysqld]
default-time-zone = '+00:00'
```
