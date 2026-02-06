@extends('layouts.app')
@section('header_class', 'scrolled')

@section('content')
    <div class="service-detail-page">

        <!-- Hero Section -->
        <section class="service-hero" style="background-image: url('{{ $service->hero_image }}');">
            <div class="hero-overlay"></div>
            <div class="container relative z-10">
                <div class="hero-content">
                    <span class="hero-highlight">{{ $service->hero_highlight }}</span>
                    <h1 class="service-title">{{ $service->title }}</h1>
                    <p class="service-subtitle">{{ $service->subtitle }}</p>

                    <div class="hero-trust-points">
                        @foreach($service->trust_points as $point)
                            <span class="trust-pill"><i class="fas fa-check-circle"></i> {{ $point }}</span>
                        @endforeach
                    </div>

                    <a href="{{ route('quote.index') }}" class="btn-hero-glow">Get a Quote</a>
                </div>
            </div>
        </section>

        <!-- About Section (Premium Dark) -->
        <section class="section-spacing" style="background: #0b1120;">
            <div class="container">
                <div class="grid-2-smart">
                    <div class="content-col">
                        <h2 class="section-h2">Why Choose Our <br><span class="text-gradient">{{ $service->title }}</span>?
                        </h2>
                        <p class="section-lead">{{ $service->about_text }}</p>

                        <ul class="benefit-list">
                            @foreach($service->benefits as $benefit)
                                <li><i class="fas fa-check"></i> {{ $benefit }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="image-col">
                        <div class="image-wrapper-tech">
                            <img src="{{ $service->about_image }}" alt="{{ $service->title }}">
                            <div class="tech-blob"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features / What We Offer -->
        <section class="section-spacing bg-darker">
            <div class="container">
                <div class="text-left">
                    <span class="section-label">Capabilities</span>
                    <h2 class="section-h2">What We Offer</h2>
                </div>

                <div class="features-grid">
                    @foreach($service->features as $feature)
                        <div class="feature-card">
                            <div class="f-icon"><i class="fas {{ $feature->icon }}"></i></div>
                            <h3>{{ $feature->title }}</h3>
                            <p>{{ $feature->desc }}</p>
                            <div class="f-glow"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Tech Stack -->
        @if(isset($service->tech_stack))
            <section class="section-spacing" style="background: #0f172a;">
                <div class="container">
                    <div style="text-align: left;">
                        <h2 class="section-h2">Technology Stack</h2>
                    </div>
                    <div class="tech-stack-flex">
                        @foreach($service->tech_stack as $tech)
                            <div class="tech-pill">{{ $tech }}</div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Process Flow -->
        @if(isset($service->process))
            <section class="section-spacing bg-panel">
                <div class="container">
                    <div class="text-left">
                        <h2 class="section-h2">Our Process</h2>
                    </div>
                    <div class="process-steps">
                        @foreach($service->process as $index => $step)
                            <div class="p-step">
                                <div class="step-num">{{ $index + 1 }}</div>
                                <h4>{{ $step }}</h4>
                            </div>
                            @if(!$loop->last)
                            <div class="step-connector"></div> @endif
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Learnings / Use Cases -->
        @if(isset($service->use_cases) && count($service->use_cases) > 0)
            <section class="section-spacing">
                <div class="container text-left">
                    <h2 class="section-h2">Real-World Applications</h2>
                    <div class="use-cases-grid">
                        @foreach($service->use_cases as $case)
                            <div class="use-case-card">
                                <div class="check-icon"><i class="fas fa-check"></i></div>
                                <h4>{{ $case }}</h4>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Case Studies / Portfolio -->
        @if(isset($service->case_studies) && count($service->case_studies) > 0)
            <section class="section-spacing bg-darker">
                <div class="container">
                    <div class="text-left">
                        <span class="section-label">Proven Results</span>
                        <h2 class="section-h2">Success Stories</h2>
                    </div>
                    <div class="case-studies-grid">
                        @foreach($service->case_studies as $study)
                            <div class="case-card">
                                <div class="case-metrics">
                                    <div class="metric-val">{{ $study->metric_value }}</div>
                                    <div class="metric-label">{{ $study->metric_name }}</div>
                                </div>
                                <h4 class="case-title">{{ $study->title }}</h4>
                                <p class="case-desc">{{ $study->desc }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Pricing / Packages -->
        @if(isset($service->plans) && count($service->plans) > 0)
            <section class="section-spacing">
                <div class="container">
                    <div class="text-center" style="margin-bottom: 50px;">
                        <h2 class="section-h2" style="text-align: center;">Transparent Pricing</h2>
                        <p class="section-lead" style="margin: 0 auto; max-width: 600px;">Choose the perfect plan for your
                            business growth.</p>
                    </div>
                    <div class="pricing-grid">
                        @foreach($service->plans as $plan)
                            <div class="pricing-card {{ $plan->popular ? 'popular' : '' }}">
                                @if($plan->popular)
                                    <div class="popular-badge">MOST POPULAR</div>
                                @endif
                                <h3 class="plan-name">{{ $plan->name }}</h3>
                                <div class="plan-price">{{ $plan->price }}</div>
                                <p class="plan-desc">{{ $plan->desc }}</p>
                                <ul class="plan-features">
                                    @foreach($plan->features as $feature)
                                        <li><i class="fas fa-check"></i> {{ $feature }}</li>
                                    @endforeach
                                </ul>
                                <a href="javascript:void(0)" onclick="openContactModal(event)" class="btn-plan">Choose Plan</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- FAQ -->
        @if(isset($service->faq) && count($service->faq) > 0)
            <section class="section-spacing">
                <div class="container">
                    <div style="text-align: left;">
                        <h2 class="section-h2">Frequently Asked Questions</h2>
                    </div>
                    <div class="faq-wrapper">
                        @foreach($service->faq as $faq)
                            <div class="faq-item">
                                <div class="faq-q">
                                    <span>{{ $faq->q }}</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="faq-a">
                                    <p>{{ $faq->a }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- CTA with Animated Illustration -->
        <section class="cta-bottom">
            <div class="container">
                <div class="cta-grid">
                    <!-- Left: Content -->
                    <div class="cta-content">
                        <h2>Ready to start your {{ $service->title }} project?</h2>
                        <p>Let's discuss how we can help you achieve your goals.</p>
                        <a href="{{ route('contact') }}" class="btn-cta-big">Talk to an Expert</a>
                    </div>

                    <!-- Right: Animated Illustration -->
                    <div class="cta-illustration">
                        <svg viewBox="0 0 500 400" xmlns="http://www.w3.org/2000/svg" class="animated-svg">
                            <!-- Background Glow -->
                            <defs>
                                <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#38bdf8;stop-opacity:0.8" />
                                    <stop offset="100%" style="stop-color:#818cf8;stop-opacity:0.8" />
                                </linearGradient>
                                <filter id="glow">
                                    <feGaussianBlur stdDeviation="4" result="coloredBlur" />
                                    <feMerge>
                                        <feMergeNode in="coloredBlur" />
                                        <feMergeNode in="SourceGraphic" />
                                    </feMerge>
                                </filter>
                            </defs>

                            <!-- Floating Circles -->
                            <circle cx="100" cy="80" r="15" fill="#38bdf8" opacity="0.3" class="float-1" />
                            <circle cx="400" cy="100" r="20" fill="#818cf8" opacity="0.2" class="float-2" />
                            <circle cx="450" cy="300" r="12" fill="#38bdf8" opacity="0.4" class="float-3" />

                            <!-- Main Illustration: Laptop/Device -->
                            <rect x="150" y="150" width="200" height="140" rx="10" fill="url(#grad1)" opacity="0.1"
                                class="pulse" />
                            <rect x="160" y="160" width="180" height="110" rx="5" fill="#1e293b" stroke="#38bdf8"
                                stroke-width="2" class="device-screen" />

                            <!-- Screen Content Lines (Code/Design) -->
                            <line x1="180" y1="180" x2="280" y2="180" stroke="#38bdf8" stroke-width="3" opacity="0.6"
                                class="code-line-1" />
                            <line x1="180" y1="200" x2="320" y2="200" stroke="#818cf8" stroke-width="3" opacity="0.5"
                                class="code-line-2" />
                            <line x1="180" y1="220" x2="250" y2="220" stroke="#38bdf8" stroke-width="3" opacity="0.6"
                                class="code-line-3" />
                            <line x1="180" y1="240" x2="300" y2="240" stroke="#818cf8" stroke-width="3" opacity="0.5"
                                class="code-line-4" />

                            <!-- Laptop Base -->
                            <path d="M 140 290 L 360 290 L 380 310 L 120 310 Z" fill="#1e293b" stroke="#38bdf8"
                                stroke-width="1.5" />

                            <!-- Floating Icons -->
                            <g class="icon-float-1">
                                <circle cx="80" cy="200" r="25" fill="#38bdf8" opacity="0.2" />
                                <path d="M 75 195 L 85 195 L 85 205 L 75 205 Z" fill="#38bdf8" filter="url(#glow)" />
                            </g>

                            <g class="icon-float-2">
                                <circle cx="420" cy="220" r="25" fill="#818cf8" opacity="0.2" />
                                <circle cx="420" cy="220" r="8" fill="#818cf8" filter="url(#glow)" />
                            </g>

                            <!-- Success Checkmark -->
                            <circle cx="380" cy="180" r="20" fill="#10b981" opacity="0.9" class="success-badge" />
                            <path d="M 372 180 L 377 185 L 388 174" stroke="white" stroke-width="3" fill="none"
                                stroke-linecap="round" class="checkmark" />
                        </svg>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Form Section -->
        <!-- Form is now global in layout -->
    </div>

    <!-- Sticky Bottom CTA -->
    <div class="sticky-cta-bar">
        <div class="container flex-cta">
            <div class="cta-text-nav">
                <span class="cta-label">Ready to scale?</span>
                <span class="sd-contact-val">
                    @php
                        $sd_phone = $global_settings['phone_india'] ?? '+91 91729 20505';
                        if (str_starts_with($sd_phone, '[')) {
                            $phones = json_decode($sd_phone, true);
                            $sd_phone = !empty($phones) ? $phones[0] : '+91 91729 20505';
                        }
                    @endphp
                    {{ $sd_phone }}</span>
            </div>
            <div class="cta-actions-nav">
                @php
                    $sd_wa_raw = $global_settings['contact_whatsapp'] ?? ($global_settings['phone_india'] ?? '917292050505');
                    if (str_starts_with($sd_wa_raw, '[')) {
                        $wa_nums = json_decode($sd_wa_raw, true);
                        $sd_wa_raw = !empty($wa_nums) ? $wa_nums[0] : '917292050505';
                    }
                    $sd_wa = preg_replace('/[^0-9]/', '', $sd_wa_raw);
                    if (strlen($sd_wa) == 10)
                        $sd_wa = '91' . $sd_wa;
                    $sd_url = "https://wa.me/{$sd_wa}";
                @endphp
                <a href="{{ $sd_url }}" target="_blank" class="btn-whatsapp-sticky"><i class="fab fa-whatsapp"></i>
                    WhatsApp</a>
                <a href="javascript:void(0)" onclick="openContactModal(event)" class="btn-talk-sticky">Talk to Expert</a>
            </div>
        </div>
    </div>

    <style>
        /* Service Detail Styles */
        .service-detail-page {
            background-color: #000 !important;
        }

        .service-detail-page .container {
            max-width: 100% !important;
            padding-left: 40px !important;
            padding-right: 40px !important;
            margin: 0 !important;
        }

        .service-hero {
            height: 55vh;
            min-height: 500px;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative;
            display: flex;
            align-items: center;
            padding-top: 60px;
            /* Critical fix for header overlap */
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            /* Complex gradient: Dark text area on left, Light blue glow on top-right, transparent/dark mix elsewhere */
            background:
                radial-gradient(circle at top right, rgba(56, 189, 248, 0.3), transparent 60%),
                linear-gradient(90deg, #0b1120 0%, rgba(11, 17, 32, 0.95) 40%, rgba(11, 17, 32, 0.6) 100%);
            z-index: 1;
        }

        .hero-content {
            max-width: 1000px;
            position: relative;
            z-index: 2;
            text-align: left;
            margin-left: 0;
            margin-right: auto;
            margin-bottom: 0;
        }

        .hero-highlight {
            color: #38bdf8 !important;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-size: 0.9rem;
            display: block;
            margin-bottom: 10px;
            text-shadow: 0 0 10px rgba(56, 189, 248, 0.3);
        }

        .service-title {
            font-size: 4rem;
            line-height: 1.1;
            margin-bottom: 15px;
            color: #ffffff !important;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        .service-subtitle {
            font-size: 1.25rem;
            color: #cbd5e1 !important;
            margin-bottom: 25px;
            font-weight: 300;
            max-width: 600px;
            text-shadow: 0 1px 5px rgba(0, 0, 0, 0.5);
        }

        .hero-trust-points {
            display: flex;
            justify-content: flex-start;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        .trust-pill {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 8px;
            color: #e2e8f0;
        }

        .trust-pill i {
            color: var(--primary);
        }

        .btn-hero-glow {
            background: var(--primary);
            color: #0b1120;
            padding: 16px 40px;
            border-radius: 50px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            display: inline-block;
            transition: 0.3s;
            box-shadow: 0 0 25px rgba(56, 189, 248, 0.4);
        }

        .btn-hero-glow:hover {
            transform: translateY(-3px);
            background: #fff;
            box-shadow: 0 0 40px rgba(56, 189, 248, 0.6);
        }

        /* Grid Layouts */
        .grid-2-smart {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        .section-spacing {
            padding: 30px 0;
        }

        .section-h2 {
            font-size: 2.5rem;
            margin-bottom: 5px;
            text-align: left;
            width: 100%;
        }

        .section-lead {
            font-size: 1.1rem;
            color: var(--text-muted);
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .benefit-list {
            list-style: none;
            padding: 0;
        }

        .benefit-list li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.05rem;
            color: #e2e8f0;
        }

        .benefit-list li i {
            color: var(--primary);
        }

        .image-wrapper-tech {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .image-wrapper-tech img {
            width: 100%;
            display: block;
            transition: 0.5s;
        }

        .image-wrapper-tech:hover img {
            transform: scale(1.05);
        }

        /* Capabilities */
        .bg-darker {
            background: #080c17;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .feature-card {
            background: var(--bg-panel);
            padding: 40px 30px;
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: 0.3s;
            position: relative;
            overflow: hidden;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-color: var(--primary);
        }

        .f-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 25px;
        }

        .feature-card h3 {
            font-size: 1.25rem;
            margin-bottom: 15px;
        }

        .feature-card p {
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        .f-glow {
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: var(--primary);
            filter: blur(80px);
            opacity: 0;
            transition: 0.3s;
        }

        .feature-card:hover .f-glow {
            opacity: 0.15;
        }

        /* Tech Stack */
        .tech-stack-flex {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .tech-pill {
            padding: 12px 30px;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 30px;
            color: #cbd5e1;
            font-weight: 600;
            transition: 0.3s;
        }

        .tech-pill:hover {
            border-color: var(--primary);
            color: #fff;
            box-shadow: 0 0 15px rgba(56, 189, 248, 0.2);
        }

        /* Process */
        .process-steps {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1000px;
            margin: 0;
            position: relative;
        }

        .p-step {
            text-align: center;
            position: relative;
            z-index: 2;
            flex: 1;
        }

        .step-num {
            width: 65px;
            height: 65px;
            background: rgba(30, 41, 59, 0.8);
            border: 2px solid var(--primary);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0 auto 20px;
            box-shadow: 0 0 30px rgba(56, 189, 248, 0.3);
            transition: 0.3s;
        }

        .p-step:hover .step-num {
            transform: scale(1.1);
            background: var(--primary);
            color: #0b1120;
        }

        .p-step h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #fff;
            margin: 0;
        }

        .step-connector {
            flex-grow: 1;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), transparent);
            margin: 0 -30px 0 -30px;
            opacity: 0.3;
        }

        /* CTA Bottom with Illustration */
        .cta-bottom {
            padding: 40px 0;
            background: linear-gradient(135deg, #0b1120 0%, #1e293b 100%);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            position: relative;
            overflow: hidden;
        }

        .cta-bottom::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.1), transparent 70%);
            pointer-events: none;
        }

        .cta-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .cta-content h2 {
            margin-bottom: 20px;
            font-size: 2.8rem;
            line-height: 1.2;
            font-weight: 800;
        }

        .cta-content p {
            color: #94a3b8;
            margin-bottom: 40px;
            font-size: 1.2rem;
            line-height: 1.6;
        }

        .btn-cta-big {
            padding: 20px 50px;
            background: linear-gradient(90deg, #38bdf8, #818cf8);
            color: #fff;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 800;
            text-decoration: none;
            transition: 0.3s;
            display: inline-block;
            box-shadow: 0 10px 30px rgba(56, 189, 248, 0.3);
        }

        .btn-cta-big:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(56, 189, 248, 0.5);
        }

        /* Illustration Container */
        .cta-illustration {
            position: relative;
        }

        .animated-svg {
            width: 100%;
            height: auto;
            filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.3));
        }

        /* SVG Animations */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes floatSlow {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 0.1;
                transform: scale(1);
            }

            50% {
                opacity: 0.2;
                transform: scale(1.05);
            }
        }

        @keyframes drawLine {
            from {
                stroke-dashoffset: 100;
            }

            to {
                stroke-dashoffset: 0;
            }
        }

        @keyframes iconFloat {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-10px) rotate(5deg);
            }
        }

        @keyframes checkmarkDraw {
            from {
                stroke-dashoffset: 30;
            }

            to {
                stroke-dashoffset: 0;
            }
        }

        /* Apply animations to SVG elements */
        .float-1 {
            animation: float 4s ease-in-out infinite;
        }

        .float-2 {
            animation: floatSlow 5s ease-in-out infinite 0.5s;
        }

        .float-3 {
            animation: float 3.5s ease-in-out infinite 1s;
        }

        .pulse {
            animation: pulse 3s ease-in-out infinite;
        }

        .code-line-1,
        .code-line-2,
        .code-line-3,
        .code-line-4 {
            stroke-dasharray: 100;
            animation: drawLine 2s ease-in-out infinite;
        }

        .code-line-2 {
            animation-delay: 0.3s;
        }

        .code-line-3 {
            animation-delay: 0.6s;
        }

        .code-line-4 {
            animation-delay: 0.9s;
        }

        .icon-float-1 {
            animation: iconFloat 3s ease-in-out infinite;
        }

        .icon-float-2 {
            animation: iconFloat 4s ease-in-out infinite 0.5s;
        }

        .checkmark {
            stroke-dasharray: 30;
            animation: checkmarkDraw 1.5s ease-in-out infinite;
        }

        .success-badge {
            animation: pulse 2s ease-in-out infinite;
        }

        @media(max-width: 992px) {
            .grid-2-smart {
                grid-template-columns: 1fr;
            }

            .process-steps {
                flex-direction: column;
                gap: 40px;
            }

            .step-connector {
                width: 2px;
                height: 50px;
                margin: 0 auto;
            }

            .service-title {
                font-size: 2.5rem;
            }

            /* CTA Responsive */
            .cta-grid {
                grid-template-columns: 1fr;
                gap: 50px;
            }

            .cta-content {
                text-align: center;
            }

            .cta-content h2 {
                font-size: 2.2rem;
            }

            .cta-illustration {
                max-width: 400px;
                margin: 0 auto;
            }
        }

        /* Light Theme Overrides */
        .bg-light {
            background: #f8fafc;
            color: #0f172a;
        }

        .section-label {
            color: var(--primary);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 700;
            display: block;
            margin-bottom: 10px;
        }

        /* Case Studies */
        .case-studies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .case-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 20px;
            transition: 0.3s;
        }

        .case-card:hover {
            background: rgba(255, 255, 255, 0.06);
            transform: translateY(-5px);
        }

        .metric-val {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            line-height: 1;
            margin-bottom: 5px;
        }

        .metric-label {
            color: #94a3b8;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }

        .case-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #fff;
        }

        .case-desc {
            color: #cbd5e1;
            font-size: 0.95rem;
        }

        /* Pricing */
        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            align-items: flex-start;
        }

        .pricing-card {
            background: #0f172a;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 40px 30px;
            border-radius: 24px;
            position: relative;
            transition: 0.3s;
        }

        .pricing-card.popular {
            background: linear-gradient(145deg, #1e293b, #0f172a);
            border-color: var(--primary);
            box-shadow: 0 0 30px rgba(56, 189, 248, 0.15);
            transform: scale(1.05);
            z-index: 2;
        }

        .popular-badge {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--primary);
            color: #000;
            font-size: 0.75rem;
            font-weight: 800;
            padding: 5px 15px;
            border-radius: 20px;
        }

        .plan-name {
            font-size: 1.4rem;
            color: #fff;
            margin-bottom: 15px;
        }

        .plan-price {
            font-size: 2.5rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 15px;
        }

        .plan-desc {
            color: #94a3b8;
            margin-bottom: 30px;
            font-size: 0.95rem;
        }

        .plan-features {
            list-style: none;
            padding: 0;
            margin-bottom: 30px;
        }

        .plan-features li {
            margin-bottom: 12px;
            color: #cbd5e1;
            display: flex;
            gap: 10px;
            font-size: 0.95rem;
        }

        .plan-features li i {
            color: var(--primary);
        }

        .btn-plan {
            display: block;
            width: 100%;
            text-align: center;
            padding: 14px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            text-decoration: none;
            font-weight: 700;
            transition: 0.3s;
        }

        .pricing-card.popular .btn-plan,
        .btn-plan:hover {
            background: var(--primary);
            color: #0b1120;
        }

        /* Sticky CTA */
        .sticky-cta-bar {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 12px 30px;
            border-radius: 50px;
            z-index: 999;
            width: 90%;
            max-width: 800px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            display: block;
        }

        .flex-cta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 !important;
        }

        .cta-label {
            color: #94a3b8;
            margin-right: 15px;
            font-size: 0.9rem;
        }

        .cta-phone {
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
        }

        .cta-actions-nav {
            display: flex;
            gap: 15px;
        }

        .btn-whatsapp-sticky {
            background: #25D366;
            color: #fff;
            padding: 8px 18px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-talk-sticky {
            background: var(--primary);
            color: #0b1120;
            padding: 8px 18px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.85rem;
        }

        @media(max-width: 768px) {
            .sticky-cta-bar {
                bottom: 15px;
                /* Add margin at bottom */
                width: 94%;
                /* Card width */
                left: 3%;
                /* Center it manually */
                transform: none;
                border-radius: 16px;
                /* Rounded corners */
                padding: 15px 20px;
                border: 1px solid rgba(255, 255, 255, 0.1);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            }

            .cta-text-nav {
                display: none;
            }

            .cta-actions-nav {
                width: 100%;
                justify-content: space-between;
            }

            .btn-whatsapp-sticky,
            .btn-talk-sticky {
                flex: 1;
                justify-content: center;
            }
        }

        .bg-light .section-lead,
        .bg-light p,
        .bg-light li {
            color: #334155 !important;
            font-weight: 500;
        }

        .bg-light .benefit-list li i {
            color: #0284c7;
        }

        .bg-light .tech-pill {
            background: #ffffff;
            color: #334155;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .bg-light .image-wrapper-tech {
            border-color: rgba(0, 0, 0, 0.1);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        /* Use Cases */
        .use-cases-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            max-width: 1000px;
            margin: 0;
        }


        .use-case-card {
            background: var(--bg-panel);
            padding: 25px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 15px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: 0.3s;
        }

        .use-case-card:hover {
            border-color: var(--primary);
            transform: translateX(5px);
        }

        .check-icon {
            width: 30px;
            height: 30px;
            background: rgba(56, 189, 248, 0.1);
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }

        .use-case-card h4 {
            font-size: 1.05rem;
            margin: 0;
            color: #e2e8f0;
        }

        /* FAQ Accordion Styles */
        .faq-wrapper {
            margin-top: 10px;
        }

        .faq-item {
            background: rgba(255, 255, 255, 0.03);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 5px;
            border-radius: 8px;
            overflow: hidden;
        }

        .faq-q {
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 600;
            color: #fff;
            transition: 0.3s;
        }

        .faq-q:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        .faq-a {
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            color: #94a3b8;
        }

        .faq-item.active .faq-a {
            padding: 10px 20px 20px;
            max-height: 500px;
        }

        .faq-item.active .faq-q i {
            transform: rotate(45deg);
        }
    </style>

    <script>
        document.querySelectorAll('.faq-q').forEach(q => {
            q.addEventListener('click', () => {
                const item = q.parentElement;
                item.classList.toggle('active');
                const icon = q.querySelector('i');
                if (item.classList.contains('active')) {
                    icon.classList.replace('fa-plus', 'fa-times');
                } else {
                    icon.classList.replace('fa-times', 'fa-plus');
                }
            });
        });
    </script>
@endsection