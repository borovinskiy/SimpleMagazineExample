#!/bin/bash
cd /var/www/Shop

/bin/cp -Rf /var/www/Shop/web/img/product /tmp/
rm -Rf /var/www/Shop/*
chown -R apache:apache /opt/symfony2/distr/Symfony/*
/bin/cp -Rfp /home/ars/NetBeansProjects/Shop/* /var/www/Shop/
/bin/cp -Rfp /tmp/product /var/www/Shop/web/img/
chown -R apache:apache /var/www/Shop/*


firefox http://localhost/shop/app_dev.php/api/catalog/1 &
