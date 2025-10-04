FROM php:8.2-apache
RUN apt-get update && apt-get install -y libpq-dev curl unzip
RUN docker-php-ext-install session
COPY . /var/www/html
RUN mkdir /var/www/html/controller/imagenes && \
    chmod 777 -R /var/www/html/controller/imagenes
RUN a2enmod rewrite
RUN service apache2 restart
EXPOSE 80
CMD ["apache2-foreground"]