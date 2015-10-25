PHP App framework demo project
============

Demo of the simple application based on `PHP App micro framework <https://github.com/StraNNiKK/app-framework>`_ .

To setup it please follow this steps:

* git clone of the current project
* execute sh command into the project directory to get all dependencies using composer:
.. code-block:: bash

  composer install
* create MySQL datatbase and execute all SQL scripts from the `/sql/mysql <https://github.com/StraNNiKK/app-framework-demo/tree/master/sql/mysql>`_ directory
* edit `/application/configs/application.php <https://github.com/StraNNiKK/app-framework-demo/blob/master/application/configs/application.php>`_ settings script according your own settings
* give write permitions on derectories: `/data <https://github.com/StraNNiKK/app-framework-demo/tree/master/data>`_ and `/public/cache <https://github.com/StraNNiKK/app-framework-demo/tree/master/public/cache>`
* if you are using PHP 5.4.x or higher you could run default PHP server in **/public** directory:
.. code-block:: bash

  php -S 0.0.0.0:8000 router.php
