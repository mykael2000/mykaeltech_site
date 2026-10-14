/**
 * ============ MykaelTech Professional JavaScript ============
 * Interactive features for the professional redesign
 */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';
    
    // ---------- Mobile Menu ----------
    initMobileMenu();
    
    // ---------- Back to Top ----------
    initBackToTop();
    
    // ---------- Animated Counters ----------
    initCounters();
    
    // ---------- Scroll Animations ----------
    initScrollAnimations();
    
    // ---------- Accordions ----------
    initAccordions();
    
    // ---------- Form Validation ----------
    initFormValidation();
    
    // ---------- Portfolio Filters ----------
    initPortfolioFilters();
    
    // ---------- Navbar Scroll Effect ----------
    initNavbarScroll();
    
    // ---------- Lightbox ----------
    initLightbox();
    
    // ---------- Keyboard Shortcuts ----------
    initKeyboardShortcuts();
    
    // ---------- Offline Status ----------
    initOfflineStatus();
    
    // ---------- Page Transitions ----------
    initPageTransitions();
    
    // ---------- Scroll Progress ----------
    initScrollProgress();
    
    // ---------- Homepage Redesign: Typewriter ----------
    initTypewriter();
    
    // ---------- Homepage Redesign: Modals / Pop-ups ----------
    initModals();
    initDetailPopups();
    initQuotePrefill();
    
    // ---------- Homepage Redesign: Testimonial Slider ----------
    initTestimonialSlider();
    
    // ---------- Homepage Redesign: Toast & Promo Pop-up ----------
    initToast();
    initPromoPopup();
});

/**
 * Initialize mobile menu toggle
 */
function initMobileMenu() {
    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const openIcon = document.getElementById('menu-open-icon');
    const closeIcon = document.getElementById('menu-close-icon');
    
    if (menuButton && mobileMenu) {
        menuButton.addEventListener('click', function() {
            const isHidden = mobileMenu.classList.toggle('hidden');
            openIcon.classList.toggle('hidden', isHidden);
            closeIcon.classList.toggle('hidden', !isHidden);
        });
    }
}

/**
 * Initialize back to top button
 */
function initBackToTop() {
    const backToTopBtn = document.getElementById('back-to-top');
    if (!backToTopBtn) return;
    
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTopBtn.classList.add('visible');
        } else {
            backToTopBtn.classList.remove('visible');
        }
    });
    
    backToTopBtn.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}

/**
 * Initialize animated counters
 */
function initCounters() {
    const counters = document.querySelectorAll('.counter[data-target]');
    if (!counters.length) return;
    
    const animate = (element) => {
        const target = Number.parseInt(element.dataset.target || '0', 10);
        if (!Number.isFinite(target)) return;
        
        const suffix = element.dataset.suffix || '';
        const start = performance.now();
        const duration = 1500;
        const frame = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            element.textContent = Math.round(target * eased) + suffix;
            if (progress < 1) requestAnimationFrame(frame);
        };
        requestAnimationFrame(frame);
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                entry.target.classList.add('counted');
                animate(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    counters.forEach(counter => observer.observe(counter));
}
/**
 * Initialize scroll animations
 */
function initScrollAnimations() {
    const elements = document.querySelectorAll('.scroll-animate');
    if (!elements.length) return;
    
    if (!('IntersectionObserver' in window)) {
        elements.forEach(el => el.classList.add('visible'));
        return;
    }
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
    
    elements.forEach(el => observer.observe(el));
}

/**
 * Initialize accordions
 */
function initAccordions() {
    const headers = document.querySelectorAll('.accordion-header');
    if (!headers.length) return;
    
    headers.forEach(header => {
        header.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('.accordion-icon');
            
            // Close all accordions
            document.querySelectorAll('.accordion-content').forEach(c => {
                c.classList.remove('open');
            });
            document.querySelectorAll('.accordion-header').forEach(h => {
                h.querySelector('.accordion-icon')?.classList.remove('rotate-180');
            });
            
            // Toggle this one
            const isOpen = content.classList.toggle('open');
            if (isOpen && icon) icon.classList.add('rotate-180');
        });
    });
}

/**
 * Initialize form validation
 */
function initFormValidation() {
    const forms = document.querySelectorAll('[data-validate]');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            const fields = form.querySelectorAll('input, textarea, select');
            
            fields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    showFieldError(field, field.dataset.error || 'This field is required');
                } else {
                    clearFieldError(field);
                }
                
                // Email validation
                if (field.type === 'email' && field.value && !isValidEmail(field.value)) {
                    isValid = false;
                    showFieldError(field, 'Please enter a valid email address');
                }
                
                // Password match validation
                if (field.name === 'confirm_password' && form.querySelector('input[name="password"]')) {
                    const password = form.querySelector('input[name="password"]');
                    if (password.value !== field.value) {
                        isValid = false;
                        showFieldError(field, 'Passwords do not match');
                    }
                }
            });
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    });
}

function showFieldError(field, message) {
    field.classList.add('border-red-500');
    let error = field.parentElement.querySelector('.field-error');
    if (!error) {
        error = document.createElement('span');
        error.className = 'field-error text-sm text-red-500 mt-1';
        field.parentElement.appendChild(error);
    }
    error.textContent = message;
}

function clearFieldError(field) {
    field.classList.remove('border-red-500');
    const error = field.parentElement.querySelector('.field-error');
    if (error) error.remove();
}

function isValidEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}
/**
 * Initialize portfolio filters
 */
function initPortfolioFilters() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const items = document.querySelectorAll('.portfolio-item, .service-card, .team-card');
    if (!filterButtons.length || !items.length) return;
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.dataset.filter || 'all';
            
            // Update active button
            filterButtons.forEach(btn => {
                btn.classList.remove('active');
                btn.setAttribute('aria-current', 'false');
            });
            this.classList.add('active');
            this.setAttribute('aria-current', 'true');
            
            // Filter items
            items.forEach(item => {
                const category = item.dataset.category || '';
                if (filter === 'all' || category === filter) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 10);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
}

/**
 * Initialize navbar scroll effect
 */
function initNavbarScroll() {
    const navbar = document.querySelector('.navbar');
    if (!navbar) return;
    
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 50) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    });
}

/**
 * Initialize lightbox
 */
function initLightbox() {
    const triggers = document.querySelectorAll('[data-lightbox]');
    const overlay = document.querySelector('[data-lightbox-overlay]');
    if (!triggers.length || !overlay) return;
    
    triggers.forEach(trigger => {
        trigger.addEventListener('click', () => {
            const src = trigger.dataset.lightbox || trigger.dataset.src;
            if (!src) return;
            
            const img = overlay.querySelector('img');
            if (img) img.src = src;
            
            overlay.classList.add('visible');
            document.body.style.overflow = 'hidden';
        });
    });
    
    overlay.addEventListener('click', function(e) {
        if (e.target === this || e.target.closest('[data-lightbox-close]')) {
            this.classList.remove('visible');
            document.body.style.overflow = '';
        }
    });
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && overlay.classList.contains('visible')) {
            overlay.classList.remove('visible');
            document.body.style.overflow = '';
        }
    });
}

/**
 * Initialize keyboard shortcuts
 */
function initKeyboardShortcuts() {
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + K: Focus search
        if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') {
            e.preventDefault();
            const searchBtn = document.querySelector('[data-search-btn]');
            searchBtn?.click();
        }
        
        // Escape: Close mobile menu and lightbox
        if (e.key === 'Escape') {
            const mobileMenu = document.querySelector('[data-mobile-menu]:not(.hidden)');
            if (mobileMenu) mobileMenu.classList.add('hidden');
            const lightbox = document.querySelector('[data-lightbox-overlay].visible');
            if (lightbox) lightbox.classList.remove('visible');
        }
    });
}
/**
 * Initialize offline status
 */
function initOfflineStatus() {
    if (!('connection' in navigator)) return;
    
    const status = document.createElement('div');
    status.id = 'net-status';
    status.style.cssText = 'display:none;position:fixed;bottom:16px;right:16px;z-index:9999;padding:0.75rem 1rem;border-radius:0.5rem;font-size:0.75rem;font-weight:600;background:rgba(16,185,129,0.15);border:1px solid rgba(16,185,129,0.3);color:#34d399;';
    document.body.appendChild(status);
    
    const update = () => {
        if (navigator.onLine) {
            status.style.display = 'none';
        } else {
            status.style.display = 'block';
            status.textContent = 'Offline — some features may be limited.';
        }
    };
    
    window.addEventListener('online', update);
    window.addEventListener('offline', update);
    update();
}

/**
 * Initialize page transitions
 */
function initPageTransitions() {
    const pages = document.querySelectorAll('main section');
    pages.forEach((page, index) => {
        page.style.transition = `opacity 0.3s ease, transform 0.3s ease`;
    });
}

/**
 * Initialize scroll progress
 */
function initScrollProgress() {
    const bar = document.querySelector('.progress-bar');
    if (!bar) return;
    
    const update = () => {
        const scrollTop = window.pageYOffset;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const progress = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
        bar.style.width = progress + '%';
    };
    
    window.addEventListener('scroll', update, { passive: true });
    update();
}

/**
 * ============ Homepage Redesign Features ============
 */

/**
 * Typewriter effect for hero (element #typewriter, words in data-words JSON array)
 */
function initTypewriter() {
    const el = document.getElementById('typewriter');
    if (!el) return;
    
    let words = [];
    try {
        words = JSON.parse(el.dataset.words || '[]');
    } catch (e) {
        words = [];
    }
    if (!Array.isArray(words) || !words.length) return;
    
    let wordIndex = 0;
    let charIndex = 0;
    let deleting = false;
    
    const tick = () => {
        const word = words[wordIndex];
        charIndex += deleting ? -1 : 1;
        el.textContent = word.substring(0, charIndex);
        
        let delay = deleting ? 45 : 95;
        if (!deleting && charIndex === word.length) {
            delay = 1900; // hold full word
            deleting = true;
        } else if (deleting && charIndex === 0) {
            deleting = false;
            wordIndex = (wordIndex + 1) % words.length;
            delay = 350;
        }
        setTimeout(tick, delay);
    };
    tick();
}

/**
 * Generic modal system: [data-modal-open="id"] / [data-modal-close] / overlay click / ESC
 */
function initModals() {
    const openTriggers = document.querySelectorAll('[data-modal-open]');
    const closeTriggers = document.querySelectorAll('[data-modal-close]');
    
    const openModal = (id) => {
        const modal = document.getElementById(id);
        if (!modal) return;
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        // Keep the toast from overlapping an open pop-up
        const toast = document.getElementById('site-toast');
        if (toast) toast.classList.remove('show');
        const focusable = modal.querySelector('input, textarea, select, button');
        if (focusable) setTimeout(() => focusable.focus(), 60);
    };
    
    const closeModal = (modal) => {
        if (!modal) return;
        modal.classList.add('hidden');
        // Only unlock scrolling when no other modal remains open
        if (!document.querySelector('.modal-overlay:not(.hidden)')) {
            document.body.style.overflow = '';
        }
    };
    
    openTriggers.forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            openModal(this.dataset.modalOpen);
        });
    });
    
    closeTriggers.forEach(btn => {
        btn.addEventListener('click', function () {
            closeModal(this.closest('.modal-overlay'));
        });
    });
    
    document.querySelectorAll('.modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', function (e) {
            if (e.target === this) closeModal(this);
        });
    });
    
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal-overlay:not(.hidden)').forEach(closeModal);
        }
    });
    
    // Expose for dynamic popups
    window.__openModal = openModal;
}

/**
 * Detail popups: click any [data-detail-trigger] card, fill #detail-modal from its data-* attributes.
 * Expected attrs: data-title, data-icon, data-badge, data-desc, data-features (JSON array), data-cta-label, data-cta-href
 */
function initDetailPopups() {
    const modal = document.getElementById('detail-modal');
    if (!modal) return;
    
    const parseList = (raw) => {
        try {
            const parsed = JSON.parse(raw || '[]');
            return Array.isArray(parsed) ? parsed : [];
        } catch (e) {
            return [];
        }
    };
    
    document.querySelectorAll('[data-detail-trigger]').forEach(card => {
        card.addEventListener('click', function (e) {
            // Let real links inside the card navigate normally
            if (e.target.closest('a')) return;
            
            const d = this.dataset;
            modal.querySelector('[data-field="title"]').textContent = d.title || '';
            modal.querySelector('[data-field="icon"]').textContent = d.icon || '🚀';
            modal.querySelector('[data-field="badge"]').textContent = d.badge || '';
            modal.querySelector('[data-field="desc"]').textContent = d.desc || '';
            
            const featuresEl = modal.querySelector('[data-field="features"]');
            featuresEl.innerHTML = '';
            parseList(d.features).forEach(feat => {
                const li = document.createElement('span');
                li.className = 'feature-pill';
                const ico = document.createElement('i');
                ico.className = 'fas fa-check';
                li.appendChild(ico);
                li.appendChild(document.createTextNode(' ' + feat));
                featuresEl.appendChild(li);
            });
            
            const cta = modal.querySelector('[data-field="cta"]');
            if (d.ctaHref) {
                cta.style.display = '';
                cta.href = d.ctaHref;
                cta.textContent = d.ctaLabel || 'Learn more';
            } else {
                cta.style.display = 'none';
            }
            
            if (window.__openModal) window.__openModal('detail-modal');
        });
    });
}

/**
 * Quote modal prefill: [data-quote-service] buttons set the service select before opening.
 */
function initQuotePrefill() {
    const select = document.getElementById('quote-service');
    if (!select) return;
    
    document.querySelectorAll('[data-quote-service]').forEach(btn => {
        btn.addEventListener('click', function () {
            const value = this.dataset.quoteService;
            const match = Array.from(select.options).find(o => o.value === value);
            if (match) select.value = value;
        });
    });
}

/**
 * Testimonial slider: #tst-slider with .tst-track > .tst-slide, dots generated dynamically.
 */
function initTestimonialSlider() {
    const root = document.getElementById('tst-slider');
    if (!root) return;
    
    const track = root.querySelector('.tst-track');
    const slides = root.querySelectorAll('.tst-slide');
    const prevBtn = root.querySelector('.tst-prev');
    const nextBtn = root.querySelector('.tst-next');
    const dotsWrap = document.querySelector('.tst-dots');
    if (!track || slides.length === 0) return;
    
    let index = 0;
    let timer = null;
    
    const render = () => {
        track.style.transform = 'translateX(-' + (index * 100) + '%)';
        if (dotsWrap) {
            dotsWrap.querySelectorAll('.tst-dot').forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });
        }
    };
    
    const go = (i) => {
        index = (i + slides.length) % slides.length;
        render();
    };
    
    // Build dots
    if (dotsWrap) {
        slides.forEach((_, i) => {
            const dot = document.createElement('button');
            dot.type = 'button';
            dot.className = 'tst-dot' + (i === 0 ? ' active' : '');
            dot.setAttribute('aria-label', 'Go to testimonial ' + (i + 1));
            dot.addEventListener('click', () => { go(i); restart(); });
            dotsWrap.appendChild(dot);
        });
    }
    
    prevBtn?.addEventListener('click', () => { go(index - 1); restart(); });
    nextBtn?.addEventListener('click', () => { go(index + 1); restart(); });
    
    const restart = () => {
        clearInterval(timer);
        timer = setInterval(() => go(index + 1), 6500);
    };
    
    root.addEventListener('mouseenter', () => clearInterval(timer));
    root.addEventListener('mouseleave', restart);
    restart();
    render();
}

/**
 * Toast notification (#site-toast): slides in after a delay, dismissible.
 */
function initToast() {
    const toast = document.getElementById('site-toast');
    if (!toast) return;
    
    setTimeout(() => toast.classList.add('show'), 2600);
    
    toast.querySelector('.toast-close-x')?.addEventListener('click', () => {
        toast.classList.remove('show');
    });
    
    const cta = toast.querySelector('[data-toast-cta]');
    cta?.addEventListener('click', () => toast.classList.remove('show'));
}

/**
 * Promo pop-up (#promo-modal): shown once per session after a delay.
 */
function initPromoPopup() {
    const modal = document.getElementById('promo-modal');
    if (!modal) return;
    
    let seen = false;
    try {
        seen = sessionStorage.getItem('mt_promo_seen') === '1';
    } catch (e) {
        seen = false;
    }
    if (seen) return;
    
    const markSeen = () => {
        try {
            sessionStorage.setItem('mt_promo_seen', '1');
        } catch (e) { /* private mode */ }
    };
    
    setTimeout(() => {
        // Don't interrupt if another modal is already open
        if (document.querySelector('.modal-overlay:not(.hidden)')) return;
        if (window.__openModal) window.__openModal('promo-modal');
        markSeen();
    }, 5200);
    
    modal.querySelectorAll('[data-modal-close]').forEach(btn => {
        btn.addEventListener('click', markSeen);
    });
    modal.addEventListener('click', (e) => {
        if (e.target === modal) markSeen();
    });
}
