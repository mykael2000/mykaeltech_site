<?php
/**
 * Homepage - MykaelTech Website
 * Complete redesign: Aurora theme with animations & pop-ups
 */
require_once 'includes/config.php';

$pageTitle = 'Home';
$services = $GLOBALS['services'];
$technologies = $GLOBALS['technologies'];
$testimonials = $GLOBALS['testimonials'];
$stats = $GLOBALS['stats'];

$typewriterWords = htmlspecialchars(json_encode([
    'software products',
    'fintech platforms',
    'cloud solutions',
    'learning experiences',
    'professional CVs',
], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES);

include 'includes/header/header.php';
?>

<!-- Scroll Progress Bar -->
<div class="scroll-progress-track"><div class="progress-bar" style="width: 0;"></div></div>

<!-- ============ HERO ============ -->
<section class="home-hero">
    <div class="hero-grid-overlay"></div>
    <div class="hero-orb orb-a"></div>
    <div class="hero-orb orb-b"></div>
    <div class="hero-orb orb-c"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- Left: Copy -->
            <div class="text-center md:text-left">
                <span class="hero-badge hero-anim-1">
                    <span class="pulse-dot"></span>
                    A community of builders, not just an agency
                </span>

                <h1 class="hero-title hero-anim-2" style="margin-top: 1.4rem; color: #fff;">
                    Build. Learn. <span class="text-gradient-hero">Belong.</span>
                </h1>

                <p class="typewriter-line hero-anim-3" style="margin-top: 1.2rem;">
                    We turn ideas into&nbsp;<span id="typewriter" data-words="<?php echo $typewriterWords; ?>">software products</span>
                </p>

                <p class="hero-sub hero-anim-3" style="margin-top: 1.3rem;">
                    MykaelTech bridges technology and accounting — explore our services,
                    showcase your portfolio, track your learning, and generate a
                    professional CV, all in one place.
                </p>

                <div class="hero-anim-4" style="margin-top: 2.1rem; display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center;">
                    <a href="<?php echo route('join'); ?>" class="btn btn-white px-7 py-3.5 text-base">
                        <i class="fas fa-user-plus"></i>Join the Community
                    </a>
                    <a href="<?php echo route('portfolio'); ?>" class="btn btn-glass px-7 py-3.5 text-base">
                        <i class="fas fa-briefcase"></i>View Portfolio
                    </a>
                    <button type="button" class="btn btn-glass px-7 py-3.5 text-base" data-modal-open="quote-modal">
                        <i class="fas fa-paper-plane"></i>Get a Quote
                    </button>
                </div>
            </div>

            <!-- Right: Visual -->
            <div class="hero-visual hero-anim-6 hidden md:block">
                <div class="hero-frame">
                    <img src="<?php echo asset('images/workspace.jpg'); ?>" alt="<?php echo SITE_NAME; ?> workspace" onerror="this.style.display='none'">
                </div>
                <div class="float-card fc-top">
                    <div class="fc-icon"><i class="fas fa-rocket"></i></div>
                    <div>
                        <div class="fc-num">150+</div>
                        <div class="fc-label">Projects shipped</div>
                    </div>
                </div>
                <div class="float-card fc-bottom">
                    <div class="fc-icon"><i class="fas fa-star"></i></div>
                    <div>
                        <div class="fc-num">4.9/5</div>
                        <div class="fc-label">Client satisfaction</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-anim-5 text-center" style="margin-top: 3rem;">
            <span class="scroll-cue">
                <span>Scroll</span>
                <i class="fas fa-chevron-down"></i>
            </span>
        </div>
    </div>
</section>
<!-- ============ TECH MARQUEE ============ -->
<div class="marquee-band" aria-label="Technologies we use">
    <div class="marquee-track">
        <?php for ($m = 0; $m < 2; $m++): ?>
        <div class="marquee-group" <?php echo $m === 1 ? 'aria-hidden="true"' : ''; ?>>
            <?php foreach ($technologies as $tech): ?>
            <span class="marquee-item"><span class="ico"><?php echo $tech['icon']; ?></span><?php echo htmlspecialchars($tech['name']); ?></span>
            <?php endforeach; ?>
        </div>
        <?php endfor; ?>
    </div>
</div>

<!-- ============ STATS BAND ============ -->
<section class="stats-band py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center scroll-animate" style="margin-bottom: 2.8rem;">
            <span class="section-kicker on-dark"><i class="fas fa-chart-line"></i> By the numbers</span>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <?php foreach ($stats as $index => $stat): ?>
            <div class="stat-card scroll-animate reveal-delay-<?php echo ($index % 4) + 1; ?>">
                <div class="stat-ico"><i class="fas <?php echo ['fa-rocket', 'fa-smile', 'fa-calendar-check', 'fa-users'][$index % 4]; ?>"></i></div>
                <div class="counter" data-target="<?php echo (int) $stat['value']; ?>" data-suffix="<?php echo htmlspecialchars($stat['suffix']); ?>">0</div>
                <div class="stat-label"><?php echo htmlspecialchars($stat['label']); ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============ SERVICES ============ -->
<section class="py-20" style="background: #fff;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center scroll-animate" style="margin-bottom: 3rem;">
            <span class="section-kicker"><i class="fas fa-layer-group"></i> What we do</span>
            <h2 class="section-heading text-gray-900" style="margin-top: 1rem;">Our Services</h2>
            <p class="text-lg text-gray-600" style="margin-top: 0.9rem; max-width: 44rem; margin-left: auto; margin-right: auto;">
                Comprehensive technology and accounting solutions tailored to your business needs —
                click any card for a quick look.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach (array_slice($services, 0, 3) as $service): ?>
            <div class="service-card svc-interactive scroll-animate"
                 data-detail-trigger
                 role="button" tabindex="0"
                 data-title="<?php echo htmlspecialchars($service['name'], ENT_QUOTES); ?>"
                 data-icon="<?php echo htmlspecialchars($service['icon'] ?? '🚀', ENT_QUOTES); ?>"
                 data-badge="Service"
                 data-desc="<?php echo htmlspecialchars($service['description'] ?? '', ENT_QUOTES); ?>"
                 data-features="<?php echo htmlspecialchars(json_encode(array_values($service['features'] ?? []), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES); ?>"
                 data-cta-href="<?php echo route('services'); ?>"
                 data-cta-label="View details & pricing">
                <span class="shine"></span>
                <div class="svc-icon-wrap"><?php echo $service['icon'] ?? '🚀'; ?></div>
                <h3 class="text-xl font-bold text-gray-900" style="margin-bottom: 0.6rem;"><?php echo htmlspecialchars($service['name']); ?></h3>
                <p class="text-gray-600" style="font-size: 0.95rem;"><?php echo htmlspecialchars($service['description'] ?? ''); ?></p>

                <ul style="margin: 1.1rem 0; display: flex; flex-direction: column; gap: 0.5rem;">
                    <?php foreach (array_slice($service['features'] ?? [], 0, 3) as $feature): ?>
                    <li style="display: flex; gap: 0.55rem; align-items: flex-start; font-size: 0.875rem; color: #374151;">
                        <i class="fas fa-check-circle" style="color: #10b981; margin-top: 0.25rem;"></i>
                        <span><?php echo htmlspecialchars($feature); ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>

                <?php if (!empty($service['starting_price'])): ?>
                <span class="price-chip"><i class="fas fa-tag"></i> From <?php echo htmlspecialchars($service['starting_price']); ?></span>
                <?php endif; ?>

                <span class="svc-cta">Quick view <i class="fas fa-arrow-right"></i></span>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center scroll-animate" style="margin-top: 3rem; display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?php echo route('services'); ?>" class="btn btn-primary px-7 py-3">
                View All Services <i class="fas fa-arrow-right"></i>
            </a>
            <button type="button" class="btn btn-outline px-7 py-3" data-modal-open="quote-modal">
                <i class="fas fa-calculator"></i>Request a Quote
            </button>
        </div>
    </div>
</section>
<!-- ============ WHY CHOOSE US (BENTO) ============ -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center scroll-animate" style="margin-bottom: 3rem;">
            <span class="section-kicker"><i class="fas fa-gem"></i> Why MykaelTech</span>
            <h2 class="section-heading text-gray-900" style="margin-top: 1rem;">Why Choose MykaelTech?</h2>
            <p class="text-lg text-gray-600" style="margin-top: 0.9rem; max-width: 44rem; margin-left: auto; margin-right: auto;">
                We deliver excellence through innovation, expertise, and dedication — bridging
                technology and accounting for maximum impact.
            </p>
        </div>

        <div class="bento-grid">
            <div class="bento-tile span-4 tile-dark tile-glow scroll-animate">
                <div class="bento-icon" style="background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.2); color: #67e8f9;">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3 class="text-xl font-bold" style="margin-bottom: 0.6rem;">Innovation First</h3>
                <p style="line-height: 1.7;">
                    We stay ahead of technology trends to deliver cutting-edge solutions — from
                    modern cloud infrastructure and AI-assisted workflows to precise financial
                    modeling, so your business always moves forward.
                </p>
                <div style="display: flex; gap: 0.6rem; flex-wrap: wrap; margin-top: 1.3rem;">
                    <span class="feature-pill" style="background: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.16); color: #e2e8f0;"><i class="fas fa-check"></i> Cloud-native</span>
                    <span class="feature-pill" style="background: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.16); color: #e2e8f0;"><i class="fas fa-check"></i> AI-assisted delivery</span>
                    <span class="feature-pill" style="background: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.16); color: #e2e8f0;"><i class="fas fa-check"></i> Secure by default</span>
                </div>
            </div>

            <div class="bento-tile span-2 scroll-animate reveal-delay-1">
                <div class="bento-num">15+</div>
                <h3 class="text-base font-bold text-gray-900">Years of Excellence</h3>
                <p class="text-gray-600" style="font-size: 0.9rem; margin-top: 0.4rem;">A proven track record across industries and continents.</p>
            </div>

            <div class="bento-tile span-2 scroll-animate">
                <div class="bento-icon"><i class="fas fa-calculator"></i></div>
                <h3 class="text-base font-bold text-gray-900">Tech + Accounting DNA</h3>
                <p class="text-gray-600" style="font-size: 0.9rem; margin-top: 0.4rem;">Rare dual expertise — products engineered with the finance team in mind.</p>
            </div>

            <div class="bento-tile span-2 scroll-animate reveal-delay-1">
                <div class="bento-icon"><i class="fas fa-headset"></i></div>
                <h3 class="text-base font-bold text-gray-900">Dedicated Support</h3>
                <p class="text-gray-600" style="font-size: 0.9rem; margin-top: 0.4rem;">Real humans, fast responses, and long-term partnership after launch.</p>
            </div>

            <div class="bento-tile span-2 scroll-animate reveal-delay-2">
                <div class="bento-icon"><i class="fas fa-graduation-cap"></i></div>
                <h3 class="text-base font-bold text-gray-900">Community Powered</h3>
                <p class="text-gray-600" style="font-size: 0.9rem; margin-top: 0.4rem;">A learning community of builders — mentors, courses, and real projects.</p>
            </div>
            <div class="bento-tile span-3 scroll-animate" style="padding: 0; min-height: 17rem;">
                <div class="bento-media">
                    <img src="<?php echo asset('images/collaboration.jpg'); ?>" alt="Team collaboration" onerror="this.parentNode.style.display='none'">
                    <div class="bento-caption">
                        <h3 class="text-xl font-bold">A team that ships</h3>
                        <p style="font-size: 0.92rem; margin-top: 0.3rem;">Designers, engineers and accountants working as one unit.</p>
                    </div>
                </div>
            </div>

            <div class="bento-tile span-3 scroll-animate reveal-delay-1">
                <div class="grid grid-cols-2" style="gap: 1rem;">
                    <div style="background: var(--surface-light); border: 1px solid var(--border-light); border-radius: 16px; padding: 1rem; text-align: center;">
                        <div class="bento-num" style="font-size: 1.8rem;">150+</div>
                        <p class="text-gray-600" style="font-size: 0.8rem;">Projects</p>
                    </div>
                    <div style="background: var(--surface-light); border: 1px solid var(--border-light); border-radius: 16px; padding: 1rem; text-align: center;">
                        <div class="bento-num" style="font-size: 1.8rem;">85+</div>
                        <p class="text-gray-600" style="font-size: 0.8rem;">Happy clients</p>
                    </div>
                    <div style="background: var(--surface-light); border: 1px solid var(--border-light); border-radius: 16px; padding: 1rem; text-align: center;">
                        <div class="bento-num" style="font-size: 1.8rem;">98%</div>
                        <p class="text-gray-600" style="font-size: 0.8rem;">Retention rate</p>
                    </div>
                    <div style="background: var(--surface-light); border: 1px solid var(--border-light); border-radius: 16px; padding: 1rem; text-align: center;">
                        <div class="bento-num" style="font-size: 1.8rem;">24h</div>
                        <p class="text-gray-600" style="font-size: 0.8rem;">Response time</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============ FEATURED PROJECTS ============ -->
<section class="py-20" style="background: #fff;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center scroll-animate" style="margin-bottom: 3rem;">
            <span class="section-kicker"><i class="fas fa-diagram-project"></i> Selected work</span>
            <h2 class="section-heading text-gray-900" style="margin-top: 1rem;">Featured Projects</h2>
            <p class="text-lg text-gray-600" style="margin-top: 0.9rem; max-width: 44rem; margin-left: auto; margin-right: auto;">
                A glimpse of the products we've shipped for our clients and community —
                click a card to peek inside.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="proj-card scroll-animate"
                 data-detail-trigger
                 role="button" tabindex="0"
                 data-title="SmartPay Dashboard"
                 data-icon="💳"
                 data-badge="Fintech"
                 data-desc="Real-time payment analytics platform with automated reconciliation and reporting. Tracks transactions across channels, flags anomalies, and exports audit-ready statements in seconds."
                 data-features='["Real-time analytics","Automated reconciliation","Audit-ready exports","Role-based access"]'
                 data-cta-href="<?php echo route('portfolio'); ?>"
                 data-cta-label="See case studies">
                <div class="proj-thumb bg-gradient-to-br from-brand-primary to-violet-600">
                    <i class="fas fa-wallet" style="color: #fff;"></i>
                    <span class="proj-view"><i class="fas fa-eye"></i> Quick view</span>
                </div>
                <div class="proj-body">
                    <span class="badge badge-primary">Fintech</span>
                    <h3 class="text-lg font-bold text-gray-900" style="margin-top: 0.7rem; margin-bottom: 0.4rem;">SmartPay Dashboard</h3>
                    <p class="text-gray-600" style="font-size: 0.9rem;">Real-time payment analytics with automated reconciliation.</p>
                </div>
            </div>

            <div class="proj-card scroll-animate reveal-delay-1"
                 data-detail-trigger
                 role="button" tabindex="0"
                 data-title="MigrateX Suite"
                 data-icon="☁️"
                 data-badge="Cloud"
                 data-desc="Zero-downtime cloud migration toolkit used to move 40+ workloads to AWS. Includes automated dependency mapping, staged cutovers, and live rollback protection."
                 data-features='["Zero-downtime cutovers","40+ workloads migrated","Dependency mapping","Live rollback protection"]'
                 data-cta-href="<?php echo route('portfolio'); ?>"
                 data-cta-label="See case studies">
                <div class="proj-thumb" style="background: linear-gradient(135deg, #10b981, #0d9488);">
                    <i class="fas fa-cloud" style="color: #fff;"></i>
                    <span class="proj-view"><i class="fas fa-eye"></i> Quick view</span>
                </div>
                <div class="proj-body">
                    <span class="badge badge-primary">Cloud</span>
                    <h3 class="text-lg font-bold text-gray-900" style="margin-top: 0.7rem; margin-bottom: 0.4rem;">MigrateX Suite</h3>
                    <p class="text-gray-600" style="font-size: 0.9rem;">Zero-downtime toolkit that moved 40+ workloads to AWS.</p>
                </div>
            </div>

            <div class="proj-card scroll-animate reveal-delay-2"
                 data-detail-trigger
                 role="button" tabindex="0"
                 data-title="LearnHub LMS"
                 data-icon="📚"
                 data-badge="EdTech"
                 data-desc="Community learning platform with courses, certifications, and CV generation. Members track progress, earn badges, and export professional CVs generated from their projects."
                 data-features='["Courses & certifications","Progress tracking","CV generator","Community projects"]'
                 data-cta-href="<?php echo route('portfolio'); ?>"
                 data-cta-label="See case studies">
                <div class="proj-thumb" style="background: linear-gradient(135deg, #f97316, #ec4899);">
                    <i class="fas fa-graduation-cap" style="color: #fff;"></i>
                    <span class="proj-view"><i class="fas fa-eye"></i> Quick view</span>
                </div>
                <div class="proj-body">
                    <span class="badge badge-primary">EdTech</span>
                    <h3 class="text-lg font-bold text-gray-900" style="margin-top: 0.7rem; margin-bottom: 0.4rem;">LearnHub LMS</h3>
                    <p class="text-gray-600" style="font-size: 0.9rem;">Courses, certifications, and CV generation in one hub.</p>
                </div>
            </div>
        </div>

        <div class="text-center scroll-animate" style="margin-top: 3rem;">
            <a href="<?php echo route('portfolio'); ?>" class="btn btn-outline px-7 py-3">
                View Full Portfolio <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
<!-- ============ TESTIMONIALS SLIDER ============ -->
<section class="py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center scroll-animate" style="margin-bottom: 2.6rem;">
            <span class="section-kicker"><i class="fas fa-comments"></i> Testimonials</span>
            <h2 class="section-heading text-gray-900" style="margin-top: 1rem;">What Clients Say</h2>
            <p class="text-lg text-gray-600" style="margin-top: 0.9rem;">Trusted by businesses around the world</p>
        </div>

        <div id="tst-slider" class="scroll-animate" style="position: relative;">
            <div class="tst-slider">
                <div class="tst-track">
                    <?php foreach ($testimonials as $testimonial): ?>
                    <div class="tst-slide">
                        <div class="tst-card">
                            <div class="tst-quote-ico"><i class="fas fa-quote-left"></i></div>
                            <div style="display: flex; gap: 0.2rem; justify-content: center; color: #f59e0b; margin-bottom: 1.1rem;">
                                <?php for ($i = 0; $i < (int) ($testimonial['rating'] ?? 5); $i++): ?>
                                <i class="fas fa-star"></i>
                                <?php endfor; ?>
                            </div>
                            <p style="font-size: 1.05rem; line-height: 1.8; color: #475569; font-style: italic;">
                                "<?php echo htmlspecialchars($testimonial['text']); ?>"
                            </p>
                            <div style="display: flex; align-items: center; gap: 0.8rem; justify-content: center; margin-top: 1.6rem;">
                                <div class="avatar avatar-md" style="background: linear-gradient(135deg, var(--brand-primary), var(--brand-secondary)); color: #fff; font-weight: 700;">
                                    <?php echo strtoupper(substr($testimonial['name'], 0, 1)); ?>
                                </div>
                                <div style="text-align: left;">
                                    <p class="font-semibold text-gray-900 text-sm"><?php echo htmlspecialchars($testimonial['name']); ?></p>
                                    <p class="text-gray-500" style="font-size: 0.8rem;"><?php echo htmlspecialchars($testimonial['role']); ?>, <?php echo htmlspecialchars($testimonial['company']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <button type="button" class="tst-nav-btn tst-prev" aria-label="Previous testimonial"><i class="fas fa-chevron-left"></i></button>
            <button type="button" class="tst-nav-btn tst-next" aria-label="Next testimonial"><i class="fas fa-chevron-right"></i></button>
            <div class="tst-dots" role="tablist" aria-label="Testimonial slides"></div>
        </div>
    </div>
</section>

<!-- ============ CALL TO ACTION ============ -->
<section class="py-20" style="position: relative; overflow: hidden; background: linear-gradient(120deg, #0891b2 0%, #6d28d9 100%);">
    <div class="hero-orb orb-a" style="top: -180px; left: -80px; opacity: 0.35;"></div>
    <div class="hero-orb orb-b" style="bottom: -180px; right: -60px; opacity: 0.35;"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <span class="section-kicker on-dark scroll-animate"><i class="fas fa-rocket"></i> Let's build together</span>
        <h2 class="section-heading scroll-animate" style="margin-top: 1.1rem; color: #fff;">Ready to Transform Your Business?</h2>
        <p class="scroll-animate" style="font-size: 1.15rem; margin-top: 1rem; color: rgba(255,255,255,0.9);">
            Let's discuss how we can help you achieve your technology and business goals.
        </p>
        <div class="scroll-animate" style="margin-top: 2.2rem; display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?php echo route('contact'); ?>" class="btn btn-white px-7 py-3.5 text-base">
                <i class="fas fa-envelope"></i>Contact Us Today
            </a>
            <button type="button" class="btn btn-glass px-7 py-3.5 text-base" data-modal-open="quote-modal">
                <i class="fas fa-paper-plane"></i>Get a Free Quote
            </button>
            <a href="<?php echo route('services'); ?>" class="btn btn-glass px-7 py-3.5 text-base">
                <i class="fas fa-rocket"></i>View Our Services
            </a>
        </div>
    </div>
</section>
<!-- ============ DETAIL POP-UP ============ -->
<div class="modal-overlay hidden" id="detail-modal" role="dialog" aria-modal="true" aria-labelledby="detail-modal-title">
    <div class="modal-content">
        <div class="modal-head">
            <div style="display: flex; gap: 1rem; align-items: flex-start;">
                <div class="modal-hero-icon" data-field="icon">🚀</div>
                <div>
                    <span class="badge badge-primary" data-field="badge">Service</span>
                    <h3 id="detail-modal-title" data-field="title" style="margin-top: 0.5rem; font-size: 1.4rem;">Title</h3>
                </div>
            </div>
            <button type="button" class="modal-close" data-modal-close aria-label="Close pop-up"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
            <p data-field="desc" style="color: var(--ink-text-secondary); line-height: 1.75;"></p>
            <div data-field="features" style="display: flex; flex-wrap: wrap; gap: 0.55rem; margin-top: 1.2rem;"></div>
            <div style="display: flex; gap: 0.8rem; flex-wrap: wrap; margin-top: 1.6rem;">
                <a data-field="cta" href="#" class="btn btn-primary">Learn more</a>
                <button type="button" class="btn btn-outline" data-modal-open="quote-modal" data-modal-close>
                    <i class="fas fa-paper-plane"></i>Get a Quote
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ============ QUOTE POP-UP ============ -->
<div class="modal-overlay hidden" id="quote-modal" role="dialog" aria-modal="true" aria-labelledby="quote-modal-title">
    <div class="modal-content" style="max-width: 620px;">
        <div class="modal-head">
            <div style="display: flex; gap: 1rem; align-items: flex-start;">
                <div class="modal-hero-icon"><i class="fas fa-paper-plane"></i></div>
                <div>
                    <span class="badge badge-primary">Free · No obligation</span>
                    <h3 id="quote-modal-title" style="margin-top: 0.5rem; font-size: 1.4rem;">Request a Free Quote</h3>
                </div>
            </div>
            <button type="button" class="modal-close" data-modal-close aria-label="Close pop-up"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
            <p style="color: var(--ink-text-secondary); font-size: 0.92rem; margin-bottom: 1.3rem;">
                Tell us about your project and we'll get back to you within 24 hours.
            </p>
            <form action="<?php echo route('contact'); ?>" method="post" data-validate>
                <input type="hidden" name="quote_request" value="1">
                <div class="form-grid-2">
                    <div>
                        <label class="form-label" for="quote-name">Name *</label>
                        <input type="text" id="quote-name" name="name" placeholder="Your name" required>
                    </div>
                    <div>
                        <label class="form-label" for="quote-email">Email *</label>
                        <input type="email" id="quote-email" name="email" placeholder="you@company.com" required>
                    </div>
                    <div>
                        <label class="form-label" for="quote-phone">Phone</label>
                        <input type="text" id="quote-phone" name="phone" placeholder="Optional">
                    </div>
                    <div>
                        <label class="form-label" for="quote-service">Service</label>
                        <select id="quote-service" name="service">
                            <option value="General Inquiry">General inquiry</option>
                            <?php foreach ($services as $service): ?>
                            <option value="<?php echo htmlspecialchars($service['name'], ENT_QUOTES); ?>"><?php echo htmlspecialchars($service['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div style="grid-column: 1 / -1;">
                        <label class="form-label" for="quote-budget">Budget range</label>
                        <select id="quote-budget" name="budget">
                            <option value="Not sure">Not sure yet</option>
                            <option value="Under $5,000">Under $5,000</option>
                            <option value="$5,000 - $15,000">$5,000 – $15,000</option>
                            <option value="$15,000 - $50,000">$15,000 – $50,000</option>
                            <option value="$50,000+">$50,000+</option>
                        </select>
                    </div>
                    <div style="grid-column: 1 / -1;">
                        <label class="form-label" for="quote-message">Project details *</label>
                        <textarea id="quote-message" name="message" rows="4" placeholder="What are you looking to build?" required></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1.3rem; padding: 0.9rem;">
                    <i class="fas fa-paper-plane"></i>Send Quote Request
                </button>
            </form>
        </div>
    </div>
</div>
<!-- ============ PROMO POP-UP (once per session) ============ -->
<div class="modal-overlay hidden" id="promo-modal" role="dialog" aria-modal="true" aria-labelledby="promo-modal-title">
    <div class="modal-content" style="max-width: 440px;">
        <div class="promo-content">
            <button type="button" class="modal-close" data-modal-close aria-label="Close pop-up" style="position: absolute; top: 1rem; right: 1rem;"><i class="fas fa-times"></i></button>
            <div class="promo-burst"><i class="fas fa-gift"></i></div>
            <span class="badge badge-primary">Community perk</span>
            <h3 id="promo-modal-title" style="margin-top: 0.8rem;">First project? Take 10% off 🎉</h3>
            <p style="color: var(--ink-text-secondary); font-size: 0.95rem; line-height: 1.7; margin-top: 0.6rem;">
                Join the MykaelTech community today and get <strong>10% off</strong> your first
                project, plus free access to our CV generator and learning tracks.
            </p>
            <div style="display: flex; flex-direction: column; gap: 0.7rem; margin-top: 1.6rem;">
                <a href="<?php echo route('join'); ?>" class="btn btn-primary" data-modal-close>
                    <i class="fas fa-user-plus"></i>Claim My 10% Off
                </a>
                <button type="button" class="btn btn-ghost" data-modal-close style="font-weight: 500;">Maybe later</button>
            </div>
        </div>
    </div>
</div>

<!-- ============ TOAST NOTIFICATION ============ -->
<div class="toast-pop" id="site-toast" role="status" aria-live="polite">
    <div class="toast-ico"><i class="fas fa-bullhorn"></i></div>
    <div style="flex: 1;">
        <strong style="display: block; color: #fff; font-size: 0.9rem; margin-bottom: 0.2rem;">Now open for collaborations</strong>
        <span style="font-size: 0.82rem; color: #94a3b8;">Free 30-min consultation this month — limited slots.</span>
        <button type="button" class="btn btn-primary" style="margin-top: 0.6rem; padding: 0.4rem 0.9rem; font-size: 0.78rem;" data-modal-open="quote-modal" data-toast-cta>
            Book my slot
        </button>
    </div>
    <button type="button" class="toast-close-x" aria-label="Dismiss notification"><i class="fas fa-times"></i></button>
</div>

<?php include 'includes/footer/footer.php'; ?>

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-brand-primary via-brand-secondary to-violet-600 text-white py-8 md:py-12 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full filter blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-300 rounded-full filter blur-3xl animate-bounce"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
            <div class="text-center md:text-left">
                <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-medium text-white">
                    <span class="h-1.5 w-1.5 rounded-full bg-white"></span>
                    A community of builders, not just an agency
                </span>
                
                <h1 class="mt-8 text-4xl md:text-6xl font-extrabold leading-tight">
                    Build. Learn. <span class="text-gradient">Belong.</span>
                </h1>
                
                <p class="mt-6 text-lg md:text-xl text-white/90">
                    MykaelTech turns ideas into products and learners into professionals.
                    Explore our services, showcase your portfolio, track learning updates,
                    and generate a professional CV — all in one place.
                </p>
                
                <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="<?php echo route('join'); ?>" class="btn btn-primary px-8 py-4 text-base">
                        <i class="fas fa-user-plus mr-2"></i>Join the Community
                    </a>
                    <a href="<?php echo route('portfolio'); ?>" class="btn btn-outline px-8 py-4 text-base">
                        <i class="fas fa-briefcase mr-2"></i>View Portfolio
                    </a>
                </div>
            </div>
            
            <div class="relative hidden md:block">
                <img src="<?php echo asset('images/workspace.jpg'); ?>" alt="<?php echo SITE_NAME; ?> Workspace" class="w-full h-80 rounded-2xl object-cover shadow-2xl" onerror="this.style.display='none'">
                <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-white/10 rounded-2xl backdrop-blur-lg border border-white/20 flex items-center justify-center">
                    <span class="text-3xl font-bold">150+</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <?php foreach ($stats as $stat): ?>
            <div>
                <div class="counter text-4xl font-bold text-gray-900 mb-2" data-target="<?php echo $stat['value']; ?>" data-suffix="<?php echo $stat['suffix']; ?>">0</div>
                <p class="text-sm text-gray-500 font-medium"><?php echo $stat['label']; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Services Preview -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Services</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Comprehensive technology and accounting solutions tailored to your business needs
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach (array_slice($services, 0, 3) as $service): ?>
            <div class="card service-card hover:shadow-2xl transition-all duration-300">
                <div class="text-4xl mb-4"><?php echo $service['icon']; ?></div>
                <h3 class="text-xl font-bold mb-3 text-gray-900"><?php echo $service['name']; ?></h3>
                <p class="text-gray-600 mb-4"><?php echo $service['description']; ?></p>
                
                <ul class="space-y-2 mb-6">
                    <?php foreach ($service['features'] as $feature): ?>
                    <li class="flex items-start text-sm text-gray-700">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                        <span><?php echo htmlspecialchars($feature); ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                
                <a href="<?php echo route('services'); ?>" class="text-brand-primary font-semibold hover:text-brand-secondary transition-colors">
                    Learn more <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-12">
            <a href="<?php echo route('services'); ?>" class="btn btn-primary px-8 py-3">
                View All Services <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Why Choose MykaelTech?</h2>
                <p class="text-xl text-gray-600 mb-8">
                    We deliver excellence through innovation, expertise, and dedication.
                    Our integrated approach bridges technology and accounting for maximum impact.
                </p>
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-brand-primary/10 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-lightbulb text-brand-primary text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Innovation First</h3>
                            <p class="text-gray-600">We stay ahead of technology trends to deliver cutting-edge solutions.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-brand-primary/10 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-hands-helping text-brand-primary text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Expert Team</h3>
                            <p class="text-gray-600">Our team of experienced professionals brings decades of combined expertise.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-brand-primary/10 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-gem text-brand-primary text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Quality Assurance</h3>
                            <p class="text-gray-600">Rigorous quality processes ensure premium results every time.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="relative">
                <div class="bg-gradient-to-br from-brand-50 to-violet-50 rounded-2xl p-8 border border-brand-100">
                    <div class="text-center mb-6">
                        <div class="text-6xl font-bold text-brand-primary mb-4">15+</div>
                        <p class="text-gray-600 font-medium">Years of Excellence</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white rounded-xl p-4 text-center shadow-sm">
                            <div class="text-2xl font-bold text-gray-900">150+</div>
                            <p class="text-xs text-gray-500">Projects</p>
                        </div>
                        <div class="bg-white rounded-xl p-4 text-center shadow-sm">
                            <div class="text-2xl font-bold text-gray-900">85+</div>
                            <p class="text-xs text-gray-500">Clients</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Projects -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Featured Projects</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                A glimpse of the products we've shipped for our clients and community
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="card overflow-hidden hover:shadow-2xl transition-all duration-300 group">
                <div class="h-40 bg-gradient-to-br from-brand-primary to-violet-600 flex items-center justify-center text-5xl group-hover:scale-105 transition-transform duration-300">
                    💰
                </div>
                <div class="p-6">
                    <span class="badge badge-primary mb-3">Fintech</span>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">SmartPay Dashboard</h3>
                    <p class="text-gray-600 text-sm">Real-time payment analytics platform with automated reconciliation and reporting.</p>
                </div>
            </div>
            
            <div class="card overflow-hidden hover:shadow-2xl transition-all duration-300 group">
                <div class="h-40 bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-5xl group-hover:scale-105 transition-transform duration-300">
                    ☁️
                </div>
                <div class="p-6">
                    <span class="badge badge-primary mb-3">Cloud</span>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">MigrateX Suite</h3>
                    <p class="text-gray-600 text-sm">Zero-downtime cloud migration toolkit used to move 40+ workloads to AWS.</p>
                </div>
            </div>
            
            <div class="card overflow-hidden hover:shadow-2xl transition-all duration-300 group">
                <div class="h-40 bg-gradient-to-br from-orange-500 to-pink-600 flex items-center justify-center text-5xl group-hover:scale-105 transition-transform duration-300">
                    📚
                </div>
                <div class="p-6">
                    <span class="badge badge-primary mb-3">EdTech</span>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">LearnHub LMS</h3>
                    <p class="text-gray-600 text-sm">Community learning platform with courses, certifications, and CV generation.</p>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <a href="<?php echo route('portfolio'); ?>" class="btn btn-outline px-8 py-3">
                View Full Portfolio <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">What Clients Say</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Trusted by businesses around the world
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($testimonials as $testimonial): ?>
            <div class="card hover:shadow-xl transition-shadow duration-300">
                <div class="flex text-amber-400 mb-4">
                    <?php for ($i = 0; $i < $testimonial['rating']; $i++): ?>
                    <i class="fas fa-star"></i>
                    <?php endfor; ?>
                </div>
                <p class="text-gray-600 mb-6 italic">"<?php echo $testimonial['text']; ?>"</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-brand-primary to-violet-600 text-white flex items-center justify-center font-bold">
                        <?php echo strtoupper(substr($testimonial['name'], 0, 1)); ?>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 text-sm"><?php echo $testimonial['name']; ?></p>
                        <p class="text-gray-500 text-xs"><?php echo $testimonial['role']; ?>, <?php echo $testimonial['company']; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Technologies -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Technologies We Use</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Powered by modern, industry-leading technologies
            </p>
        </div>
        
        <div class="flex flex-wrap justify-center gap-4">
            <?php foreach ($technologies as $tech): ?>
            <div class="flex items-center gap-2 bg-white border border-gray-200 rounded-full px-5 py-2.5 shadow-sm hover:shadow-md hover:border-brand-primary/40 transition-all duration-300">
                <span class="text-xl"><?php echo $tech['icon']; ?></span>
                <span class="font-medium text-gray-700 text-sm"><?php echo $tech['name']; ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-gradient-to-r from-brand-primary to-violet-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-5xl font-bold mb-6">Ready to Transform Your Business?</h2>
        <p class="text-xl mb-8 text-white/90">
            Let's discuss how we can help you achieve your technology and business goals
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo route('contact'); ?>" class="btn btn-outline px-8 py-4 text-base border-white text-white hover:bg-white hover:text-brand-primary">
                <i class="fas fa-envelope mr-2"></i>Contact Us Today
            </a>
            <a href="<?php echo route('services'); ?>" class="btn btn-secondary px-8 py-4 text-base">
                <i class="fas fa-rocket mr-2"></i>View Our Services
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer/footer.php'; ?>