<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Application Error') ?> — 888Jets</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --gold:       #C9A84C;
            --gold-light: #E8C97A;
            --dark:       #111318;
            --dark-2:     #1A1D24;
            --white:      #FFFFFF;
            --white-70:   rgba(255,255,255,0.7);
            --white-10:   rgba(255,255,255,0.1);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--dark);
            color: var(--white);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            -webkit-font-smoothing: antialiased;
        }

        /* Background subtle pattern */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                radial-gradient(ellipse at 20% 50%, rgba(201,168,76,0.04) 0%, transparent 60%),
                radial-gradient(ellipse at 80% 20%, rgba(201,168,76,0.03) 0%, transparent 50%);
            pointer-events: none;
        }

        .error-wrap {
            position: relative;
            width: 100%;
            max-width: 760px;
            text-align: center;
        }

        /* Logo */
        .error-logo {
            display: inline-flex;
            align-items: baseline;
            gap: 2px;
            margin-bottom: 3rem;
            text-decoration: none;
        }

        .logo-number {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gold);
            letter-spacing: -1px;
        }

        .logo-text {
            font-size: 0.875rem;
            font-weight: 600;
            letter-spacing: 0.25em;
            color: var(--white);
        }

        /* Error code */
        .error-code {
            font-family: 'Playfair Display', serif;
            font-size: clamp(5rem, 18vw, 9rem);
            font-weight: 700;
            line-height: 1;
            background: linear-gradient(135deg, rgba(201,168,76,0.15) 0%, rgba(201,168,76,0.06) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -4px;
            margin-bottom: 1.5rem;
            user-select: none;
        }

        /* Divider */
        .error-divider {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 0 auto 2rem;
            max-width: 240px;
        }

        .error-divider::before,
        .error-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(201,168,76,0.4), transparent);
        }

        .error-divider span {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--gold);
            opacity: 0.6;
            flex-shrink: 0;
        }

        /* Title */
        .error-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.25rem, 3vw, 1.75rem);
            font-weight: 700;
            color: var(--white);
            margin-bottom: 1rem;
            letter-spacing: -0.01em;
        }

        /* Message */
        .error-message {
            font-size: 0.9375rem;
            font-weight: 300;
            line-height: 1.7;
            color: var(--white-70);
            max-width: 520px;
            margin: 0 auto 2.5rem;
        }

        /* Card (dev mode details) */
        .error-detail-card {
            background: var(--dark-2);
            border: 1px solid var(--white-10);
            border-radius: 12px;
            padding: 1.5rem;
            text-align: left;
            margin-bottom: 2.5rem;
            overflow: hidden;
        }

        .error-detail-card summary {
            font-size: 0.8125rem;
            font-weight: 500;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--gold);
            cursor: pointer;
            user-select: none;
            list-style: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .error-detail-card summary::before {
            content: '▶';
            font-size: 0.6rem;
            transition: transform 0.2s;
        }

        .error-detail-card[open] summary::before {
            transform: rotate(90deg);
        }

        .error-detail-card .trace {
            margin-top: 1rem;
            font-family: 'Courier New', monospace;
            font-size: 0.8rem;
            line-height: 1.6;
            color: rgba(255,255,255,0.5);
            white-space: pre-wrap;
            word-break: break-all;
            max-height: 320px;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: rgba(201,168,76,0.3) transparent;
        }

        .error-type {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background: rgba(201,168,76,0.1);
            border: 1px solid rgba(201,168,76,0.25);
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 500;
            color: var(--gold-light);
            letter-spacing: 0.04em;
            margin-bottom: 1rem;
        }

        /* Actions */
        .error-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.625rem 1.5rem;
            border-radius: 999px;
            font-size: 0.875rem;
            font-weight: 500;
            letter-spacing: 0.04em;
            text-decoration: none;
            transition: all 0.2s ease;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--gold), #9E7A28);
            color: #0A0A0A;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--gold-light), var(--gold));
            transform: translateY(-1px);
        }

        .btn-ghost {
            border: 1px solid var(--white-10);
            color: var(--white-70);
            background: transparent;
        }

        .btn-ghost:hover {
            border-color: rgba(201,168,76,0.4);
            color: var(--white);
        }
    </style>
</head>
<body>

<div class="error-wrap">

    <a href="/" class="error-logo">
        <span class="logo-number">888</span><span class="logo-text">JETS</span>
    </a>

    <div class="error-code"><?= esc($code ?? 500) ?></div>

    <div class="error-divider"><span></span></div>

    <?php if (!empty($title)): ?>
    <span class="error-type"><?= esc($title) ?></span>
    <?php endif; ?>

    <h1 class="error-title">Something went wrong</h1>

    <p class="error-message">
        <?= esc($message ?? 'An unexpected error has occurred. Please try again or contact our support team.') ?>
    </p>

    <?php if (ENVIRONMENT !== 'production' && (!empty($trace) || !empty($exception))): ?>
    <details class="error-detail-card">
        <summary>Stack Trace</summary>
        <div class="trace"><?= esc($trace ?? '') ?></div>
    </details>
    <?php endif; ?>

    <div class="error-actions">
        <a href="/" class="btn btn-primary">Return to Homepage</a>
        <a href="javascript:history.back()" class="btn btn-ghost">Go Back</a>
    </div>

</div>

</body>
</html>
