FROM yiisoftware/yii-php:8.1-apache

# Change web server config
COPY docker/apache/apache.conf /etc/apache2/apache2.conf
COPY docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf

# change PHP config
COPY docker/php/php.ini /usr/local/etc/php/conf.d/base.ini

# install supervisord
RUN apt-get update && apt-get install -y --force-yes supervisor --no-install-recommends && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
COPY docker/supervisord/supervisord.conf /etc/supervisor/supervisord.conf

# copy apache2 config
COPY docker/supervisord/conf.d/apache2.conf /etc/supervisor/conf.d/apache2.conf

# copy yii-queue config
#COPY docker/supervisord/conf.d/queue.conf /etc/supervisor/conf.d/yii-queue.conf

# run supervisord
CMD ["supervisord", "-c", "/etc/supervisor/supervisord.conf"]