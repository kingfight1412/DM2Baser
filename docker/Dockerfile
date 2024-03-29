FROM php:7.1.14-apache-jessie

# install
RUN apt-get update \
    && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
        openssl libssl-dev \
        libxml2-dev \
        unzip \
        git \
        vim \
        libicu-dev \
        ssmtp \
        mailutils \
    && docker-php-ext-install -j$(nproc) iconv mcrypt pdo_mysql mbstring xml tokenizer zip intl \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
	&& apt-get clean \
	&& rm -rf /var/lib/apt/lists/*
	
# apache
RUN ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/
RUN ln -s /etc/apache2/mods-available/ssl.load /etc/apache2/mods-enabled/
RUN ln -s /etc/apache2/sites-available/default-ssl.conf /etc/apache2/sites-enabled/
COPY ssl/ssl-cert-snakeoil.key /etc/ssl/private/
COPY ssl/ssl-cert-snakeoil.pem /etc/ssl/certs/
RUN chmod 400 /etc/ssl/private/ssl-cert-snakeoil.key \
	&& chmod 400 /etc/ssl/certs/ssl-cert-snakeoil.pem
    
# php
RUN echo 'sendmail_path = "/usr/sbin/ssmtp -t"' > /usr/local/etc/php/conf.d/mail.ini \
	&& echo "memory_limit = 256M" >> /usr/local/etc/php/php.ini \
	&& yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_host=host.docker.internal" >> /usr/local/etc/php/conf.d/xdebug.ini
    
# ssmtp
RUN echo "FromLineOverride=YES" > /etc/ssmtp/ssmtp.conf \
 	&& echo "Mailhub=basercms-smtp:1025" >> /etc/ssmtp/ssmtp.conf
 	
# composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer self-update
