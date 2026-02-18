@extends('layouts.app')
@section('header_class', '')

@section('content')
    <div class="about-page-premium">

        <!-- Hero Section -->
        <section class="about-hero">
            <div class="hero-ambient-glow"></div>
            <div class="container relative z-10">
                <div class="hero-grid">
                    <div class="hero-text-col" data-aos="fade-right">
                        <span class="premium-pill-badge mb-4">Who We Are</span>
                        <h1 class="display-title">Pioneering Digital <span class="text-gradient-cyan">Excellence</span></h1>
                        <p class="hero-lead">We are Stuvalley. A global collective of innovators dedicated to transforming
                            businesses through disruptive technology. By bridging the gap between innovation and scale, we
                            engineer growth for the digital leaders of tomorrow.</p>

                        <div class="hero-cta-group mt-5">
                            <a href="#story" class="btn-premium-primary me-3">Explore Our Journey</a>
                            <a href="{{ route('contact') }}" class="btn-premium-outline">Why Choose Us <i
                                    class="fas fa-arrow-right ms-2 mt-1"></i></a>
                        </div>
                    </div>
                    <div class="hero-visual-col" data-aos="zoom-in-left" data-aos-delay="200">
                        <div class="glass-floating-stack">
                            <!-- Main Decorative Card -->
                            <div class="glass-visual-card main-card float-animation">
                                <div class="card-icon-sphere bg-cyan"><i class="fas fa-rocket"></i></div>
                                <h3>Innovation Ecosystem</h3>
                                <p>Pushing the boundaries of what's possible in the digital realm.</p>
                            </div>
                            <!-- Floating Labels -->
                            <div class="glass-mini-label label-1 float-animation-delayed">
                                <i class="fas fa-code text-cyan me-2"></i> Clean Code
                            </div>
                            <div class="glass-mini-label label-2 float-animation-reverse">
                                <i class="fas fa-layer-group text-blue me-2"></i> Scalable Architecture
                            </div>
                            <div class="glass-mini-label label-3 float-animation">
                                <i class="fas fa-shield-alt text-purple me-2"></i> Enterprise Security
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Story Section -->
        <section id="story" class="section-spacing light-story-section">
            <div class="container">
                <div class="grid-2-story align-items-center">
                    <div class="story-text-col" data-aos="fade-right">
                        <div class="about-section-badge">Our Story</div>
                        <h2 class="story-headline">From a visionary idea to a <span class="text-glow">global digital
                                powerhouse</span>.</h2>
                        <p class="story-desc">Founded with a single mission—to democratize enterprise-grade
                            technology—Stuvalley has evolved from a niche development studio into a global strategic
                            partner. We don't just provide services; we provide the architectural backbone for modern
                            business.</p>

                        <!-- Timeline Highlights -->
                        <div class="timeline-highlights mt-5">
                            <div class="timeline-item">
                                <div class="time-dot"></div>
                                <div class="time-content">
                                    <strong>Founded</strong>
                                    <p>Started as a specialized tech collective with a core focus on R&D.</p>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="time-dot"></div>
                                <div class="time-content">
                                    <strong>Global Growth</strong>
                                    <p>Expanding our footprint across multiple continents and industry sectors.</p>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="time-dot"></div>
                                <div class="time-content">
                                    <strong>Industry Leader</strong>
                                    <p>Recognized for excellence in digital transformation and AI implementation.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="story-visual-col" data-aos="fade-left">
                        <div class="abstract-visual-frame">
                            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=800&auto=format&fit=crop"
                                alt="Our Journey">
                            <div class="overlay-mesh"></div>
                            <div class="experience-glass float-animation-delayed">
                                <span class="num">10+</span>
                                <small>Years of Legacy</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Vision, Mission & Values -->
        <section class="section-spacing vision-mission-values">
            <div class="container">
                <div class="grid-3-premium-cards">
                    <!-- Vision -->
                    <div class="glass-card-v2" data-aos="fade-up">
                        <div class="card-glow-circle circle-blue"><i class="fas fa-eye"></i></div>
                        <h3>Vision</h3>
                        <p>To be the world's most trusted partner for digital strategy, enabling businesses to thrive in a
                            hyper-connected future.</p>
                    </div>
                    <!-- Mission -->
                    <div class="glass-card-v2" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-glow-circle circle-purple"><i class="fas fa-bullseye"></i></div>
                        <h3>Mission</h3>
                        <p>Delivering scalable, user-centric, and secure digital infrastructure that drives measurable
                            growth for our partners.</p>
                    </div>
                    <!-- Values -->
                    <div class="glass-card-v2" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-glow-circle circle-cyan"><i class="fas fa-heart"></i></div>
                        <h3>Values</h3>
                        <p>Integrity, obsession with innovation, and a commitment to engineering excellence are the core of
                            our culture.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Leadership Section -->
        <section id="leadership" class="section-spacing team-section-light">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up">
                    <span class="text-cyan fw-bold text-uppercase ls-3">The Brain Trust</span>
                    <h2 class="display-title-sm mt-3">Executive Leadership</h2>
                    <p class="section-intro mx-auto">Meet the architects shaping the future of technology and strategic
                        product development.</p>
                </div>

                <div class="grid-3-team-premium">
                    @forelse($members as $index => $member)
                        <!-- Leader {{ $index + 1 }} -->
                        <div class="leader-glass-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="profile-frame">
                                @if($member->image)
                                    <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($member->name) }}&background=0284c7&color=fff&size=400"
                                        alt="{{ $member->name }}">
                                @endif

                                <div class="profile-social-overlay">
                                    @if($member->linkedin_url)
                                        <a href="{{ $member->linkedin_url }}" target="_blank"><i
                                                class="fa-brands fa-linkedin-in"></i></a>
                                    @endif
                                    @if($member->twitter_url)
                                        <a href="{{ $member->twitter_url }}" target="_blank"><i
                                                class="fa-brands fa-x-twitter"></i></a>
                                    @endif
                                    @if(!$member->linkedin_url && !$member->twitter_url)
                                        <span class="text-white small">Professional Profile</span>
                                    @endif
                                </div>
                            </div>
                            <div class="profile-info text-center mt-4">
                                <h4>{{ $member->name }}</h4>
                                <span class="profile-role">{{ $member->role }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <p class="text-muted italic">Our executive team is currently being updated. Check back soon!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>



    </div>

    <!-- AOS & Counter Scripts -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof AOS !== 'undefined') {
                AOS.init({ duration: 1000, once: true, offset: 100 });
            }
        });
    </script>

    <style>
        .about-page-premium {
            --color-bg: #ffffff;
            --color-card: rgba(255, 255, 255, 0.8);
            --color-accent: #0284c7;
            --color-text: #0f172a;
            --color-text-muted: #64748b;
            --font-main: 'Outfit', sans-serif;

            background-color: var(--color-bg);
            color: var(--color-text);
            font-family: var(--font-main);
            overflow-x: hidden;
            padding-bottom: 80px;
        }

        .section-spacing {
            padding: 120px 0;
        }

        /* Hero Section */
        .about-hero {
            min-height: 90vh;
            display: flex;
            align-items: center;
            position: relative;
            padding: 120px 100px;
            /* Increased equally on all sides for a more framed, luxury look */
            overflow: hidden;
            background: radial-gradient(circle at 10% 20%, rgba(56, 189, 248, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(2, 132, 199, 0.05) 0%, transparent 40%),
                #f8fafc;
        }

        .hero-ambient-glow {
            position: absolute;
            top: 20%;
            left: 30%;
            width: 60%;
            height: 60%;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.1) 0%, transparent 70%);
            filter: blur(100px);
            pointer-events: none;
        }

        .display-title {
            font-size: clamp(3rem, 6vw, 5rem);
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -2px;
            margin-bottom: 30px;
            color: #0f172a;
        }

        .text-gradient-cyan {
            background: linear-gradient(135deg, #0284c7, #38bdf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-lead {
            font-size: 1.3rem;
            color: var(--color-text-muted);
            line-height: 1.7;
            max-width: 650px;
        }

        .premium-pill-badge {
            display: inline-block;
            padding: 8px 18px;
            background: rgba(2, 132, 199, 0.05);
            border: 1px solid rgba(2, 132, 199, 0.1);
            border-radius: 50px;
            color: var(--color-accent);
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 700;
            font-size: 0.8rem;
        }

        /* Buttons */
        .btn-premium-primary {
            display: inline-block;
            padding: 18px 35px;
            background: linear-gradient(135deg, #0284c7, #38bdf8);
            color: #fff;
            border-radius: 50px;
            font-weight: 800;
            text-decoration: none;
            transition: 0.3s;
            box-shadow: 0 10px 30px rgba(2, 132, 199, 0.2);
        }

        .btn-premium-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(2, 132, 199, 0.3);
            color: #fff;
        }

        .btn-premium-outline {
            display: inline-block;
            padding: 18px 35px;
            border: 1px solid rgba(15, 23, 42, 0.1);
            color: #0f172a;
            border-radius: 50px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-premium-outline:hover {
            background: rgba(15, 23, 42, 0.05);
            border-color: #0284c7;
            color: #0284c7;
        }

        /* Hero Visual Stack */
        .glass-floating-stack {
            position: relative;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .glass-visual-card {
            width: 380px;
            padding: 50px;
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 35px;
            box-shadow: 0 40px 100px rgba(0, 0, 0, 0.08);
            z-index: 5;
            margin: 30px;
            /* Added equal margin for better breathing room */
        }

        .card-icon-sphere {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: #fff;
            margin-bottom: 30px;
        }

        .bg-cyan {
            background: linear-gradient(135deg, #0284c7, #38bdf8);
        }

        .glass-mini-label {
            position: absolute;
            padding: 12px 24px;
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 50px;
            color: #0f172a;
            font-weight: 600;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            z-index: 6;
            white-space: nowrap;
        }

        .label-1 {
            top: 10%;
            right: 0;
        }

        .label-2 {
            bottom: 15%;
            left: -30px;
        }

        .label-3 {
            top: 30%;
            left: -60px;
        }

        /* Story Section */
        .grid-2-story {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
        }

        .about-section-badge {
            color: var(--color-accent);
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 20px;
        }

        .story-headline {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 30px;
            color: #0f172a;
        }

        .text-glow {
            color: #0284c7;
        }

        .story-desc {
            font-size: 1.15rem;
            color: var(--color-text-muted);
            line-height: 1.8;
        }

        .timeline-highlights {
            border-left: 2px solid rgba(0, 0, 0, 0.05);
            padding-left: 30px;
        }

        .timeline-item {
            position: relative;
            padding-bottom: 40px;
        }

        .timeline-item:last-child {
            padding-bottom: 0;
        }

        .time-dot {
            position: absolute;
            left: -37px;
            top: 5px;
            width: 12px;
            height: 12px;
            background: var(--color-accent);
            border-radius: 50%;
            box-shadow: 0 0 15px rgba(2, 132, 199, 0.3);
        }

        .time-content strong {
            color: #0f172a;
            display: block;
            margin-bottom: 5px;
            font-size: 1.1rem;
        }

        .time-content p {
            color: var(--color-text-muted);
            font-size: 0.95rem;
            margin: 0;
        }

        .abstract-visual-frame {
            position: relative;
            border-radius: 40px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }

        .abstract-visual-frame img {
            width: 100%;
            display: block;
        }

        .experience-glass {
            position: absolute;
            bottom: 40px;
            right: 40px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 30px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .experience-glass .num {
            font-size: 3rem;
            font-weight: 800;
            color: #0f172a;
            display: block;
        }

        .experience-glass small {
            color: var(--color-accent);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Vision Mission Values */
        .grid-3-premium-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .glass-card-v2 {
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.05);
            padding: 60px 40px;
            border-radius: 35px;
            transition: 0.5s;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        }

        .glass-card-v2:hover {
            transform: translateY(-15px);
            border-color: rgba(2, 132, 199, 0.2);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.08);
        }

        .card-glow-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #fff;
            margin-bottom: 35px;
            position: relative;
        }

        .circle-blue {
            background: rgba(2, 132, 199, 0.1);
            color: #0284c7;
        }

        .circle-purple {
            background: rgba(168, 85, 247, 0.1);
            color: #a855f7;
        }

        .circle-cyan {
            background: rgba(56, 189, 248, 0.1);
            color: #0891b2;
        }

        .glass-card-v2 h3 {
            font-size: 1.6rem;
            font-weight: 800;
            margin-bottom: 15px;
            color: #0f172a;
        }

        .glass-card-v2 p {
            color: var(--color-text-muted);
            line-height: 1.7;
        }

        /* Leadership Section */
        .team-section-light {
            background: #f8fafc;
        }

        .grid-3-team-premium {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
        }

        .leader-glass-card {
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 40px;
            padding: 40px;
            transition: 0.5s;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        }

        .leader-glass-card:hover {
            transform: translateY(-20px);
            border-color: var(--color-accent);
            box-shadow: 0 20px 50px rgba(2, 132, 199, 0.1);
        }

        .profile-frame {
            width: 200px;
            height: 200px;
            margin: 0 auto;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid #f1f5f9;
            position: relative;
            transition: 0.5s;
        }

        .leader-glass-card:hover .profile-frame {
            border-color: var(--color-accent);
        }

        .profile-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-social-overlay {
            position: absolute;
            inset: 0;
            background: rgba(2, 132, 199, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            opacity: 0;
            transition: 0.4s;
            transform: scale(0.8);
        }

        .leader-glass-card:hover .profile-social-overlay {
            opacity: 1;
            transform: scale(1);
        }

        .profile-social-overlay a {
            width: 45px;
            height: 45px;
            background: #fff;
            color: #0284c7;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: 0.3s;
        }

        .profile-social-overlay a:hover {
            transform: translateY(-5px);
            background: #0f172a;
            color: #fff;
        }

        .profile-role {
            font-weight: 700;
            color: var(--color-accent);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85rem;
        }

        /* Animations */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .float-animation {
            animation: float 6s ease-in-out infinite;
        }

        .float-animation-delayed {
            animation: float 6s ease-in-out 3s infinite;
        }

        .float-animation-reverse {
            animation: float 6s ease-in-out 1s infinite reverse;
        }

        /* Responsive */
        @media (max-width: 992px) {

            .hero-grid,
            .grid-2-story,
            .grid-3-premium-cards,
            .grid-3-team-premium {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-lead {
                margin: 0 auto;
            }

            .hero-visual-col {
                display: none;
            }

            .timeline-highlights {
                border-left: none;
                padding-left: 0;
            }

            .time-dot {
                display: none;
            }
        }
    </style>
@endsection