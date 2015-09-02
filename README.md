PHPDefaultProject
=================

This project is a base structure for any other web system.

In near future it will use bootstrap for admin too.

I have created a lot of projects using it. Since hotsites, intranet systems, websites, portals, ecommerces and more.

You can see some projects on my blog: http://blog.prsolucoes.com.

You website is: http://www.prsolucoes.com.

My skype: paulo.prsolucoes.

Some features
=================

- Frontend with bootstrap last version
- Last jQuery 1.X included
- Debug and Config files ready for multi-environment
- Powerfull admin area
- Own ACL implementation
- Admin area with user management, dynamic content management, reports, profile, groups, permissions and ACL ready, CSS for print, CSS for grid
- Frontend with customer login, customer register, customer recovery password
- Extensions to send e-mail with layout support
- Some ready rules
- Configuration for real applications
- Português/Brasil already configured 


Installation
=================

1 - git clone ....

2 - Generate config file: "cp protected/config/config.template.php protected/config/config.php"

3 - Generate debug file: "cp protected/config/debug.template.php protected/config/debug.php"

4 - Edit file "protected/config/config.php" and change database connection array (connectionString, username, password).

5 - cd protected/bash

6 - sh create-contents.sh

7 - sh clear-contents.sh

8 - cd ..

7 - ./yiic migrate

8 - Open: http://localhost/PHPDefaultProject for Frontend and http://localhost/PHPDefaultProject/admin for the Admin area

** The default login for admin is: admin / teste

** The config.php and debug.php files re not commited, it let you have in production environment your own config and debug files and make pull from repository without modify your config and debug files.

** In production change in file protected/config/debug.php "define('YII_DEBUG', true)" to "define('YII_DEBUG', false)"

Contributors
=================
@oakideas - Fabio Silva
