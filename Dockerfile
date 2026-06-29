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

# 7. Composer 설치 및 실행
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# 8. 핵심: www-data 사용자가 웹 파일들을 완벽하게 제어하도록 권한 부여
# writable 폴더뿐만 아니라 전체 프로젝트 파일의 소유권을 www-data로 변경
RUN chown -R www-data:www-data /var/www/html
RUN find /var/www/html -type d -exec chmod 755 {} \;
RUN find /var/www/html -type f -exec chmod 644 {} \;

# writable 폴더는 쓰기/수정이 빈번하므로 775 권한 부여
RUN chmod -R 775 /var/www/html/writable

# (주의: 이 아래에 있던 sed 명령어들은 모두 삭제하세요!)

# Apache는 자동으로 www-data 계정으로 실행됩니다.