// MykaelTech interactive layer
import Alpine from 'alpinejs'

window.Alpine = Alpine

// ---------- Counter animation ----------
function animateCounters() {
    document.querySelectorAll('[data-counter]').forEach(el => {
        const target = parseInt(el.getAttribute('data-counter'), 10)
        const duration = 2000
        const start = performance.now()
        function tick(now) {
            const elapsed = now - start
            const progress = Math.min(elapsed / duration, 1)
            const eased = 1 - Math.pow(1 - progress, 3)
            el.textContent = Math.round(target * eased).toLocaleString()
            if (progress < 1) requestAnimationFrame(tick)
        }
        requestAnimationFrame(tick)
    })
}

// ---------- Scroll reveal ----------
function revealOnScroll() {
    const elements = document.querySelectorAll('[data-reveal]')

    if (!('IntersectionObserver' in window)) {
        return
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1'
                entry.target.style.transform = 'translateY(0)'
                observer.unobserve(entry.target)
            }
        })
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' })

    elements.forEach(element => {
        element.style.opacity = '0'
        element.style.transform = 'translateY(16px)'
        element.style.transition = 'opacity 0.6s ease, transform 0.6s ease'
        observer.observe(element)
    })
}

// ---------- Mobile menu ----------
function initMobileMenu() {
    const toggler = document.querySelector('[data-mobile-menu-toggle]')
    const menu = document.querySelector('[data-mobile-menu]')
    if (!toggler || !menu) return

    toggler.addEventListener('click', () => {
        const open = menu.classList.toggle('hidden')
        toggler.setAttribute('aria-expanded', open ? 'false' : 'true')
    })

    document.addEventListener('click', (e) => {
        if (!menu.contains(e.target) && !toggler.contains(e.target)) {
            menu.classList.add('hidden')
            toggler.setAttribute('aria-expanded', 'false')
        }
    })
}

// ---------- Lightbox for portfolio ----------
function initLightbox() {
    const trigger = document.querySelector('[data-lightbox]')
    const overlay = document.querySelector('[data-lightbox-overlay]')
    if (!trigger || !overlay) return

    trigger.addEventListener('click', () => {
        const src = trigger.getAttribute('data-lightbox') || trigger.getAttribute('src')
        const img = overlay.querySelector('img')
        if (img) img.setAttribute('src', src)
        overlay.classList.remove('hidden')
        document.body.style.overflow = 'hidden'
    })

    overlay.addEventListener('click', (e) => {
        if (e.target === overlay || e.target.closest('[data-lightbox-close]')) {
            overlay.classList.add('hidden')
            document.body.style.overflow = ''
        }
    })

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !overlay.classList.contains('hidden')) {
            overlay.classList.add('hidden')
            document.body.style.overflow = ''
        }
    })
}

// ---------- Smooth hover sound-less interaction ----------
function initHoverEffects() {
    // Parallax-like tilt effect on cards
    document.querySelectorAll('.card-hover').forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect()
            const x = (e.clientX - rect.left) / rect.width - 0.5
            const y = (e.clientY - rect.top) / rect.height - 0.5
            card.style.transform = `perspective(800px) rotateY(${x * -4}deg) rotateX(${y * 4}deg) translateY(-4px)`
        })
        card.addEventListener('mouseleave', () => {
            card.style.transform = ''
        })
    })
}

// ---------- Page transition & scroll progress ----------
function initPageTransitions() {
    document.body.classList.add('page-enter')
    setTimeout(() => document.body.classList.remove('page-enter'), 400)
}
initPageTransitions()

// Scroll progress bar
function initScrollProgress() {
    const bar = document.createElement('div')
    bar.className = 'scroll-progress'
    document.body.appendChild(bar)
    window.addEventListener('scroll', () => {
        const scrollTop = window.scrollY
        const docHeight = document.documentElement.scrollHeight - window.innerHeight
        bar.style.width = docHeight > 0 ? (scrollTop / docHeight * 100) + '%' : '0%'
    }, { passive: true })
}
initScrollProgress()

// ---------- Keyboard shortcuts and theme ----------
function initKeyboardShortcuts() {
    document.addEventListener('keydown', (event) => {
        if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 'k') {
            event.preventDefault()
            document.querySelector('[data-search-btn]')?.click()
        }

        if (event.key === 'Escape') {
            document.querySelector('[data-mobile-menu]:not(.hidden)')?.classList.add('hidden')
        }
    })
}

function initTheme() {
    try {
        const savedTheme = localStorage.getItem('theme')
        if (savedTheme === 'light') document.documentElement.classList.add('light')
        if (savedTheme === 'dark') document.documentElement.classList.remove('light')
    } catch {
        // Storage can be disabled in private browsing; the default theme is fine.
    }
}

// ---------- Counters ----------
function initCounters() {
    const elements = document.querySelectorAll('[data-counter]')
    if (!elements.length) return

    const animate = (element) => {
        const target = Number.parseInt(element.dataset.counter || '0', 10)
        if (!Number.isFinite(target)) return

        const start = performance.now()
        const duration = 1200
        const frame = (now) => {
            const progress = Math.min((now - start) / duration, 1)
            const eased = 1 - Math.pow(1 - progress, 3)
            element.textContent = Math.round(target * eased).toLocaleString()
            if (progress < 1) requestAnimationFrame(frame)
        }
        requestAnimationFrame(frame)
    }

    if (!('IntersectionObserver' in window)) {
        elements.forEach(animate)
        return
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return
            animate(entry.target)
            observer.unobserve(entry.target)
        })
    }, { threshold: 0.25 })
    elements.forEach(animate)
}

// ---------- Offline status ----------
function initOfflineStatus() {
    if (!('connection' in navigator) || !document.body) return

    const status = document.createElement('div')
    status.id = 'net-status'
    status.style.cssText = 'display:none;position:fixed;bottom:16px;right:16px;z-index:9999;padding:8px 12px;border-radius:8px;font-size:12px;font-weight:500;background:rgba(16,185,129,0.15);border:1px solid rgba(16,185,129,0.3);color:#34d399;'
    document.body.appendChild(status)

    const update = () => {
        status.style.display = navigator.onLine ? 'none' : 'block'
        status.textContent = navigator.onLine ? '' : 'Offline — some features may be limited.'
    }
    window.addEventListener('online', update)
    window.addEventListener('offline', update)
    update()
}

function initApp() {
    initTheme()
    initMobileMenu()
    revealOnScroll()
    initLightbox()
    initHoverEffects()
    initKeyboardShortcuts()
    initCounters()
    initOfflineStatus()
    initPageTransitions()
    initScrollProgress()
    Alpine.start()
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initApp, { once: true })
} else {
    initApp()
}
