FROM php:8.2-apache

# Install dependencies for PHPMailer and Composer
RUN apt-get update && apt-get install -y unzip git curl

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./web_portfolio /var/www/html

RUN composer install --working-dir=/var/www/html

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
CMD ["apache2-foreground"]
