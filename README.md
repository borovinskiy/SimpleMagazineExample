SimpleMagazineExample
=====================

Simple Magazine Example for examen on new work. Do not use it in production!!!

System requirements
===================
apache 2
php 5.3+
doctrine2 


Installation
============

* clone repo
* remove src code from ./nbproject
* configure apache .htaccess by symfony2 configuration guide
* edit database settings in ./app/config/parameters.yml
* create database schema: goto root shop directory and execute command '$ php vendor/bin/doctrine orm:schema-tool:create' if first install or command '$ php vendor/bin/doctrine orm:schema-tool:update --force'
* if your http base url is not shop (http://example.com/shop), you must edit path into file web/bundles/prognozmagazine/js/magazine.js and set correct url into settings.url.*
* goto http://example.com/shop/app_dev.php/api/category/1
 

May be I will fixing installation process for more easy installation.


