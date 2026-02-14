@extends('layouts.app')
@section('header_class', '')

@section('title', $job->title . ' - Careers | Stuvalley')

@section('content')
    <div class="job-details-page">
        <!-- Hero Section -->
        <section class="job-hero-premium">
            <div class="container">
                <nav aria-label="breadcrumb" class="premium-breadcrumb mb-5">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('careers') }}">Careers</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $job->title }}</li>
                    </ol>
                </nav>

                <div class="job-hero-content animate-fade-in">
                    <span class="job-badge-premium">{{ $job->department }}</span>
                    <h1 class="job-main-title-premium mt-3">{{ $job->title }}</h1>

                    <div class="job-hero-meta-premium mt-4">
                        <div class="meta-item-premium">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $job->location }}</span>
                        </div>
                        <div class="meta-item-premium">
                            <i class="fas fa-briefcase"></i>
                            <span>{{ $job->job_type }}</span>
                        </div>
                        <div class="meta-item-premium">
                            <i class="fas fa-graduation-cap"></i>
                            <span>{{ $job->experience_level }}</span>
                        </div>
                        @if ($job->salary_range)
                            <div class="meta-item-premium">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>{{ $job->salary_range }}</span>
                            </div>
                        @endif
                    </div>

                    <div class="job-hero-actions-premium mt-5">
                        <a href="{{ route('jobs.apply.page', $job->slug) }}"
                            class="btn btn-apply-premium text-decoration-none">
                            APPLY FOR THIS ROLE <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        <button class="btn btn-share-premium" onclick="shareJobLink()">
                            <i class="fas fa-share-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Content Section -->
        <section class="job-content-section py-5 bg-light">
            <div class="container">
                <div class="job-unified-card-premium shadow-sm">
                    <div class="row g-0">
                        <!-- Main Content Column -->
                        <div class="col-lg-8 border-end-content">
                            <div class="job-main-content-premium">
                                <div class="content-block">
                                    <h2 class="block-title-premium">Role Overview</h2>
                                    <div class="block-text-premium">
                                        {!! nl2br(e($job->description)) !!}
                                    </div>
                                </div>

                                @if ($job->responsibilities)
                                    <div class="content-block mt-5">
                                        <h2 class="block-title-premium">Key Responsibilities</h2>
                                        <div class="block-text-premium">
                                            {!! nl2br(e($job->responsibilities)) !!}
                                        </div>
                                    </div>
                                @endif

                                @if ($job->requirements)
                                    <div class="content-block mt-5">
                                        <h2 class="block-title-premium">Requirements</h2>
                                        <div class="block-text-premium">
                                            {!! nl2br(e($job->requirements)) !!}
                                        </div>
                                    </div>
                                @endif

                                @if ($job->benefits)
                                    <div class="content-block mt-5">
                                        <h2 class="block-title-premium">Perks & Benefits</h2>
                                        <div class="block-text-premium">
                                            {!! nl2br(e($job->benefits)) !!}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Sidebar Column -->
                        <div class="col-lg-4">
                            <div class="job-sidebar-section-premium">
                                <!-- Job Summary Section -->
                                <div class="sidebar-section mb-5">
                                    <h3 class="sidebar-title-premium">Job Summary</h3>
                                    <ul class="summary-list-premium p-0 m-0">
                                        <li>
                                            <span class="label">Published On</span>
                                            <span class="value">{{ $job->created_at->format('M d, Y') }}</span>
                                        </li>
                                        @if ($job->application_deadline)
                                            <li>
                                                <span class="label">Deadline</span>
                                                <span class="value">{{ $job->application_deadline->format('M d, Y') }}</span>
                                            </li>
                                        @endif
                                        <li>
                                            <span class="label">Experience</span>
                                            <span class="value">{{ $job->experience_level }}</span>
                                        </li>
                                        <li>
                                            <span class="label">Job Type</span>
                                            <span class="value">{{ $job->job_type }}</span>
                                        </li>
                                        <li>
                                            <span class="label">Location</span>
                                            <span class="value">{{ $job->location }}</span>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Hiring Process Section -->
                                <div class="sidebar-section">
                                    <h3 class="sidebar-title-premium">Hiring Process</h3>
                                    <div class="hiring-steps-premium">
                                        <div class="hiring-step-premium">
                                            <div class="step-dot-premium"></div>
                                            <div class="step-info-premium">
                                                <h4>Application Review</h4>
                                                <p>Our talent team studies your credentials.</p>
                                            </div>
                                        </div>
                                        <div class="hiring-step-premium">
                                            <div class="step-dot-premium"></div>
                                            <div class="step-info-premium">
                                                <h4>Initial Interview</h4>
                                                <p>A quick chat with our HR team.</p>
                                            </div>
                                        </div>
                                        <div class="hiring-step-premium">
                                            <div class="step-dot-premium"></div>
                                            <div class="step-info-premium">
                                                <h4>Technical Assessment</h4>
                                                <p>Deep dive into your professional skills.</p>
                                            </div>
                                        </div>
                                        <div class="hiring-step-premium">
                                            <div class="step-dot-premium"></div>
                                            <div class="step-info-premium">
                                                <h4>Culture Round</h4>
                                                <p>Ensuring shared values and vision.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="application-cta-bottom-premium mt-5 animate-slide-up">
                    <h3>Interested in this position?</h3>
                    <p>Join our mission to build innovative digital solutions and shape the future of technology.</p>
                    <a href="{{ route('jobs.apply.page', $job->slug) }}"
                        class="btn btn-apply-premium px-5 text-decoration-none mt-3">
                        APPLY NOW
                    </a>
                </div>
            </div>
        </section>
    </div>

    <style>
        .job-hero-premium {
            padding: 160px 0 100px;
            background: linear-gradient(135deg, #f8faff 0%, #ebf1ff 100%);
            border-bottom: 1px solid #e2e8f0;
        }

        .premium-breadcrumb .breadcrumb {
            background: transparent;
            padding: 0;
            margin: 0;
            list-style: none;
            /* Force remove numbers */
            display: flex;
            flex-wrap: wrap;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .premium-breadcrumb .breadcrumb-item {
            display: flex;
            align-items: center;
        }

        .premium-breadcrumb .breadcrumb-item::before {
            display: none !important;
            /* Hide bootstrap default '/' if appearing */
        }

        .premium-breadcrumb .breadcrumb-item+.breadcrumb-item::before {
            content: "•";
            color: #cbd5e1;
            padding: 0 12px;
            display: inline-block !important;
        }

        .job-hero-content {
            margin-top: 40px;
        }

        .job-badge-premium {
            display: inline-block;
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            border: 1px solid rgba(59, 130, 246, 0.2);
            margin-bottom: 25px;
            /* Added spacing below badge */
        }

        .job-main-title-premium {
            font-family: 'Outfit', sans-serif;
            font-size: 4rem;
            /* Slightly larger */
            font-weight: 900;
            color: #0f172a;
            letter-spacing: -0.03em;
            text-transform: capitalize;
            line-height: 1.1;
            margin-bottom: 30px;
            /* Added spacing below title */
        }

        .job-hero-meta-premium {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-bottom: 40px;
            /* Added spacing below meta */
        }

        .meta-item-premium {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #64748b;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .meta-item-premium i {
            color: #3b82f6;
            font-size: 1.1rem;
        }

        .btn-apply-premium {
            background: #2563eb;
            color: #fff;
            padding: 18px 45px;
            border-radius: 14px;
            font-weight: 800;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 10px 25px -5px rgba(37, 99, 235, 0.4);
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-apply-premium:hover {
            background: #1d4ed8;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px -5px rgba(37, 99, 235, 0.5);
            color: #fff;
        }

        .btn-share-premium {
            background: #fff;
            color: #64748b;
            width: 60px;
            height: 60px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #e2e8f0;
            margin-left: 15px;
            font-size: 1.25rem;
            transition: all 0.3s;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .btn-share-premium:hover {
            background: #f8faff;
            color: #3b82f6;
            border-color: #3b82f6;
            transform: scale(1.05);
        }

        .job-main-card-premium {
            background: #fff;
            border-radius: 24px;
            padding: 50px;
        }

        .block-title-premium {
            font-family: 'Outfit', sans-serif;
            font-size: 1.75rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 15px;
        }

        .block-title-premium::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 4px;
            background: #3b82f6;
            border-radius: 2px;
        }

        .job-content-section {
            padding-top: 80px !important;
            padding-bottom: 80px !important;
        }

        .job-unified-card-premium {
            background: #fff;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }

        .job-main-content-premium {
            padding: 50px;
        }

        .job-sidebar-section-premium {
            padding: 50px 30px;
            background: #fcfdfe;
            height: 100%;
        }

        .border-end-content {
            border-right: 1px solid #e2e8f0;
        }

        @media (max-width: 991px) {
            .border-end-content {
                border-right: none;
                border-bottom: 1px solid #e2e8f0;
            }

            .job-main-content-premium {
                padding: 35px 25px;
            }
        }

        .block-text-premium {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #475569;
            font-weight: 500;
        }

        .job-sidebar-premium {
            position: sticky;
            top: 100px;
        }

        .sidebar-title-premium {
            font-family: 'Outfit', sans-serif;
            font-size: 1.35rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 25px;
        }

        .summary-list-premium li {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 5px;
            padding: 15px 0;
            border-bottom: 1px dashed #e2e8f0;
        }

        .summary-list-premium li:last-child {
            border-bottom: none;
        }

        .summary-list-premium li .label {
            color: #94a3b8;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .summary-list-premium li .value {
            color: #0f172a;
            font-weight: 700;
            font-size: 1.05rem;
        }

        .hiring-steps-premium {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .hiring-step-premium {
            display: flex;
            gap: 15px;
        }

        .step-dot-premium {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #3b82f6;
            margin-top: 8px;
            position: relative;
            flex-shrink: 0;
        }

        .hiring-step-premium:not(:last-child) .step-dot-premium::after {
            content: "";
            position: absolute;
            top: 20px;
            left: 5px;
            width: 2px;
            height: 40px;
            background: #e2e8f0;
        }

        .step-info-premium h4 {
            font-size: 1.1rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 5px;
        }

        .step-info-premium p {
            font-size: 0.95rem;
            color: #64748b;
            margin-bottom: 0;
            font-weight: 500;
        }

        .application-cta-bottom-premium {
            background: #0f172a;
            border-radius: 24px;
            padding: 50px;
            text-align: center;
            color: #fff;
        }

        .application-cta-bottom-premium h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .application-cta-bottom-premium p {
            color: #94a3b8;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        @media (max-width: 768px) {
            .job-main-title-premium {
                font-size: 2.5rem;
            }

            .job-main-card-premium {
                padding: 30px;
            }

            .application-cta-bottom-premium {
                padding: 30px;
            }
        }
    </style>

    <script>
        async function shareJobLink() {
            const shareData = {
                title: '{{ $job->title }} | Stuvalley Careers',
                text: 'Check out this job opening at Stuvalley: {{ $job->title }}',
                url: window.location.href
            };

            const btn = document.querySelector('.btn-share-premium');
            const originalContent = btn.innerHTML;

            // Try Web Share API first
            if (navigator.share && navigator.canShare && navigator.canShare(shareData)) {
                try {
                    await navigator.share(shareData);
                } catch (err) {
                    if (err.name !== 'AbortError') {
                        copyToClipboard(btn, originalContent);
                    }
                }
            } else {
                // Fallback to clipboard
                copyToClipboard(btn, originalContent);
            }
        }

        function copyToClipboard(btn, originalContent) {
            navigator.clipboard.writeText(window.location.href).then(() => {
                btn.innerHTML = '<i class="fas fa-check"></i>';
                btn.style.color = '#10b981';
                btn.style.borderColor = '#10b981';
                setTimeout(() => {
                    btn.innerHTML = originalContent;
                    btn.style.color = '';
                    btn.style.borderColor = '';
                }, 2000);
            }).catch(err => {
                console.error('Failed to copy: ', err);
            });
        }
    </script>
@endsection