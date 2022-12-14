FROM php:8.1-apache

RUN apt-get update

RUN docker-php-ext-install pdo pdo_mysql

RUN yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.mode = debug" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.client_host = host.docker.internal" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.start_with_request = yes"  >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enna = 1"  >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.client_port = 9003"  >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.client_discovery_header = yes" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.idekey = PHPSTORM" >> /usr/local/etc/php/conf.d/xdebug.ini

RUN apt-get install -y curl
RUN apt-get install -y git
RUN apt-get install -y unzip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN php -r "unlink('composer-setup.php');"

RUN apt -y install curl dirmngr apt-transport-https lsb-release ca-certificates
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -

RUN apt -y install nodejs

RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list

RUN apt-get update && apt install -y yarn

COPY ./virtualhost.conf /etc/apache2/sites-available/
COPY ./php.ini /usr/local/lib/
COPY ./php.ini /usr/local/etc/php/

RUN a2dissite 000-default.conf; \
    a2enmod headers; \
    a2enmod rewrite; \
    a2ensite virtualhost.conf; \
    service apache2 restart;
