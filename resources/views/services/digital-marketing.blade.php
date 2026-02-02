@extends('layouts.app')
@section('header_class', 'scrolled')

@section('content')
    <div class="service-detail-page">

        <!-- Hero Section -->
        <section class="service-hero"
            style="background-image: url('{{ asset('images/hero-tech.png') }}'); background-color: #0b1120;">
            <div class="hero-overlay"></div>
            <div class="container relative z-10">
                <div class="hero-content">
                    <span class="hero-highlight">DIGITAL GROWTH ENGINE</span>
                    <h1 class="service-title">Digital Marketing</h1>
                    <p class="service-subtitle">Maximize ROI, generate high-quality leads, and dominate your market with our
                        premium, results-oriented marketing strategies.</p>

                    <div class="hero-trust-points">
                        <span class="trust-pill"><i class="fas fa-check-circle"></i> 500+ Clients</span>
                        <span class="trust-pill"><i class="fas fa-check-circle"></i> 4.9/5 Rating</span>
                        <span class="trust-pill"><i class="fas fa-check-circle"></i> ₹50cr+ Revenue</span>
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
                        <h2 class="section-h2">Why Choose Our <br><span class="text-gradient">Digital Marketing</span>?
                        </h2>
                        <p class="section-lead">We don't just run ads; we build comprehensive growth systems. By integrating
                            SEO, PPC, and Content, we create a machine that predictably generates revenue for your business.
                        </p>

                        <ul class="benefit-list">
                            <li><i class="fas fa-check"></i> Data-Driven Decisions</li>
                            <li><i class="fas fa-check"></i> High-Converting Campaigns</li>
                            <li><i class="fas fa-check"></i> Dedicated Account Manager</li>
                            <li><i class="fas fa-check"></i> Real-time ROI Dashboard</li>
                        </ul>
                    </div>
                    <div class="image-col">
                        <div class="image-wrapper-tech"
                            style="min-height: 400px; background: #1e293b; display: flex; align-items: center; justify-content: center;">
                            <!-- Abstract Illustration representation -->
                            <i class="fas fa-chart-line" style="font-size: 10rem; color: #38bdf8; opacity: 0.2;"></i>
                            <div class="tech-blob"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features / Capabilities -->
        <section class="section-spacing bg-darker">
            <div class="container">
                <div class="text-left">
                    <span class="section-label">Capabilities</span>
                    <h2 class="section-h2">What We Offer</h2>
                </div>

                <div class="features-grid">
                    <div class="feature-card">
                        <div class="f-icon"><i class="fas fa-search-dollar"></i></div>
                        <h3>SEO Services</h3>
                        <p>Dominate search results with technical SEO, content strategy, and authority building to drive
                            organic traffic.</p>
                        <div class="f-glow"></div>
                    </div>
                    <div class="feature-card">
                        <div class="f-icon"><i class="fab fa-google"></i></div>
                        <h3>Google Ads</h3>
                        <p>Capture high-intent leads instantly with optimized PPC campaigns, smart bidding, and conversion
                            focus.</p>
                        <div class="f-glow"></div>
                    </div>
                    <div class="feature-card">
                        <div class="f-icon"><i class="fab fa-instagram"></i></div>
                        <h3>Social Media</h3>
                        <p>Build a loyal community and drive engagement across Instagram, LinkedIn, Facebook, and more.</p>
                        <div class="f-glow"></div>
                    </div>
                    <div class="feature-card">
                        <div class="f-icon"><i class="fas fa-pen-nib"></i></div>
                        <h3>Content Marketing</h3>
                        <p>Authority-building content that nurtures leads and positions your brand as an industry leader.
                        </p>
                        <div class="f-glow"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tech Stack -->
        <section class="section-spacing" style="background: #0f172a;">
            <div class="container">
                <div style="text-align: left;">
                    <h2 class="section-h2">Tools We Use</h2>
                </div>
                <div class="tech-stack-flex">
                    <div class="tech-pill">Google Analytics 4</div>
                    <div class="tech-pill">Google Ads</div>
                    <div class="tech-pill">Meta Business</div>
                    <div class="tech-pill">Ahrefs</div>
                    <div class="tech-pill">SEMrush</div>
                    <div class="tech-pill">HubSpot</div>
                    <div class="tech-pill">Mailchimp</div>
                    <div class="tech-pill">Canva</div>
                </div>
            </div>
        </section>

        <!-- Process Flow -->
        <section class="section-spacing bg-panel">
            <div class="container">
                <div class="text-left">
                    <h2 class="section-h2">Our Process</h2>
                </div>
                <div class="process-steps">
                    <div class="p-step">
                        <div class="step-num">1</div>
                        <h4>Audit & Research</h4>
                    </div>
                    <div class="step-connector"></div>
                    <div class="p-step">
                        <div class="step-num">2</div>
                        <h4>Strategy & Plan</h4>
                    </div>
                    <div class="step-connector"></div>
                    <div class="p-step">
                        <div class="step-num">3</div>
                        <h4>Execution</h4>
                    </div>
                    <div class="step-connector"></div>
                    <div class="p-step">
                        <div class="step-num">4</div>
                        <h4>Optimization</h4>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pricing / Packages -->
        <section class="section-spacing">
            <div class="container">
                <div class="text-center" style="margin-bottom: 50px;">
                    <h2 class="section-h2" style="text-align: center;">Transparent Pricing</h2>
                    <p class="section-lead" style="margin: 0 auto; max-width: 600px;">Choose the perfect plan for your
                        business growth.</p>
                </div>
                <div class="pricing-grid">
                    <!-- Starter -->
                    <div class="pricing-card">
                        <h3 class="plan-name">Starter</h3>
                        <div class="plan-price">₹999<span>/mo</span></div>
                        <p class="plan-desc">For small businesses starting their journey.</p>
                        <ul class="plan-features">
                            <li><i class="fas fa-check"></i> Basic SEO Setup</li>
                            <li><i class="fas fa-check"></i> Social Media (2 Platforms)</li>
                            <li><i class="fas fa-check"></i> Monthly Reporting</li>
                            <li><i class="fas fa-check"></i> 5 Blog Posts</li>
                        </ul>
                        <a href="javascript:void(0)" onclick="openContactModal(event)" class="btn-plan">Choose Plan</a>
                    </div>

                    <!-- Growth -->
                    <div class="pricing-card popular">
                        <div class="popular-badge">MOST POPULAR</div>
                        <h3 class="plan-name">Growth</h3>
                        <div class="plan-price">₹2499<span>/mo</span></div>
                        <p class="plan-desc">Accelerated growth for established brands.</p>
                        <ul class="plan-features">
                            <li><i class="fas fa-check"></i> Advanced SEO & Backlinks</li>
                            <li><i class="fas fa-check"></i> Google & Meta Ads Management</li>
                            <li><i class="fas fa-check"></i> Weekly Reporting</li>
                            <li><i class="fas fa-check"></i> Email Marketing Automation</li>
                        </ul>
                        <a href="javascript:void(0)" onclick="openContactModal(event)" class="btn-plan">Choose Plan</a>
                    </div>

                    <!-- Enterprise -->
                    <div class="pricing-card">
                        <h3 class="plan-name">Enterprise</h3>
                        <div class="plan-price">Custom</div>
                        <p class="plan-desc">Full-scale digital dominance.</p>
                        <ul class="plan-features">
                            <li><i class="fas fa-check"></i> Omni-channel Strategy</li>
                            <li><i class="fas fa-check"></i> Custom Development</li>
                            <li><i class="fas fa-check"></i> Real-time Dashboards</li>
                            <li><i class="fas fa-check"></i> 24/7 Priority Support</li>
                        </ul>
                        <a href="javascript:void(0)" onclick="openContactModal(event)" class="btn-plan">Contact Us</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA with Animated Illustration -->
        <section class="cta-bottom">
            <div class="container">
                <div class="cta-grid">
                    <!-- Left: Content -->
                    <div class="cta-content">
                        <h2>Ready to start your Digital Marketing project?</h2>
                        <p>Let's discuss how we can help you achieve your goals.</p>
                        <a href="{{ route('contact') }}" class="btn-cta-big">Talk to an Expert</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- Sticky Bottom CTA -->
    <div class="sticky-cta-bar">
        <div class="container flex-cta">
            <div class="cta-text-nav">
                <span class="cta-label">Ready to scale?</span>
                <span class="cta-phone"><i
                        class="fas fa-phone-alt"></i>{{ $global_settings['phone_india'] ?? '+91 91729 20505' }}</span>
            </div>
            <div class="cta-actions-nav">
                @php
                    $sd_wa = $global_settings['contact_whatsapp'] ?? '919172920505';
                    $sd_wa = preg_replace('/[^0-9]/', '', $sd_wa);
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
        /* Service Detail Styles - REPLICATED FROM service_detail.blade.php */
        /* Core Layout */
        .service-detail-page {
            background-color: #0b1120 !important;
            font-family: 'Outfit', sans-serif;
        }

        .service-detail-page .container {
            max-width: 100% !important;
            padding-left: 40px !important;
            padding-right: 40px !important;
            margin: 0 !important;
        }

        /* Hero */
        .service-hero {
            height: 55vh;
            min-height: 500px;
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: center;
            padding-top: 60px;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top right, rgba(56, 189, 248, 0.3), transparent 60%), linear-gradient(90deg, #0b1120 0%, rgba(11, 17, 32, 0.95) 40%, rgba(11, 17, 32, 0.6) 100%);
            z-index: 1;
        }

        .hero-content {
            max-width: 1000px;
            position: relative;
            z-index: 2;
            text-align: left;
            margin-left: 0;
            margin-right: auto;
        }

        .hero-highlight {
            color: #38bdf8 !important;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-size: 0.9rem;
            display: block;
            margin-bottom: 10px;
        }

        .service-title {
            font-size: 4rem;
            line-height: 1.1;
            margin-bottom: 15px;
            color: #ffffff !important;
        }

        .service-subtitle {
            font-size: 1.25rem;
            color: #cbd5e1 !important;
            margin-bottom: 25px;
            font-weight: 300;
            max-width: 600px;
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
            color: #38bdf8;
        }

        .btn-hero-glow {
            background: #38bdf8;
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

        /* Sections */
        .section-spacing {
            padding: 60px 0;
        }

        .bg-darker {
            background: #080c17;
        }

        .bg-panel {
            background: rgba(255, 255, 255, 0.02);
        }

        .text-left {
            text-align: left;
        }

        .section-label {
            color: #38bdf8;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 700;
            display: block;
            margin-bottom: 10px;
        }

        .section-h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: white;
        }

        .section-lead {
            font-size: 1.1rem;
            color: #94a3b8;
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .grid-2-smart {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
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
            color: #38bdf8;
        }

        .image-wrapper-tech {
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.02);
            padding: 40px 30px;
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: 0.3s;
            position: relative;
            overflow: hidden;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-color: #38bdf8;
        }

        .f-icon {
            font-size: 2.5rem;
            color: #38bdf8;
            margin-bottom: 25px;
        }

        .feature-card h3 {
            font-size: 1.25rem;
            margin-bottom: 15px;
            color: white;
        }

        .feature-card p {
            color: #94a3b8;
            font-size: 0.95rem;
        }

        .f-glow {
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: #38bdf8;
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
            gap: 15px;
        }

        .tech-pill {
            padding: 10px 24px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            color: #cbd5e1;
            font-weight: 600;
        }

        /* Process */
        .process-steps {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 40px;
        }

        .p-step {
            text-align: center;
            position: relative;
            z-index: 2;
            flex: 1;
        }

        .step-num {
            width: 60px;
            height: 60px;
            background: rgba(30, 41, 59, 0.8);
            border: 2px solid #38bdf8;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0 auto 20px;
        }

        .step-connector {
            flex-grow: 1;
            height: 2px;
            background: linear-gradient(90deg, #38bdf8, transparent);
            margin: 0 -30px;
            opacity: 0.3;
        }

        .p-step h4 {
            color: white;
            font-size: 1.1rem;
        }

        /* Pricing */
        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
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
            border-color: #38bdf8;
            transform: scale(1.05);
            z-index: 2;
        }

        .popular-badge {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: #38bdf8;
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

        .plan-price span {
            font-size: 1rem;
            color: #94a3b8;
            font-weight: 400;
        }

        .plan-desc {
            color: #94a3b8;
            margin-bottom: 30px;
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
        }

        .plan-features li i {
            color: #38bdf8;
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
            background: #38bdf8;
            color: #0b1120;
        }

        /* CTA Bottom */
        .cta-bottom {
            padding: 80px 0;
            background: linear-gradient(135deg, #0b1120 0%, #1e293b 100%);
        }

        .cta-content h2 {
            margin-bottom: 20px;
            font-size: 2.8rem;
            font-weight: 800;
            color: white;
        }

        .cta-content p {
            color: #94a3b8;
            margin-bottom: 40px;
            font-size: 1.2rem;
        }

        .btn-cta-big {
            padding: 20px 50px;
            background: linear-gradient(90deg, #38bdf8, #818cf8);
            color: #fff;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 800;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 10px 30px rgba(56, 189, 248, 0.3);
        }

        /* Sticky Bar */
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
            background: #38bdf8;
            color: #0b1120;
            padding: 8px 18px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.85rem;
        }

        @media(max-width: 992px) {
            .grid-2-smart {
                grid-template-columns: 1fr;
            }

            .process-steps {
                flex-direction: column;
                gap: 30px;
            }

            .step-connector {
                width: 2px;
                height: 30px;
                margin: 0 auto;
            }

            .service-title {
                font-size: 2.5rem;
            }

            .sticky-cta-bar {
                width: 94%;
                bottom: 15px;
                padding: 15px;
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
    </style>
@endsection