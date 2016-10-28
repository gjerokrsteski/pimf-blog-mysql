Welcome to PIMF Blog bundle using MySQL
=======================================
This Blog is a run ready bundle, which uses PIMF framework including a blog application based on MySQL database.
The session will be stored at SQLite database. Here you can learn how to work with Pimf\EntityManager, Pimf\Util\Validator
and Pimf\View.

System Requirements
-------------------
This bundle has system requirements to PHP's extensions: "PDO", "pdo_mysql" and "pdo_sqlite". The extentions
have to be compiled within your PHP. Please check by executing **php -m** on you command interface - and
take a look for them. If they are there than everything will be fine - otherwise please navigate
to http://www.php.net/manual/pdo.setup.php and find out how to recompile them to your PHP version.

Installation & Configuration
----------------------------

1.) Clone the repository

```cli
  git clone --recursive https://github.com/gjerokrsteski/pimf-blog-mysql.git
```

2.) Change to the root directory

```cli
  cd pimf-blog-mysql/
```

3.) Update all submodules

```cli
  git submodule --quiet sync
  git submodule --quiet update --force --init --recursive
```

4.) Please configure your database connection at **app/MyFirstBlog/config.app.php** according to you system needs.

```php
  /*
  |------------------------------------------------------------------------
  | Production environment settings
  |------------------------------------------------------------------------
  */
  'production' => array(
    'db' => array(
      'driver' => 'mysql',
      'host' => 'localhost',
      'database' => 'db_blog',
      'username' => 'root',
      'password' => '',
    ),
  ),
```

5.) Create a blog database and table. Please execute this at you MySQL.

```sql
  CREATE DATABASE IF NOT EXISTS db_blog;

  USE db_blog;

  CREATE TABLE IF NOT EXISTS blog (
    `id` INTEGER(10) PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(50) NOT NULL,
    `content` TEXT NOT NULL
  ) ENGINE=InnoDB;
```

6.) Initialize PIMF and follow the instructions

```cli
  php pimf core:init
```

7.) Let PIMF generate the **sqlite** session table for you!

```cli
  php pimf core:createSessionTable
```

8.) Finally create one or more test entries at your blog.

```cli
  php pimf blog:insert
```

9.) Navigate to your application in a web browser. If all is well, you should see a pretty PIMF splash page. Get ready - there is lot more to learn!
    
Alternatively you can run the PHP's built-in web server that is provided since PHP 5.4.0
   
```php   
   php -S localhost:8000
```

Please notice: this web server was designed to aid application development. It may also be useful for testing purposes or for 
application demonstrations that are run in controlled environments. It is not intended to be a full-featured web server. 
It should not be used on a public network.

Learning PIMF
-------------
One of the best ways to learn PIMF is to read through the entirety of its documentation. This guide details all aspects of the framework and how to apply them to your application. https://github.com/gjerokrsteski/pimf/wiki

Read the PIMF book almost anywhere. Available as a PDF, EPUB and MOBI. You can now read it on all devices, as well as offline: https://leanpub.com/pimf-starter/

