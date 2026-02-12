@extends('layouts.admin')

@section('content')
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Manrope:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        .candidate-detail-wrapper, .candidate-detail-wrapper * {
            box-sizing: border-box;
        }

        .candidate-detail-wrapper {
            font-family: 'Manrope', sans-serif;
            color: #1e293b;
        }

        .premium-header-nav {
            margin-bottom: 30px;
        }

        .btn-back-pro {
            background: #fff;
            color: #64748b;
            padding: 10px 20px;
            border: 1px solid #e2e8f0;
            border-radius: 100px;
            font-weight: 700;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-back-pro:hover {
            background: #f8fafc;
            color: #0f172a;
            border-color: #cbd5e1;
            transform: translateX(-5px);
        }

        .candidate-profile-card {
            background: #fff;
            border-radius: 30px;
            border: 1px solid #e2e8f0;
            padding: 40px;
            box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .card-accent-rail {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, #f36f21, #ff9d5c);
        }

        .profile-badge {
            display: inline-block;
            background: rgba(243, 111, 33, 0.1);
            color: #f36f21;
            padding: 6px 16px;
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .candidate-name {
            font-family: 'Outfit', sans-serif;
            font-size: 2.75rem;
            font-weight: 900;
            color: #0f172a;
            margin-bottom: 10px;
            line-height: 1.1;
        }

        .job-title-indicator {
            font-size: 1.15rem;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 40px;
        }

        .job-name-highlight {
            color: #0f172a;
            font-weight: 800;
            border-bottom: 2px solid rgba(243, 111, 33, 0.3);
        }

        /* Contact Info Grid */
        .info-grid-pro {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            background: #f8faff;
            padding: 30px;
            border-radius: 20px;
            border: 1px solid #ebf1ff;
            margin-bottom: 40px;
        }

        .info-item-pro {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .info-icon-box {
            width: 45px;
            height: 45px;
            background: #fff;
            color: #f36f21;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
            border: 1px solid #e2e8f0;
        }

        .info-label-stack {
            display: flex;
            flex-direction: column;
        }

        .info-label {
            font-size: 0.7rem;
            font-weight: 800;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .info-value {
            font-weight: 700;
            color: #1e293b;
            font-size: 1rem;
            text-decoration: none;
        }

        /* Cover Letter Section */
        .section-header-pro {
            font-family: 'Outfit', sans-serif;
            font-size: 1.4rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .section-header-pro i {
            color: #f36f21;
            opacity: 0.6;
        }

        .cover-letter-vault {
            background: #fff;
            padding: 30px;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            line-height: 1.8;
            color: #475569;
            font-size: 1.05rem;
            white-space: pre-line;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.02);
        }

        /* Sidebar Assets */
        .asset-card-sticky {
            background: #0f172a;
            border-radius: 30px;
            padding: 35px;
            color: #fff;
            position: sticky;
            top: 100px;
            box-shadow: 0 20px 40px -10px rgba(15, 23, 42, 0.3);
            text-align: center;
        }

        .asset-visual-box {
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            margin: 0 auto 25px;
            color: #f36f21;
        }

        .asset-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .asset-tagline {
            color: #94a3b8;
            font-size: 0.9rem;
            margin-bottom: 30px;
            line-height: 1.4;
        }

        .btn-action-view {
            background: #f36f21;
            color: #fff;
            padding: 16px 30px;
            border-radius: 16px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85rem;
            border: none;
            width: 100%;
            box-sizing: border-box;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            transition: 0.3s;
            box-shadow: 0 10px 20px rgba(243, 111, 33, 0.3);
        }

        .btn-action-view:hover {
            background: #fff;
            color: #f36f21;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .meta-footer-pro {
            margin-top: 35px;
            padding-top: 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: left;
        }

        .meta-stat {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .delete-safety-pro {
            margin-top: 50px;
            text-align: center;
        }

        .btn-delete-pro {
            background: transparent;
            color: #94a3b8;
            border: 1px dashed #cbd5e1;
            padding: 15px 40px;
            border-radius: 16px;
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
            width: 100%;
            box-sizing: border-box;
        }

        .btn-delete-pro:hover {
            background: #fff5f5;
            color: #ef4444;
            border-color: #fecaca;
            border-style: solid;
        }

        @media (max-width: 768px) {
            .info-grid-pro {
                grid-template-columns: 1fr;
            }

            .candidate-name {
                font-size: 2rem;
            }
        }
    </style>

    <div class="container-fluid py-4 candidate-detail-wrapper" style="max-width: 1100px; margin: 0 auto;">
        <!-- Header Actions -->
        <div class="premium-header-nav d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.job-applications.index') }}" class="btn-back-pro">
                <i class="fas fa-chevron-left"></i> BACK TO CANDIDATE REGISTRY
            </a>
            <div class="badge bg-white border text-muted py-2 px-3 rounded-pill fw-bold" style="font-size: 0.75rem;">
                APPLICATION TOKEN: #SV-{{ $application->id }}
            </div>
        </div>

        <div class="row">
            <!-- Main Profile Area -->
            <div class="col-lg-8">
                <div class="candidate-profile-card">
                    <div class="card-accent-rail"></div>

                    <div class="profile-badge">NEW SUBMISSION</div>

                    <h1 class="candidate-name">{{ $application->full_name }}</h1>

                    <div class="job-title-indicator">
                        <i class="fas fa-briefcase text-primary opacity-50"></i>
                        Qualified Candidate for <span
                            class="job-name-highlight">{{ $application->jobPosting->title ?? 'Unspecified Position' }}</span>
                    </div>

                    <!-- Contact Information Grid -->
                    <div class="info-grid-pro">
                        <div class="info-item-pro">
                            <div class="info-icon-box">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="info-label-stack">
                                <span class="info-label">Email Interface</span>
                                <a href="mailto:{{ $application->email }}" class="info-value">{{ $application->email }}</a>
                            </div>
                        </div>

                        <div class="info-item-pro">
                            <div class="info-icon-box">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="info-label-stack">
                                <span class="info-label">Direct Line</span>
                                <span class="info-value">{{ $application->phone }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Statement Area -->
                    <h3 class="section-header-pro">
                        <i class="fas fa-feather-alt"></i> Candidate Statement
                    </h3>
                    <div class="cover-letter-vault">
                        {{ $application->cover_letter ?? 'The candidate did not provide an accompanying statement with this application.' }}
                    </div>

                    <!-- Danger Zone -->
                    <div class="delete-safety-pro">
                        <form action="{{ route('admin.job-applications.destroy', $application->id) }}" method="POST"
                            onsubmit="return confirm('WARNING: This will permanently remove the candidate record. Proceed?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete-pro">
                                <i class="fas fa-trash-alt me-2"></i> ARCHIVE & PURGE APPLICATION
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Assets Sidebar -->
            <div class="col-lg-4">
                <div class="asset-card-sticky">
                    <div class="asset-visual-box">
                        @php
                            $isPdf = ($application->resume_mime === 'application/pdf') ||
                                (stripos($application->resume_filename, '.pdf') !== false) ||
                                (stripos($application->resume_path, '.pdf') !== false);
                        @endphp
                        <i class="fas {{ $isPdf ? 'fa-file-pdf' : 'fa-file-signature' }}"></i>
                    </div>

                    <h2 class="asset-title">Candidate CV</h2>
                    <p class="asset-tagline">Comprehensive documentation of professional history and skill competencies.</p>

                    @if($application->resume_filename || $application->resume_path)
                        <a href="{{ route('admin.job-applications.download', $application->id) }}" target="_blank"
                            class="btn-action-view">
                            @if($isPdf)
                                <i class="fas fa-external-link-alt"></i> VIEW FULL CV
                            @else
                                <i class="fas fa-file-download"></i> DOWNLOAD ASSET
                            @endif
                        </a>
                    @else
                        <div class="py-3 px-4 rounded-3 border border-secondary text-muted small">No visual credentials attached
                        </div>
                    @endif

                    <div class="meta-footer-pro">
                        <div class="meta-stat">
                            <span class="small opacity-50">RECORDED ON</span>
                            <span class="fw-bold">{{ $application->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="meta-stat">
                            <span class="small opacity-50">STAMP TIME</span>
                            <span class="fw-bold">{{ $application->created_at->format('h:i A') }}</span>
                        </div>
                        <div class="mt-3 text-center">
                            <span class="badge bg-primary bg-opacity-20 text-primary py-2 px-3 rounded-pill"
                                style="font-size: 0.7rem;">
                                {{ $application->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection