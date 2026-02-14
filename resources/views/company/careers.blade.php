@extends('layouts.app')
@section('header_class', '')

@section('content')
    <div class="careers-page">

        <!-- Hero Section -->
        <section class="careers-hero">
            <div class="container text-center">
                <span class="badge-pill">
                    <span class="pulse-dot"></span>
                    Join Our Team
                </span>
                <h1 class="hero-title">Build the <span class="text-accent">Future</span> With Us</h1>
                <p class="hero-subtitle">Join a team of innovators, creators, and problem-solvers shaping the digital
                    landscape</p>
                <p class="hero-description">At Stuvalley, we believe in empowering talent, fostering innovation, and
                    creating meaningful impact. Whether you're a seasoned professional or just starting your journey, we
                    offer an environment where you can grow, learn, and make a difference.</p>
            </div>
        </section>

        <!-- Why Work With Us -->
        <section class="why-section">
            <div class="container">
                <h2 class="section-title">Why Work With Us</h2>
                <p class="section-subtitle">We're more than just a workplace—we're a community of passionate innovators</p>

                <div class="benefits-grid">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h3>Growth & Learning</h3>
                        <p>Continuous learning opportunities, mentorship programs, and access to cutting-edge technologies
                            to accelerate your career.</p>
                    </div>

                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Collaborative Culture</h3>
                        <p>Work with talented professionals in an inclusive environment that values diverse perspectives and
                            teamwork.</p>
                    </div>

                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <h3>Cutting-Edge Projects</h3>
                        <p>Work on innovative projects using the latest technologies for clients across industries
                            worldwide.</p>
                    </div>

                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <h3>Work-Life Balance</h3>
                        <p>Flexible work arrangements, remote options, and a culture that respects your time and well-being.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Current Openings -->
        <section class="openings-section">
            <div class="container">
                <h2 class="section-title">Current Openings</h2>
                <p class="section-subtitle">Explore opportunities to join our growing team</p>

                <div class="openings-container">
                    @forelse($openings as $opening)
                        @if ($opening->title === 'Open Application')
                            @continue
                        @endif
                        <div class="job-card" onclick="window.location='{{ route('jobs.show', $opening->slug) }}'"
                            style="cursor: pointer;">
                            <div class="job-card-main">
                                <div class="job-info">
                                    <span class="job-dept">{{ $opening->department ?? 'General' }}</span>
                                    <h3 class="job-title">{{ $opening->title }}</h3>
                                    <div class="job-meta">
                                        <span><i class="fas fa-map-marker-alt"></i> {{ $opening->location }}</span>
                                        <span><i class="fas fa-clock"></i> {{ $opening->job_type }}</span>
                                        <span><i class="fas fa-briefcase"></i> {{ $opening->experience_level }}</span>
                                    </div>
                                </div>
                                <div class="job-action">
                                    <button type="button" class="btn-apply-now"
                                        onclick="event.stopPropagation(); window.location='{{ route('jobs.apply.page', $opening->slug) }}'">
                                        Apply Now
                                    </button>
                                </div>
                            </div>
                            <div class="job-description-short">
                                <p>{{ Str::limit($opening->description, 150) }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="no-openings">
                            <i class="fas fa-briefcase"></i>
                            <h3>No Openings Currently</h3>
                            <p>We don't have any open positions at the moment, but we're always interested in meeting talented
                                individuals who share our passion for innovation.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Open Application -->
        <section class="application-section">
            <div class="container">
                <div class="application-card">
                    <div class="application-content">
                        <h2>Don't See the Right Role?</h2>
                        <p>We're always looking for exceptional talent. Send us your resume and tell us how you'd like to
                            contribute to our mission.</p>
                        <a href="{{ route('jobs.apply.page', 'open-application') }}" class="btn-primary">
                            <i class="fas fa-paper-plane"></i> Send Open Application
                        </a>
                    </div>
                    <div class="application-image">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- Hiring Process -->
        <section class="process-section">
            <div class="container">
                <h2 class="section-title">Our Hiring Process</h2>
                <p class="section-subtitle">A transparent and straightforward journey to joining our team</p>

                <div class="process-steps">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <div class="step-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h3>Apply</h3>
                        <p>Submit your application and resume through our portal or email</p>
                    </div>

                    <div class="step-connector"></div>

                    <div class="process-step">
                        <div class="step-number">2</div>
                        <div class="step-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3>Screening</h3>
                        <p>Our team reviews your profile and experience</p>
                    </div>

                    <div class="step-connector"></div>

                    <div class="process-step">
                        <div class="step-number">3</div>
                        <div class="step-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <h3>Interview</h3>
                        <p>Meet with our team to discuss your skills and aspirations</p>
                    </div>

                    <div class="step-connector"></div>

                    <div class="process-step">
                        <div class="step-number">4</div>
                        <div class="step-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3>Offer</h3>
                        <p>Receive your offer and discuss terms</p>
                    </div>

                    <div class="step-connector"></div>

                    <div class="process-step">
                        <div class="step-number">5</div>
                        <div class="step-icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <h3>Onboarding</h3>
                        <p>Welcome to the team! Begin your journey with us</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Final CTA -->
        <section class="cta-section">
            <div class="container text-center">
                <h2>Ready to Make an Impact?</h2>
                <p>Join us in building innovative solutions that transform businesses and empower people worldwide.</p>
                <a href="mailto:careers@stuvalley.com" class="btn-cta">
                    <i class="fas fa-rocket"></i> Join Our Team
                </a>
            </div>
        </section>

    </div>

    <style>
        .careers-page {
            background: #ffffff;
            color: #1e293b;
        }

        /* Hero Section - Dark Theme for Better Contrast */
        .careers-hero {
            padding: 200px 0 120px;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid #1e293b;
        }

        .badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 30px;
            padding: 10px 24px;
            background: rgba(37, 99, 235, 0.1);
            border: 1px solid rgba(37, 99, 235, 0.3);
            border-radius: 50px;
            color: #60a5fa;
            font-size: 0.85rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 35px;
            backdrop-filter: blur(5px);
        }

        .hero-title {
            font-size: clamp(3.2rem, 6vw, 5rem);
            font-weight: 900;
            margin-bottom: 25px;
            line-height: 1.05;
            color: #ffffff;
            letter-spacing: -2px;
        }

        .hero-title .text-accent {
            color: #3b82f6;
            background: none;
            -webkit-text-fill-color: initial;
        }

        .hero-subtitle {
            font-size: 1.6rem;
            color: #e2e8f0;
            margin-bottom: 35px;
            font-weight: 600;
        }

        .hero-description {
            font-size: 1.2rem;
            color: #cbd5e1;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.9;
        }

        /* Section Commons */
        section {
            padding: 100px 0;
            background: #ffffff;
        }

        .section-title {
            font-size: 2.8rem;
            font-weight: 900;
            text-align: center;
            margin-bottom: 20px;
            color: #0f172a;
            letter-spacing: -1px;
        }

        .section-subtitle {
            font-size: 1.15rem;
            color: #64748b;
            text-align: center;
            margin-bottom: 70px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Why Section */
        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .benefit-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 50px 40px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .benefit-card:hover {
            transform: translateY(-12px);
            border-color: #2563eb;
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.08);
        }

        .benefit-icon {
            width: 80px;
            height: 80px;
            background: #eff6ff;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 2rem;
            color: #2563eb;
            border: 1px solid #dbeafe;
        }

        .benefit-card h3 {
            font-size: 1.4rem;
            font-weight: 800;
            margin-bottom: 15px;
            color: #0f172a;
        }

        .benefit-card p {
            color: #64748b;
            line-height: 1.7;
        }

        /* Openings Section */
        .openings-section {
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            border-bottom: 1px solid #e2e8f0;
        }

        .openings-container {
            max-width: 950px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .job-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 30px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
        }

        .job-card:hover {
            border-color: #2563eb;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.1);
            transform: scale(1.01);
        }

        .job-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: #2563eb;
            opacity: 0;
            transition: 0.3s;
        }

        .job-card:hover::before {
            opacity: 1;
        }

        .job-card-main {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .job-dept {
            color: #2563eb;
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 8px;
            display: block;
        }

        .job-title {
            font-size: 1.6rem;
            font-weight: 800;
            margin-bottom: 12px;
            color: #0f172a;
        }

        .job-meta {
            display: flex;
            gap: 20px;
            color: #64748b;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .job-meta span i {
            color: #2563eb;
            margin-right: 6px;
        }

        .btn-apply-now {
            background: #2563eb;
            color: white !important;
            padding: 12px 28px;
            border-radius: 10px;
            font-weight: 700;
            border: none;
            transition: 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
        }

        .btn-apply-now:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
        }

        .job-description-short {
            color: #64748b;
            padding-top: 20px;
            border-top: 1px solid #f1f5f9;
        }

        /* Application Section */
        .application-card {
            background: linear-gradient(135deg, #0f172a 0%, #1e40af 100%);
            border-radius: 30px;
            padding: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
            color: white;
            box-shadow: 0 25px 50px -12px rgba(30, 64, 175, 0.25);
        }

        .application-content h2 {
            font-size: 2.8rem;
            font-weight: 900;
            margin-bottom: 20px;
            letter-spacing: -1px;
        }

        .application-content p {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 35px;
            line-height: 1.6;
        }

        .btn-primary {
            background: #ffffff;
            color: #1e40af !important;
            padding: 18px 45px;
            border-radius: 50px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            transition: 0.3s;
            text-decoration: none;
            box-shadow: var(--shadow-glow);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .application-image {
            font-size: 5rem;
            opacity: 0.2;
        }

        /* Process Steps */
        .process-steps {
            display: flex;
            justify-content: space-between;
            position: relative;
            max-width: 1100px;
            margin: 0 auto;
        }

        .process-step {
            flex: 1;
            text-align: center;
            position: relative;
            padding: 0 15px;
        }

        .step-icon {
            width: 85px;
            height: 85px;
            background: #ffffff;
            border: 2px solid #e2e8f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 2rem;
            color: #2563eb;
            transition: 0.4s;
            position: relative;
            z-index: 2;
        }

        .process-step:hover .step-icon {
            border-color: #2563eb;
            background: #eff6ff;
            transform: translateY(-5px);
        }

        .step-number {
            position: absolute;
            top: 0;
            right: 15%;
            background: #2563eb;
            color: white;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            font-weight: 800;
            z-index: 3;
            border: 3px solid #ffffff;
        }

        .process-step h3 {
            font-size: 1.3rem;
            font-weight: 800;
            margin-bottom: 12px;
            color: #0f172a;
        }

        .process-step p {
            font-size: 0.95rem;
            color: #64748b;
            line-height: 1.6;
        }

        .step-connector {
            position: absolute;
            top: 42px;
            left: 50%;
            width: 100%;
            height: 2px;
            background: #f1f5f9;
            z-index: 1;
        }

        /* Final CTA */
        .cta-section {
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            text-align: center;
            padding: 100px 0;
        }

        .cta-section h2 {
            font-size: 2.8rem;
            font-weight: 900;
            margin-bottom: 20px;
            color: #0f172a;
        }

        .cta-section p {
            font-size: 1.25rem;
            color: #64748b;
            margin-bottom: 40px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-cta {
            background: #2563eb;
            color: white !important;
            padding: 22px 55px;
            border-radius: 50px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            display: inline-flex;
            align-items: center;
            gap: 15px;
            transition: 0.4s;
            text-decoration: none;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.2);
        }

        .btn-cta:hover {
            background: #1d4ed8;
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.3);
        }

        @media (max-width: 991px) {
            .process-steps {
                flex-direction: column;
                gap: 30px;
            }

            .step-connector {
                display: none;
            }

            .process-step {
                padding: 0;
            }

            .step-number {
                right: 35%;
            }

            .application-card {
                flex-direction: column;
                padding: 40px;
                text-align: center;
            }

            .hero-title {
                font-size: 2.8rem;
            }
        }
    </style>
@endsection