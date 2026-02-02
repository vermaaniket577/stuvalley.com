<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Stuvalley</title>
    <link rel="icon" href="{{ asset('favicon.jpg') }}?v={{ time() }}" type="image/jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #f36f21;
            --bg-dark: #1a1a1a;
            --text-light: #f1f1f1;
            --sidebar-width: 250px;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            background: #f4f6f9;
            color: #333;
        }

        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: var(--sidebar-width);
            background: var(--bg-dark);
            color: white;
            padding: 20px 0;
            flex-shrink: 0;
        }

        .sidebar-header {
            padding: 0 20px 20px;
            border-bottom: 1px solid #333;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 1.2rem;
            color: var(--primary);
        }

        .nav-link {
            display: block;
            padding: 12px 20px;
            color: #ccc;
            text-decoration: none;
            transition: 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            background: rgba(243, 111, 33, 0.1);
            color: var(--primary);
            border-left: 3px solid var(--primary);
        }

        .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .header {
            background: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            border-radius: 8px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .card h2 {
            margin-top: 0;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-success {
            background: #28a745;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #f8f9fa;
            font-weight: 600;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Premium Loader Styles */
        .admin-loader-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #ffffff;
            z-index: 99999;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: all 0.6s cubic-bezier(0.65, 0, 0.35, 1);
        }

        .loader-content {
            text-align: center;
        }

        .premium-spinner {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(243, 111, 33, 0.1);
            border-left-color: #f36f21;
            border-radius: 50%;
            animation: premium-spin 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            margin-bottom: 20px;
        }

        .loader-text {
            color: #1e293b;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-size: 0.8rem;
            animation: pulse-text 1.5s ease-in-out infinite;
        }

        @keyframes premium-spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes pulse-text {

            0%,
            100% {
                opacity: 0.5;
            }

            50% {
                opacity: 1;
            }
        }

        .loader-hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }
    </style>
</head>

<body>
    <!-- Page Loader -->
    <div id="page_loader" class="admin-loader-overlay">
        <div class="loader-content">
            <div class="premium-spinner"></div>
            <div class="loader-text">Stuvalley Admin</div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const loader = document.getElementById('page_loader');

            // Add a small delay for a smoother experience
            setTimeout(() => {
                loader.classList.add('loader-hidden');
            }, 800);
        });

        // Show loader before page unload
        window.addEventListener('beforeunload', function () {
            const loader = document.getElementById('page_loader');
            loader.classList.remove('loader-hidden');
        });
    </script>
    <div class="admin-wrapper">
        <div class="sidebar">
            <div class="sidebar-header">
                Stuvalley Admin
            </div>
            <nav>
                <a href="{{ route('dashboard') }}"
                    class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-line"></i> Dashboard
                </a>
                <a href="{{ route('admin.pricing.index') }}"
                    class="nav-link {{ request()->routeIs('admin.pricing.*') ? 'active' : '' }}">
                    <i class="fas fa-tags"></i> Pricing Plans
                </a>
                <a href="{{ route('admin.team.index') }}"
                    class="nav-link {{ request()->routeIs('admin.team.*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i> Team Members
                </a>
                <a href="{{ route('admin.leads.index') }}"
                    class="nav-link {{ request()->routeIs('admin.leads.*') ? 'active' : '' }}">
                    <i class="fas fa-envelope-open-text"></i> Leads (Messages)
                </a>
                <a href="{{ route('social-links.index') }}"
                    class="nav-link {{ request()->routeIs('social-links.*') ? 'active' : '' }}">
                    <i class="fas fa-share-alt"></i> Social Links
                </a>
                <a href="{{ route('testimonials.index') }}"
                    class="nav-link {{ request()->routeIs('testimonials.*') ? 'active' : '' }}">
                    <i class="fas fa-quote-right"></i> Testimonials
                </a>
                <a href="{{ route('admin.partners.index') }}"
                    class="nav-link {{ request()->routeIs('admin.partners.*') ? 'active' : '' }}">
                    <i class="fas fa-handshake"></i> Partners/Clients
                </a>
                <a href="{{ route('admin.industries.index') }}"
                    class="nav-link {{ request()->routeIs('admin.industries.*') ? 'active' : '' }}">
                    <i class="fas fa-industry"></i> Industries
                </a>
                <a href="{{ route('admin.blog.index') }}"
                    class="nav-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
                    <i class="fas fa-blog"></i> Blog Management
                </a>
                <a href="{{ route('admin.careers.index') }}"
                    class="nav-link {{ request()->routeIs('admin.careers.*') ? 'active' : '' }}">
                    <i class="fas fa-briefcase"></i> Vacancy Management
                </a>
                <a href="{{ route('admin.settings') }}"
                    class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                    <i class="fas fa-cogs"></i> Site Settings
                </a>
                <a href="{{ route('admin.seo') }}"
                    class="nav-link {{ request()->routeIs('admin.seo') ? 'active' : '' }}">
                    <i class="fas fa-search"></i> SEO Manager
                </a>
                <a href="{{ route('admin.whatsapp') }}"
                    class="nav-link {{ request()->routeIs('admin.whatsapp') ? 'active' : '' }}">
                    <i class="fab fa-whatsapp"></i> WhatsApp Chat
                </a>
                <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
                    @csrf
                    <button type="submit" class="nav-link"
                        style="background:none; border:none; color:#ccc; width:100%; text-align:left; cursor:pointer;">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </nav>
        </div>
        <div class="main-content">
            <div class="header">
                <h3>Welcome, {{ Auth::user()->name ?? 'Admin' }}</h3>
                <a href="{{ url('/') }}" target="_blank" class="btn btn-primary" style="font-size:0.8rem;">View
                    Website</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</body>

</html>