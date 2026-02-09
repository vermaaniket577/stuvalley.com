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
                                <div class="blog-card-image-wrapper">
                                    <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="blog-card-image">
                                </div>

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
                                        <p class="blog-excerpt">{{ \Illuminate\Support\Str::limit($post->excerpt, 120) }}</p>
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
                        {{ $posts->links('partials.pagination') }}
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
            background: #f8fafc;
            min-height: 100vh;
        }

        .blog-hero {
            padding: 180px 0 100px;
            background: #f8fafc;
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid #e2e8f0;
        }

        .blog-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 10% 20%, rgba(59, 130, 246, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(59, 130, 246, 0.05) 0%, transparent 40%);
            pointer-events: none;
        }

        .badge-pill {
            display: inline-block;
            padding: 10px 24px;
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 50px;
            color: #2563eb;
            font-size: 0.8rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 25px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .display-title {
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 900;
            color: #0f172a;
            margin-bottom: 20px;
            line-height: 1.1;
            letter-spacing: -2px;
            font-family: 'Outfit', sans-serif;
        }

        .text-gradient {
            background: linear-gradient(90deg, #2563eb, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-lead {
            color: #64748b;
            font-size: 1.25rem;
            max-width: 750px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .blog-grid-section {
            padding: 100px 0;
            position: relative;
            z-index: 2;
        }

        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 40px;
        }

        .blog-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
        }

        .blog-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            border-color: #3b82f6;
        }

        .blog-card-image-wrapper {
            height: 250px;
            overflow: hidden;
            position: relative;
        }

        .blog-card-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            display: block;
        }

        .blog-card:hover .blog-card-image {
            transform: scale(1.1);
        }

        .blog-card-content {
            padding: 35px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .blog-meta {
            display: flex;
            gap: 15px;
            align-items: center;
            margin-bottom: 20px;
        }

        .blog-category {
            background: rgba(59, 130, 246, 0.1);
            color: #2563eb;
            padding: 6px 16px;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .blog-reading-time {
            color: #94a3b8;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .blog-title {
            font-size: 1.6rem;
            font-weight: 800;
            margin-bottom: 18px;
            line-height: 1.3;
            font-family: 'Outfit', sans-serif;
            letter-spacing: -0.5px;
        }

        .blog-title a {
            color: #0f172a;
            text-decoration: none;
            transition: color 0.3s;
        }

        .blog-card:hover .blog-title a {
            color: #2563eb;
        }

        .blog-excerpt {
            color: #64748b;
            line-height: 1.7;
            margin-bottom: 25px;
            font-size: 1rem;
        }

        .blog-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 20px;
            border-top: 1px solid #f1f5f9;
            margin-top: auto;
            margin-bottom: 25px;
        }

        .blog-author,
        .blog-date {
            color: #94a3b8;
            font-size: 0.85rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .blog-read-more {
            color: #2563eb;
            text-decoration: none;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .blog-read-more i {
            font-size: 0.8rem;
            transition: transform 0.3s ease;
        }

        .blog-card:hover .blog-read-more i {
            transform: translateX(6px);
        }

        .empty-state {
            text-align: center;
            padding: 120px 20px;
            background: #fff;
            border-radius: 32px;
            border: 1px solid #e2e8f0;
        }

        .empty-state i {
            color: #3b82f6;
            margin-bottom: 30px;
            opacity: 0.2;
        }

        .empty-state h3 {
            color: #0f172a;
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .empty-state p {
            color: #64748b;
            font-size: 1.1rem;
        }

        /* Premium Tech Pagination */
        .blog-pagination {
            margin-top: 80px;
            display: flex;
            justify-content: center;
        }

        .pagination-tech {
            display: flex;
            gap: 12px;
            list-style: none;
            padding: 0;
            align-items: center;
        }

        .page-item-tech {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .page-item-tech a,
        .page-item-tech span {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            color: #0f172a;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .page-item-tech.active span {
            background: #2563eb;
            border-color: #2563eb;
            color: #ffffff;
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.4);
            transform: translateY(-2px);
        }

        .page-item-tech:not(.active):not(.disabled) a:hover {
            border-color: #2563eb;
            color: #2563eb;
            background: #eff6ff;
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .page-item-tech.disabled span {
            opacity: 0.4;
            cursor: not-allowed;
            background: #f1f5f9;
        }

        .page-item-tech i {
            font-size: 0.9rem;
        }

        @media(max-width: 768px) {
            .blog-grid {
                grid-template-columns: 1fr;
            }

            .blog-hero {
                padding: 140px 0 60px;
            }
        }
    </style>
@endsection