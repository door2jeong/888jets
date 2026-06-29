# 1. 베이스 이미지 설정 (PHP 8.2 & Apache)
FROM php:8.2-apache

# 2. 필수 패키지 및 PHP 확장 모듈 설치 (git, unzip 추가 - 컴포저 사용을 위해)
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    git \
    unzip \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl mysqli pdo_mysql zip

# 3. Apache mod_rewrite 활성화 (CI4 URL 라우팅용)
RUN a2enmod rewrite

# 4. Apache 기본 접속 경로(DocumentRoot)를 CI4의 'public' 폴더로 변경
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 5. 최신 Composer 설치 (도커 이미지에서 바로 복사해오는 가장 깔끔한 방법)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 6. 작업 디렉토리 설정 및 파일 복사
WORKDIR /var/www/html
COPY . /var/www/html/

# 7. Composer 실행하여 빠진 vendor 폴더 다운로드
RUN composer install --no-dev --optimize-autoloader

RUN mkdir -p /var/www/html/writable/cache /var/www/html/writable/logs /var/www/html/writable/session
RUN chown -R www-data:www-data /var/www/html/writable
RUN chmod -R 777 /var/www/html/writable

# Apache가 실행될 때 권한 문제를 방지하기 위해 apache 설정의 사용자 확인
RUN sed -i 's/www-data/root/g' /etc/apache2/envvars
RUN sed -i 's/www-data/root/g' /etc/apache2/apache2.conf