@extends('layouts.app')
@section('header_class', 'scrolled')

@section('content')
    <div class="company-page blog-page">

        <!-- Hero Section -->
        <section class="blog-hero">
            <div class="container text-center">
                <span class="badge-pill">Insights & News</span>
                <h1 class="display-title">Latest from <span class="text-gradient">Stuvalley</span></h1>
                <p class="hero-lead">Industry insights, tech trends, and expert perspectives on digital transformation</p>
            </div>
        </section>

        <!-- Blog Grid -->
        <section class="blog-grid-section">
            <div class="container">
                @if($posts->count() > 0)
                    <div class="blog-grid">
                        @foreach($posts as $post)
                            <article class="blog-card">
                                @if($post->featured_image)
                                    <div class="blog-card-image" style="background-image: url('{{ $post->featured_image }}');"></div>
                                @else
                                    <div class="blog-card-image" style="background: linear-gradient(135deg, #38bdf8, #818cf8);"></div>
                                @endif

                                <div class="blog-card-content">
                                    <div class="blog-meta">
                                        @if($post->category)
                                            <span class="blog-category">{{ $post->category }}</span>
                                        @endif
                                        <span class="blog-reading-time">
                                            <i class="far fa-clock"></i> {{ $post->reading_time }} min read
                                        </span>
                                    </div>

                                    <h3 class="blog-title">
                                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h3>

                                    @if($post->excerpt)
                                        <p class="blog-excerpt">{{ Str::limit($post->excerpt, 120) }}</p>
                                    @endif

                                    <div class="blog-footer">
                                        <div class="blog-author">
                                            <i class="fas fa-user-circle"></i> {{ $post->author }}
                                        </div>
                                        <div class="blog-date">
                                            {{ $post->published_at->format('M d, Y') }}
                                        </div>
                                    </div>

                                    <a href="{{ route('blog.show', $post->slug) }}" class="blog-read-more">
                                        Read More <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="blog-pagination">
                        {{ $posts->links() }}
                    </div>
                @else
                    <div class="empty-state">
                        <i class="fas fa-newspaper fa-4x"></i>
                        <h3>No Posts Yet</h3>
                        <p>Check back soon for the latest insights and updates!</p>
                    </div>
                @endif
            </div>
        </section>

    </div>

    <style>
        .blog-page {
            background: #0f172a;
            min-height: 100vh;
        }

        .blog-hero {
            padding: 160px 0 80px;
            background:
                radial-gradient(circle at top left, rgba(56, 189, 248, 0.15), transparent 40%),
                radial-gradient(circle at top right, rgba(129, 140, 248, 0.15), transparent 40%),
                radial-gradient(circle at bottom center, rgba(16, 185, 129, 0.1), transparent 50%),
                linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            position: relative;
            overflow: hidden;
        }

        .blog-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 30% 20%, rgba(56, 189, 248, 0.1), transparent 30%),
                radial-gradient(circle at 70% 80%, rgba(129, 140, 248, 0.08), transparent 30%);
            pointer-events: none;
            animation: gradientShift 15s ease-in-out infinite;
        }

        @keyframes gradientShift {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.8;
                transform: scale(1.1);
            }
        }

        .badge-pill {
            display: inline-block;
            padding: 8px 20px;
            background: rgba(56, 189, 248, 0.1);
            border: 1px solid rgba(56, 189, 248, 0.3);
            border-radius: 50px;
            color: #38bdf8;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }

        .display-title {
            font-size: 3.5rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 15px;
            line-height: 1.1;
        }

        .text-gradient {
            background: linear-gradient(90deg, #38bdf8, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-lead {
            color: #94a3b8;
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
        }

        .blog-grid-section {
            padding: 80px 0 120px;
        }

        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 40px;
        }

        .blog-card {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.03), rgba(255, 255, 255, 0.01));
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            overflow: hidden;
            transition: 0.3s;
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            border-color: rgba(56, 189, 248, 0.3);
        }

        .blog-card-image {
            height: 220px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .blog-card-content {
            padding: 30px;
        }

        .blog-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .blog-category {
            background: rgba(56, 189, 248, 0.1);
            color: #38bdf8;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .blog-reading-time {
            color: #64748b;
            font-size: 0.85rem;
        }

        .blog-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .blog-title a {
            color: #fff;
            text-decoration: none;
            transition: 0.3s;
        }

        .blog-title a:hover {
            color: #38bdf8;
        }

        .blog-excerpt {
            color: #94a3b8;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .blog-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            margin-bottom: 20px;
        }

        .blog-author,
        .blog-date {
            color: #64748b;
            font-size: 0.85rem;
        }

        .blog-read-more {
            color: #38bdf8;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
        }

        .blog-read-more:hover {
            color: #818cf8;
            gap: 12px;
        }

        .empty-state {
            text-align: center;
            padding: 100px 20px;
        }

        .empty-state i {
            color: #38bdf8;
            margin-bottom: 30px;
            opacity: 0.3;
        }

        .empty-state h3 {
            color: #fff;
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .empty-state p {
            color: #94a3b8;
            font-size: 1.1rem;
        }

        .blog-pagination {
            margin-top: 60px;
            display: flex;
            justify-content: center;
        }

        @media(max-width: 768px) {
            .display-title {
                font-size: 2.5rem;
            }

            .blog-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection