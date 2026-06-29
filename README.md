# 888Jets — B2C Website

CodeIgniter 4 기반 프라이빗 제트 전세 B2C 사이트입니다.

## 요구사항

| 도구 | 최소 버전 |
|------|----------|
| PHP  | 8.1+     |
| Composer | 2.x |
| MySQL (선택) | 8.0+ |

## 초기 설치

```bash
# 1. 의존성 설치
composer install

# 2. 환경파일 설정
cp env .env
# .env 에서 app.baseURL, DB 정보 등을 수정하세요

# 3. writable 디렉토리 권한 (Linux/Mac)
chmod -R 777 writable/
```

## 로컬 개발 서버 실행 (포트 3030)

```bash
php spark serve --host localhost --port 3030
```

브라우저에서 [http://localhost:3030](http://localhost:3030) 접속

## 디렉토리 구조

```
888jets/
├── app/
│   ├── Config/
│   │   ├── App.php          # 앱 설정 (baseURL 등)
│   │   ├── Database.php     # DB 설정
│   │   ├── Paths.php        # 경로 설정
│   │   └── Routes.php       # URL 라우팅
│   ├── Controllers/
│   │   ├── BaseController.php
│   │   └── Home.php         # 메인 페이지 컨트롤러
│   └── Views/
│       ├── layouts/
│       │   └── main.php     # 공통 레이아웃 (헤더/푸터)
│       └── home/
│           └── index.php    # 메인 페이지 (히어로 섹션)
├── public/
│   ├── index.php            # 웹 진입점
│   ├── .htaccess
│   └── assets/
│       ├── css/main.css     # 전체 스타일
│       └── js/main.js       # 인터랙션 스크립트
├── writable/                # 캐시/로그/세션
├── composer.json
├── env                      # 환경변수 템플릿
└── spark                    # CI4 CLI
```

## 주요 페이지

| URL | 설명 |
|-----|------|
| `/` | 메인 페이지 (히어로 섹션) |

## 개발 가이드

### 새 페이지 추가

1. `app/Controllers/` 에 컨트롤러 추가
2. `app/Views/` 에 뷰 추가
3. `app/Config/Routes.php` 에 라우트 등록

### CSS 토큰

`public/assets/css/main.css` 최상단 `:root` 에서 디자인 토큰(색상, 타이포, 간격) 관리

- `--color-gold` : 골드 포인트 컬러 `#C9A84C`
- `--font-serif` : 헤드라인 폰트 (Playfair Display)
- `--font-sans`  : 본문 폰트 (Noto Sans KR)
