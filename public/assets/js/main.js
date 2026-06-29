/**
 * 888Jets — Main JavaScript
 */

'use strict';

/* -------------------------------------------------------
   Header scroll state
------------------------------------------------------- */
(function initHeader() {
    const header = document.getElementById('site-header');
    if (!header) return;

    const onScroll = () => {
        header.classList.toggle('scrolled', window.scrollY > 60);
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll(); // set initial state
})();

/* -------------------------------------------------------
   Mobile drawer navigation
------------------------------------------------------- */
(function initMobileNav() {
    const toggle   = document.getElementById('nav-toggle');
    const drawer   = document.getElementById('mobile-drawer');
    const backdrop = document.getElementById('nav-backdrop');
    if (!toggle || !drawer || !backdrop) return;

    function openDrawer() {
        toggle.setAttribute('aria-expanded', 'true');
        toggle.setAttribute('aria-label', 'Close menu');
        drawer.classList.add('is-open');
        drawer.setAttribute('aria-hidden', 'false');
        backdrop.classList.add('is-visible');
        document.body.classList.add('nav-open');
    }

    function closeDrawer() {
        toggle.setAttribute('aria-expanded', 'false');
        toggle.setAttribute('aria-label', 'Open menu');
        drawer.classList.remove('is-open');
        drawer.setAttribute('aria-hidden', 'true');
        backdrop.classList.remove('is-visible');
        document.body.classList.remove('nav-open');
    }

    toggle.addEventListener('click', () => {
        const isOpen = toggle.getAttribute('aria-expanded') === 'true';
        isOpen ? closeDrawer() : openDrawer();
    });

    backdrop.addEventListener('click', closeDrawer);

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
            closeDrawer();
            toggle.focus();
        }
    });

    // Close drawer when a mobile link is clicked (non-accordion)
    drawer.querySelectorAll('a.mobile-nav-link, a.mobile-accordion-link').forEach(link => {
        link.addEventListener('click', closeDrawer);
    });
})();

/* -------------------------------------------------------
   Mobile accordion (Aircraft → Fleet Details)
------------------------------------------------------- */
(function initMobileAccordion() {
    document.querySelectorAll('.mobile-nav-link--accordion').forEach(btn => {
        btn.addEventListener('click', () => {
            const expanded = btn.getAttribute('aria-expanded') === 'true';
            const menu = btn.closest('.has-accordion').querySelector('.mobile-accordion-menu');

            btn.setAttribute('aria-expanded', String(!expanded));
            menu.classList.toggle('is-open', !expanded);
        });
    });
})();

/* -------------------------------------------------------
   Desktop dropdown keyboard support
------------------------------------------------------- */
(function initDesktopDropdown() {
    document.querySelectorAll('.nav-item.has-dropdown').forEach(item => {
        const btn  = item.querySelector('.nav-link--dropdown');
        const menu = item.querySelector('.dropdown-menu');
        if (!btn || !menu) return;

        btn.addEventListener('click', () => {
            const expanded = btn.getAttribute('aria-expanded') === 'true';
            btn.setAttribute('aria-expanded', String(!expanded));
        });

        // Close on outside click
        document.addEventListener('click', e => {
            if (!item.contains(e.target)) {
                btn.setAttribute('aria-expanded', 'false');
            }
        });
    });
})();

/* -------------------------------------------------------
   Booking tabs
------------------------------------------------------- */
(function initBookingTabs() {
    const tabs = document.querySelectorAll('.booking-tab');
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
        });
    });
})();

/* -------------------------------------------------------
   Swap origin/destination
------------------------------------------------------- */
(function initSwapBtn() {
    const btn  = document.querySelector('.swap-btn');
    const from = document.getElementById('from-city');
    const to   = document.getElementById('to-city');
    if (!btn || !from || !to) return;

    btn.addEventListener('click', () => {
        [from.value, to.value] = [to.value, from.value];
    });
})();

/* -------------------------------------------------------
   Set minimum date for date picker to today
------------------------------------------------------- */
(function initDatePicker() {
    const dateInput = document.getElementById('depart-date');
    if (!dateInput) return;

    const today = new Date().toISOString().split('T')[0];
    dateInput.setAttribute('min', today);
    dateInput.value = today;
})();

/* -------------------------------------------------------
   Simple scroll-reveal (no external lib)
------------------------------------------------------- */
(function initScrollReveal() {
    const items = document.querySelectorAll('[data-aos]');
    if (!items.length) return;

    // Apply initial styles
    items.forEach(el => {
        const delay = parseInt(el.dataset.aosDelay || 0, 10);
        el.style.transitionDelay = delay + 'ms';
        el.style.opacity = '0';
        el.style.transform = 'translateY(24px)';
        el.style.transition = 'opacity 0.7s cubic-bezier(0.4,0,0.2,1), transform 0.7s cubic-bezier(0.4,0,0.2,1)';
    });

    const reveal = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'none';
                observer.unobserve(entry.target);
            }
        });
    };

    const observer = new IntersectionObserver(reveal, {
        threshold: 0.12,
        rootMargin: '0px 0px -40px 0px',
    });

    items.forEach(el => observer.observe(el));
})();
