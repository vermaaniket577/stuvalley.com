@extends('layouts.admin')

@section('content')

    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --secondary-bg: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-sub: #64748b;
            --border-color: #e2e8f0;
        }

        body {
            background-color: var(--secondary-bg);
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: var(--text-main);
        }

        /* Utils */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header-title h2 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0 0 5px 0;
            color: var(--text-main);
        }

        .header-title p {
            margin: 0;
            color: var(--text-sub);
            font-size: 0.95rem;
        }

        /* Premium Card */
        .premium-card {
            background: var(--card-bg);
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(226, 232, 240, 0.8);
            margin-bottom: 24px;
            transition: all 0.2s ease;
        }

        /* Stats Section */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #e0e7ff;
            color: #4f46e5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-right: 16px;
        }

        /* Toolbar Grid - The Fix */
        .toolbar-grid {
            display: grid;
            grid-template-columns: 2fr 1.5fr 1fr 1fr auto;
            gap: 15px;
            align-items: center;
            padding: 20px;
        }

        /* Form Inputs */
        .form-control,
        .form-select {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-size: 0.9rem;
            transition: all 0.2s;
            background-color: #f8fafc;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: #fff;
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        /* Buttons */
        .btn-group-actions {
            display: flex;
            gap: 10px;
        }

        .btn-base {
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s;
            text-decoration: none;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
        }

        .btn-outline {
            background: white;
            border: 1px solid var(--border-color);
            color: var(--text-main);
        }

        .btn-outline:hover {
            background-color: #f1f5f9;
        }

        .btn-success-outline {
            background: white;
            border: 1px solid #10b981;
            color: #10b981;
        }

        .btn-success-outline:hover {
            background-color: #ecfdf5;
        }

        /* Table */
        .table-wrapper {
            overflow-x: auto;
        }

        .premium-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            min-width: 1000px;
            /* Ensure table doesn't squash on small screens */
        }

        .premium-table th {
            background: #f8fafc;
            padding: 16px 20px;
            text-align: left;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-sub);
            border-bottom: 2px solid var(--border-color);
            font-weight: 600;
        }

        .premium-table td {
            background: white;
            padding: 16px 20px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-main);
            vertical-align: middle;
        }

        .premium-table tr:last-child td {
            border-bottom: none;
        }

        .premium-table tr:hover td {
            background-color: #f8fafc;
        }

        /* Badges & Avatars */
        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-indigo {
            background: #e0e7ff;
            color: #4338ca;
        }

        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #e0e7ff;
            color: #4f46e5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.8rem;
            margin-right: 12px;
        }

        /* Responsive Grid */
        @media (max-width: 1200px) {
            .toolbar-grid {
                grid-template-columns: 1fr 1fr 1fr;
            }

            .toolbar-actions {
                grid-column: span 3;
                justify-self: end;
            }
        }

        @media (max-width: 768px) {
            .stats-container {
                grid-template-columns: 1fr;
            }

            .toolbar-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .toolbar-actions {
                grid-column: 1;
                justify-self: stretch;
            }

            .btn-group-actions {
                width: 100%;
            }

            .btn-base {
                flex: 1;
            }
        }
    </style>

    <div class="container-fluid py-4" style="max-width: 1400px; margin: 0 auto;">

        <!-- Header -->
        <div class="page-header">
            <div class="header-title">
                <h2>Leads Management</h2>
                <p>Track and manage all your incoming business inquiries seamlessly.</p>
            </div>
            <a href="/" target="_blank" class="btn-base btn-primary">
                <i class="fas fa-external-link-alt"></i> View Website
            </a>
        </div>

        <!-- Success Alert -->
        @if(session('success'))
            <div
                style="background: #d1fae5; color: #065f46; padding: 15px; border-radius: 12px; margin-bottom: 24px; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Stats Row -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <div style="font-size: 0.8rem; color: var(--text-sub); text-transform: uppercase; font-weight: 600;">
                        Total Leads</div>
                    <div style="font-size: 1.8rem; font-weight: 800; color: var(--text-main); line-height: 1;">
                        {{ $leads->total() }}</div>
                </div>
            </div>
        </div>

        <!-- Filter Toolbar -->
        <div class="premium-card">
            <form action="{{ route('admin.leads.index') }}" method="GET">
                <div class="toolbar-grid">
                    <!-- Search -->
                    <div style="position: relative;">
                        <i class="fas fa-search"
                            style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                        <input type="text" name="search" class="form-control" placeholder="Search name or email..."
                            value="{{ request('search') }}" style="padding-left: 40px;">
                    </div>

                    <!-- Service -->
                    <div>
                        <select name="filter_service" class="form-select">
                            <option value="">All Services</option>
                            @foreach($services as $service)
                                <option value="{{ $service }}" {{ request('filter_service') == $service ? 'selected' : '' }}>
                                    {{ $service }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Date From -->
                    <div>
                        <input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}"
                            placeholder="From">
                    </div>

                    <!-- Date To -->
                    <div>
                        <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}"
                            placeholder="To">
                    </div>

                    <!-- Actions -->
                    <div class="toolbar-actions">
                        <div class="btn-group-actions">
                            <button type="submit" class="btn-base btn-primary">Filter</button>
                            <a href="{{ route('admin.leads.index') }}" class="btn-base btn-outline" title="Refresh">
                                <i class="fas fa-sync-alt"></i>
                            </a>
                            <button type="submit" name="export" value="true" class="btn-base btn-success-outline"
                                title="Export CSV">
                                <i class="fas fa-file-csv"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sort Hidden Fields -->
                @if(request('sort'))
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                    <input type="hidden" name="direction" value="{{ request('direction') }}">
                @endif
            </form>
        </div>

        <!-- Leads Table -->
        <div class="premium-card" style="padding: 0; overflow: hidden;">
            <div class="table-wrapper">
                <table class="premium-table">
                    <thead>
                        <tr>
                            <th>
                                <a href="{{ route('admin.leads.index', array_merge(request()->except(['sort', 'direction']), ['sort' => 'id', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}"
                                    style="text-decoration: none; color: inherit; display: flex; align-items: center; gap: 5px;">
                                    ID @if(request('sort') === 'id') <i
                                    class="fas fa-sort-{{ request('direction') === 'asc' ? 'up' : 'down' }}"></i> @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('admin.leads.index', array_merge(request()->except(['sort', 'direction']), ['sort' => 'name', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}"
                                    style="text-decoration: none; color: inherit; display: flex; align-items: center; gap: 5px;">
                                    Name @if(request('sort') === 'name') <i
                                    class="fas fa-sort-{{ request('direction') === 'asc' ? 'up' : 'down' }}"></i> @endif
                                </a>
                            </th>
                            <th>Contact Info</th>
                            <th>Service</th>
                            <th>Message</th>
                            <th>Received At</th>
                            <th style="text-align: right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($leads as $lead)
                            <tr>
                                <td>#{{ $lead->id }}</td>
                                <td>
                                    <div style="display: flex; align-items: center;">
                                        <div class="avatar">{{ strtoupper(substr($lead->name, 0, 1)) }}</div>
                                        <div style="font-weight: 600;">{{ $lead->name }}</div>
                                    </div>
                                </td>
                                <td>
                                    <div style="display: flex; flex-direction: column;">
                                        <a href="mailto:{{ $lead->email }}"
                                            style="color: var(--primary-color); text-decoration: none; font-weight: 500;">{{ $lead->email }}</a>
                                        <span style="font-size: 0.85rem; color: var(--text-sub); margin-top: 4px;"> <i
                                                class="fas fa-phone-alt" style="font-size: 0.7rem; margin-right: 5px;"></i>
                                            {{ $lead->phone }}</span>
                                    </div>
                                </td>
                                <td><span class="badge badge-indigo">{{ $lead->service }}</span></td>
                                <td>
                                    <span title="{{ $lead->message }}" style="color: var(--text-sub);">
                                        {{ Str::limit($lead->message, 50) }}
                                    </span>
                                </td>
                                <td>
                                    <div style="font-size: 0.9rem;">{{ $lead->created_at->format('M d, Y') }}</div>
                                    <div style="font-size: 0.75rem; color: var(--text-sub);">
                                        {{ $lead->created_at->format('h:i A') }}</div>
                                </td>
                                <td style="text-align: right;">
                                    <form action="{{ route('admin.leads.destroy', $lead->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this lead?');" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-base"
                                            style="padding: 6px; color: #ef4444; background: transparent; border: none;"
                                            title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center; padding: 60px;">
                                    <i class="fas fa-inbox" style="font-size: 2rem; color: #cbd5e1; margin-bottom: 15px;"></i>
                                    <p style="color: var(--text-sub);">No leads found matching your criteria.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($leads->hasPages())
                <div style="padding: 20px; border-top: 1px solid var(--border-color);">
                    {{ $leads->links() }}
                </div>
            @endif
        </div>

    </div>
@endsection