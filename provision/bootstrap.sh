#!/bin/bash

# Update system
sudo apt-get update -y
sudo apt-get upgrade -y

# Clean /var/www
sudo rm -Rf /var/www/*

# Nginx setup
sudo apt-get -y install nginx
echo "Nginx installed"

# Copy project files
sudo mkdir /var/www/my.polygon
sudo cp -R /home/vagrant/polygon/* /var/www/my.polygon
echo "Project files copy"

sudo apt-get install -y php7.0 php7.0-dev php7.0-cli php7.0-fpm php-mysql php7.0-curl php7.0-gd php7.0-mcrypt php7.0-readline
sudo apt-get install -y php7.0-json php7.0-opcache php7.0-bcmath php7.0-mbstring php7.0
sudo apt-get install -y php-xdebug
sudo apt-get install -y php7.0-intl php7.0-xsl php7.0-gd
echo "Php installed"

#mysql-server
export DEBIAN_FRONTEND=noninteractive
sudo -E apt-get -q -y install mysql-server
mysqladmin -u root password 1111
echo "user for MySQL created"

mysql -uroot -p1111 -e "CREATE DATABASE polygon_db DEFAULT CHARACTER SET utf8 ;"
mysql -uroot -p1111 -e "CREATE USER vagrant@localhost IDENTIFIED BY '1111';"
mysql -uroot -p1111 -e "GRANT ALL PRIVILEGES ON polygon_db.* TO 'vagrant'@'localhost';"
mysql -uroot -p1111 -e "FLUSH PRIVILEGES;"
echo "Table created"

sudo apt-get install -y php-mysql
echo "Mysql-server installed"

sudo ln -s /var/www/my.polygon/provision/nginx.conf  /etc/nginx/sites-enabled/
#sudo mysql -u vagrant -p1111 vagrant_db < /var/www/my.polygon/provision/polygon_db.sql
sudo apt-get autoremove -y
sudo service php7.0-fpm restart
sudo service nginx restart
echo "Server start"

## Composer
cd ~
curl -sS https://getcomposer.org/installer -o composer-setup.php
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
echo "Composer installed"