@extends('layouts.app')

@section('title', $blog->title . ' - Stuvalley Insights')

@section('content')
    <style>
        /* Premium Blog Detail Styles */
        :root {
            --blog-accent: #2563eb;
            --blog-dark: #0f172a;
            --text-color: #334155;
            --heading-color: #0f172a;
        }

        /* Hero Section */
        .blog-hero {
            position: relative;
            min-height: 600px;
            width: 100%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: -120px;
            padding-top: 140px;
            padding-bottom: 100px;
        }

        .blog-hero-bg {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            z-index: 0;
            transform: scale(1.05);
            transition: transform 10s ease;
        }

        .blog-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(15, 23, 42, 0.4) 0%, rgba(15, 23, 42, 0.9) 100%);
            z-index: 1;
        }

        .blog-hero-content {
            position: relative;
            z-index: 2;
            max-width: 1000px;
            text-align: center;
            padding: 80px 20px 200px; /* Generous bottom padding to ensure room for the overlapping card */
            color: #fff;
        }

        .blog-meta {
            display: inline-flex;
            gap: 20px;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            padding: 14px 30px;
            border-radius: 50px;
            font-size: 0.95rem;
            font-weight: 600;
            margin-top: 30px; /* Space from title */
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
        }

        .blog-title {
            font-size: clamp(2.8rem, 7vw, 4.8rem);
            font-weight: 900;
            line-height: 1.05;
            margin-bottom: 0; /* Let margin-top of meta handle it */
            font-family: 'Outfit', sans-serif;
            letter-spacing: -2px;
            text-shadow: 0 10px 40px rgba(0,0,0,0.4);
        }

        /* Content Layout */
        .blog-container {
            max-width: 1000px;
            margin: -140px auto 0;
            position: relative;
            z-index: 5;
            padding: 0 20px 120px;
        }

        .blog-card-wrapper {
            background: #fff;
            padding: 70px;
            border-radius: 32px;
            box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.15);
            border: 1px solid #e2e8f0;
        }

        .entry-content {
            font-size: 1.2rem;
            line-height: 1.8;
            color: var(--text-color);
            font-family: 'Manrope', sans-serif;
        }

        .entry-content h2,
        .entry-content h3,
        .entry-content h4 {
            color: var(--heading-color);
            font-weight: 800;
            margin-top: 50px;
            margin-bottom: 25px;
            line-height: 1.2;
            font-family: 'Outfit', sans-serif;
            letter-spacing: -0.5px;
        }

        .entry-content h2 {
            font-size: 2.2rem;
        }

        .entry-content h3 {
            font-size: 1.8rem;
        }

        .entry-content p {
            margin-bottom: 30px;
        }

        .entry-content ul {
            margin-bottom: 30px;
            padding-left: 0;
            list-style: none;
        }

        .entry-content li {
            position: relative;
            padding-left: 30px;
            margin-bottom: 12px;
        }

        .entry-content li::before {
            content: '→';
            position: absolute;
            left: 0;
            color: var(--blog-accent);
            font-weight: 900;
        }

        .entry-content blockquote {
            border-left: 6px solid var(--blog-accent);
            padding: 30px 40px;
            margin: 50px 0;
            font-size: 1.5rem;
            font-style: italic;
            color: #475569;
            background: #f8fafc;
            border-radius: 0 20px 20px 0;
            font-weight: 500;
        }

        /* Author Box */
        .author-box {
            margin-top: 80px;
            padding-top: 50px;
            border-top: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .author-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }

        .author-info h4 {
            margin: 0 0 8px;
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--heading-color);
            font-family: 'Outfit', sans-serif;
        }

        .author-info p {
            margin: 0;
            color: #64748b;
            font-size: 1rem;
            line-height: 1.6;
        }

        /* Related Section */
        .related-section {
            background: #f8fafc;
            padding: 120px 0;
            border-top: 1px solid #e2e8f0;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Back Button */
        .back-nav {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-weight: 700;
            margin-bottom: 40px;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.8rem;
        }

        .back-nav:hover {
            color: #fff;
            transform: translateX(-10px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .blog-hero {
                height: 60vh;
            }

            .blog-card-wrapper {
                padding: 40px 25px;
            }

            .related-grid {
                grid-template-columns: 1fr;
            }

            .author-box {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>

    <!-- Hero Section -->
    <div class="blog-hero">
        <div class="blog-hero-bg"
            style="background-image: url('{{ $blog->featured_image ? asset($blog->featured_image) : 'https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?w=1200' }}');">
        </div>
        <div class="blog-hero-overlay"></div>
        <div class="blog-hero-content reveal">
            <a href="{{ route('blog') }}" class="back-nav">
                <i class="fas fa-arrow-left"></i> Back to Blogs
            </a>
            <h1 class="blog-title">{{ $blog->title }}</h1>
            <div class="blog-meta">
                <span><i class="far fa-calendar-alt"></i> {{ $blog->published_at->format('M d, Y') }}</span>
                <span style="width:1px; height:15px; background:rgba(255,255,255,0.4);"></span>
                <span><i class="far fa-folder"></i> {{ $blog->category }}</span>
                <span style="display:none; width:1px; height:15px; background:rgba(255,255,255,0.4);"></span>
                <!-- Optional Reading Time hidden on small screens -->
                <span class="md:inline hidden"><i class="far fa-clock"></i> {{ $blog->reading_time }} min read</span>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="blog-container">
        <div class="blog-card-wrapper reveal delay-100">
            <!-- Post Content -->
            <div class="entry-content">
                {!! $blog->content !!}
            </div>

            <!-- Social Share (Static Demo) -->
            <div style="margin-top: 50px; display: flex; gap: 15px; align-items: center;">
                <span style="font-weight: 700; font-size: 0.9rem; text-transform: uppercase; color: #94a3b8;">Share:</span>
                <a href="#"
                    style="width: 40px; height: 40px; border-radius: 50%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #0077b5; transition: 0.3s;"><i
                        class="fa-brands fa-linkedin-in"></i></a>
                <a href="#"
                    style="width: 40px; height: 40px; border-radius: 50%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #000000; transition: 0.3s;"><i
                        class="fa-brands fa-x-twitter"></i></a>
                <a href="#"
                    style="width: 40px; height: 40px; border-radius: 50%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #25d366; transition: 0.3s;"><i
                        class="fa-brands fa-whatsapp"></i></a>
            </div>

            <!-- Author Box -->
            <div class="author-box">
                <!-- Initials or Placeholder Avatar -->
                <div class="author-avatar"
                    style="background: #3b82f6; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: bold;">
                    {{ substr($blog->author, 0, 1) }}
                </div>
                <div class="author-info">
                    <h4>{{ $blog->author }}</h4>
                    <p>{{ $blog->author_bio ?? 'Tech Enthusiast & Industry Expert at Stuvalley.' }}</p>
                </div>
            </div>

            <!-- Blog CTA -->
            <div style="margin-top: 60px; padding: 40px; background: #f1f5f9; border-radius: 20px; text-align: center; border: 1px dashed #cbd5e1;">
                <h3 style="margin-top: 0; margin-bottom: 15px; font-size: 1.5rem; color: #0f172a;">Want to build something similar?</h3>
                <p style="color: #64748b; margin-bottom: 25px;">Our experts are ready to help you transform your digital presence with cutting-edge technology.</p>
                <a href="{{ route('contact') }}" class="btn-primary-tech" style="display: inline-flex; background: #2563eb; color: #fff; padding: 12px 30px; border-radius: 50px; text-decoration: none; font-weight: 700; transition: 0.3s;">
                    Get Free Consultation <i class="fas fa-paper-plane" style="margin-left: 10px;"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Related Articles -->
    @if(isset($relatedPosts) && $relatedPosts->count() > 0)
        <section class="related-section">
            <div class="container" style="max-width: 1000px; margin: 0 auto; text-align: center; margin-bottom: 40px;">
                <h3 style="font-size: 2rem; font-weight: 700; color: #1e293b;">Related Articles</h3>
            </div>
            <div class="related-grid">
                @foreach($relatedPosts as $r)
                    <a href="{{ route('blog.show', $r->slug) }}" class="related-card"
                        style="display: block; text-decoration: none; background: #fff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); transition: 0.3s;">
                        <div style="height: 200px; overflow: hidden;">
                            <img src="{{ $r->featured_image ? asset($r->featured_image) : 'https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?w=600' }}" alt="{{ $r->title }}"
                                style="width: 100%; height: 100%; object-fit: cover; transition: 0.5s;">
                        </div>
                        <div style="padding: 25px;">
                            <span
                                style="font-size: 0.8rem; font-weight: 600; color: #3b82f6; text-transform: uppercase;">{{ $r->category }}</span>
                            <h4 style="font-size: 1.2rem; font-weight: 700; color: #1e293b; margin: 10px 0; line-height: 1.4;">
                                {{ $r->title }}
                            </h4>
                            <span style="color: #64748b; font-size: 0.9rem;">Read Article →</span>
                        </div>
                    </a>
                    <style>
                        .related-card:hover {
                            transform: translateY(-5px);
                            box-shadow: 0 15px 30px -5px rgba(0, 0, 0, 0.1);
                        }

                        .related-card:hover img {
                            transform: scale(1.05);
                        }
                    </style>
                @endforeach
            </div>
        </section>
    @endif

    <script>
        // Reveal animation on scroll (simple implementation if original js not present)
        document.addEventListener('DOMContentLoaded', () => {
            const reveals = document.querySelectorAll('.reveal');
            const revealOnScroll = () => {
                const windowHeight = window.innerHeight;
                const elementVisible = 150;
                reveals.forEach(reveal => {
                    const elementTop = reveal.getBoundingClientRect().top;
                    if (elementTop < windowHeight - elementVisible) {
                        reveal.classList.add('active');
                        reveal.style.opacity = '1';
                        reveal.style.transform = 'translateY(0)';
                    }
                });
            };
            window.addEventListener('scroll', revealOnScroll);
            revealOnScroll(); // Trigger once on load
        });
    </script>
    <style>
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        .delay-100 {
            transition-delay: 0.1s;
        }
    </style>
@endsection