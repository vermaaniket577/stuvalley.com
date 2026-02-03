@extends('layouts.app')
@section('header_class', 'scrolled')

@section('content')
    <div class="careers-page">

        <!-- Hero Section -->
        <section class="careers-hero">
            <div class="container text-center">
                <span class="badge-pill">Join Our Team</span>
                <h1 class="hero-title">Build the Future With Us</h1>
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
                        <div class="job-card">
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
                                    <a href="mailto:careers@stuvalley.com?subject=Application for {{ $opening->title }}"
                                        class="btn-apply-now">Apply Now</a>
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
                        <a href="mailto:careers@stuvalley.com" class="btn-primary">
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
        }

        /* Hero Section */
        .careers-hero {
            padding: 160px 0 100px;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #f8fafc 100%);
            position: relative;
            overflow: hidden;
        }

        .careers-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.1), transparent 70%);
            border-radius: 50%;
        }

        .badge-pill {
            display: inline-block;
            padding: 8px 20px;
            background: rgba(56, 189, 248, 0.15);
            border: 1px solid rgba(56, 189, 248, 0.4);
            border-radius: 50px;
            color: #0c4a6e;
            /* Much Darker Blue */
            font-size: 0.85rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 25px;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 900;
            color: #0f172a !important;
            margin-bottom: 24px;
            line-height: 1.1;
            letter-spacing: -2px;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: #1e293b !important;
            margin-bottom: 30px;
            font-weight: 700;
            line-height: 1.4;
        }

        .hero-description {
            font-size: 1.2rem;
            color: #1e293b !important;
            max-width: 850px;
            margin: 0 auto;
            line-height: 1.8;
            font-weight: 500;
        }

        /* Why Section */
        .why-section {
            padding: 100px 0;
            background: #ffffff;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #0f172a;
            text-align: center;
            margin-bottom: 15px;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: #475569;
            /* Darker Subtitle */
            text-align: center;
            margin-bottom: 60px;
            font-weight: 500;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .benefit-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 40px 30px;
            text-align: center;
            transition: 0.3s;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
        }

        .benefit-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(56, 189, 248, 0.15);
            border-color: #38bdf8;
        }

        .benefit-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #38bdf8, #0284c7);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 1.8rem;
            color: #fff;
        }

        .benefit-card h3 {
            font-size: 1.4rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 15px;
        }

        .benefit-card p {
            color: #475569;
            /* Darker Text */
            line-height: 1.7;
        }

        /* Openings Section */
        .openings-section {
            padding: 100px 0;
            background: #f8fafc;
        }

        .openings-container {
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .job-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 30px;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.02);
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            border-color: #38bdf8;
        }

        .job-card-main {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .job-dept {
            color: #0284c7;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05rem;
            display: block;
            margin-bottom: 8px;
        }

        .job-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 12px;
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            color: #334155;
            /* Darker Meta */
            font-size: 0.9rem;
            font-weight: 500;
        }

        .job-meta span {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .job-meta i {
            color: #38bdf8;
            font-size: 0.8rem;
        }

        .btn-apply-now {
            background: linear-gradient(90deg, #38bdf8, #0284c7);
            color: #ffffff;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            display: inline-block;
        }

        .btn-apply-now:hover {
            box-shadow: 0 8px 20px rgba(56, 189, 248, 0.4);
            color: #ffffff;
            transform: scale(1.05);
        }

        .job-description-short {
            color: #64748b;
            line-height: 1.6;
            font-size: 0.95rem;
            padding-top: 15px;
            border-top: 1px solid #f1f5f9;
        }

        .no-openings {
            background: #ffffff;
            border: 2px dashed #cbd5e1;
            border-radius: 20px;
            padding: 60px 40px;
            text-align: center;
        }

        .no-openings i {
            font-size: 4rem;
            color: #38bdf8;
            margin-bottom: 25px;
            opacity: 0.6;
        }

        .no-openings h3 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 15px;
        }

        .no-openings p {
            color: #64748b;
            font-size: 1.1rem;
            line-height: 1.7;
        }

        /* Application Section */
        .application-section {
            padding: 100px 0;
            background: #ffffff;
        }

        .application-card {
            background: linear-gradient(135deg, #38bdf8, #0284c7);
            border-radius: 24px;
            padding: 60px;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
            align-items: center;
            box-shadow: 0 20px 50px rgba(56, 189, 248, 0.3);
        }

        .application-content h2 {
            font-size: 2.2rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 20px;
        }

        .application-content p {
            font-size: 1.15rem;
            color: #ffffff;
            /* Contrast check, but making sure it's bold enough */
            margin-bottom: 30px;
            line-height: 1.7;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .application-image {
            text-align: center;
        }

        .application-image i {
            font-size: 8rem;
            color: rgba(255, 255, 255, 0.2);
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 35px;
            background: #ffffff;
            color: #0284c7;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 700;
            text-decoration: none;
            transition: 0.3s;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
            color: #0284c7;
        }

        /* Process Section */
        .process-section {
            padding: 100px 0;
            background: #f8fafc;
        }

        .process-steps {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
        }

        .process-step {
            flex: 1;
            text-align: center;
            position: relative;
        }

        .step-number {
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 30px;
            background: #38bdf8;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .step-icon {
            width: 80px;
            height: 80px;
            background: #ffffff;
            border: 2px solid #e2e8f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 30px auto 20px;
            font-size: 1.8rem;
            color: #38bdf8;
            transition: 0.3s;
        }

        .process-step:hover .step-icon {
            background: #38bdf8;
            color: #fff;
            border-color: #38bdf8;
            transform: scale(1.1);
        }

        .process-step h3 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .process-step p {
            color: #64748b;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .step-connector {
            width: 60px;
            height: 2px;
            background: #cbd5e1;
            margin-top: 70px;
            flex-shrink: 0;
        }

        /* CTA Section */
        .cta-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }

        .cta-section h2 {
            font-size: 3rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 20px;
        }

        .cta-section p {
            font-size: 1.2rem;
            color: #cbd5e1;
            margin-bottom: 40px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-cta {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 18px 45px;
            background: linear-gradient(90deg, #38bdf8, #818cf8);
            color: #fff;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 700;
            text-decoration: none;
            transition: 0.3s;
            box-shadow: 0 10px 30px rgba(56, 189, 248, 0.4);
        }

        .btn-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(56, 189, 248, 0.6);
            color: #fff;
        }

        /* Responsive */
        @media(max-width: 992px) {
            .process-steps {
                flex-direction: column;
                gap: 40px;
            }

            .step-connector {
                width: 2px;
                height: 40px;
                margin: 0 auto;
            }

            .application-card {
                grid-template-columns: 1fr;
            }

            .application-image {
                display: none;
            }
        }

        @media(max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .application-card {
                padding: 40px 30px;
            }
        }
    </style>
@endsection