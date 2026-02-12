@extends('layouts.admin')

@section('content')
    <div class="dashboard-container">
        <!-- Modern Welcome Header -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-5 gap-3">
            <div>
                <h1 class="h3 fw-bolder text-dark mb-1">Dashboard Overview</h1>
                <p class="text-secondary mb-0">Welcome back, Admin! Here's your daily performance summary.</p>
            </div>
            <div class="d-flex gap-3">
                <a href="{{ url('/') }}" target="_blank"
                    class="btn btn-white shadow-sm border fw-bold d-flex align-items-center">
                    <i class="fas fa-external-link-alt me-2 text-secondary"></i> View Website
                </a>
                <a href="{{ route('admin.settings') }}" class="btn btn-primary shadow-sm fw-bold d-flex align-items-center">
                    <i class="fas fa-cog me-2"></i> Settings
                </a>
            </div>
        </div>

        <!-- Premium Stat Cards -->
        <div class="row g-4 mb-5">
            <!-- Blog Stats -->
            <div class="col-xl-3 col-md-6">
                <div class="saas-card h-100">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="icon-box bg-primary-subtle text-primary">
                            <i class="fas fa-pen-nib"></i>
                        </div>
                        <span class="badge bg-light text-secondary border">Content</span>
                    </div>
                    <div class="mt-2">
                        <h2 class="fw-bolder text-dark mb-1">{{ $blogCount }}</h2>
                        <p class="text-secondary text-uppercase small fw-bold tracking-wide mb-4">Total Blog Posts</p>
                    </div>
                    <a href="{{ route('admin.blog.index') }}"
                        class="btn btn-light w-100 fw-bold border-0 text-primary bg-primary-hover-soft transition-all">
                        Manage Posts <i class="fas fa-arrow-right ms-1 small"></i>
                    </a>
                </div>
            </div>

            <!-- Career Stats -->
            <div class="col-xl-3 col-md-6">
                <div class="saas-card h-100">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="icon-box bg-success-subtle text-success">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <span class="badge bg-light text-secondary border">Hiring</span>
                    </div>
                    <div class="mt-2">
                        <h2 class="fw-bolder text-dark mb-1">{{ $vacancyCount }}</h2>
                        <p class="text-secondary text-uppercase small fw-bold tracking-wide mb-4">Open Vacancies</p>
                    </div>
                    <a href="{{ route('admin.careers.index') }}"
                        class="btn btn-light w-100 fw-bold border-0 text-success bg-success-hover-soft transition-all">
                        Manage Careers <i class="fas fa-arrow-right ms-1 small"></i>
                    </a>
                </div>
            </div>

            <!-- Leads Stats -->
            <div class="col-xl-3 col-md-6">
                <div class="saas-card h-100">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="icon-box bg-warning-subtle text-warning">
                            <i class="fas fa-envelope-open-text"></i>
                        </div>
                        <span class="badge bg-light text-secondary border">Growth</span>
                    </div>
                    <div class="mt-2">
                        <h2 class="fw-bolder text-dark mb-1">{{ $leadCount }}</h2>
                        <p class="text-secondary text-uppercase small fw-bold tracking-wide mb-4">Total Leads</p>
                    </div>
                    <a href="{{ route('admin.leads.index') }}"
                        class="btn btn-light w-100 fw-bold border-0 text-warning bg-warning-hover-soft transition-all">
                        View Messages <i class="fas fa-arrow-right ms-1 small"></i>
                    </a>
                </div>
            </div>

            <!-- Industry Stats -->
            <div class="col-xl-3 col-md-6">
                <div class="saas-card h-100">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="icon-box bg-info-subtle text-info">
                            <i class="fas fa-server"></i>
                        </div>
                        <span class="badge bg-light text-secondary border">Portfolio</span>
                    </div>
                    <div class="mt-2">
                        <h2 class="fw-bolder text-dark mb-1">{{ $industryCount }}</h2>
                        <p class="text-secondary text-uppercase small fw-bold tracking-wide mb-4">Industries Served</p>
                    </div>
                    <a href="{{ route('admin.industries.index') }}"
                        class="btn btn-light w-100 fw-bold border-0 text-info bg-info-hover-soft transition-all">
                        Manage Industries <i class="fas fa-arrow-right ms-1 small"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Charts Grid -->
        <h4 class="h5 fw-bold text-dark mb-4 px-1">Analytics & Performance</h4>
        <div class="row g-4 mb-5">
            <!-- Blog Activity Chart -->
            <div class="col-xl-6">
                <div class="saas-card">
                    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom-dashed">
                        <div>
                            <h5 class="fw-bold text-dark mb-1">Blog Content</h5>
                            <span class="text-secondary small">Monthly posting activity</span>
                        </div>
                        <div class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">{{ date('Y') }}</div>
                    </div>
                    <div class="chart-container" style="height: 300px;">
                        <canvas id="blogChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Leads Growth Chart -->
            <div class="col-xl-6">
                <div class="saas-card">
                    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom-dashed">
                        <div>
                            <h5 class="fw-bold text-dark mb-1">Lead Generation</h5>
                            <span class="text-secondary small">Monthly inquiries</span>
                        </div>
                        <div class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">Growth</div>
                    </div>
                    <div class="chart-container" style="height: 300px;">
                        <canvas id="leadsChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Vacancy Status Chart -->
            <div class="col-xl-4">
                <div class="saas-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom-dashed">
                        <div>
                            <h5 class="fw-bold text-dark mb-1">Hiring Status</h5>
                            <span class="text-secondary small">Open vs Closed</span>
                        </div>
                    </div>
                    <div class="chart-container d-flex align-items-center justify-content-center" style="height: 250px;">
                        <canvas id="vacancyChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Service Interest Chart -->
            <div class="col-xl-8">
                <div class="saas-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom-dashed">
                        <div>
                            <h5 class="fw-bold text-dark mb-1">Service Demand</h5>
                            <span class="text-secondary small">Leads by category</span>
                        </div>
                    </div>
                    <div class="chart-container" style="height: 300px;">
                        <canvas id="serviceChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Scripts -->
    <script>
        // Shared Configuration
        Chart.defaults.font.family = "'Segoe UI', 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif";
        Chart.defaults.color = '#64748b';

        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        boxWidth: 8,
                        padding: 20,
                        font: {
                            size: 12,
                            weight: 500
                        }
                    }
                },
                tooltip: {
                    backgroundColor: '#0f172a',
                    padding: 12,
                    titleFont: {
                        size: 13,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 12
                    },
                    cornerRadius: 8,
                    displayColors: false,
                    intersect: false,
                    mode: 'index'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        borderDash: [4, 4],
                        color: '#f1f5f9',
                        drawBorder: false
                    },
                    ticks: {
                        padding: 10,
                        font: {
                            size: 11
                        }
                    }
                },
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        padding: 10,
                        font: {
                            size: 11
                        }
                    }
                }
            },
            elements: {
                line: {
                    tension: 0.4
                },
                bar: {
                    borderRadius: 4
                }
            }
        };

        // 1. Blog Activity Chart (Line)
        new Chart(document.getElementById('blogChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Posts',
                    data: @json($blogData),
                    borderColor: '#f36f21',
                    backgroundColor: (context) => {
                        const ctx = context.chart.ctx;
                        const gradient = ctx.createLinearGradient(0, 0, 0, 300);
                        gradient.addColorStop(0, 'rgba(243, 111, 33, 0.15)');
                        gradient.addColorStop(1, 'rgba(243, 111, 33, 0)');
                        return gradient;
                    },
                    borderWidth: 2,
                    fill: true,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#f36f21',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: chartOptions
        });

        // 2. Leads Growth Chart (Bar)
        new Chart(document.getElementById('leadsChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'New Leads',
                    data: @json($leadData),
                    backgroundColor: '#10b981',
                    hoverBackgroundColor: '#059669',
                    maxBarThickness: 20
                }]
            },
            options: chartOptions
        });

        // 3. Vacancy Status Chart (Doughnut)
        new Chart(document.getElementById('vacancyChart').getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Open', 'Closed'],
                datasets: [{
                    data: [{{ $vacancyChartData['open'] }}, {{ $vacancyChartData['closed'] }}],
                    backgroundColor: ['#38bdf8', '#f1f5f9'],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                ...chartOptions,
                scales: {
                    x: {
                        display: false
                    },
                    y: {
                        display: false
                    }
                },
                cutout: '75%',
                plugins: {
                    ...chartOptions.plugins,
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // 4. Service Interest Chart (Horizontal Bar)
        new Chart(document.getElementById('serviceChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: @json(array_keys($serviceChartData)),
                datasets: [{
                    label: 'Leads',
                    data: @json(array_values($serviceChartData)),
                    backgroundColor: '#f59e0b',
                    maxBarThickness: 20
                }]
            },
            options: {
                ...chartOptions,
                indexAxis: 'y'
            }
        });
    </script>

    <style>
        /* Modern Utilities */
        .text-secondary {
            color: #64748b !important;
        }

        .bg-light {
            background-color: #f8fafc !important;
        }

        .fw-bolder {
            font-weight: 700 !important;
        }

        .tracking-wide {
            letter-spacing: 0.05em;
        }

        .border-bottom-dashed {
            border-bottom: 1px dashed #e2e8f0;
        }

        /* Buttons */
        .btn-white {
            background: white;
            color: #475569;
            border-color: #e2e8f0;
        }

        .btn-white:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            color: #1e293b;
        }

        /* Card Styling */
        .saas-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05), 0 1px 2px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            position: relative;
            border: 1px solid #f1f5f9;
        }

        .saas-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.025);
            border-color: #e2e8f0;
        }

        /* Icons */
        .icon-box {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        /* Colors Subtles */
        .bg-primary-subtle {
            background-color: rgba(243, 111, 33, 0.1);
        }

        .bg-success-subtle {
            background-color: rgba(16, 185, 129, 0.1);
        }

        .bg-warning-subtle {
            background-color: rgba(245, 158, 11, 0.1);
        }

        .bg-info-subtle {
            background-color: rgba(56, 189, 248, 0.1);
        }

        .text-primary {
            color: #f36f21 !important;
        }

        .text-success {
            color: #10b981 !important;
        }

        .text-warning {
            color: #f59e0b !important;
        }

        .text-info {
            color: #0ea5e9 !important;
        }

        /* Hover Transitions */
        .bg-primary-hover-soft:hover {
            background-color: rgba(243, 111, 33, 0.05);
        }

        .bg-success-hover-soft:hover {
            background-color: rgba(16, 185, 129, 0.05);
        }

        .bg-warning-hover-soft:hover {
            background-color: rgba(245, 158, 11, 0.05);
        }

        .bg-info-hover-soft:hover {
            background-color: rgba(56, 189, 248, 0.05);
        }

        .transition-all {
            transition: all 0.2s ease;
        }
    </style>
@endsection