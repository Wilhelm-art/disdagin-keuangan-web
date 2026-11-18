FROM richarvey/nginx-php-fpm:3.1.6

# Copy application files
COPY . .

# Image configuration for Laravel
ENV SKIP_COMPOSER 0
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Send Laravel logs to stderr for Render's log viewer
ENV LOG_CHANNEL stderr

EXPOSE 80
