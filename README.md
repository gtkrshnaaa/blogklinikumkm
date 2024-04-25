# Installation

Clone repository
```bash
$ git clone https://github.com/gtkrshnaaa/blogklinikumkm.git
```
Masuk ke direktori blogklinikumkm
```bash
$ cd blogklinikumkm
```
Kemudian ikuti command command dibawah ini
```bash
$ composer install
```

```bash
$ cp .env.example .env
```

Sesuaikan isi file .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=


FILESYSTEM_DISK=public
```

```bash
$ php artisan key:generate
```

```bash
$ php artisan migrate:fresh
```

```bash
$ php artisan storage:link
```


Jalankan aplikasi dengan command ini
```bash
$ php artisan serve
```


# Url Penting

Halaman Home

```bash
http://127.0.0.1:8000
```

Halaman login admin 
```bash
http://127.0.0.1:8000/admin/login

email       : admin@example.com
password    : password
```

Halaman login author
```bash
http://127.0.0.1:8000/author/login

account author bisa dibuat oleh admin, jadi buat dulu akunya sebelum login
```