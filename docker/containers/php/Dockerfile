FROM phpdockerio/php74-fpm

RUN mkdir -p /var/run/mysqld
RUN mkdir -p /run/php

ARG APP_ENV='prod'
ARG APP_ENV=${APP_ENV}
ENV APP_ENV ${APP_ENV}

ARG PROJECT_PREFIX='web'
ARG PROJECT_PREFIX=${PROJECT_PREFIX}
ENV PROJECT_PREFIX=${PROJECT_PREFIX}


RUN apt-get update \
    && apt-get -y --no-install-recommends install \
    php7.4-mysql `test ${APP_ENV} '=' 'test' &&  echo "php-xdebug" || echo ""` \
    php7.4-intl \
    php7.4-interbase \
    php7.4-gd \
    php7.4-imagick \
    git \
    msmtp \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*


ADD ./conf/php.ini /etc/php/7.4/fpm/php.ini
ADD ./conf/php.ini /etc/php/7.4/cli/php.ini
ADD ./conf/www.conf /etc/php/7.4/fpm/pool.d/www.conf
RUN sed -i -e "s/www-data:x:33:33:www-data:\/var\/www:\/usr\/sbin\/nologin/www-data:x:1000:1000:www-data:\/var\/www\/html:\/bin\/bash/g" /etc/passwd
RUN sed -i -e "s/www-data:x:33:/www-data:x:1000:/g" /etc/group

RUN cd /bin && curl --silent --show-error https://getcomposer.org/download/1.10.20/composer.phar > /usr/bin/composer && chmod 777 /usr/bin/composer
WORKDIR /var/www/html

EXPOSE 9000
