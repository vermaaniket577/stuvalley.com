@extends('layouts.app')

@section('title', 'Our Services - Stuvalley Technology')

@section('header_class', 'header-transparent')

@section('content')
    <!-- Services Hero Section -->
    <section class="services-hero"
        style="position: relative; padding: 180px 0 100px; overflow: hidden; background: radial-gradient(circle at top center, #1e293b 0%, #0f172a 100%);">
        <!-- Background Elements -->
        <div
            style="position: absolute; top: -100px; left: 50%; transform: translateX(-50%); width: 800px; height: 600px; background: radial-gradient(circle, rgba(59,130,246,0.15) 0%, transparent 70%); pointer-events: none;">
        </div>

        <div class="container"
            style="max-width: 1200px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 2; text-align: center;">
            <div class="animate-fade-down">
                <span
                    style="display: inline-block; color: #3b82f6; font-size: 0.8rem; font-weight: 700; letter-spacing: 3px; text-transform: uppercase; margin-bottom: 20px; padding: 8px 16px; background: rgba(59,130,246,0.1); border-radius: 30px; border: 1px solid rgba(59,130,246,0.2);">
                    WHAT WE OFFER
                </span>
                <h1
                    style="font-size: 3.5rem; font-weight: 800; color: #ffffff; margin-bottom: 25px; line-height: 1.2; font-family: 'Manrope', sans-serif;">
                    Our Expert <span
                        style="background: linear-gradient(90deg, #3b82f6, #06b6d4); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Services</span>
                </h1>
                <p style="color: #94a3b8; font-size: 1.2rem; max-width: 700px; margin: 0 auto; line-height: 1.8;">
                    We offer a wide range of digital services designed to help your business evolve and succeed in the
                    competitive digital landscape.
                </p>
            </div>
        </div>
    </section>

    <!-- Services Grid Section -->
    <section style="padding: 0 0 120px; background: #0f172a;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <div class="services-grid">
                @foreach($services as $slug => $service)
                    <div class="service-card-premium reveal">
                        <div class="svc-icon-box">
                            <i
                                class="fas {{ $service['icon'] ?? (is_array($service['features'][0] ?? null) ? ($service['features'][0]['icon'] ?? 'fa-layer-group') : 'fa-layer-group') }}"></i>
                        </div>
                        <h3 class="svc-title">{{ $service['title'] }}</h3>
                        <p class="svc-desc">
                            {{ $service['description'] ?? $service['subtitle'] ?? Str::limit($service['about_text'] ?? '', 100) }}
                        </p>

                        <div class="svc-features">
                            @if(isset($service['features']) && is_array($service['features']))
                                @foreach(array_slice($service['features'], 0, 3) as $feature)
                                    <span class="svc-tag">{{ is_array($feature) ? $feature['title'] : $feature }}</span>
                                @endforeach
                            @endif
                        </div>

                        <a href="{{ route('services.show', $slug) }}" class="svc-link">
                            Explore Service <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section
        style="padding: 100px 0; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); position: relative; overflow: hidden;">
        <div class="container"
            style="max-width: 1000px; margin: 0 auto; padding: 0 20px; text-align: center; position: relative; z-index: 2;">
            <h2 style="font-size: 2.5rem; color: #fff; font-weight: 800; margin-bottom: 25px;">Ready to Transform Your
                Business?</h2>
            <p
                style="color: rgba(255,255,255,0.9); font-size: 1.2rem; margin-bottom: 40px; max-width: 600px; margin-left: auto; margin-right: auto;">
                Let's discuss how our expert services can help you achieve your digital goals.
            </p>
            <a href="{{ url('/#contact') }}" class="btn-white-cta">
                Get a Quote
            </a>
        </div>
    </section>

    <style>
        /* Fade Down Animation */
        .animate-fade-down {
            animation: fadeDown 1s ease-out;
        }

        @keyframes fadeDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Services Grid */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: -60px;
            /* Overlap effect */
            position: relative;
            z-index: 10;
        }

        /* Premium Card */
        .service-card-premium {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 40px 30px;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .service-card-premium::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #3b82f6, transparent);
            opacity: 0;
            transition: opacity 0.4s;
        }

        .service-card-premium:hover {
            transform: translateY(-10px);
            background: rgba(30, 41, 59, 0.95);
            box-shadow: 0 20px 40px -5px rgba(0, 0, 0, 0.3);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .service-card-premium:hover::before {
            opacity: 1;
        }

        .svc-icon-box {
            width: 60px;
            height: 60px;
            background: rgba(59, 130, 246, 0.1);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #3b82f6;
            margin-bottom: 25px;
            transition: all 0.4s ease;
        }

        .service-card-premium:hover .svc-icon-box {
            background: #3b82f6;
            color: #fff;
            transform: scale(1.1) rotate(5deg);
        }

        .svc-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 15px;
            font-family: 'Manrope', sans-serif;
        }

        .svc-desc {
            color: #94a3b8;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 25px;
            flex-grow: 1;
        }

        .svc-features {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 30px;
        }

        .svc-tag {
            font-size: 0.75rem;
            color: #cbd5e1;
            padding: 4px 10px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .svc-link {
            color: #3b82f6;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.95rem;
            transition: gap 0.3s;
        }

        .svc-link:hover {
            gap: 12px;
            color: #60a5fa;
        }

        .btn-white-cta {
            display: inline-block;
            background: #fff;
            color: #2563eb;
            font-weight: 700;
            padding: 16px 36px;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        .btn-white-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .services-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .services-grid {
                grid-template-columns: 1fr;
            }

            .services-hero {
                padding-top: 140px;
            }
        }

        /* Reveal Animation Classes */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease-out;
            visibility: hidden;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
            visibility: visible;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Simple Reveal Script for this page
            const reveals = document.querySelectorAll('.reveal');

            const revealOnScroll = function () {
                const windowHeight = window.innerHeight;
                const elementVisible = 50;

                reveals.forEach((reveal) => {
                    const elementTop = reveal.getBoundingClientRect().top;
                    if (elementTop < windowHeight - elementVisible) {
                        reveal.classList.add('active');
                    }
                });
            };

            window.addEventListener('scroll', revealOnScroll);
            // Trigger immediately
            setTimeout(revealOnScroll, 100);

            // Safety Check
            setTimeout(() => {
                reveals.forEach(r => r.classList.add('active'));
            }, 500);
        });
    </script>
@endsection