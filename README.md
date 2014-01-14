Welcome to PIMF Blog bundle using MySQL
=======================================
This Blog is a run ready bundle, which uses PIMF framework including a blog application based on MySQL database.
The session will stored at SQLite database. Here you can learn how to work with Pimf\EntityManager, Pimf\Util\Validator
and Pimf\View.

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
  git submodule foreach git pull origin master
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

5.) Initialize PIMF and follow the instructions

```cli
  php pimf core:init
```

6.) Next, you will need to create a blog database and table. Please execute this at you MySQL.

```sql
  CREATE DATABASE IF NOT EXISTS db_blog;

  CREATE TABLE IF NOT EXISTS blog (
    `id` INTEGER(10) PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(50) NOT NULL,
    `content` TEXT NOT NULL
  ) ENGINE=InnoDB;
```

7.) Let PIMF generate the sqlite session table for you!

```cli
  php pimf core:create_session_table
```

8.) Finally create one or more test entries at your blog.

```cli
  php pimf blog:insert
```

Navigate to your application in a web browser. If all is well, you should see a pretty PIMF splash page.
Get ready - there is lot more to learn!

Learning PIMF
-------------
One of the best ways to learn PIMF is to read through the entirety of its documentation. This guide details all
aspects of the framework and how to apply them to your application.

Please read here: https://github.com/gjerokrsteski/pimf/wiki

