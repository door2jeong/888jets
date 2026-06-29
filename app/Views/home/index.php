<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- =============================================
     HERO SECTION
     ============================================= -->
<section class="hero" id="hero" aria-label="Hero section">

    <!-- Background Video -->
    <div class="hero__bg" aria-hidden="true">
        <div class="hero__bg-overlay"></div>
        <video
            class="hero__bg-video"
            src="<?= base_url('images/main_bg_video.mp4') ?>"
            autoplay
            muted
            loop
            playsinline
            preload="auto"
        ></video>
    </div>

    <!-- Floating Particles (decorative) -->
    <div class="hero__particles" aria-hidden="true">
        <span class="particle particle--1"></span>
        <span class="particle particle--2"></span>
        <span class="particle particle--3"></span>
    </div>

    <div class="hero__container">

        <!-- Headline -->
        <h1 class="hero__headline" data-aos="fade-up" data-aos-delay="100">
            <span class="headline-line headline-line--lg">Redefining Private</span>
            <span class="headline-line headline-line--accent">Jet Services</span>
        </h1>

        <!-- Booking Form Card -->
        <div class="hero__booking-card" data-aos="fade-up" data-aos-delay="300" id="booking">
            <div class="booking-tabs">
                <button class="booking-tab active" data-tab="jet">
                    <i aria-hidden="true" class="fa-solid fa-jet-fighter-up"></i>
                    <span>Private Jet</span>
                </button>
                <button class="booking-tab" data-tab="helicopter">
                    <i aria-hidden="true" class="fa-solid fa-helicopter"></i>
                    <span>Helicopter</span>
                </button>
            </div>

            <form class="booking-form" novalidate>
                <div class="booking-form__fields">
                    <div class="form-group">
                        <label for="from-city">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 2v10l4 2"/></svg>
                            From
                        </label>
                        <input
                            type="text"
                            id="from-city"
                            name="from_city"
                            placeholder="City or airport (e.g. LAX)"
                            autocomplete="off"
                        >
                    </div>

                    <button type="button" class="swap-btn" aria-label="Swap origin and destination">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 16V4m0 0L3 8m4-4l4 4M17 8v12m0 0l4-4m-4 4l-4-4"/></svg>
                    </button>

                    <div class="form-group">
                        <label for="to-city">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            To
                        </label>
                        <input
                            type="text"
                            id="to-city"
                            name="to_city"
                            placeholder="City or airport (e.g. JFK)"
                            autocomplete="off"
                        >
                    </div>

                    <div class="form-group">
                        <label for="depart-date">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            Departure
                        </label>
                        <input
                            type="date"
                            id="depart-date"
                            name="depart_date"
                        >
                    </div>

                    <div class="form-group">
                        <label for="passengers">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            Passengers
                        </label>
                        <select id="passengers" name="passengers">
                            <option value="">Select</option>
                            <?php for ($i = 1; $i <= 19; $i++): ?>
                            <option value="<?= $i ?>"><?= $i ?> passenger<?= $i > 1 ? 's' : '' ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-book">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 2L11 13"/><path d="M22 2L15 22 11 13 2 9l20-7z"/></svg>
                    Get a Quote
                </button>
            </form>
        </div>

    </div>

    <!-- Scroll Indicator -->
    <div class="hero__scroll-indicator" aria-hidden="true">
        <span class="scroll-line"></span>
        <span class="scroll-label">SCROLL</span>
    </div>

</section>
<!-- / HERO SECTION -->

<!-- =============================================
     FEATURE SECTION — Unmatched Experiences
     ============================================= -->
<section class="feature-two" aria-labelledby="feature-two-title">
    <div class="feature-two__container">

        <!-- Section Header -->
        <div class="feature-two__header" id="feature-header">
            <span class="section-eyebrow js-word-reveal" data-reveal-color="#C9A84C">Why Choose 888Jets</span>
            <h2 class="feature-two__title js-word-reveal" id="feature-two-title">
                Unmatched Private Jet Experiences
            </h2>
            <p class="feature-two__subtitle js-word-reveal">
                We redefine luxury air travel by offering bespoke private jet experiences tailored to your unique needs.
                Whether you're flying for business, leisure, or a special occasion — 888Jets ensures unparalleled comfort at every altitude.
            </p>
        </div>

        <!-- Cards -->
        <div class="feature-two__grid">

            <div class="feature-two__item js-card-reveal">
                <div class="feature-two__item-inner">
                    <div class="feature-two__icon">
                        <img src="images/f-2-1.png" alt="Customer Service" width="56" height="56">
                    </div>
                    <h3 class="feature-two__item-title">Customer Service</h3>
                    <p class="feature-two__item-text">
                        Customer service is the foundation of our private jet experience. We understand that our clients expect nothing less than exceptional care at every touchpoint.
                    </p>
                    <span class="feature-two__item-line" aria-hidden="true"></span>
                </div>
            </div>

            <div class="feature-two__item js-card-reveal">
                <div class="feature-two__item-inner">
                    <div class="feature-two__icon">
                        <img src="images/f-2-2.png" alt="Operational Excellence" width="56" height="56">
                    </div>
                    <h3 class="feature-two__item-title">Operational Excellence</h3>
                    <p class="feature-two__item-text">
                        We have built a reputation for precision, reliability, and efficiency by meticulously optimizing every aspect of our flight operations.
                    </p>
                    <span class="feature-two__item-line" aria-hidden="true"></span>
                </div>
            </div>

            <div class="feature-two__item js-card-reveal">
                <div class="feature-two__item-inner">
                    <div class="feature-two__icon">
                        <img src="images/f-2-3.png" alt="Safety &amp; Security" width="56" height="56">
                    </div>
                    <h3 class="feature-two__item-title">Safety &amp; Security</h3>
                    <p class="feature-two__item-text">
                        We prioritize the well-being of passengers, crew, and aircraft by adhering to the most rigorous international aviation safety standards.
                    </p>
                    <span class="feature-two__item-line" aria-hidden="true"></span>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- / FEATURE SECTION -->

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // Booking Tab Switch
    document.querySelectorAll('.booking-tab').forEach(tab => {
        tab.addEventListener('click', () => {
            document.querySelectorAll('.booking-tab').forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
        });
    });

    // Swap Button
    document.querySelector('.swap-btn')?.addEventListener('click', () => {
        const from = document.getElementById('from-city');
        const to   = document.getElementById('to-city');
        [from.value, to.value] = [to.value, from.value];
    });

    // Header scroll state
    const header = document.getElementById('site-header');
    window.addEventListener('scroll', () => {
        header.classList.toggle('scrolled', window.scrollY > 60);
    }, { passive: true });
</script>

<script>
/* ----------------------------------------------------------
   GSAP Word-by-word scroll scrub reveal
   .js-word-reveal elements: words flow left→right,
   gray(0.18 opacity) → white(1.0) tied to scroll position
---------------------------------------------------------- */
window.addEventListener('load', function () {
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

    gsap.registerPlugin(ScrollTrigger);

    // Split each .js-word-reveal element into individual <span> per word
    document.querySelectorAll('.js-word-reveal').forEach(function (el) {
        const revealColor = el.dataset.revealColor || 'rgba(255,255,255,1)';
        const rawText = el.innerHTML
            .replace(/<br\s*\/?>/gi, ' ')
            .replace(/<[^>]+>/g, '');
        const words = rawText.trim().split(/\s+/);

        el.innerHTML = words
            .map(function (w) {
                return '<span class="gsap-word" data-color="' + revealColor + '" style="display:inline-block;white-space:pre;">' + w + ' </span>';
            })
            .join('');
    });

    // Set initial color for all words — semi-transparent (gray feel)
    gsap.set('.gsap-word', { color: 'rgba(255,255,255,0.18)' });

    // Collect all words in DOM order
    const allWords = gsap.utils.toArray('#feature-header .gsap-word');

    // Single scrubbed timeline
    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: '#feature-header',
            start: 'top 80%',
            end: 'bottom 30%',
            scrub: 1.2,
        }
    });

    // Animate each word to its own target color (gold or white)
    allWords.forEach(function (word, i) {
        tl.to(word, {
            color: word.dataset.color || 'rgba(255,255,255,1)',
            ease: 'none',
            duration: 0.06,
        }, i * 0.06);
    });

    // Cards: staggered slide-up from left to right on scroll enter
    const cards = gsap.utils.toArray('.js-card-reveal');

    gsap.set(cards, { opacity: 0, y: 60 });

    ScrollTrigger.create({
        trigger: '.feature-two__grid',
        start: 'top 80%',
        once: true,
        onEnter: function () {
            gsap.to(cards, {
                opacity: 1,
                y: 0,
                duration: 0.7,
                ease: 'power3.out',
                stagger: {
                    each: 0.15,
                    from: 'start',
                },
            });
        },
    });
});
</script>
<?= $this->endSection() ?>
