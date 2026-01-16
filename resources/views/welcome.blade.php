<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mykaeltech | Tech & Accounting Strategic Partners</title>
    <!-- Load Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Load Lucide Icons for clean, modern SVGs -->
    <script type="module" src="https://unpkg.com/lucide@latest"></script>
    
    <style>
        /* Define custom dark blue for Mykaeltech brand */
        :root {
            --mykael-dark: #0A1439; /* Very deep blue */
            --mykael-accent: #3B82F6; /* Standard blue-500 */
        }

        .bg-mykael-dark { background-color: var(--mykael-dark); }
        .text-mykael-accent { color: var(--mykael-accent); }
        .border-mykael-accent { border-color: var(--mykael-accent); }

        /* Custom CSS for a subtle frosted glass effect */
        .frosted-glass {
            background-color: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Custom animation for card lift and glow on hover */
        .service-card {
            transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
        }
        .service-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 15px 30px rgba(59, 130, 246, 0.2), 0 8px 16px rgba(59, 130, 246, 0.1);
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'blue-950': '#0A1439', /* Use custom dark blue */
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans text-gray-800 antialiased" onload="lucide.createIcons()">

    <!-- Header & Sticky Navigation -->
    <header class="sticky top-0 z-50 bg-white shadow-lg/50 backdrop-blur-sm">
        <nav class="container mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <a href="#" class="flex items-center text-3xl font-extrabold text-blue-950"><img height="50px" width="50px" src="{{ asset('logo.png') }}" alt="Mykaeltech Logo">Mykael<span class="text-blue-600">tech</span></a>
            
            <!-- Desktop Nav Links -->
            <div class="hidden lg:flex space-x-8 items-center text-lg">
                <a href="#services" class="text-gray-600 hover:text-blue-600 transition duration-300">Services</a>
                <a href="#portfolio" class="text-gray-600 hover:text-blue-600 transition duration-300">Portfolio</a>
                <a href="#insights" class="text-gray-600 hover:text-blue-600 transition duration-300">Insights</a>
                <a href="#faq" class="text-gray-600 hover:text-blue-600 transition duration-300">FAQ</a>
                <a href="#contact" class="bg-blue-600 text-white py-2 px-6 rounded-full font-semibold hover:bg-blue-700 transition duration-300 shadow-md hover:shadow-lg">
                    Book Session
                </a>
            </div>

            <!-- Mobile Menu Button (Toggle) -->
            <button id="mobile-menu-btn" class="lg:hidden text-blue-950 focus:outline-none">
                <i data-lucide="menu" class="w-7 h-7"></i>
            </button>
        </nav>
        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu" class="hidden lg:hidden bg-white shadow-xl absolute w-full top-full left-0 py-4 border-t border-gray-100">
            <a href="#services" class="block px-4 py-2 text-gray-800 hover:bg-gray-50">Services</a>
            <a href="#portfolio" class="block px-4 py-2 text-gray-800 hover:bg-gray-50">Portfolio</a>
            <a href="#insights" class="block px-4 py-2 text-gray-800 hover:bg-gray-50">Insights</a>
            <a href="#faq" class="block px-4 py-2 text-gray-800 hover:bg-gray-50">FAQ</a>
            <a href="#contact" class="block px-4 py-2 text-white bg-blue-600 m-4 rounded-lg text-center">Book Session</a>
        </div>
    </header>

    <!-- 1. Hero Section (Dynamic Dark Blue) -->
    <section class="bg-blue-950 text-white pt-32 pb-24 lg:pt-48 lg:pb-36 relative overflow-hidden">
        <!-- Subtle background pattern for dynamism -->
        <div class="absolute inset-0 opacity-10 bg-gradient-to-br from-blue-950 to-blue-800"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Text Content -->
                <div class="lg:col-span-7">
                    <p class="text-blue-400 text-lg font-semibold mb-3 tracking-widest uppercase">Mykaeltech: Synergizing Success</p>
                    <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold leading-tight mb-6">
                        The Future of <span class="text-blue-400">Tech & Accounting</span>, Simplified.
                    </h1>
                    <p class="text-xl sm:text-2xl font-light mb-10 opacity-80 max-w-2xl">
                        We deliver transformative, integrated solutions—from modern cloud infrastructure to precise financial modeling—designed to scale your enterprise.
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="#services" class="inline-flex items-center justify-center bg-blue-600 text-white text-lg py-3 px-8 rounded-full font-bold hover:bg-blue-700 transition duration-300 shadow-xl">
                            Explore Solutions <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
                        </a>
                        <a href="#contact" class="inline-flex items-center justify-center border border-white/30 text-white text-lg py-3 px-8 rounded-full font-bold hover:bg-white/10 transition duration-300">
                            Watch Demo <i data-lucide="play-circle" class="w-5 h-5 ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- CEO Credibility Block -->
                <div class="lg:col-span-5 hidden lg:block frosted-glass p-8 rounded-2xl shadow-2xl">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gray-500 rounded-full mr-4 flex items-center justify-center text-sm font-bold text-white">ME</div>
                        <div>
                            <p class="text-xl font-semibold">Michael Erameh</p>
                            <p class="text-blue-400 text-sm">CEO & Visionary</p>
                        </div>
                    </div>
                    <p class="italic text-white/80 text-sm leading-relaxed border-t border-white/20 pt-4 mt-2">
                        "Our integrated approach ensures technology drives efficiency, and accounting provides clarity. That is the Mykaeltech difference."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Core Services Section -->
    <section id="services" class="py-20 lg:py-28 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-extrabold text-center mb-4 text-blue-950">
                Integrated Service Lines
            </h2>
            <p class="text-center text-xl text-gray-600 mb-16 max-w-3xl mx-auto">
                We bridge the gap between back-office operations and cutting-edge technology.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Service Card 1: Enterprise Tech -->
                <div class="service-card bg-white p-8 rounded-xl shadow-lg border-t-4 border-blue-600">
                    <i data-lucide="cloud-cog" class="w-10 h-10 text-blue-600 mb-4"></i>
                    <h3 class="text-2xl font-bold mb-3 text-blue-950">Cloud & Enterprise Tech</h3>
                    <p class="text-gray-600 leading-relaxed">Infrastructure migration, SaaS integration, ERP setup, and system optimization for seamless operations.</p>
                </div>

                <!-- Service Card 2: Financial Strategy -->
                <div class="service-card bg-white p-8 rounded-xl shadow-lg border-t-4 border-blue-600">
                    <i data-lucide="bar-chart-3" class="w-10 h-10 text-blue-600 mb-4"></i>
                    <h3 class="text-2xl font-bold mb-3 text-blue-950">Strategic Financial Modeling</h3>
                    <p class="text-gray-600 leading-relaxed">Advanced budgeting, forecasting, risk analysis, and financial planning to guide executive decisions.</p>
                </div>

                <!-- Service Card 3: Cyber Security -->
                <div class="service-card bg-white p-8 rounded-xl shadow-lg border-t-4 border-blue-600">
                    <i data-lucide="shield-check" class="w-10 h-10 text-blue-600 mb-4"></i>
                    <h3 class="text-2xl font-bold mb-3 text-blue-950">Cyber Resilience & Audit</h3>
                    <p class="text-gray-600 leading-relaxed">Comprehensive security audits, threat intelligence, and compliance implementation (e.g., SOC 2, ISO).</p>
                </div>

                <!-- Service Card 4: Accounting Automation -->
                <div class="service-card bg-white p-8 rounded-xl shadow-lg border-t-4 border-blue-600">
                    <i data-lucide="file-check-2" class="w-10 h-10 text-blue-600 mb-4"></i>
                    <h3 class="text-2xl font-bold mb-3 text-blue-950">Automated Bookkeeping</h3>
                    <p class="text-gray-600 leading-relaxed">Moving beyond manual entry. Full cycle accounting, tax preparation, and reporting powered by AI tools.</p>
                </div>
                
                <!-- Service Card 5: Data & Analytics -->
                <div class="service-card bg-white p-8 rounded-xl shadow-lg border-t-4 border-blue-600">
                    <i data-lucide="database" class="w-10 h-10 text-blue-600 mb-4"></i>
                    <h3 class="text-2xl font-bold mb-3 text-blue-950">Data-Driven Insights</h3>
                    <p class="text-gray-600 leading-relaxed">Creating custom dashboards, data warehousing, and business intelligence (BI) strategies for clarity.</p>
                </div>

                <!-- Service Card 6: Advisory & M&A -->
                <div class="service-card bg-white p-8 rounded-xl shadow-lg border-t-4 border-blue-600">
                    <i data-lucide="briefcase" class="w-10 h-10 text-blue-600 mb-4"></i>
                    <h3 class="text-2xl font-bold mb-3 text-blue-950">Business Advisory</h3>
                    <p class="text-gray-600 leading-relaxed">Guidance for mergers, acquisitions, digital transformation roadmaps, and capital planning.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Portfolio & Case Studies (Tabbed Interface) -->
    <section id="portfolio" class="py-20 lg:py-28 bg-blue-950 text-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-extrabold text-center mb-4 text-white">
                Our Proven Impact
            </h2>
            <p class="text-center text-xl text-blue-300 mb-12 max-w-3xl mx-auto">
                Explore recent successes across complex technology implementations and critical financial engagements.
            </p>

            <!-- Tabs Navigation -->
            <div class="flex justify-center mb-12">
                <button onclick="showTab('tech')" id="tab-tech" class="tab-button py-3 px-8 rounded-l-full font-semibold text-lg bg-blue-600 hover:bg-blue-700 transition">
                    Tech Case Studies
                </button>
                <button onclick="showTab('accounting')" id="tab-accounting" class="tab-button py-3 px-8 rounded-r-full font-semibold text-lg bg-white text-blue-950 hover:bg-gray-200 transition">
                    Accounting Focus
                </button>
            </div>

            <!-- Tab Content: Tech -->
            <div id="content-tech" class="tab-content grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Case Study 1: Cloud Migration -->
                <div class="bg-white text-blue-950 p-8 rounded-xl shadow-2xl transition hover:shadow-blue-500/30">
                    <i data-lucide="server" class="w-8 h-8 text-blue-600 mb-4"></i>
                    <h3 class="text-2xl font-bold mb-2">Multi-Cloud Migration for FinTech</h3>
                    <p class="text-sm font-semibold text-blue-600 mb-4">Result: 40% Reduction in Latency</p>
                    <p class="text-gray-700">Managed the secure migration of a high-volume trading platform from legacy systems to a hybrid cloud environment, ensuring zero downtime during the transition.</p>
                    <a href="#" class="mt-4 inline-block text-blue-600 font-semibold hover:underline">View Full Story &rarr;</a>
                </div>
                <!-- Case Study 2: Security Implementation -->
                <div class="bg-white text-blue-950 p-8 rounded-xl shadow-2xl transition hover:shadow-blue-500/30">
                    <i data-lucide="lock" class="w-8 h-8 text-blue-600 mb-4"></i>
                    <h3 class="text-2xl font-bold mb-2">SOC 2 Compliance & Security Hardening</h3>
                    <p class="text-sm font-semibold text-blue-600 mb-4">Result: Achieved 100% Compliance Score</p>
                    <p class="text-gray-700">Implemented organization-wide security protocols, trained staff, and prepared documentation necessary to successfully pass the rigorous SOC 2 Type II audit.</p>
                    <a href="#" class="mt-4 inline-block text-blue-600 font-semibold hover:underline">View Full Story &rarr;</a>
                </div>
            </div>

            <!-- Tab Content: Accounting (Initially Hidden) -->
            <div id="content-accounting" class="tab-content hidden grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Case Study 3: M&A Due Diligence -->
                <div class="bg-white text-blue-950 p-8 rounded-xl shadow-2xl transition hover:shadow-blue-500/30">
                    <i data-lucide="landmark" class="w-8 h-8 text-blue-600 mb-4"></i>
                    <h3 class="text-2xl font-bold mb-2">M&A Due Diligence for Global Firm</h3>
                    <p class="text-sm font-semibold text-blue-600 mb-4">Result: Identified $5M in Hidden Liabilities</p>
                    <p class="text-gray-700">Conducted financial and technical due diligence for a major acquisition, providing a clear risk profile that informed the final purchase price negotiation.</p>
                    <a href="#" class="mt-4 inline-block text-blue-600 font-semibold hover:underline">View Full Story &rarr;</a>
                </div>
                <!-- Case Study 4: Forecasting Model -->
                <div class="bg-white text-blue-950 p-8 rounded-xl shadow-2xl transition hover:shadow-blue-500/30">
                    <i data-lucide="trending-up" class="w-8 h-8 text-blue-600 mb-4"></i>
                    <h3 class="text-2xl font-bold mb-2">Automated P&L Forecasting System</h3>
                    <p class="text-sm font-semibold text-blue-600 mb-4">Result: Reduced Reporting Time by 80%</p>
                    <p class="text-gray-700">Designed and implemented a custom financial dashboard connected to the ERP, enabling real-time P&L visualization and multi-scenario forecasting.</p>
                    <a href="#" class="mt-4 inline-block text-blue-600 font-semibold hover:underline">View Full Story &rarr;</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Insights / Blog Section -->
    <section id="insights" class="py-20 lg:py-28 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-extrabold text-center mb-4 text-blue-950">
                Latest Insights & Market Trends
            </h2>
            <p class="text-center text-xl text-gray-600 mb-16 max-w-3xl mx-auto">
                Stay ahead with expert analysis on technological advancements and financial compliance changes.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Blog Card 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg transition hover:shadow-xl hover:translate-y-[-4px] duration-300">
                    <div class="p-6">
                        <p class="text-sm font-semibold text-blue-600 mb-2">Technology | Oct 20, 2024</p>
                        <h3 class="text-xl font-bold mb-3 text-blue-950">The Rise of GenAI in Enterprise Resource Planning (ERP)</h3>
                        <p class="text-gray-600 text-sm">How generative AI is reshaping traditional ERP functions, from supply chain optimization to automated journal entries.</p>
                        <a href="#" class="mt-4 inline-flex items-center text-blue-600 font-semibold text-sm hover:underline">Read Article <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i></a>
                    </div>
                </div>
                <!-- Blog Card 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg transition hover:shadow-xl hover:translate-y-[-4px] duration-300">
                    <div class="p-6">
                        <p class="text-sm font-semibold text-blue-600 mb-2">Accounting | Oct 15, 2024</p>
                        <h3 class="text-xl font-bold mb-3 text-blue-950">Navigating the New Global Minimum Tax (Pillar Two)</h3>
                        <p class="text-gray-600 text-sm">A deep dive into the impact of Pillar Two on multinational corporations and how Mykaeltech can assist with implementation.</p>
                        <a href="#" class="mt-4 inline-flex items-center text-blue-600 font-semibold text-sm hover:underline">Read Article <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i></a>
                    </div>
                </div>
                <!-- Blog Card 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg transition hover:shadow-xl hover:translate-y-[-4px] duration-300">
                    <div class="p-6">
                        <p class="text-sm font-semibold text-blue-600 mb-2">Advisory | Oct 10, 2024</p>
                        <h3 class="text-xl font-bold mb-3 text-blue-950">Post-Merger Integration: Financial & Tech Harmony</h3>
                        <p class="text-gray-600 text-sm">Best practices for quickly and effectively merging disparate IT systems and financial teams after a corporate acquisition.</p>
                        <a href="#" class="mt-4 inline-flex items-center text-blue-600 font-semibold text-sm hover:underline">Read Article <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="#" class="inline-block border border-blue-600 text-blue-600 py-3 px-8 rounded-full font-semibold hover:bg-blue-600 hover:text-white transition duration-300">
                    View All Insights
                </a>
            </div>
        </div>
    </section>

    <!-- 5. FAQ Section (Accordion) -->
    <section id="faq" class="py-20 lg:py-28 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-extrabold text-center mb-4 text-blue-950">
                Frequently Asked Questions
            </h2>
            <p class="text-center text-xl text-gray-600 mb-16 max-w-3xl mx-auto">
                Find answers to the most common questions about our integrated technology and accounting model.
            </p>

            <div class="max-w-4xl mx-auto space-y-4">
                <!-- FAQ Item 1 -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button class="faq-toggle w-full flex justify-between items-center p-5 text-lg font-semibold text-left text-blue-950 bg-gray-50 hover:bg-gray-100 transition duration-300">
                        <span>How does Mykaeltech combine Tech and Accounting?</span>
                        <i data-lucide="plus" class="faq-icon w-6 h-6 transform transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden p-5 pt-0 text-gray-700 leading-relaxed bg-white">
                        <p>We believe technology should automate and optimize accounting functions. Our teams work together to implement cloud-based ERP systems, integrate financial reporting with data analytics platforms, and ensure your tech stack is compliant with financial regulations.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button class="faq-toggle w-full flex justify-between items-center p-5 text-lg font-semibold text-left text-blue-950 bg-gray-50 hover:bg-gray-100 transition duration-300">
                        <span>Are you focused on small businesses or enterprise clients?</span>
                        <i data-lucide="plus" class="faq-icon w-6 h-6 transform transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden p-5 pt-0 text-gray-700 leading-relaxed bg-white">
                        <p>Our sweet spot is mid-to-large enterprises seeking scalable solutions. Our expertise covers complex regulatory environments and high-volume data processing that typically require sophisticated technology and financial models.</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button class="faq-toggle w-full flex justify-between items-center p-5 text-lg font-semibold text-left text-blue-950 bg-gray-50 hover:bg-gray-100 transition duration-300">
                        <span>What is your typical project timeline?</span>
                        <i data-lucide="plus" class="faq-icon w-6 h-6 transform transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden p-5 pt-0 text-gray-700 leading-relaxed bg-white">
                        <p>Timelines vary based on scope. A full ERP migration may take 6-12 months, while a targeted cybersecurity audit might take 4-8 weeks. We provide a detailed project roadmap and communication schedule upfront.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Contact & Session Booking Section (Advanced Split) -->
    <section id="contact" class="py-20 lg:py-28 bg-blue-950 text-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-extrabold text-center mb-4 text-white">
                Start Your Digital Transformation
            </h2>
            <p class="text-center text-xl text-blue-300 mb-16 max-w-3xl mx-auto">
                Fill out the form or book a 15-minute introductory session with our advisory team.
            </p>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-white p-8 sm:p-12 rounded-xl shadow-2xl text-blue-950">
                    <h3 class="text-3xl font-bold mb-6">Send Us a Message</h3>
                    <form onsubmit="event.preventDefault(); showContactMessage()">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <input type="text" placeholder="Full Name" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-blue-600 focus:border-blue-600" required>
                            <input type="email" placeholder="Work Email" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-blue-600 focus:border-blue-600" required>
                        </div>
                        <input type="text" placeholder="Company Name" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-blue-600 focus:border-blue-600 mb-6" required>
                        <textarea placeholder="Tell us about your needs (e.g., Cloud Migration, Tax Strategy)" rows="5" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-blue-600 focus:border-blue-600 mb-8" required></textarea>
                        
                        <button type="submit" class="w-full bg-blue-600 text-white text-lg py-4 rounded-lg font-bold hover:bg-blue-700 transition duration-300 shadow-lg">
                            Submit Inquiry
                        </button>
                    </form>
                    <!-- Form Submission Message Box -->
                    <div id="contact-message" class="hidden mt-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        Thank you! Your message has been successfully received. We will be in touch shortly.
                    </div>
                </div>

                <!-- Session Booking CTA -->
                <div class="frosted-glass p-8 sm:p-12 rounded-xl shadow-2xl flex flex-col justify-center">
                    <i data-lucide="calendar-check" class="w-16 h-16 text-blue-400 mx-auto mb-6"></i>
                    <h3 class="text-3xl font-bold mb-4 text-white text-center">Book a Discovery Session</h3>
                    <p class="text-lg text-blue-200 mb-8 text-center">
                        Schedule a quick, no-obligation call with an expert to assess your strategic requirements.
                    </p>
                    <a href="#" class="w-full inline-block text-center bg-blue-600 text-white text-lg py-4 px-8 rounded-lg font-bold hover:bg-blue-700 transition duration-300 shadow-xl">
                        Schedule Call Now
                    </a>
                    <div class="mt-8 text-center border-t border-white/20 pt-6">
                        <h4 class="text-xl font-semibold mb-2 text-white">Direct Contact</h4>
                        <p class="text-blue-200"><i data-lucide="mail" class="w-4 h-4 inline mr-2"></i> info@mykaeltech.com</p>
                        <p class="text-blue-200"><i data-lucide="phone" class="w-4 h-4 inline mr-2"></i> +1 (555) 987-6543</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-10 border-b border-gray-700 pb-10 mb-8">
                <!-- Company Info -->
                <div class="col-span-2 md:col-span-2">
                    <a href="#" class="text-3xl font-extrabold text-white mb-3 block">Mykael<span class="text-blue-500">tech</span></a>
                    <p class="text-sm text-gray-400 max-w-xs">
                        Integrated solutions by Michael Erameh. Specializing in technology-driven financial excellence.
                    </p>
                    <div class="flex space-x-4 mt-6">
                        <a href="#" class="text-gray-400 hover:text-blue-500 transition"><i data-lucide="linkedin" class="w-6 h-6"></i></a>
                        <a href="#" class="text-gray-400 hover:text-blue-500 transition"><i data-lucide="twitter" class="w-6 h-6"></i></a>
                        <a href="#" class="text-gray-400 hover:text-blue-500 transition"><i data-lucide="facebook" class="w-6 h-6"></i></a>
                    </div>
                </div>
                
                <!-- Services Links -->
                <div>
                    <h4 class="font-semibold mb-4 text-gray-200">Solutions</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#services" class="text-gray-400 hover:text-blue-500 transition">Cloud & ERP</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-blue-500 transition">Financial Strategy</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-blue-500 transition">Cyber Resilience</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-blue-500 transition">Tax & Audit</a></li>
                    </ul>
                </div>

                <!-- Company Links -->
                <div>
                    <h4 class="font-semibold mb-4 text-gray-200">Company</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#about" class="text-gray-400 hover:text-blue-500 transition">Our Mission</a></li>
                        <li><a href="#portfolio" class="text-gray-400 hover:text-blue-500 transition">Case Studies</a></li>
                        <li><a href="#insights" class="text-gray-400 hover:text-blue-500 transition">Latest Insights</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-blue-500 transition">Book a Session</a></li>
                    </ul>
                </div>

                <!-- Legal -->
                <div>
                    <h4 class="font-semibold mb-4 text-gray-200">Legal</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="text-gray-400 hover:text-blue-500 transition">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-blue-500 transition">Terms of Use</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-blue-500 transition">Sitemap</a></li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="text-center text-sm text-gray-500 pt-4">
                &copy; 2024 Mykaeltech. All Rights Reserved. Built with precision and expertise.
            </div>
        </div>
    </footer>
    
    <!-- JavaScript for Interactivity -->
    <script>
        // === Mobile Menu Toggle ===
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // === Portfolio Tab Logic ===
        const showTab = (tabName) => {
            // Hide all content and reset button styles
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('bg-blue-600', 'text-white', 'hover:bg-blue-700');
                button.classList.add('bg-white', 'text-blue-950', 'hover:bg-gray-200');
            });

            // Show selected content and update button style
            document.getElementById(`content-${tabName}`).classList.remove('hidden');
            const selectedButton = document.getElementById(`tab-${tabName}`);
            selectedButton.classList.remove('bg-white', 'text-blue-950', 'hover:bg-gray-200');
            selectedButton.classList.add('bg-blue-600', 'text-white', 'hover:bg-blue-700');
        }
        
        // Initialize: Ensure the 'tech' tab is active on load
        document.addEventListener('DOMContentLoaded', () => {
            showTab('tech');
        });


        // === FAQ Accordion Logic ===
        document.querySelectorAll('.faq-toggle').forEach(button => {
            button.addEventListener('click', () => {
                const content = button.nextElementSibling;
                const icon = button.querySelector('.faq-icon');
                
                // Toggle visibility
                content.classList.toggle('hidden');
                
                // Rotate icon
                if (content.classList.contains('hidden')) {
                    icon.classList.remove('rotate-45');
                    icon.setAttribute('data-lucide', 'plus');
                } else {
                    icon.classList.add('rotate-45');
                    icon.setAttribute('data-lucide', 'minus');
                }
                lucide.createIcons(); // Re-render icon after attribute change
            });
        });

        // === Contact Form Submission Message ===
        const showContactMessage = () => {
            // In a real application, you would send data to a backend here.
            document.getElementById('contact-message').classList.remove('hidden');
            setTimeout(() => {
                document.getElementById('contact-message').classList.add('hidden');
            }, 5000); // Hide message after 5 seconds
        }

    </script>
</body>
</html>
