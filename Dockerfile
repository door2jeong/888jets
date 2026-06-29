# 1. 베이스 이미지 설정 (PHP 8.2 & Apache)
FROM php:8.2-apache

# 2. CI4 실행에 필요한 필수 PHP 확장 모듈 설치
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl mysqli pdo_mysql zip

# 3. Apache mod_rewrite 활성화 (CI4 URL 라우팅용)
RUN a2enmod rewrite

# 4. Apache 기본 접속 경로(DocumentRoot)를 CI4의 'public' 폴더로 변경
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 5. 프로젝트의 모든 파일을 컨테이너 안으로 복사
COPY . /var/www/html/

# 6. CI4가 파일을 기록할 수 있도록 'writable' 폴더에 쓰기 권한 부여
RUN chown -R www-data:www-data /var/www/html/writable