/* =====================================================================
   MykaelTech — interactive layer (Alpine.js + Lucide)
   ===================================================================== */
import Alpine from 'alpinejs'
import {
    ArrowLeft, ArrowRight, ArrowUpRight, BarChart3, Bell, CalendarDays,
    Check, ChevronDown, ChevronLeft, ChevronRight, CircleDollarSign,
    Cookie, Cpu, ExternalLink, Gift, Github, Globe2, Layers3, LayoutDashboard,
    Lightbulb, LogOut, MapPin, Menu, Monitor, Palette, Quote, Rocket,
    Search, SearchX, Send, Settings, ShieldCheck, Smartphone, Sparkles,
    Star, TrendingUp, User, Users, X, Zap, createIcons,
} from 'lucide'

const iconSet = {
    ArrowLeft, ArrowRight, ArrowUpRight, BarChart3, Bell, CalendarDays,
    Check, ChevronDown, ChevronLeft, ChevronRight, CircleDollarSign,
    Cookie, Cpu, ExternalLink, Gift, Github, Globe2, Layers3, LayoutDashboard,
    Lightbulb, LogOut, MapPin, Menu, Monitor, Palette, Quote, Rocket,
    Search, SearchX, Send, Settings, ShieldCheck, Smartphone, Sparkles,
    Star, TrendingUp, User, Users, X, Zap,
}

window.Alpine = Alpine

function initializeIcons(root = document) {
    createIcons({ icons: iconSet, attrs: { 'stroke-width': 2 }, nameAttr: 'data-lucide', root })
}

const esc = (s) => String(s ?? '').replace(/[&<>"']/g, (c) => (
    { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' }[c]
))

/* ---------- Alpine components ---------- */

Alpine.data('typewriter', (phrases = []) => ({
    phrases, text: '', i: 0, deleting: false,
    start() {
        if (!this.phrases.length) return
        const tick = () => {
            const full = this.phrases[this.i % this.phrases.length]
            if (!this.deleting) {
                this.text = full.slice(0, this.text.length + 1)
                if (this.text === full) { this.deleting = true; return setTimeout(tick, 1600) }
            } else {
                this.text = full.slice(0, this.text.length - 1)
                if (this.text === '') { this.deleting = false; this.i += 1; return setTimeout(tick, 350) }
            }
            setTimeout(tick, this.deleting ? 45 : 85)
        }
        tick()
    },
}))

Alpine.data('cookieConsent', () => ({
    visible: false,
    KEY: 'mt_cookie_consent',
    init() {
        let stored = null
        try { stored = localStorage.getItem(this.KEY) } catch (e) { stored = null }
        if (!stored) setTimeout(() => { this.visible = true }, 1200)
    },
    accept() { this.decide('accepted') },
    decline() { this.decide('declined') },
    decide(value) {
        try { localStorage.setItem(this.KEY, value) } catch (e) { /* private mode */ }
        this.visible = false
    },
}))

Alpine.store('ui', {
    open: false,
    kind: null,
    record: null,
    openRecord(kind, record) { this.open = true; this.kind = kind; this.record = record },
    close() { this.open = false; this.record = null; this.kind = null },
})

function toast(message, type = 'info') {
    const el = document.createElement('div')
    el.className = `toast toast-${type}`
    el.innerHTML = `
        <div class="toast-ico"><i data-lucide="${type === 'success' ? 'check' : type === 'error' ? 'x' : 'info'}"></i></div>
        <div class="toast-msg"><p class="text-sm font-semibold text-white">MykaelTech</p><p class="text-xs text-slate-400">${esc(message)}</p></div>
        <button class="toast-close-x" aria-label="Dismiss"><i data-lucide="x"></i></button>`
    document.body.appendChild(el)
    initializeIcons(el)
    requestAnimationFrame(() => el.classList.add('show'))
    const remove = () => { el.classList.remove('show'); setTimeout(() => el.remove(), 350) }
    el.querySelector('.toast-close-x')?.addEventListener('click', remove)
    setTimeout(remove, 5000)
}
window.toast = toast

function testimonialSlider(data = []) {
    return {
        testimonials: data, current: 0, auto: null,
        init() { if (this.testimonials.length) this.auto = setInterval(() => this.next(), 6000) },
        destroyed() { clearInterval(this.auto) },
        next() { this.current = (this.current + 1) % this.testimonials.length },
        prev() { this.current = (this.current - 1 + this.testimonials.length) % this.testimonials.length },
    }
}
window.testimonialSlider = testimonialSlider


/* ---------- DOM behaviours ---------- */

function revealOnScroll() {
    const els = document.querySelectorAll('[data-reveal]')
    if (!els.length) return
    if (!('IntersectionObserver' in window)) { els.forEach((el) => el.classList.add('is-visible')); return }
    const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) { entry.target.classList.add('is-visible'); io.unobserve(entry.target) }
        })
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' })
    els.forEach((el) => io.observe(el))
}

function initCounters() {
    const els = document.querySelectorAll('[data-counter]')
    if (!els.length) return
    const run = (el) => {
        const target = parseInt(el.getAttribute('data-counter'), 10) || 0
        const duration = 1400
        const start = performance.now()
        const step = (now) => {
            const p = Math.min((now - start) / duration, 1)
            const eased = 1 - Math.pow(1 - p, 3)
            el.textContent = Math.round(target * eased).toLocaleString()
            if (p < 1) requestAnimationFrame(step)
        }
        requestAnimationFrame(step)
    }
    if (!('IntersectionObserver' in window)) { els.forEach(run); return }
    const io = new IntersectionObserver((entries) => {
        entries.forEach((e) => { if (e.isIntersecting) { run(e.target); io.unobserve(e.target) } })
    }, { threshold: 0.4 })
    els.forEach((el) => io.observe(el))
}

function initScrollProgress() {
    const bar = document.getElementById('scroll-progress')
    if (!bar) return
    const update = () => {
        const h = document.documentElement
        const scrolled = h.scrollTop / (h.scrollHeight - h.clientHeight || 1)
        bar.style.width = `${Math.min(Math.max(scrolled, 0), 1) * 100}%`
    }
    window.addEventListener('scroll', update, { passive: true })
    update()
}

function initLightbox() {
    const triggers = document.querySelectorAll('[data-lightbox]')
    if (!triggers.length) return
    const overlay = document.createElement('div')
    overlay.className = 'fixed inset-0 z-[120] hidden items-center justify-center bg-black/85 p-4 backdrop-blur-sm'
    overlay.innerHTML = '<img alt="" class="max-h-[90vh] max-w-[90vw] rounded-2xl object-contain shadow-2xl">'
    const img = overlay.querySelector('img')
    const close = () => { overlay.classList.add('hidden'); overlay.classList.remove('flex'); img.src = '' }
    overlay.addEventListener('click', close)
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape') close() })
    document.body.appendChild(overlay)
    triggers.forEach((t) => t.addEventListener('click', (e) => {
        e.preventDefault()
        img.src = t.getAttribute('data-lightbox') || t.getAttribute('src') || t.querySelector('img')?.src || ''
        overlay.classList.remove('hidden'); overlay.classList.add('flex')
    }))
}

function initApp() {
    initializeIcons()
    revealOnScroll()
    initCounters()
    initScrollProgress()
    initLightbox()
    Alpine.start()
    requestAnimationFrame(() => initializeIcons())
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initApp, { once: true })
} else {
    initApp()
}
