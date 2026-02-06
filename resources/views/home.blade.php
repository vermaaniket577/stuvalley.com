@extends('layouts.app')

@section('content')
    <!-- Global Parallax Background -->
    <div class="parallax-bg-container"
        style="position: fixed; top: 0; left: 0; width: 100%; height: 100vh; background: #000; z-index: 0; pointer-events: none; overflow: hidden;">
        <!-- Moving Grid -->
        <div class="tech-grid-overlay" data-speed="0.1"></div>

        <!-- Floating Orbs -->
        <div class="floating-orb orb-purple" style="top: 15%; left: -10%; width: 500px; height: 500px;" data-speed="0.2">
        </div>
        <div class="floating-orb orb-cyan" style="top: 45%; right: -5%; width: 400px; height: 400px;" data-speed="0.3">
        </div>
        <div class="floating-orb orb-purple" style="top: 85%; left: 20%; width: 300px; height: 300px;" data-speed="0.15">
        </div>

        <!-- Vertical Tech Lines -->
        <div class="tech-line-vertical" style="left: 15%;" data-speed="0.5"></div>
        <div class="tech-line-vertical" style="right: 25%;" data-speed="0.7"></div>
        <div class="tech-line-vertical" style="left: 50%; opacity: 0.1;" data-speed="0.3"></div>
    </div>
    <section class="hero" id="home">
        <!-- Background Video -->
        <video autoplay muted loop playsinline preload="auto" poster="{{ asset('images/hero-bg-full.png') }}"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0; filter: brightness(0.9); display: block;">
            <source src="{{ asset('videos/hero-loop.mp4') }}" type="video/mp4">
        </video>

        <div class="hero-bg-text">TECH<br>EVOLUTION</div>

        <div class="hero-container">
            <div class="hero-grid">
                <!-- LEFT COLUMN -->
                <div class="hero-left">
                    <div class="hero-badge-wrapper">
                        <span class="hero-badge">
                            <span class="pulse-dot"></span>
                            Transforming Ideas into Reality
                        </span>
                    </div>

                    <h1 class="hero-title">
                        <span>Empowering Your</span><br>
                        <span class="text-blue">Digital</span><br>
                        <span class="text-orange">Future</span>
                    </h1>

                    <p class="hero-description">
                        Stuvalley Technology delivers cutting-edge solutions in academia, research, training, and
                        recruitment. We blend innovation with expertise to shape the future of technology and education.
                    </p>

                    <div class="hero-btns">
                        <a href="{{ route('contact') }}" class="btn-primary-tech">Get Started <i
                                class="fas fa-arrow-right"></i></a>
                        <a href="#services" class="btn-outline-tech">Our Services <i class="fas fa-arrow-right"></i></a>
                    </div>

                </div>
                <!-- RIGHT COLUMN -->
                <div class="hero-right">
                    <div class="hero-features-list">
                        <div class="hero-feature-item">
                            <span class="feat-num">01</span>
                            <h4 class="feat-title">Custom Dev</h4>
                            <p class="feat-desc">Tailored solutions for your business needs</p>
                        </div>

                        <div class="hero-feature-item orange">
                            <span class="feat-num">02</span>
                            <h4 class="feat-title">Digital Growth</h4>
                            <p class="feat-desc">Strategies that drive sustainable results</p>
                        </div>

                        <div class="hero-feature-item cyan">
                            <span class="feat-num">03</span>
                            <h4 class="feat-title">Cloud & AI</h4>
                            <p class="feat-desc">Future-ready infrastructure and intelligent tools</p>
                        </div>

                        <a href="{{ route('contact') }}" class="btn-explore-sol">Explore Solutions <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PREMIUM PARTNER SCROLL (Card Style) -->
    @if(isset($partners) && $partners->count() > 0)
        <section class="partner-ticker-section"
            style="background: #f8fafc; padding: 30px 0; border-bottom: 1px solid #e2e8f0; overflow: hidden; position: relative; margin-top: -20px; z-index: 20; backface-visibility: hidden; -webkit-backface-visibility: hidden; box-shadow: 0 -1px 0 rgba(0,0,0,0.02);">

            <!-- Gradient Masks (Light) -->
            <div
                style="position: absolute; top: 0; left: 0; width: 120px; height: 100%; background: linear-gradient(to right, #f8fafc, transparent); z-index: 2; pointer-events: none;">
            </div>
            <div
                style="position: absolute; top: 0; right: 0; width: 120px; height: 100%; background: linear-gradient(to left, #f8fafc, transparent); z-index: 2; pointer-events: none;">
            </div>

            <div class="ticker-wrapper" style="display: flex;">
                <div class="ticker-content"
                    style="display: flex; animation: scrollLeft 50s linear infinite; align-items: center;">
                    @for ($i = 0; $i < 6; $i++) <!-- Loop 6 times -->
                        @foreach($partners as $partner)
                            <a href="{{ $partner->link ?? '#' }}" target="_blank" class="ticker-item"
                                style="flex: 0 0 auto; margin: 0 30px; padding: 25px 40px; background: #ffffff; border-radius: 16px; box-shadow: 0 4px 6px rgba(0,0,0,0.02); display: flex; align-items: center; justify-content: center; min-width: 200px; height: 100px; transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1); text-decoration: none; cursor: pointer;">
                                @php
                                    $logoUrl = str_starts_with($partner->logo, 'http')
                                        ? $partner->logo
                                        : asset('storage/' . $partner->logo);
                                @endphp
                                <img src="{{ $logoUrl }}" alt="{{ $partner->name }}" class="partner-logo-img" loading="lazy"
                                    style="height: 40px; width: auto; max-width: 140px; object-fit: contain; transition: all 0.3s ease;">
                            </a>
                        @endforeach
                    @endfor
                </div>
            </div>
        </section>
    @endif

    <!-- SOLUTIONS / CARDS SECTION -->
    {{-- <section class="solutions-section" style="position: relative; z-index: 1; padding: 100px 0; background: #ffffff;">
        <style>
            /* Specific Styles for Solutions Grid Section */

            /* 1. Spacing Improvements */
            .solutions-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 30px;
                margin-top: 36px;
                /* User Request: Spacing on grid */
            }

            .solutions-section .sec-desc {
                margin-bottom: 24px !important;
                /* User Request: Spacing after paragraph */
            }

            /* 2. Card Styling */
            .sol-card {
                position: relative;
                height: 220px;
                /* User Request: Fixed height */
                border-radius: 18px;
                /* User Request: Radius */
                overflow: hidden;
                border: 1px solid rgba(0, 0, 0, 0.06);
                /* User Request: Subtle border */
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.04);
                /* User Request: Subtle shadow */
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                cursor: pointer;
                background: #000;
                /* Fallback */
            }

            /* 3. Title Readability & Overlay */
            .sol-bg {
                position: absolute;
                inset: 0;
                background-size: cover;
                background-position: center;
                transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
                /* Zoom smooth */
                width: 100%;
                height: 100%;
            }

            .sol-overlay {
                position: absolute;
                inset: 0;
                background: linear-gradient(to top, rgba(0, 0, 0, 0.95) 0%, rgba(0, 0, 0, 0.7) 45%, transparent 100%);
                /* User Request: Stronger bottom overlay */
                z-index: 1;
                transition: opacity 0.3s ease;
            }

            .sol-content {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                padding: 24px;
                z-index: 2;
                display: flex;
                justify-content: space-between;
                align-items: flex-end;
            }

            .sol-content h3 {
                color: #fff;
                font-size: 1.35rem;
                /* Slightly larger for readability */
                font-weight: 700;
                margin: 0;
                line-height: 1.2;
                text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
                font-family: 'Manrope', sans-serif;
            }

            .sol-icon {
                color: #fff;
                font-size: 1.1rem;
                width: 36px;
                height: 36px;
                background: rgba(255, 255, 255, 0.15);
                backdrop-filter: blur(4px);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.3s ease;
                transform: translateX(0);
            }

            /* 4. Premium Hover Effects */
            .sol-card:hover {
                transform: translateY(-8px);
                /* User Request: Card lift */
                box-shadow: 0 20px 40px -5px rgba(0, 0, 0, 0.15), 0 10px 20px -5px rgba(0, 0, 0, 0.1);
                border-color: rgba(0, 0, 0, 0.0);
                /* Cleaner look on lift */
            }

            .sol-card:hover .sol-bg {
                transform: scale(1.1);
                /* User Request: Image zoom */
            }

            .sol-card:hover .sol-icon {
                background: #3b82f6;
                /* Premium Blue Highlight */
                transform: translateX(5px);
                /* User Request: Arrow move */
                color: #fff;
            }

            /* Hide the detailed hover text to fit the premium shorter card */
            .sol-hover {
                display: none !important;
            }

            /* Responsive */
            @media (max-width: 992px) {
                .solutions-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 576px) {
                .solutions-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>
        <style>
            @media (max-width: 768px) {
                .svc-wrap {
                    padding: 0 18px !important;
                }

                .svc-title {
                    font-size: 2.1rem !important;
                }

                .svc-desc {
                    font-size: 1rem !important;
                    line-height: 1.75 !important;
                    max-width: 100% !important;
                }
            }
        </style>

        <section
            style="width:100%; background:#ffffff; padding:90px 0 60px; margin-top: -2px; position: relative; z-index: 21;">
            <div style="max-width:1200px; padding:0 clamp(18px, 4vw, 40px); margin:0 auto;">

                <span
                    style="display:inline-block; font-size:12px; letter-spacing:0.18em; font-weight:600; color:#3b82f6; margin-bottom:18px;">
                    INNOVATIVE WEB DEVELOPMENT SOLUTION
                </span>

                <h2
                    style="
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  margin:0 0 22px 0;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  font-weight:800;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  line-height:1.08;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  color:#1e293b;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  font-size:clamp(2.1rem, 3.6vw, 3.4rem);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  max-width: 1100px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ">
                    Custom-Built Systems for a
                    <span style="color:#3b82f6;">Smarter, Scalable</span>
                    Business
                </h2>

                <p
                    style="
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  margin:0;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  color:#64748b;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  font-size:clamp(1rem, 1.05vw, 1.15rem);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  line-height:1.85;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  max-width: 1100px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  allign: justify;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ">
                    Take your business to new heights with our custom, intelligent, and adaptable web design and
                    development services in India – trusted by clients worldwide. We build powerful and innovative
                    platforms that simplify operations, automate workflows, and drive productivity. When you're ready
                    to scale your business ahead, we can develop an intuitive mobile app that works perfectly with your
                    website. This ensures a delightful user experience, increases presence widely, and helps you achieve
                    targeted goals.
                </p>

            </div>
        </section>

        <div class="solutions-grid">
            <!-- Card 1: HRM -->
            <a href="{{ route('services.show', 'hrm-solution') }}" class="sol-card"
                style="display: block; text-decoration: none; color: inherit;">
                <div class="sol-bg"
                    style="background-image: url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                </div>
                <div class="sol-overlay"></div>
                <div class="sol-content">
                    <h3>HRM Solution</h3>
                    <i class="fas fa-arrow-right sol-icon"></i>
                </div>
                <div class="sol-hover">
                    <h3>HRM Solution</h3>
                    <p>Streamline human resource management with automated attendance, payroll, and performance
                        tracking systems.</p>
                    <i class="fas fa-arrow-right sol-arrow"></i>
                </div>
            </a>

            <!-- Card 2: CRM -->
            <a href="{{ route('services.show', 'crm-solution') }}" class="sol-card"
                style="display: block; text-decoration: none; color: inherit;">
                <div class="sol-bg"
                    style="background-image: url('https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                </div>
                <div class="sol-overlay"></div>
                <div class="sol-content">
                    <h3>CRM Solution</h3>
                    <i class="fas fa-arrow-right sol-icon"></i>
                </div>
                <div class="sol-hover">
                    <h3>CRM Solution</h3>
                    <p>Through our powerful CRM solution, we help businesses track leads, convert potential customers,
                        & manage relationships.</p>
                    <i class="fas fa-arrow-right sol-arrow"></i>
                </div>
            </a>

            <!-- Card 3: ERP -->
            <a href="{{ route('services.show', 'erp-solution') }}" class="sol-card"
                style="display: block; text-decoration: none; color: inherit;">
                <div class="sol-bg"
                    style="background-image: url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                </div>
                <div class="sol-overlay"></div>
                <div class="sol-content">
                    <h3>ERP Solution</h3>
                    <i class="fas fa-arrow-right sol-icon"></i>
                </div>
                <div class="sol-hover">
                    <h3>ERP Solution</h3>
                    <p>Integrate all facets of your operation—planning, development, sales, and marketing—into a
                        single database.</p>
                    <i class="fas fa-arrow-right sol-arrow"></i>
                </div>
            </a>

            <!-- Card 4: LMS -->
            <a href="{{ route('services.show', 'lms-solution') }}" class="sol-card"
                style="display: block; text-decoration: none; color: inherit;">
                <div class="sol-bg"
                    style="background-image: url('https://images.unsplash.com/photo-1501504905252-473c47e087f8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                </div>
                <div class="sol-overlay"></div>
                <div class="sol-content">
                    <h3>LMS Solution</h3>
                    <i class="fas fa-arrow-right sol-icon"></i>
                </div>
                <div class="sol-hover">
                    <h3>LMS Solution</h3>
                    <p>Empower education with comprehensive Learning Management Systems for courses, quizzes, and
                        certifications.</p>
                    <i class="fas fa-arrow-right sol-arrow"></i>
                </div>
            </a>

            <!-- Card 5: Project Management -->
            <a href="{{ route('services.show', 'project-management') }}" class="sol-card"
                style="display: block; text-decoration: none; color: inherit;">
                <div class="sol-bg"
                    style="background-image: url('https://images.unsplash.com/photo-1507925921958-8a62f3d1a50d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                </div>
                <div class="sol-overlay"></div>
                <div class="sol-content">
                    <h3>Project Management</h3>
                    <i class="fas fa-arrow-right sol-icon"></i>
                </div>
                <div class="sol-hover">
                    <h3>Project Management</h3>
                    <p>Stay on top of deadlines and deliverables with robust task tracking and team collaboration
                        tools.</p>
                    <i class="fas fa-arrow-right sol-arrow"></i>
                </div>
            </a>

            <!-- Card 6: CMS -->
            <a href="{{ route('services.show', 'cms-solution') }}" class="sol-card"
                style="display: block; text-decoration: none; color: inherit;">
                <div class="sol-bg"
                    style="background-image: url('https://images.unsplash.com/photo-1432888622747-4eb9a8f2c293?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                </div>
                <div class="sol-overlay"></div>
                <div class="sol-content">
                    <h3>CMS Solution</h3>
                    <i class="fas fa-arrow-right sol-icon"></i>
                </div>
                <div class="sol-hover">
                    <h3>CMS Solution</h3>
                    <p>Manage your digital content effortlessly with custom-tailored Content Management Systems.</p>
                    <i class="fas fa-arrow-right sol-arrow"></i>
                </div>
            </a>

            <!-- Card 7: POS Solution -->
            <a href="{{ route('services.show', 'pos-solution') }}" class="sol-card"
                style="display: block; text-decoration: none; color: inherit;">
                <div class="sol-bg"
                    style="background-image: url('https://images.unsplash.com/photo-1556740738-b6a63e27c4df?w=800&q=80');">
                </div>
                <div class="sol-overlay"></div>
                <div class="sol-content">
                    <h3>POS Solution</h3>
                    <i class="fas fa-arrow-right sol-icon"></i>
                </div>
                <div class="sol-hover">
                    <h3>POS Solution</h3>
                    <p>Streamline transactions and inventory with our custom Point of Sale solutions.</p>
                    <i class="fas fa-arrow-right sol-arrow"></i>
                </div>
            </a>
        </div>
        </div>

    </section> --}}

    <!-- Empowering Business & Stats Section (Premium Redesign) -->
    <section class="empower-section"
        style="padding: 60px 0; background: #f8fafc; position: relative; overflow: hidden; margin-top: -20px; z-index: 21;">
        <!-- Subtle Background Glow -->
        <div
            style="position: absolute; top: 50%; right: -10%; width: 600px; height: 600px; background: radial-gradient(circle, rgba(59,130,246,0.04) 0%, transparent 70%); transform: translateY(-50%); pointer-events: none; z-index: 0;">
        </div>

        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 30px; position: relative; z-index: 2;">
            <div class="empower-grid"
                style="display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center;">

                <!-- Left Column: Content -->
                <div class="reveal">
                    <span
                        style="display: inline-block; color: #3b82f6; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 24px; padding-bottom: 10px; border-bottom: 2px solid rgba(59,130,246,0.2);">
                        YOUR DIGITAL PARTNERS IN GROWTH
                    </span>
                    <h2
                        style="font-size: clamp(2.5rem, 4vw, 3.2rem); font-weight: 800; color: #0f172a; line-height: 1.15; margin-bottom: 30px; font-family: 'Manrope', sans-serif; letter-spacing: -0.02em;">
                        Empowering Your Business Through Expert
                        <span
                            style="background: linear-gradient(90deg, #3b82f6, #2563eb); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Digital
                            Solutions</span>
                        and Innovation
                    </h2>
                    <p
                        style="color: #64748b; font-size: 1.125rem; line-height: 1.8; margin-bottom: 40px; font-weight: 400;">
                        We are a leading web designing company in India that focuses on empowering businesses to streamline
                        their operation with innovative and smart digital solutions. Specializing in web and mobile app
                        development, our expert team creates impactful strategies to help you unlock the full potential of
                        your business.
                    </p>

                    <a href="{{ route('services.index') }}" class="btn-discover">
                        Discover Our Expertise
                        <i class="fas fa-arrow-right" style="font-size: 0.9em;"></i>
                    </a>
                </div>

                <!-- Right Column: Stats Grid -->
                <div class="stats-grid-wrapper reveal delay-200">
                    <!-- Stat 1 -->
                    <div class="stat-card glass-card">
                        <h3 class="stat-number" data-target="1560">0+</h3>
                        <p class="stat-label">Project Delivered</p>
                    </div>
                    <!-- Stat 2 -->
                    <div class="stat-card glass-card">
                        <h3 class="stat-number" data-target="20">0+</h3>
                        <p class="stat-label">Countries Served</p>
                    </div>
                    <!-- Stat 3 -->
                    <div class="stat-card glass-card">
                        <h3 class="stat-number" data-target="98" data-suffix="%">0%</h3>
                        <p class="stat-label">Customer Retention</p>
                    </div>
                    <!-- Stat 4 -->
                    <div class="stat-card glass-card">
                        <h3 class="stat-number" data-target="7" data-suffix="+ Yrs">0+ Yrs</h3>
                        <p class="stat-label">In Industry</p>
                    </div>
                </div>
            </div>
        </div>

        <style>
            /* Typography & Layout */
            .empower-section {
                font-family: 'Manrope', sans-serif;
            }

            .btn-discover {
                display: inline-flex;
                align-items: center;
                gap: 10px;
                padding: 14px 32px;
                background: #0f172a;
                color: #fff;
                font-weight: 600;
                border-radius: 50px;
                text-decoration: none;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: 0 10px 20px -5px rgba(15, 23, 42, 0.3);
            }

            .btn-discover:hover {
                background: #3b82f6;
                transform: translateY(-2px);
                box-shadow: 0 15px 30px -5px rgba(59, 130, 246, 0.4);
            }

            /* Stats Grid */
            .stats-grid-wrapper {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 30px;
            }

            /* Glass Card Style - Scoped to Empower Section */
            .empower-section .glass-card {
                background: #ffffff;
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                border: 1px solid #e2e8f0;
                border-radius: 24px;
                padding: 40px 30px;
                text-align: center;
                box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.05);
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
                overflow: hidden;
            }

            .empower-section .glass-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 20px 40px -10px rgba(148, 163, 184, 0.25);
                background: rgba(255, 255, 255, 0.9);
                border-color: #fff;
            }

            /* Accent Top Border on Hover */
            .empower-section .glass-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 3px;
                background: linear-gradient(90deg, #f97316, #fb923c);
                opacity: 0;
                transition: opacity 0.3s;
            }

            .empower-section .glass-card:hover::before {
                opacity: 1;
            }

            /* Number Style */
            .stat-number {
                font-size: 2.8rem;
                font-weight: 800;
                margin-bottom: 8px;
                background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                font-family: 'Manrope', sans-serif;
            }

            .stat-label {
                color: #64748b;
                font-weight: 600;
                font-size: 0.95rem;
                letter-spacing: 0.5px;
                text-transform: uppercase;
                margin: 0;
            }

            /* Responsive */
            @media (max-width: 992px) {
                .empower-grid {
                    grid-template-columns: 1fr !important;
                    gap: 50px !important;
                }

                .stats-grid-wrapper {
                    gap: 20px !important;
                }

                /* User Request: Justify content on mobile */
                .empower-section .reveal p {
                    text-align: justify !important;
                }

                .empower-section .reveal h2 {
                    text-align: left !important;
                }
            }

            @media (max-width: 480px) {
                .stats-grid-wrapper {
                    grid-template-columns: 1fr;
                    /* Stack cards on very small screens */
                }
            }
        </style>

        <script>
            // Simple CountUp Animation
            document.addEventListener('DOMContentLoaded', () => {
                const stats = document.querySelectorAll('.stat-number');

                const animateStats = (entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const target = +entry.target.getAttribute('data-target');
                            const suffix = entry.target.getAttribute('data-suffix') || '+';
                            let count = 0;
                            const increment = target / 50; // Speed

                            const updateCount = () => {
                                count += increment;
                                if (count < target) {
                                    entry.target.innerText = Math.ceil(count) + suffix;
                                    requestAnimationFrame(updateCount);
                                } else {
                                    entry.target.innerText = target + suffix;
                                }
                            };
                            updateCount();
                            observer.unobserve(entry.target);
                        }
                    });
                };

                const observer = new IntersectionObserver(animateStats, { threshold: 0.5 });
                stats.forEach(stat => observer.observe(stat));
            });
        </script>
    </section>


    <!-- Technologies Section -->
    <section class="tech-stack-section" style="padding: 60px 0; background: #f8fafc;">
        <!-- Load Devicon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">

        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <!-- Header -->
            <div style="margin-bottom: 60px;">
                <span
                    style="display: block; color: #3b82f6; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px;">
                    TECHNOLOGIES WE DO BEST
                </span>
                <h2
                    style="font-size: 2.5rem; font-weight: 800; color: #0f172a; margin-bottom: 20px; font-family: 'Playfair Display', serif;">
                    Digitize Your Business with Our Expert Web Technologies
                </h2>
                <style>
                    @media (max-width: 768px) {
                        .tech-desc {
                            text-align: justify !important;
                        }
                    }
                </style>
                <p class="tech-desc" style="color: #64748b; font-size: 1rem; line-height: 1.7; max-width: 1000px;">
                    From dynamic websites to feature-rich applications, we harness the power of top-tier technologies to
                    make your digital experience more functional and user-friendly. We are a pioneering web design company
                    in India offering end-to-end development solutions prioritizing quality, performance, and client
                    satisfaction.
                </p>
            </div>

            <!-- Tech Marquee Container -->
            <div class="tech-marquee-container" style="position: relative; overflow: hidden; padding: 20px 0;">

                <!-- Row 1: Scrolls Left -->
                <div class="tech-marquee">
                    <div class="tech-track scroll-left">
                        <!-- Original Set -->
                        <div class="tech-item"><i class="devicon-nodejs-plain colored"></i><span>Node.js</span></div>
                        <div class="tech-item"><i class="devicon-python-plain colored"></i><span>Python</span></div>
                        <div class="tech-item"><i class="devicon-wordpress-plain colored"></i><span>WordPress</span></div>
                        <div class="tech-item"><i class="devicon-php-plain colored"></i><span>PHP</span></div>
                        <div class="tech-item"><i class="devicon-woocommerce-plain colored"></i><span>WooCommerce</span>
                        </div>
                        <div class="tech-item"><i class="devicon-react-original colored"></i><span>React Native</span></div>
                        <div class="tech-item"><i class="devicon-angularjs-plain colored"></i><span>Angular</span></div>
                        <div class="tech-item"><i class="devicon-vuejs-plain colored"></i><span>Vue.js</span></div>
                        <div class="tech-item"><i class="devicon-laravel-plain colored"></i><span>Laravel</span></div>
                        <div class="tech-item"><i class="devicon-java-plain colored"></i><span>Java</span></div>
                        <div class="tech-item"><i class="devicon-go-plain colored"></i><span>Go</span></div>
                        <div class="tech-item"><i class="devicon-html5-plain colored"></i><span>HTML5</span></div>

                        <!-- Duplicate Set -->
                        <div class="tech-item"><i class="devicon-nodejs-plain colored"></i><span>Node.js</span></div>
                        <div class="tech-item"><i class="devicon-python-plain colored"></i><span>Python</span></div>
                        <div class="tech-item"><i class="devicon-wordpress-plain colored"></i><span>WordPress</span></div>
                        <div class="tech-item"><i class="devicon-php-plain colored"></i><span>PHP</span></div>
                        <div class="tech-item"><i class="devicon-woocommerce-plain colored"></i><span>WooCommerce</span>
                        </div>
                        <div class="tech-item"><i class="devicon-react-original colored"></i><span>React Native</span></div>
                        <div class="tech-item"><i class="devicon-angularjs-plain colored"></i><span>Angular</span></div>
                        <div class="tech-item"><i class="devicon-vuejs-plain colored"></i><span>Vue.js</span></div>
                        <div class="tech-item"><i class="devicon-laravel-plain colored"></i><span>Laravel</span></div>
                        <div class="tech-item"><i class="devicon-java-plain colored"></i><span>Java</span></div>
                        <div class="tech-item"><i class="devicon-go-plain colored"></i><span>Go</span></div>
                        <div class="tech-item"><i class="devicon-html5-plain colored"></i><span>HTML5</span></div>
                    </div>
                </div>

                <!-- Row 2: Scrolls Right -->
                <div class="tech-marquee" style="margin-top: 50px;">
                    <div class="tech-track scroll-right">
                        <!-- Original Set -->
                        <div class="tech-item"><i class="devicon-flutter-plain colored"></i><span>Flutter</span></div>
                        <div class="tech-item"><i class="devicon-swift-plain colored"></i><span>Swift</span></div>
                        <div class="tech-item"><i class="devicon-kotlin-plain colored"></i><span>Kotlin</span></div>
                        <div class="tech-item"><i class="devicon-android-plain colored"></i><span>Android</span></div>
                        <div class="tech-item"><i class="devicon-apple-original colored"></i><span>iOS</span></div>
                        <div class="tech-item"><i class="devicon-mysql-plain colored"></i><span>MySQL</span></div>
                        <div class="tech-item"><i class="devicon-mongodb-plain colored"></i><span>MongoDB</span></div>
                        <div class="tech-item"><i class="devicon-postgresql-plain colored"></i><span>PostgreSQL</span></div>
                        <div class="tech-item"><i
                                class="devicon-amazonwebservices-plain-wordmark colored"></i><span>AWS</span></div>
                        <div class="tech-item"><i class="devicon-docker-plain colored"></i><span>Docker</span></div>

                        <!-- Duplicate Set -->
                        <div class="tech-item"><i class="devicon-flutter-plain colored"></i><span>Flutter</span></div>
                        <div class="tech-item"><i class="devicon-swift-plain colored"></i><span>Swift</span></div>
                        <div class="tech-item"><i class="devicon-kotlin-plain colored"></i><span>Kotlin</span></div>
                        <div class="tech-item"><i class="devicon-android-plain colored"></i><span>Android</span></div>
                        <div class="tech-item"><i class="devicon-apple-original colored"></i><span>iOS</span></div>
                        <div class="tech-item"><i class="devicon-mysql-plain colored"></i><span>MySQL</span></div>
                        <div class="tech-item"><i class="devicon-mongodb-plain colored"></i><span>MongoDB</span></div>
                        <div class="tech-item"><i class="devicon-postgresql-plain colored"></i><span>PostgreSQL</span></div>
                        <div class="tech-item"><i
                                class="devicon-amazonwebservices-plain-wordmark colored"></i><span>AWS</span></div>
                        <div class="tech-item"><i class="devicon-docker-plain colored"></i><span>Docker</span></div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .tech-marquee-container::before,
            .tech-marquee-container::after {
                content: "";
                position: absolute;
                top: 0;
                width: 150px;
                height: 100%;
                z-index: 2;
                pointer-events: none;
            }

            .tech-marquee-container::before {
                left: 0;
                background: linear-gradient(to right, #f8fafc, transparent);
            }

            .tech-marquee-container::after {
                right: 0;
                background: linear-gradient(to left, #f8fafc, transparent);
            }

            .tech-marquee {
                overflow: hidden;
                width: 100%;
            }

            .tech-track {
                display: flex;
                gap: 80px;
                width: max-content;
            }

            .tech-item {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 15px;
                width: 100px;
                flex-shrink: 0;
            }

            .tech-item i {
                font-size: 4rem;
                transition: transform 0.3s ease;
            }

            .tech-item span {
                font-size: 0.95rem;
                font-weight: 600;
                color: #94a3b8;
            }

            .tech-item:hover i {
                transform: scale(1.1);
            }

            .scroll-left {
                animation: scrollLeft 10s linear infinite;
            }

            .scroll-right {
                animation: scrollRight 35s linear infinite;
            }

            @keyframes scrollLeft {
                0% {
                    transform: translateX(0);
                }

                100% {
                    transform: translateX(-50%);
                }
            }

            @keyframes scrollRight {
                0% {
                    transform: translateX(-50%);
                }

                100% {
                    transform: translateX(0);
                }
            }

            /* Pause on hover */
            .tech-track:hover {
                animation-play-state: paused;
            }
        </style>
    </section>

    <style>
        @keyframes scrollLeft {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-16.666%);
            }
        }

        .ticker-item:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08) !important;
        }

        .ticker-item:hover img {
            filter: grayscale(0%) !important;
            opacity: 1 !important;
            transform: scale(1.1);
        }
    </style>
    <!-- Portfolio Carousel Section -->
    <section class="portfolio-section"
        style="background: #0f172a; padding: 120px 0; overflow: hidden; position: relative; margin-top: -20px; z-index: 22;">
        <!-- Background Elements -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; opacity: 0.4;">
            <div
                style="position: absolute; top: -10%; right: -5%; width: 500px; height: 500px; background: radial-gradient(circle, rgba(99,102,241,0.15) 0%, transparent 70%); border-radius: 50%;">
            </div>
            <div
                style="position: absolute; bottom: -10%; left: -5%; width: 500px; height: 500px; background: radial-gradient(circle, rgba(59,130,246,0.15) 0%, transparent 70%); border-radius: 50%;">
            </div>
        </div>

        <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 2;">
            <!-- Header -->
            <div class="section-title reveal" style="text-align: center; margin-bottom: 80px;">
                <span
                    style="display: block; color: #3b82f6; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 3px; margin-bottom: 20px;">
                    Selected Works
                </span>
                <h2
                    style="font-size: clamp(2.5rem, 5vw, 3.5rem); font-weight: 800; color: #fff; line-height: 1.1; margin-bottom: 25px; font-family: 'Manrope', sans-serif; letter-spacing: 4px;">
                    Enterprise-Grade <span
                        style="background: linear-gradient(90deg, #60a5fa, #a855f7); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Digital
                        Solutions</span>
                </h2>
                <p style="color: #94a3b8; font-size: 1.15rem; max-width: 700px; margin: 0 auto; line-height: 1.8;">
                    We partner with global brands to build scalable, high-performance platforms that drive measurable growth
                    and operational efficiency.
                </p>
            </div>

            <!-- Carousel Area -->
            <div class="pro-carousel-wrapper">
                <button id="pro-prev" class="pro-nav-btn"><i class="fas fa-arrow-left"></i></button>

                <div class="pro-track-container">
                    <div class="pro-track">
                        <!-- Card 1: SIMAURA -->
                        <div class="pro-card reveal">
                            <div class="pro-card-image">
                                <span class="pro-label">E-Commerce</span>
                                <img src="https://images.unsplash.com/photo-1556742502-ec7c0e9f34b1?auto=format&fit=crop&q=80&w=800"
                                    loading="lazy" alt="Simaura Project">
                                <div class="pro-overlay"></div>
                            </div>
                            <div class="pro-content">
                                <h3>SIMAURA</h3>
                                <p>A scalable, multi-vendor marketplace platform optimized for high-volume transactions and
                                    seamless logistics integration.</p>
                                <div class="pro-meta">
                                    <span class="pro-tag"><i class="fas fa-shopping-cart"></i> Retail Tech</span>
                                    <a href="#" class="pro-cta">View Case Study <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2: MENBITA -->
                        <div class="pro-card reveal delay-100">
                            <div class="pro-card-image">
                                <span class="pro-label" style="background: rgba(239, 68, 68, 0.9);">Corporate</span>
                                <img src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?auto=format&fit=crop&q=80&w=800"
                                    loading="lazy" alt="Menbita Project">
                                <div class="pro-overlay"></div>
                            </div>
                            <div class="pro-content">
                                <h3>MENBITA</h3>
                                <p>An enterprise event management ecosystem facilitating corporate networking, scheduling,
                                    and real-time collaboration.</p>
                                <div class="pro-meta">
                                    <span class="pro-tag"><i class="fas fa-building"></i> Enterprise</span>
                                    <a href="#" class="pro-cta">View Case Study <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3: FINCORP -->
                        <div class="pro-card reveal delay-200">
                            <div class="pro-card-image">
                                <span class="pro-label" style="background: rgba(16, 185, 129, 0.9);">FinTech</span>
                                <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop"
                                    loading="lazy" alt="Fincorp Project">
                                <div class="pro-overlay"></div>
                            </div>
                            <div class="pro-content">
                                <h3>FINCORP</h3>
                                <p>Secure financial analytics dashboard providing real-time asset visualization and
                                    automated reporting for investment firms.</p>
                                <div class="pro-meta">
                                    <span class="pro-tag"><i class="fas fa-chart-line"></i> Finance</span>
                                    <a href="#" class="pro-cta">View Case Study <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 4: EDULEASE -->
                        <div class="pro-card reveal delay-300">
                            <div class="pro-card-image">
                                <span class="pro-label" style="background: rgba(139, 92, 246, 0.9);">EdTech</span>
                                <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=800&auto=format&fit=crop"
                                    loading="lazy" alt="Edulease Project">
                                <div class="pro-overlay"></div>
                            </div>
                            <div class="pro-content">
                                <h3>EDULEASE</h3>
                                <p>Comprehensive Learning Management System (LMS) with AI-driven student tracking and remote
                                    education tools.</p>
                                <div class="pro-meta">
                                    <span class="pro-tag"><i class="fas fa-graduation-cap"></i> Education</span>
                                    <a href="#" class="pro-cta">View Case Study <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button id="pro-next" class="pro-nav-btn"><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>

        <style>
            .pro-carousel-wrapper {
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-top: 40px;
            }

            .pro-track-container {
                width: 100%;
                overflow: hidden;
                padding: 20px 0 60px;
                /* Space for hover lift */
            }

            .pro-track {
                display: flex;
                gap: 30px;
                overflow-x: auto;
                scroll-behavior: smooth;
                -ms-overflow-style: none;
                /* IE */
                scrollbar-width: none;
                /* Firefox */
                padding: 0 10px;
            }

            .pro-track::-webkit-scrollbar {
                display: none;
            }

            /* Glassmorphism Card */
            .pro-card {
                min-width: 380px;
                background: rgba(30, 41, 59, 0.4);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.08);
                border-radius: 20px;
                overflow: hidden;
                transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
                position: relative;
                display: flex;
                flex-direction: column;
            }

            .pro-card:hover {
                transform: translateY(-12px);
                border-color: rgba(99, 102, 241, 0.4);
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
                background: rgba(30, 41, 59, 0.6);
            }

            /* Image Area */
            .pro-card-image {
                height: 240px;
                width: 100%;
                overflow: hidden;
                position: relative;
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            }

            .pro-card-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.7s ease;
            }

            .pro-card:hover .pro-card-image img {
                transform: scale(1.1);
            }

            .pro-overlay {
                position: absolute;
                inset: 0;
                background: linear-gradient(to top, rgba(15, 23, 42, 0.8) 0%, transparent 60%);
                opacity: 0.6;
                transition: opacity 0.3s;
            }

            .pro-label {
                position: absolute;
                top: 20px;
                left: 20px;
                background: #3b82f6;
                color: #fff;
                font-size: 0.7rem;
                font-weight: 700;
                text-transform: uppercase;
                padding: 6px 14px;
                border-radius: 30px;
                z-index: 2;
                letter-spacing: 1px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            }

            /* Content Area */
            .pro-content {
                padding: 30px;
                display: flex;
                flex-direction: column;
                flex-grow: 1;
            }

            .pro-content h3 {
                font-size: 1.4rem;
                font-weight: 700;
                color: #fff;
                margin-bottom: 12px;
                font-family: 'Manrope', sans-serif;
                letter-spacing: -0.5px;
            }

            .pro-content p {
                font-size: 0.95rem;
                color: #94a3b8;
                line-height: 1.6;
                margin-bottom: 25px;
                flex-grow: 1;
            }

            .pro-meta {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding-top: 20px;
                border-top: 1px solid rgba(255, 255, 255, 0.08);
            }

            .pro-tag {
                font-size: 0.85rem;
                color: #cbd5e1;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .pro-tag i {
                color: #60a5fa;
            }

            .pro-cta {
                font-size: 0.85rem;
                font-weight: 600;
                color: #fff;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 6px;
                opacity: 0;
                transform: translateY(10px);
                transition: all 0.4s ease;
            }

            .pro-card:hover .pro-cta {
                opacity: 1;
                transform: translateY(0);
                color: #60a5fa;
            }

            /* Navigation Buttons */
            .pro-nav-btn {
                background: rgba(255, 255, 255, 0.05);
                color: #fff;
                border: 1px solid rgba(255, 255, 255, 0.1);
                width: 55px;
                height: 55px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.3s ease;
                font-size: 1.1rem;
                backdrop-filter: blur(5px);
                z-index: 5;
            }

            .pro-nav-btn:hover {
                background: #3b82f6;
                border-color: #3b82f6;
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.4);
                transform: scale(1.1);
            }

            #pro-prev {
                margin-right: 20px;
            }

            #pro-next {
                margin-left: 20px;
            }

            /* Responsive */
            @media (max-width: 900px) {
                .pro-nav-btn {
                    display: none;
                }

                /* Use swipe on mobile */
                .pro-card {
                    min-width: 320px;
                }
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const track = document.querySelector('.pro-track');
                const next = document.getElementById('pro-next');
                const prev = document.getElementById('pro-prev');

                if (next && track) {
                    next.addEventListener('click', () => {
                        track.scrollBy({ left: 420, behavior: 'smooth' });
                    });
                }

                if (prev && track) {
                    prev.addEventListener('click', () => {
                        track.scrollBy({ left: -420, behavior: 'smooth' });
                    });
                }
            });
        </script>
    </section>

    <!-- Partner Slider Removed from Body as per request -->

    <section id="services" style="padding: 100px 0; background-color: #f8fafc; position: relative; z-index: 1;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <!-- Premium Header -->
            <div class="solutions-header reveal" style="text-align: center; margin-bottom: 70px;">
                <span
                    style="display: block; font-size: 0.85rem; font-weight: 700; color: #2563EB; letter-spacing: 2px; margin-bottom: 12px; text-transform: uppercase;">
                    Innovative Web Development Solutions
                </span>
                <h2
                    style="font-size: 3rem; font-weight: 800; color: #0f172a; margin-bottom: 20px; line-height: 1.2; font-family: 'Manrope', sans-serif;">
                    Custom-Built Systems for a <br>
                    <span style="color: #2563EB;">Smarter, Scalable</span> Business
                </h2>
                <p style="font-size: 1.125rem; color: #64748b; line-height: 1.8; max-width: 800px; margin: 0 auto;">
                    We deliver tailored enterprise solutions that transform business operations, enhance productivity, and
                    drive sustainable growth through cutting-edge technology and innovative approaches.
                </p>
            </div>

            <!-- Premium Grid -->
            <div class="premium-solutions-grid">
                @if(isset($global_solutions) && count($global_solutions) > 0)
                    @foreach($global_solutions as $solution)
                        @php
                            // Handling Image URL (Background)
                            $imgUrl = 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?q=80&w=800&auto=format&fit=crop';
                            if ($solution->image && strlen(trim($solution->image)) > 0) {
                                $imgUrl = str_starts_with($solution->image, 'http') ? $solution->image : asset('storage/' . $solution->image);
                            } else {
                                // Fallback images based on solution type
                                $solutionTitle = strtolower($solution->title);
                                if (str_contains($solutionTitle, 'pos')) {
                                    $imgUrl = 'https://images.unsplash.com/photo-1556740758-90de374c12ad?q=80&w=800&auto=format&fit=crop';
                                } elseif (str_contains($solutionTitle, 'project')) {
                                    $imgUrl = 'https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=800&auto=format&fit=crop';
                                } elseif (str_contains($solutionTitle, 'hrm')) {
                                    $imgUrl = 'https://images.unsplash.com/photo-1551836022-d5d88e9218df?q=80&w=800&auto=format&fit=crop';
                                } elseif (str_contains($solutionTitle, 'crm')) {
                                    $imgUrl = 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=800&auto=format&fit=crop';
                                } elseif (str_contains($solutionTitle, 'erp')) {
                                    $imgUrl = 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop';
                                } elseif (str_contains($solutionTitle, 'lms')) {
                                    $imgUrl = 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=800&auto=format&fit=crop';
                                } else {
                                    $imgUrl = 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?q=80&w=800&auto=format&fit=crop';
                                }
                            }
                        @endphp

                        <div class="premium-sol-card reveal">
                            <div class="sol-card-bg" style="background-image: url('{{ $imgUrl }}');"></div>
                            <div class="sol-card-overlay"></div>

                            <div class="sol-card-content">
                                <h3 class="sol-title">{{ $solution->title }}</h3>
                                <div class="sol-arrow">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </div>

                            <!-- Detailed hover overlay (optional, keeps text minimal as requested) -->
                            <a href="{{ route('services.show', \Illuminate\Support\Str::slug($solution->title)) }}"
                                class="sol-card-link"></a>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback Static Cards for Design Showcase if DB is empty -->
                    <div class="premium-sol-card reveal">
                        <div class="sol-card-bg"
                            style="background-image: url('https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=800&auto=format&fit=crop');">
                        </div>
                        <div class="sol-card-overlay"></div>
                        <div class="sol-card-content">
                            <h3 class="sol-title">HRM Solution</h3>
                            <div class="sol-arrow"><i class="fas fa-arrow-right"></i></div>
                        </div>
                        <a href="{{ route('services.show', 'hrm-solution') }}" class="sol-card-link"></a>
                    </div>
                    <div class="premium-sol-card reveal">
                        <div class="sol-card-bg"
                            style="background-image: url('https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=800&auto=format&fit=crop');">
                        </div>
                        <div class="sol-card-overlay"></div>
                        <div class="sol-card-content">
                            <h3 class="sol-title">CRM Solution</h3>
                            <div class="sol-arrow"><i class="fas fa-arrow-right"></i></div>
                        </div>
                        <a href="{{ route('services.show', 'crm-solution') }}" class="sol-card-link"></a>
                    </div>
                    <div class="premium-sol-card reveal">
                        <div class="sol-card-bg"
                            style="background-image: url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop');">
                        </div>
                        <div class="sol-card-overlay"></div>
                        <div class="sol-card-content">
                            <h3 class="sol-title">ERP Solution</h3>
                            <div class="sol-arrow"><i class="fas fa-arrow-right"></i></div>
                        </div>
                        <a href="{{ route('services.show', 'erp-solution') }}" class="sol-card-link"></a>
                    </div>
                @endif
            </div>

            <!-- Footer CTA -->
            <div class="reveal" style="text-align: center; margin-top: 60px;">
                <a href="{{ route('services.index') }}" class="btn-explore-all">
                    Explore All Solutions <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <style>
            /* Premium Grid Layout */
            .premium-solutions-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 40px;
                /* Increased gap for better separation */
            }

            /* Card Styles */
            .premium-sol-card {
                position: relative;
                height: 320px;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                cursor: pointer;
                background: #fff;
            }

            .premium-sol-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            }

            /* Background Image with Zoom */
            .sol-card-bg {
                position: absolute;
                inset: 0;
                background-size: cover;
                background-position: center;
                transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .premium-sol-card:hover .sol-card-bg {
                transform: scale(1.1);
            }

            /* Gradient Overlay */
            .sol-card-overlay {
                position: absolute;
                inset: 0;
                background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(15, 23, 42, 0.6) 60%, rgba(15, 23, 42, 0.9) 100%);
                transition: opacity 0.3s ease;
            }

            .premium-sol-card:hover .sol-card-overlay {
                background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(37, 99, 235, 0.2) 50%, rgba(15, 23, 42, 0.95) 100%);
            }

            /* Content Overlay */
            .sol-card-content {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                padding: 30px;
                display: flex;
                justify-content: space-between;
                align-items: flex-end;
                z-index: 2;
            }

            .sol-title {
                color: #fff;
                font-size: 1.5rem;
                font-weight: 700;
                margin: 0;
                font-family: 'Manrope', sans-serif;
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
                transform: translateY(0);
                transition: transform 0.3s ease;
            }

            .premium-sol-card:hover .sol-title {
                transform: translateY(-2px);
            }

            .sol-arrow {
                width: 40px;
                height: 40px;
                background: rgba(255, 255, 255, 0.2);
                backdrop-filter: blur(4px);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #fff;
                font-size: 1rem;
                transition: all 0.3s ease;
                transform: translateX(0);
                opacity: 0.8;
            }

            .premium-sol-card:hover .sol-arrow {
                background: #2563EB;
                transform: translateX(5px);
                opacity: 1;
            }

            .sol-card-link {
                position: absolute;
                inset: 0;
                z-index: 10;
            }

            /* Explore Button */
            .btn-explore-all {
                display: inline-flex;
                align-items: center;
                gap: 10px;
                font-weight: 700;
                color: #fff;
                text-decoration: none;
                font-size: 1rem;
                padding: 12px 28px;
                border: 2px solid #2563EB;
                border-radius: 50px;
                transition: all 0.3s ease;
                background: #2563EB;
            }

            .btn-explore-all:hover {
                background: #2563EB;
                color: #fff;
                transform: translateY(-2px);
                box-shadow: 0 10px 20px rgba(37, 99, 235, 0.2);
            }

            /* Responsive */
            @media (max-width: 992px) {
                .premium-solutions-grid {
                    grid-template-columns: repeat(2, 1fr);
                }

                .solutions-header h2 {
                    font-size: 2.5rem !important;
                }
            }

            @media (max-width: 600px) {
                .premium-solutions-grid {
                    grid-template-columns: 1fr;
                }

                .solutions-header h2 {
                    font-size: 2rem !important;
                }
            }
        </style>
    </section>

    <section id="industries"
        style="padding: 100px 0; background: radial-gradient(circle at center, #0B1120 0%, #000000 100%); position: relative; z-index: 1; overflow: hidden;">
        <!-- Background Glow -->
        <div
            style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; background: radial-gradient(circle at 50% 50%, rgba(59,130,246,0.08) 0%, transparent 60%); pointer-events: none;">
        </div>

        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 2;">
            <div class="section-title reveal" style="text-align: center; margin-bottom: 70px;">
                <span
                    style="display: inline-block; color: #3b82f6; font-size: 0.8rem; font-weight: 700; letter-spacing: 3px; text-transform: uppercase; margin-bottom: 20px; padding: 8px 16px; background: rgba(59,130,246,0.1); border-radius: 30px; border: 1px solid rgba(59,130,246,0.2);">
                    INDUSTRIES WE SERVE
                </span>
                <h2
                    style="font-size: 3rem; font-weight: 800; color: #ffffff; margin-bottom: 25px; line-height: 1.2; font-family: 'Manrope', sans-serif;">
                    Transforming Sectors with <br><span
                        style="color: #3b82f6; text-shadow: 0 0 30px rgba(59,130,246,0.5);">Digital Excellence</span>
                </h2>
                <p style="color: #94a3b8; font-size: 1.125rem; line-height: 1.8; max-width: 700px; margin: 0 auto;">
                    We deliver specialized technical solutions tailored to the unique challenges of modern industries.
                </p>
            </div>

            <div class="industries-grid">
                @php
                    // Filter unique industries by title to remove duplicates
                    $uniqueIndustries = $industries->unique('title');
                @endphp
                @forelse($uniqueIndustries as $industry)
                    @php
                        $slug = strtolower(str_replace(['&', ' '], ['', '-'], trim($industry->title)));
                        $slug = preg_replace('/-+/', '-', $slug);
                    @endphp
                    <a href="{{ route('industries.show', $slug) }}" class="industry-card-glass reveal">
                        <div class="ind-icon-box">
                            <i class="{{ $industry->icon }}"></i>
                        </div>
                        <h3 class="ind-name">{{ $industry->title }}</h3>
                        <div class="ind-arrow"><i class="fas fa-arrow-right"></i></div>
                    </a>
                @empty
                    <div style="grid-column: 1 / -1; text-align: center; color: #666; padding: 60px;">
                        <p>No industries found.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <style>
            .industries-grid {
                display: grid;
                grid-template-columns: repeat(5, 1fr);
                gap: 35px;
                /* Increased gap for better separation */
            }

            .industry-card-glass {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                text-align: center;
                background: rgba(255, 255, 255, 0.03);
                border: 1px solid rgba(255, 255, 255, 0.08);
                border-radius: 18px;
                padding: 40px 20px;
                text-decoration: none;
                transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
                position: relative;
                overflow: hidden;
                backdrop-filter: blur(10px);
                height: 240px;
                /* Fixed height for uniformity */
            }

            .industry-card-glass:hover {
                transform: translateY(-10px);
                border-color: rgba(59, 130, 246, 0.5);
                /* Blue Border Glow */
                box-shadow: 0 15px 40px -10px rgba(59, 130, 246, 0.15);
                /* Blue Shadow */
                background: rgba(255, 255, 255, 0.05);
                /* Slightly lighter */
            }

            .ind-icon-box {
                font-size: 3rem;
                color: #64748b;
                margin-bottom: 20px;
                transition: all 0.4s ease;
                filter: drop-shadow(0 0 0 transparent);
            }

            .industry-card-glass:hover .ind-icon-box {
                color: #3b82f6;
                /* Blue Icon */
                transform: scale(1.1);
                filter: drop-shadow(0 0 15px rgba(59, 130, 246, 0.4));
                /* Neon Glow */
            }

            .ind-name {
                font-size: 1.05rem;
                font-weight: 700;
                color: #e2e8f0;
                margin: 0;
                font-family: 'Manrope', sans-serif;
                transition: color 0.3s;
            }

            .industry-card-glass:hover .ind-name {
                color: #fff;
            }

            .ind-arrow {
                position: absolute;
                bottom: 20px;
                opacity: 0;
                transform: translateY(10px);
                transition: all 0.3s ease;
                color: #3b82f6;
                font-size: 1.2rem;
            }

            .industry-card-glass:hover .ind-arrow {
                opacity: 1;
                transform: translateY(0);
            }

            /* Delay helper for grid items */
            .industry-card-glass:nth-child(1) {
                transition-delay: 0s;
            }

            .industry-card-glass:nth-child(2) {
                transition-delay: 0.05s;
            }

            .industry-card-glass:nth-child(3) {
                transition-delay: 0.1s;
            }

            .industry-card-glass:nth-child(4) {
                transition-delay: 0.15s;
            }

            .industry-card-glass:nth-child(5) {
                transition-delay: 0.2s;
            }

            /* Responsive */
            @media (max-width: 1200px) {
                .industries-grid {
                    grid-template-columns: repeat(4, 1fr);
                }
            }

            @media (max-width: 992px) {
                .industries-grid {
                    grid-template-columns: repeat(3, 1fr);
                    gap: 20px;
                }
            }

            @media (max-width: 768px) {
                .industries-grid {
                    grid-template-columns: repeat(2, 1fr);
                    /* Tablet */
                }

                .section-title h2 {
                    font-size: 2.2rem !important;
                }
            }

            @media (max-width: 480px) {
                .industries-grid {
                    grid-template-columns: repeat(2, 1fr) !important;
                    /* Mobile - kept as 2 to be compact */
                    gap: 15px;
                }

                .industry-card-glass {
                    padding: 25px 15px;
                    height: 180px;
                }

                .ind-icon-box {
                    font-size: 2.5rem;
                    margin-bottom: 15px;
                }

                .ind-name {
                    font-size: 0.9rem;
                }
            }
        </style>
    </section>

    <!-- Blog Section -->
    <section id="blogs" class="section-dark"
        style="padding: 100px 0; background-color: #f8fafc !important; position: relative; z-index: 1;">
        <div class="container">
            <div class="section-title reveal" style="text-align: center; margin-bottom: 50px;">
                <span class="text-blue" style="font-size: 0.8rem; letter-spacing: 2px;">WEB DESIGN & APP DEVELOPMENT
                    BLOGS</span>
                <h2 style="color: #0f172a; margin-top: 10px; font-size: 3rem;">Insights, Trends & Digital Strategies</h2>
                <p style="color: #64748b; font-size: 1.1rem; max-width: 800px; margin: 20px auto 0;">Read our blogs on web,
                    app, and tech strategy — written by experts to help global brands innovate, grow, and lead in a
                    digital-first world.</p>
            </div>

            <div class="grid" style="gap: 40px;">
                @forelse($blog_posts ?? [] as $post)
                    <div class="card reveal" onclick="window.location='{{ route('blog.show', $post->slug ?? '#') }}'"
                        style="cursor: pointer; padding: 0 0 15px 0; background: #ffffff !important; border-radius: 20px !important; border: 1px solid #e2e8f0 !important; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05) !important; overflow: hidden !important; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); height: 100%; display: flex; flex-direction: column;">

                        <!-- Clean Image Logic using Accessor -->
                        <div class="blog-card-image"
                            style="height: 240px; background-image: url('{{ $post->featured_image_url }}'); background-size: cover; background-position: center; transition: 0.5s;">
                            <div
                                style="position: absolute; top: 15px; left: 15px; background: rgba(59, 130, 246, 0.9); color: #fff; padding: 5px 12px; border-radius: 30px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">
                                {{ $post->category ?? 'Tech' }}
                            </div>
                        </div>
                        <div style="padding: 25px; flex-grow: 1; display: flex; flex-direction: column;">
                            <div style="font-size: 0.85rem; color: #64748b; margin-bottom: 12px; font-weight: 500;">
                                <i class="far fa-calendar-alt"></i>
                                @php
                                    $pubDate = $post->published_at ?? now();
                                    if (is_string($pubDate)) {
                                        $pubDate = \Carbon\Carbon::parse($pubDate);
                                    }
                                @endphp
                                {{ $pubDate->format('M d, Y') }}
                            </div>
                            <h3
                                style="font-size: 1.4rem; margin-bottom: 15px; line-height: 1.4; color: #0f172a; font-weight: 800; font-family: 'Manrope', sans-serif;">
                                {{ $post->title ?? 'Untitled Post' }}
                            </h3>
                            <div style="margin-top: auto;">
                                <a href="{{ route('blog.show', $post->slug ?? '#') }}"
                                    style="color: #2563eb; font-weight: 700; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 8px; text-decoration: none;">
                                    Read More <span style="transition: transform 0.3s ease;">→</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Fallback Static Cards if DB is empty -->
                    <!-- Blog 1 -->
                    <div class="card reveal"
                        onclick="window.location='{{ route('blog.show', 'virtualization-in-cloud-computing') }}'"
                        style="cursor: pointer; padding: 0 0 15px 0; background: #ffffff !important; border-radius: 20px !important; border: 1px solid #e2e8f0 !important; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05) !important; overflow: hidden !important; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); height: 100%; display: flex; flex-direction: column;">
                        <div style="overflow: hidden; height: 240px; position: relative;">
                            <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=800&auto=format&fit=crop"
                                alt="Cloud Computing"
                                style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);"
                                class="blog-card-img">
                            <div
                                style="position: absolute; top: 15px; left: 15px; background: rgba(59, 130, 246, 0.9); color: #fff; padding: 5px 12px; border-radius: 30px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">
                                Cloud
                            </div>
                        </div>
                        <div style="padding: 25px; flex-grow: 1; display: flex; flex-direction: column;">
                            <div style="font-size: 0.85rem; color: #64748b; margin-bottom: 12px; font-weight: 500;">
                                <i class="far fa-calendar-alt"></i> Feb 12, 2024
                            </div>
                            <h3
                                style="font-size: 1.4rem; margin-bottom: 15px; line-height: 1.4; color: #0f172a; font-weight: 800; font-family: 'Manrope', sans-serif;">
                                Virtualization in
                                Cloud Computing: Definition, Types, and Benefits</h3>
                            <div style="margin-top: auto;">
                                <a href="{{ route('blog.show', 'virtualization-in-cloud-computing') }}"
                                    style="color: #2563eb; font-weight: 700; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 8px; text-decoration: none;">
                                    Read More <span style="transition: transform 0.3s ease;">→</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog 2 -->
                    <div class="card reveal delay-100"
                        onclick="window.location='{{ route('blog.show', 'android-app-development-frameworks') }}'"
                        style="cursor: pointer; padding: 0 0 15px 0; background: #ffffff !important; border-radius: 20px !important; border: 1px solid #e2e8f0 !important; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05) !important; overflow: hidden !important; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); height: 100%; display: flex; flex-direction: column;">
                        <div style="overflow: hidden; height: 240px; position: relative;">
                            <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?q=80&w=800&auto=format&fit=crop"
                                alt="App Development"
                                style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);"
                                class="blog-card-img">
                            <div
                                style="position: absolute; top: 15px; left: 15px; background: rgba(59, 130, 246, 0.9); color: #fff; padding: 5px 12px; border-radius: 30px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">
                                Mobile
                            </div>
                        </div>
                        <div style="padding: 25px; flex-grow: 1; display: flex; flex-direction: column;">
                            <div style="font-size: 0.85rem; color: #64748b; margin-bottom: 12px; font-weight: 500;">
                                <i class="far fa-calendar-alt"></i> Feb 10, 2024
                            </div>
                            <h3
                                style="font-size: 1.4rem; margin-bottom: 15px; line-height: 1.4; color: #0f172a; font-weight: 800; font-family: 'Manrope', sans-serif;">
                                Explore The Best
                                Android App Development Frameworks</h3>
                            <div style="margin-top: auto;">
                                <a href="{{ route('blog.show', 'android-app-development-frameworks') }}"
                                    style="color: #2563eb; font-weight: 700; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 8px; text-decoration: none;">
                                    Read More <span style="transition: transform 0.3s ease;">→</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog 3 -->
                    <div class="card reveal delay-200"
                        onclick="window.location='{{ route('blog.show', 'minimalist-web-design-examples') }}'"
                        style="cursor: pointer; padding: 0 0 15px 0; background: #ffffff !important; border-radius: 20px !important; border: 1px solid #e2e8f0 !important; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05) !important; overflow: hidden !important; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); height: 100%; display: flex; flex-direction: column;">
                        <div style="overflow: hidden; height: 240px; position: relative;">
                            <img src="https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?q=80&w=800&auto=format&fit=crop"
                                alt="Web Design"
                                style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);"
                                class="blog-card-img">
                            <div
                                style="position: absolute; top: 15px; left: 15px; background: rgba(59, 130, 246, 0.9); color: #fff; padding: 5px 12px; border-radius: 30px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">
                                Design
                            </div>
                        </div>
                        <div style="padding: 25px; flex-grow: 1; display: flex; flex-direction: column;">
                            <div style="font-size: 0.85rem; color: #64748b; margin-bottom: 12px; font-weight: 500;">
                                <i class="far fa-calendar-alt"></i> Feb 08, 2024
                            </div>
                            <h3
                                style="font-size: 1.4rem; margin-bottom: 15px; line-height: 1.4; color: #0f172a; font-weight: 800; font-family: 'Manrope', sans-serif;">
                                15 Best Minimalist
                                Web Design Examples for Inspiration</h3>
                            <div style="margin-top: auto;">
                                <a href="{{ route('blog.show', 'minimalist-web-design-examples') }}"
                                    style="color: #2563eb; font-weight: 700; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 8px; text-decoration: none;">
                                    Read More <span style="transition: transform 0.3s ease;">→</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <style>
                .card:hover {
                    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1) !important;
                    border-color: #3b82f6 !important;
                    transform: translateY(-10px);
                }

                .card:hover .blog-card-img {
                    transform: scale(1.1);
                }

                .card:hover a span {
                    transform: translateX(5px);
                }
            </style>
        </div>

        <section id="process" class="process-section" style="background: #f8fafc; position: relative; z-index: 1;">
            <!-- Background Glow -->
            <div class="process-bg-glow"
                style="background: radial-gradient(circle, rgba(59, 130, 246, 0.05) 0%, transparent 70%);"></div>

            <div class="container"
                style="max-width: 1200px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 2;">
                <div class="section-title reveal" style="text-align: center; margin-bottom: 80px;">
                    <span
                        style="display: inline-block; color: #3b82f6; font-size: 0.8rem; font-weight: 700; letter-spacing: 3px; text-transform: uppercase; margin-bottom: 20px; padding: 8px 16px; background: rgba(59,130,246,0.1); border-radius: 30px; border: 1px solid rgba(59,130,246,0.2);">
                        HOW WE WORK
                    </span>
                    <h2
                        style="font-size: 3rem; font-weight: 800; color: #1e293b !important; -webkit-text-fill-color: #1e293b !important; margin-bottom: 25px; line-height: 1.2; font-family: 'Manrope', sans-serif;">
                        From Concept to <span
                            style="color: #2563eb !important; -webkit-text-fill-color: #2563eb !important;">Launch</span>
                    </h2>
                    <p
                        style="color: #64748b !important; -webkit-text-fill-color: #64748b !important; font-size: 1.1rem; max-width: 700px; margin: 0 auto; line-height: 1.8;">
                        Our streamlined agile process ensures transparency, efficiency, and high-quality delivery at every
                        stage of your project.
                    </p>
                </div>

                <div class="process-flow-grid">
                    <!-- Step 1 -->
                    <div class="process-card reveal">
                        <div class="step-indicator">
                            <div class="step-number">01</div>
                            <div class="step-line"></div>
                        </div>
                        <div class="pc-content">
                            <div class="pc-icon">
                                <i class="fas fa-search-location"></i>
                            </div>
                            <h3>Discovery & Strategy</h3>
                            <p>We analyze your requirements, market trends, and business goals to create a strategic roadmap
                                for success.</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="process-card reveal delay-100">
                        <div class="step-indicator">
                            <div class="step-number">02</div>
                            <div class="step-line"></div>
                        </div>
                        <div class="pc-content">
                            <div class="pc-icon">
                                <i class="fas fa-pencil-ruler"></i>
                            </div>
                            <h3>Design & Prototyping</h3>
                            <p>Our designers craft intuitive UI/UX prototypes that align with your brand before we write a
                                single line of code.</p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="process-card reveal delay-200">
                        <div class="step-indicator">
                            <div class="step-number">03</div>
                            <div class="step-line"></div>
                        </div>
                        <div class="pc-content">
                            <div class="pc-icon">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <h3>Development</h3>
                            <p>We build robust, scalable solutions using modern tech stacks, ensuring clean code and high
                                performance.</p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="process-card reveal delay-300">
                        <div class="step-indicator">
                            <div class="step-number">04</div>
                            <div class="step-line"></div>
                        </div>
                        <div class="pc-content">
                            <div class="pc-icon">
                                <i class="fas fa-tasks"></i>
                            </div>
                            <h3>Testing & QA</h3>
                            <p>Rigorous testing ensures a bug-free, secure, and seamless user experience before launch.</p>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="process-card reveal delay-400">
                        <div class="step-indicator">
                            <div class="step-number">05</div>
                            <!-- No line for last step -->
                        </div>
                        <div class="pc-content">
                            <div class="pc-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <h3>Launch & Support</h3>
                            <p>We deploy your product and provide ongoing support and maintenance to help your business
                                grow.</p>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .process-section {
                    padding: 120px 0;
                    background: #f8fafc;
                    position: relative;
                    z-index: 1;
                    overflow: hidden;
                }

                .process-bg-glow {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    width: 100%;
                    height: 100%;
                    background: radial-gradient(circle at center, rgba(59, 130, 246, 0.05) 0%, transparent 70%);
                    pointer-events: none;
                }

                .process-flow-grid {
                    display: grid;
                    grid-template-columns: repeat(5, 1fr);
                    gap: 25px;
                    position: relative;
                }

                .process-card {
                    position: relative;
                    display: flex;
                    flex-direction: column;
                }

                /* Step Indicators (Number + Connecting Line) */
                .step-indicator {
                    display: flex;
                    align-items: center;
                    margin-bottom: 30px;
                    position: relative;
                }

                .step-number {
                    width: 50px;
                    height: 50px;
                    background: #ffffff;
                    border: 1px solid #e2e8f0;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: #3b82f6;
                    font-weight: 800;
                    font-size: 1.1rem;
                    z-index: 2;
                    position: relative;
                    transition: all 0.3s ease;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
                }

                .process-card:hover .step-number {
                    background: #3b82f6;
                    color: #fff;
                    box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
                    border-color: #3b82f6;
                }

                .step-line {
                    flex-grow: 1;
                    height: 2px;
                    background: rgba(255, 255, 255, 0.1);
                    margin-left: 15px;
                    position: relative;
                }

                .step-line::after {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    height: 100%;
                    width: 0%;
                    background: #3b82f6;
                    transition: width 0.5s ease;
                }

                .process-card:hover .step-line::after {
                    width: 100%;
                }

                /* Content Card */
                .pc-content {
                    background: #ffffff;
                    border: 1px solid #e2e8f0;
                    border-radius: 20px;
                    padding: 30px;
                    transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
                    backdrop-filter: blur(10px);
                    height: 100%;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
                }

                .process-card:hover .pc-content {
                    transform: translateY(-10px);
                    background: #ffffff;
                    border-color: #3b82f6;
                    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
                }

                .pc-icon {
                    width: 60px;
                    height: 60px;
                    background: #f1f5f9;
                    border-radius: 14px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 1.5rem;
                    color: #3b82f6;
                    margin-bottom: 20px;
                    transition: all 0.4s ease;
                }

                .process-card:hover .pc-icon {
                    background: #3b82f6;
                    color: #ffffff;
                    transform: rotate(10deg);
                }

                .pc-content h3 {
                    font-size: 1.25rem;
                    font-weight: 700;
                    color: #0f172a !important;
                    margin-bottom: 15px;
                    font-family: 'Manrope', sans-serif;
                }

                .pc-content p {
                    color: #64748b !important;
                    font-size: 0.95rem;
                    line-height: 1.6;
                    margin: 0;
                }

                /* Responsive */
                @media (max-width: 992px) {
                    .process-flow-grid {
                        grid-template-columns: repeat(2, 1fr);
                        gap: 40px;
                    }

                    .step-line {
                        display: none;
                        /* Hide connecting lines on tablet/mobile flow */
                    }
                }

                @media (max-width: 600px) {
                    .process-flow-grid {
                        grid-template-columns: 1fr;
                    }
                }
            </style>
        </section>


        <!-- Contact Form Section (Replaced empty Ratings section) -->
        @include('partials.contact-form')

        <!-- FAQ Section -->
        <section id="faq" style="background: #f8fafc; position: relative; z-index: 1;">
            <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
                <div class="section-title reveal" style="text-align: center; margin-bottom: 60px;">
                    <span
                        style="display: block; color: #3b82f6; font-size: 0.8rem; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 15px;">FREQUENTLY
                        ASKED QUESTIONS</span>
                    <h2
                        style="font-size: 3rem; font-weight: 800; color: #0f172a; margin-bottom: 20px; line-height: 1.2; font-family: 'Playfair Display', serif;">
                        Got Questions? We've Got Answers
                    </h2>
                </div>

                <div class="faq-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                    <!-- Column 1 -->
                    <div class="faq-col">
                        <div class="faq-item reveal">
                            <button class="faq-question">
                                <span>What kind of businesses or teams do you typically work with?</span>
                                <i class="fas fa-plus"></i>
                            </button>
                            <div class="faq-answer">
                                <p>We work with startups, SMEs, and large enterprises across various industries including
                                    Healthcare, EdTech, FinTech, and E-commerce. Whether you have a small team needing tech
                                    support or a large organization looking for digital transformation, we adapt to your
                                    needs.</p>
                            </div>
                        </div>

                        <div class="faq-item reveal delay-100">
                            <button class="faq-question">
                                <span>How does the software development outsourcing process work?</span>
                                <i class="fas fa-plus"></i>
                            </button>
                            <div class="faq-answer">
                                <p>Our process is transparent and streamlined: Discovery & Planning → Design & Prototyping →
                                    Agile Development → QA Testing → Deployment & Support. We maintain constant
                                    communication to ensure alignment with your goals.</p>
                            </div>
                        </div>

                        <div class="faq-item reveal delay-200">
                            <button class="faq-question">
                                <span>What is your preferred development methodology?</span>
                                <i class="fas fa-plus"></i>
                            </button>
                            <div class="faq-answer">
                                <p>We primarily use Agile Scrum and Kanban methodologies. This allows for iterative
                                    development, regular feedback loops, and flexibility to adapt to changing requirements
                                    efficiently.</p>
                            </div>
                        </div>

                        <div class="faq-item reveal delay-300">
                            <button class="faq-question">
                                <span>Do you develop software for both mobile & web platforms?</span>
                                <i class="fas fa-plus"></i>
                            </button>
                            <div class="faq-answer">
                                <p>Yes! We specialize in both. For web, we use React, Vue, Laravel, and Node.js. For mobile,
                                    we offer native (iOS/Android) and cross-platform solutions using Flutter and React
                                    Native.</p>
                            </div>
                        </div>

                        <div class="faq-item reveal delay-400">
                            <button class="faq-question">
                                <span>What's your post-launch policy?</span>
                                <i class="fas fa-plus"></i>
                            </button>
                            <div class="faq-answer">
                                <p>We provide a comprehensive warranty period post-launch to fix any bugs. Beyond that, we
                                    offer flexible maintenance and support packages to ensure your software remains updated
                                    and secure.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="faq-col">
                        <div class="faq-item reveal">
                            <button class="faq-question">
                                <span>Can we start with a smaller engagement or pilot before scaling?</span>
                                <i class="fas fa-plus"></i>
                            </button>
                            <div class="faq-answer">
                                <p>Absolutely. We advocate for MVP (Minimum Viable Product) development or pilot projects.
                                    This minimizes risk and allows you to validate your idea before committing to a
                                    full-scale implementation.</p>
                            </div>
                        </div>

                        <div class="faq-item reveal delay-100">
                            <button class="faq-question">
                                <span>Does Stuvalley cover all stages of the SDLC?</span>
                                <i class="fas fa-plus"></i>
                            </button>
                            <div class="faq-answer">
                                <p>Yes, we cover the entire Software Development Life Cycle (SDLC) — from initial
                                    consultation and requirement gathering to UI/UX design, coding, testing, deployment, and
                                    ongoing maintenance.</p>
                            </div>
                        </div>

                        <div class="faq-item reveal delay-200">
                            <button class="faq-question">
                                <span>Can your custom software scale as my business grows?</span>
                                <i class="fas fa-plus"></i>
                            </button>
                            <div class="faq-answer">
                                <p>Scalability is at the core of our architecture. We design systems using microservices and
                                    cloud-native technologies (AWS/Azure) that can easily handle increased loads and new
                                    features as you grow.</p>
                            </div>
                        </div>

                        <div class="faq-item reveal delay-300">
                            <button class="faq-question">
                                <span>Are your development practices globally compliant?</span>
                                <i class="fas fa-plus"></i>
                            </button>
                            <div class="faq-answer">
                                <p>We adhere to international coding standards and security best practices, including GDPR,
                                    HIPAA (for healthcare), and OWASP security guidelines to ensure your data is safe and
                                    compliant.</p>
                            </div>
                        </div>

                        <div class="faq-item reveal delay-400">
                            <button class="faq-question">
                                <span>How do you control the quality of the software you deliver?</span>
                                <i class="fas fa-plus"></i>
                            </button>
                            <div class="faq-answer">
                                <p>We have a dedicated QA team that performs rigorous testing including automated tests,
                                    manual testing, performance testing, and security audits before any release.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .faq-item {
                    margin-bottom: 20px;
                    border: 1px solid #e2e8f0;
                    /* Soft Border */
                    border-radius: 16px;
                    overflow: hidden;
                    transition: all 0.3s ease;
                    background: #ffffff;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
                }

                .faq-item:hover {
                    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
                    transform: translateY(-2px);
                    border-color: #3b82f6;
                }

                .faq-item.faq-active {
                    background: #ffffff;
                    border-color: #3b82f6;
                    box-shadow: 0 10px 30px rgba(59, 130, 246, 0.1);
                }

                .faq-question {
                    width: 100%;
                    text-align: left;
                    padding: 24px 30px;
                    /* More padding */
                    background: none;
                    border: none;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    cursor: pointer;
                    font-size: 1.1rem;
                    /* Bigger font */
                    font-weight: 700;
                    color: #1e293b;
                    /* Dark text */
                    transition: color 0.3s;
                }

                .faq-question:hover {
                    color: #2563eb;
                }

                .faq-question i {
                    color: #3b82f6;
                    font-size: 0.9rem;
                    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), background-color 0.3s, color 0.3s;
                    width: 32px;
                    height: 32px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 50%;
                    background: rgba(59, 130, 246, 0.1);
                    /* Soft blue bg */
                }

                .faq-item.faq-active .faq-question i {
                    transform: rotate(45deg);
                    background: #3b82f6;
                    color: #fff;
                }

                .faq-answer {
                    max-height: 0;
                    overflow: hidden;
                    transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                    padding: 0 30px;
                }

                .faq-answer p {
                    padding-bottom: 25px;
                    color: #64748b;
                    line-height: 1.7;
                    margin: 0;
                    font-size: 1rem;
                }

                .faq-item:last-child {
                    margin-bottom: 0;
                }

                @media (max-width: 992px) {
                    .faq-grid {
                        grid-template-columns: 1fr !important;
                        gap: 20px !important;
                    }
                }
            </style>

            <script>
                document.addEventListener('DOMContentLoaded', function () {

                    const faqItems = document.querySelectorAll('.faq-item');

                    faqItems.forEach(item => {
                        const question = item.querySelector('.faq-question');
                        const answer = item.querySelector('.faq-answer');

                        question.addEventListener('click', () => {
                            // Close other open items
                            faqItems.forEach(otherItem => {
                                if (otherItem !== item && otherItem.classList.contains('faq-active')) {
                                    otherItem.classList.remove('faq-active');
                                    otherItem.querySelector('.faq-answer').style.maxHeight = null;
                                }
                            });

                            // Toggle current item
                            item.classList.toggle('faq-active');
                            if (item.classList.contains('faq-active')) {
                                answer.style.maxHeight = answer.scrollHeight + "px";
                            } else {
                                answer.style.maxHeight = null;
                            }
                        });
                    });
                });
            </script>

        </section>

        {{--
        <!-- SEO Content Section (Hidden per user request) -->
        --}}
        {{--
        <!-- Premium CTA Section (Hidden per user request) -->
        --}}


        <!-- Fix for Footer and Contact Section Visibility -->
        <style>
            /* Ensure proper z-index stacking for home page */
            .parallax-bg-container {
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                width: 100% !important;
                height: 100vh !important;
                z-index: 0 !important;
                pointer-events: none !important;
                overflow: hidden !important;
            }

            /* Ensure all sections have proper z-index and eliminate zoom-induced 'rays' */
            /* Removed aggressive section overrides to fix white screen */

            /* Contact section specific fix */
            .contact-form-section {
                padding: 0 !important;
                margin-top: -1px !important;
                /* Pull up to hide gap */
                margin-bottom: 0 !important;
                display: block !important;
                z-index: 90 !important;
            }

            /* Global Section Spacing */
            section {
                position: relative;
                padding-top: 80px;
                padding-bottom: 80px;
            }

            /* Exceptions for Flush Layouts */
            .hero {
                padding-top: 180px !important;
                /* Maintain Header Space */
                padding-bottom: 100px;
            }

            /* Zero out main content spacing */
            .main-content {
                padding-bottom: 0 !important;
                margin-bottom: 0 !important;
            }



            .contact-form-section {
                padding: 0 !important;
                margin-top: -1px !important;
                /* Overlap slightly to prevent pixel gap */
                margin-bottom: 0 !important;
                display: block !important;
                z-index: 90 !important;
            }



            /* Ensure map card is fully visible and interactive */
            .map-card {
                position: relative !important;
                z-index: 2 !important;
            }

            .map-frame-wrapper {
                position: relative !important;
                z-index: 2 !important;
            }

            .map-frame-wrapper iframe {
                position: relative !important;
                z-index: 2 !important;
            }

            /* Fix for contact card details */
            .glass-card {
                position: relative !important;
                z-index: 2 !important;
            }

            /* Ensure footer content is fully visible */
            .footer-top-grid,
            .footer-links-grid,
            .footer-bottom-bar {
                position: relative !important;
                z-index: 2 !important;
            }

            /* Fix for WhatsApp button */
            .whatsapp-float {
                z-index: 10001 !important;
            }
        </style>


        <!-- Reveal Animation Script & CSS -->
        <style>
            .reveal {
                opacity: 0;
                transform: translateY(30px);
                transition: all 0.8s ease;
                /* Removed visibility:hidden for better accessibility */
            }

            .reveal.active {
                opacity: 1;
                transform: translateY(0);
                visibility: visible;
            }

            /* Helper colors ensuring visibility on dark backgrounds */
            .text-orange-custom {
                color: #f97316 !important;
            }

            .text-white-custom {
                color: #ffffff !important;
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Check for reveals
                const reveals = document.querySelectorAll('.reveal');

                const revealOnScroll = function () {
                    const windowHeight = window.innerHeight;
                    const elementVisible = 100;

                    reveals.forEach((reveal) => {
                        const elementTop = reveal.getBoundingClientRect().top;
                        if (elementTop < windowHeight - elementVisible) {
                            reveal.classList.add('active');
                        }
                    });
                };

                window.addEventListener('scroll', revealOnScroll);
                revealOnScroll(); // Trigger on load

                // Fallback: If no scroll event triggers in 1s, show everything (safety net)
                setTimeout(() => {
                    reveals.forEach(r => r.classList.add('active'));
                }, 1000);
            });
        </script>
        <!-- Pricing Section -->
        <section id="pricing" style="padding: 120px 0 120px 0; background: #ffffff; position: relative; z-index: 1;">
            <div class="container" style="max-width: 1320px; margin: 0 auto; padding: 0 20px;">
                <div class="section-title reveal" style="text-align: center; margin-bottom: 80px;">
                    <div
                        style="display: inline-flex; align-items: center; gap: 8px; color: #64748b; font-size: 0.85rem; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 25px; padding: 10px 24px; background: #f1f5f9; border-radius: 100px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
                        <span style="width: 8px; height: 8px; background: #bef264; border-radius: 50%;"></span>
                        PRICING PLANS
                    </div>
                    <h2 class="pricing-heading" style="color: #0f172a !important;">
                        Flexible Website & Software Pricing <br>
                        <span style="color: #64748b !important;">With Easy EMI Options</span>
                    </h2>
                </div>

                <div class="pricing-grid">
                    @forelse($pricing_plans as $index => $plan)
                        <div class="pricing-card {{ $plan->is_light ? 'card-light' : 'card-dark' }} {{ $plan->is_popular ? 'popular-card' : '' }} reveal"
                            style="transition-delay: {{ $index * 100 }}ms">
                            @if($plan->is_popular)
                                <div class="popular-glow"></div>
                            @endif
                            <div class="card-x-pattern {{ $plan->is_light ? 'light' : '' }}"></div>
                            <div class="card-header">
                                <div class="plan-badge {{ $plan->is_popular ? 'badge-highlight' : '' }}">{{ $plan->title }}
                                </div>
                                <div class="price-wrap">
                                    @if($plan->currency)
                                        <span class="currency">{{ $plan->currency }}</span>
                                    @endif
                                    <span class="amount">{{ $plan->price }}</span>
                                </div>
                                <div
                                    class="emi-tag {{ $plan->is_popular ? 'popular' : ($plan->price == 'Call Us' || $plan->tag_text == 'Call for Consultation' ? 'call' : '') }}">
                                    {{ $plan->tag_text ?? 'EMI Available' }}
                                </div>
                            </div>
                            <div class="card-divider"></div>
                            <ul class="pricing-features">
                                @if($plan->features)
                                    @foreach($plan->features as $feature)
                                        <li><i class="fas fa-check-circle"></i> {{ $feature }}</li>
                                    @endforeach
                                @else
                                    <li class="f-disabled"><i class="fas fa-minus-circle"></i> No features listed</li>
                                @endif
                            </ul>
                            <div class="pricing-footer">
                                <a href="{{ $plan->button_link == '#' ? 'javascript:void(0)' : $plan->button_link }}"
                                    @if($plan->button_link == '#') onclick="openContactModal(event)" @endif
                                    class="btn-price-main {{ $plan->is_light ? 'light' : '' }} {{ $plan->is_popular ? 'btn-highlight' : '' }}">
                                    <span>{{ $plan->button_text ?? 'Get Started' }}</span>
                                    <div class="p-icon"><i class="fas fa-arrow-right"></i></div>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">Pricing plans coming soon.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <style>
                /* Typography */
                .pricing-heading {
                    font-size: clamp(2rem, 5vw, 3.5rem);
                    font-weight: 900;
                    color: #0f172a !important;
                    line-height: 1.1;
                    letter-spacing: -2px;
                    font-family: 'Outfit', sans-serif;
                }

                /* Grid Layout */
                .pricing-grid {
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    gap: 30px;
                    align-items: stretch;
                    /* Ensure equal height */
                }

                /* Card Base Styles */
                .pricing-card {
                    position: relative;
                    padding: 45px 35px;
                    border-radius: 32px;
                    transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
                    overflow: hidden;
                    display: flex;
                    flex-direction: column;
                    height: 100%;
                    /* Fill grid cell */
                }

                .card-dark {
                    background: #0f172a;
                    color: #fff;
                    border: 1px solid rgba(255, 255, 255, 0.05);
                    box-shadow: 0 20px 40px -10px rgba(15, 23, 42, 0.5);
                }

                .card-light {
                    background: #fff;
                    color: #0f172a;
                    border: 1px solid #e2e8f0;
                    box-shadow: 0 20px 40px -10px rgba(148, 163, 184, 0.2);
                }

                /* Hover Effects */
                .pricing-card:hover {
                    transform: translateY(-12px);
                    box-shadow: 0 30px 60px -15px rgba(15, 23, 42, 0.6);
                }

                .card-light:hover {
                    box-shadow: 0 30px 60px -15px rgba(148, 163, 184, 0.3);
                }

                /* Most Popular Card Highlight */
                .popular-card {
                    border: 1px solid rgba(34, 211, 238, 0.5);
                    background: linear-gradient(145deg, #0f172a 0%, #1e293b 100%);
                    transform: scale(1.02);
                    /* Slight scale up by default */
                    z-index: 2;
                }

                .popular-card:hover {
                    transform: scale(1.02) translateY(-12px);
                    /* Maintain scale on hover */
                }

                .popular-glow {
                    position: absolute;
                    top: 0;
                    left: 0;
                    right: 0;
                    height: 6px;
                    background: linear-gradient(90deg, #22d3ee, #a855f7);
                }

                /* Card Header Elements */
                .plan-badge {
                    display: inline-block;
                    padding: 8px 18px;
                    background: rgba(255, 255, 255, 0.1);
                    color: #fff;
                    border-radius: 100px;
                    font-size: 0.9rem;
                    font-weight: 700;
                    margin-bottom: 25px;
                    backdrop-filter: blur(5px);
                }

                .card-light .plan-badge {
                    background: #f1f5f9;
                    color: #0f172a;
                }

                .badge-highlight {
                    background: linear-gradient(135deg, #22d3ee 0%, #a855f7 100%);
                    color: #fff;
                }

                .price-wrap {
                    display: flex;
                    align-items: flex-start;
                    gap: 4px;
                    margin-bottom: 12px;
                }

                .currency {
                    font-size: 1.8rem;
                    font-weight: 700;
                    margin-top: 8px;
                    opacity: 0.9;
                }

                .amount {
                    font-size: 4.5rem;
                    font-weight: 900;
                    line-height: 1;
                    letter-spacing: -2px;
                    font-family: 'Outfit', sans-serif;
                }

                .emi-tag {
                    display: inline-flex;
                    align-items: center;
                    padding: 6px 16px;
                    background: rgba(34, 211, 238, 0.1);
                    /* Soft Cyan */
                    color: #22d3ee;
                    border-radius: 100px;
                    font-size: 0.8rem;
                    font-weight: 700;
                    margin-bottom: 25px;
                    letter-spacing: 0.5px;
                }

                .emi-tag.popular {
                    background: linear-gradient(135deg, #22d3ee 0%, #a855f7 100%);
                    color: #ffffff;
                    box-shadow: 0 0 15px rgba(34, 211, 238, 0.4);
                }

                .emi-tag.call {
                    background: #e2e8f0;
                    color: #0f172a;
                }

                /* Patterns */
                .card-x-pattern {
                    position: absolute;
                    top: 20px;
                    right: 20px;
                    width: 120px;
                    height: 120px;
                    opacity: 0.06;
                    pointer-events: none;
                    background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M10 10L90 90M90 10L10 90' stroke='white' stroke-width='8' fill='none'/%3E%3C/svg%3E");
                }

                .card-x-pattern.light {
                    opacity: 0.04;
                    background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M10 10L90 90M90 10L10 90' stroke='black' stroke-width='8' fill='none'/%3E%3C/svg%3E");
                }


                /* Content Splitter */
                .card-divider {
                    height: 1px;
                    background: rgba(255, 255, 255, 0.1);
                    margin: 10px 0 35px;
                    width: 100%;
                }

                .card-light .card-divider {
                    background: #e2e8f0;
                }

                /* Features List */
                .pricing-features {
                    list-style: none;
                    padding: 0;
                    margin: 0 0 40px 0;
                    flex-grow: 1;
                    /* Pushes footer down */
                }

                .pricing-features li {
                    display: flex;
                    align-items: center;
                    gap: 15px;
                    margin-bottom: 16px;
                    font-size: 1rem;
                    font-weight: 500;
                    line-height: 1.4;
                    color: rgba(255, 255, 255, 0.9);
                }

                .card-light .pricing-features li {
                    color: #334155;
                    font-weight: 600;
                }

                .pricing-features li i {
                    color: #3b82f6;
                    /* Accent color for checks */
                }

                .f-disabled {
                    opacity: 0.5;
                }

                .f-disabled i {
                    color: inherit !important;
                }

                /* CTA Button */
                .pricing-footer {
                    margin-top: auto;
                }

                .btn-price-main {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    background: linear-gradient(135deg, #22d3ee 0%, #a855f7 100%);
                    color: #fff;
                    padding: 12px 12px 12px 32px;
                    /* Adjusted for removed border */
                    border-radius: 100px;
                    text-decoration: none;
                    font-weight: 700;
                    font-size: 1.1rem;
                    transition: all 0.3s ease;
                    width: 100%;
                    border: none;
                    /* Removed border to fix artifacts */
                    box-shadow: 0 8px 20px rgba(34, 211, 238, 0.3);
                }

                .btn-price-main .p-icon {
                    width: 48px;
                    height: 48px;
                    background: #fff;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: #a855f7;
                    font-size: 1rem;
                    transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                }

                .btn-price-main:hover {
                    background: linear-gradient(135deg, #22d3ee 20%, #a855f7 100%);
                    transform: translateY(-2px);
                    box-shadow: 0 15px 30px rgba(168, 85, 247, 0.5);
                }

                .btn-price-main:hover .p-icon {
                    transform: translateX(5px);
                    color: #9333ea;
                }

                /* Light Card Button */
                .btn-price-main.light {
                    background: #ffffff;
                    color: #0f172a !important;
                    box-shadow: inset 0 0 0 2px #3b82f6, 0 4px 12px rgba(59, 130, 246, 0.1);
                    font-weight: 800;
                }

                .btn-price-main.light .p-icon {
                    background: #3b82f6;
                    color: #ffffff !important;
                    width: 44px;
                    height: 44px;
                }

                .btn-price-main.light:hover {
                    background: #3b82f6;
                    color: #ffffff !important;
                    box-shadow: 0 10px 25px rgba(59, 130, 246, 0.4);
                }

                .btn-price-main.light:hover .p-icon {
                    background: #ffffff;
                    color: #3b82f6 !important;
                    transform: translateX(3px);
                }

                /* Highlight Button & Transitions */
                .btn-highlight {
                    box-shadow: inset 0 0 0 2px rgba(255, 255, 255, 0.2), 0 10px 25px -5px rgba(168, 85, 247, 0.5);
                }

                .btn-highlight:hover {
                    box-shadow: inset 0 0 0 2px #ffffff, 0 15px 35px rgba(168, 85, 247, 0.6);
                }

                /* Mobile Responsiveness */
                @media (max-width: 1024px) {
                    .pricing-grid {
                        grid-template-columns: repeat(2, 1fr);
                        gap: 25px;
                    }

                    /* Unset scale for tablet to prevent overlap */
                    .popular-card {
                        transform: none;
                    }
                }

                @media (max-width: 768px) {
                    .pricing-grid {
                        grid-template-columns: 1fr;
                        max-width: 450px;
                        margin: 0 auto;
                    }

                    .amount {
                        font-size: 3.8rem;
                    }

                    .pricing-card {
                        padding: 35px 25px;
                        min-height: auto;
                        /* Allow auto height on mobile */
                    }

                    .popular-card {
                        transform: scale(1.02);
                        /* Bring back slight scale for emphasis in stack */
                        margin: 15px 0;
                        /* Add vertical breathing room */
                        border-width: 2px;
                    }

                    .popular-card:hover {
                        transform: scale(1.02);
                        /* No lift on touch */
                    }

                    .pricing-card:hover {
                        transform: none;
                    }
                }
            </style>
        </section>

@endsection