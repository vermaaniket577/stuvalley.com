@extends('layouts.admin')

@section('content')
    <div class="admin-header-v2 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1><i class="fas fa-chart-line text-primary me-2"></i> Dashboard Overview</h1>
            <div class="text-muted small fw-bold">Welcome back, Admin!</div>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <!-- Blog Stats -->
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon bg-soft-primary">
                    <i class="fas fa-blog text-primary"></i>
                </div>
                <div class="stat-details">
                    <h3>{{ \App\Models\BlogPost::count() }}</h3>
                    <p>Total Blog Posts</p>
                </div>
                <a href="{{ route('admin.blog.index') }}"
                    class="stat-link mt-3 d-block small fw-bold text-decoration-none text-primary">
                    Manage Posts <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <!-- Career Stats -->
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon bg-soft-success">
                    <i class="fas fa-briefcase text-success"></i>
                </div>
                <div class="stat-details">
                    <h3>{{ \App\Models\JobPosting::count() }}</h3>
                    <p>Open Vacancies</p>
                </div>
                <a href="{{ route('admin.careers.index') }}"
                    class="stat-link mt-3 d-block small fw-bold text-decoration-none text-success">
                    Manage Careers <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <!-- Leads Stats -->
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon bg-soft-warning">
                    <i class="fas fa-envelope text-warning"></i>
                </div>
                <div class="stat-details">
                    <h3>{{ \App\Models\Lead::count() }}</h3>
                    <p>Total Leads</p>
                </div>
                <a href="{{ route('admin.leads.index') }}"
                    class="stat-link mt-3 d-block small fw-bold text-decoration-none text-warning">
                    View Messages <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <!-- Industry Stats -->
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon bg-soft-info">
                    <i class="fas fa-industry text-info"></i>
                </div>
                <div class="stat-details">
                    <h3>{{ \App\Models\Industry::count() }}</h3>
                    <p>Industries Served</p>
                </div>
                <a href="{{ route('admin.industries.index') }}"
                    class="stat-link mt-3 d-block small fw-bold text-decoration-none text-info">
                    Manage Industries <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    <style>
        .admin-header-v2 h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
        }

        .stat-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid #f1f5f9;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-bottom: 20px;
        }

        .stat-details h3 {
            font-size: 1.875rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .stat-details p {
            color: #64748b;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 0;
        }

        .bg-soft-primary {
            background-color: rgba(56, 189, 248, 0.1);
        }

        .bg-soft-success {
            background-color: rgba(16, 185, 129, 0.1);
        }

        .bg-soft-warning {
            background-color: rgba(245, 158, 11, 0.1);
        }

        .bg-soft-info {
            background-color: rgba(56, 189, 248, 0.1);
        }
    </style>
@endsection