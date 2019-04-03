# notapad
Simple note taking app to show off - Symfony 4 + Vue.js

## Installation

### What you will need
- Apache Server (or nginx, or whatever)
- a running PHP7.2 (or higher) environment both with CLI and server (mod, fpm)
- MySQL / MariaDB 5.5 or higher
- Composer : https://getcomposer.org/
- PHP modules : Well, I haven't made a complete list, but I am fairly certain it will work if you run (on Ubuntu)
```
sudo apt install php7.2-common php7.2-xml php7.2-curl php7.2-mbstring php7.2-json php7.2-mysql
```

### How

After cloning the repo, make DocumentRoot point towards "public" folder (and obviously make sure web server has permissions). Then, install the dependencies with composer.

```
cd notapad
composer install
```

Edit .env and set MySQL credentials (wait, what? this one is versionned?...)
```
vim .env
```

Now run the database migrations, and voilà!
```
php bin/console doctrine:migrations:migrate
```
