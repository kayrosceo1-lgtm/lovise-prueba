/* LOVISE — Main JS */
(function() {
    'use strict';

    /* Scroll animations */
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -30px 0px' });

    document.querySelectorAll('[data-animate]').forEach(function(el) {
        observer.observe(el);
    });

    /* Header scroll effect */
    var header = document.getElementById('lovise-header');
    if (header) {
        window.addEventListener('scroll', function() {
            header.classList.toggle('scrolled', window.scrollY > 50);
        }, { passive: true });
    }

    /* Force WooCommerce gallery visible (flexslider may not init) */
    document.querySelectorAll('.woocommerce-product-gallery').forEach(function(gallery) {
        gallery.style.opacity = '1';
    });

    /* FAQ Accordions */
    document.querySelectorAll('.lovise-accordion__trigger').forEach(function(trigger) {
        trigger.addEventListener('click', function() {
            var accordion = this.parentElement;
            var wasOpen = accordion.classList.contains('is-open');
            // Close siblings in same group
            var group = accordion.parentElement;
            if (group) {
                group.querySelectorAll('.lovise-accordion.is-open').forEach(function(item) {
                    item.classList.remove('is-open');
                });
            }
            if (!wasOpen) {
                accordion.classList.add('is-open');
            }
        });
    });

    /* Mobile menu toggle */
    var toggle = document.getElementById('menu-toggle');
    var nav = document.getElementById('lovise-nav');
    if (toggle && nav) {
        toggle.addEventListener('click', function() {
            nav.classList.toggle('is-open');
            document.body.classList.toggle('menu-open');
        });
        nav.querySelectorAll('a').forEach(function(link) {
            link.addEventListener('click', function() {
                nav.classList.remove('is-open');
                document.body.classList.remove('menu-open');
            });
        });
    }
})();
