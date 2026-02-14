@extends('layouts.admin')

@section('content')

    <style>
        :root {
            --primary-color: #38bdf8;
            --primary-hover: #0284c7;
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
            background: #e0f2fe;
            color: #0284c7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-right: 16px;
        }

        /* Buttons */
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

        /* Table */
        .table-wrapper {
            overflow-x: auto;
        }

        .premium-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            min-width: 1000px;
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

        .premium-table tr:hover td {
            background-color: #f8fafc;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            background: #e0f2fe;
            color: #0284c7;
        }

        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #e0f2fe;
            color: #0284c7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.8rem;
            margin-right: 12px;
        }
    </style>

    <div class="container-fluid py-4" style="max-width: 1400px; margin: 0 auto;">

        <!-- Header -->
        <div class="page-header">
            <div class="header-title">
                <h2>Service Enquiries</h2>
                <p>Manage all enquiries submitted via the Digital Marketing and other service pages.</p>
            </div>
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
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <div>
                    <div style="font-size: 0.8rem; color: var(--text-sub); text-transform: uppercase; font-weight: 600;">
                        Total Enquiries</div>
                    <div style="font-size: 1.8rem; font-weight: 800; color: var(--text-main); line-height: 1;">
                        {{ $enquiries->total() }}</div>
                </div>
            </div>
        </div>

        <!-- Enquiries Table -->
        <div class="premium-card" style="padding: 0; overflow: hidden;">
            <div class="table-wrapper">
                <table class="premium-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email & Phone</th>
                            <th>Service</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th style="text-align: right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($enquiries as $enquiry)
                            <tr>
                                <td>#{{ $enquiry->id }}</td>
                                <td>
                                    <div style="display: flex; align-items: center;">
                                        <div class="avatar">{{ strtoupper(substr($enquiry->name, 0, 1)) }}</div>
                                        <div style="font-weight: 600;">{{ $enquiry->name }}</div>
                                    </div>
                                </td>
                                <td>
                                    <div style="display: flex; flex-direction: column;">
                                        <a href="mailto:{{ $enquiry->email }}"
                                            style="color: var(--primary-color); text-decoration: none; font-weight: 500;">{{ $enquiry->email }}</a>
                                        <span style="font-size: 0.85rem; color: var(--text-sub); margin-top: 4px;">
                                            <i class="fas fa-phone-alt" style="font-size: 0.7rem; margin-right: 5px;"></i>
                                            {{ $enquiry->phone }}
                                        </span>
                                    </div>
                                </td>
                                <td><span class="badge">{{ $enquiry->service }}</span></td>
                                <td>
                                    <span title="{{ $enquiry->message }}" style="color: var(--text-sub);">
                                        {{ Str::limit($enquiry->message, 50) }}
                                    </span>
                                </td>
                                <td>
                                    <div style="font-size: 0.9rem;">{{ $enquiry->created_at->format('M d, Y') }}</div>
                                    <div style="font-size: 0.75rem; color: var(--text-sub);">
                                        {{ $enquiry->created_at->format('h:i A') }}</div>
                                </td>
                                <td style="text-align: right;">
                                    <form action="{{ route('admin.enquiries.destroy', $enquiry->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this enquiry?');" style="display:inline;">
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
                                    <p style="color: var(--text-sub);">No enquiries found.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($enquiries->hasPages())
                <div style="padding: 20px; border-top: 1px solid var(--border-color);">
                    {{ $enquiries->links() }}
                </div>
            @endif
        </div>

    </div>
@endsection