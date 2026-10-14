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
