@extends('layouts.admin')

@section('content')
    <style>
        :root {
            --primary-color: #f36f21;
            --primary-hover: #e05d10;
            --secondary-bg: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #0f172a;
            --text-sub: #64748b;
            --border-color: #e2e8f0;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .premium-card {
            background: var(--card-bg);
            border-radius: 24px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border-color);
            margin-bottom: 30px;
            overflow: hidden;
        }

        .premium-table {
            width: 100%;
            border-collapse: collapse;
        }

        .premium-table th {
            background: #f8fafc;
            padding: 16px 20px;
            text-align: left;
            font-size: 0.75rem;
            text-transform: uppercase;
            color: var(--text-sub);
            border-bottom: 2px solid var(--border-color);
        }

        .premium-table td {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
        }

        .btn-cv {
            background: #dcfce7;
            color: #166534;
            padding: 6px 14px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.8rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: 0.3s;
        }

        .btn-cv:hover {
            background: #22c55e;
            color: white;
        }

        .status-pill {
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        .filter-section {
            background: white;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .filter-label {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--text-main);
            margin: 0;
        }

        .filter-select {
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            background-color: #f8fafc;
            font-size: 0.9rem;
            min-width: 250px;
            max-width: 100%;
        }

        .btn-filter-apply {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s;
        }

        .btn-filter-apply:hover {
            background: var(--primary-hover);
        }

        .btn-filter-reset {
            background: #f1f5f9;
            color: #475569;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-filter-reset:hover {
            background: #e2e8f0;
        }
    </style>

    <div class="container-fluid py-4">
        <div class="page-header">
            <div>
                <h2 class="fw-bold">Job Applications</h2>
                <p class="text-muted">Review and manage candidates who applied for open positions.</p>
            </div>
        </div>

        <div class="filter-section">
            <h5 class="filter-label"><i class="fas fa-filter me-2 text-primary"></i> Filter by Vacancy:</h5>
            <form action="{{ route('admin.job-applications.index') }}" method="GET"
                class="d-flex gap-2 align-items-center flex-wrap">
                <select name="job_id" class="filter-select">
                    <option value="">-- All Vacancies --</option>
                    @foreach($jobs as $job)
                        <option value="{{ $job->id }}" {{ $jobId == $job->id ? 'selected' : '' }}>
                            {{ $job->title }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn-filter-apply shadow-sm">
                    Apply Filter
                </button>
                @if($jobId)
                    <a href="{{ route('admin.job-applications.index') }}" class="btn-filter-reset border">
                        Clear
                    </a>
                @endif
            </form>
        </div>

        <div class="premium-card">
            <div class="table-responsive">
                <table class="premium-table">
                    <thead>
                        <tr>
                            <th>Candidate</th>
                            <th>Applied For</th>
                            <th>Experience Info</th>
                            <th>Resume / CV</th>
                            <th>Date</th>
                            <th style="text-align: right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($applications as $app)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.job-applications.show', $app->id) }}" class="text-decoration-none">
                                        <div class="fw-bold text-primary">{{ $app->full_name }}</div>
                                    </a>
                                    <div class="small text-muted">{{ $app->email }}</div>
                                    <div class="small text-muted">{{ $app->phone }}</div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">{{ $app->jobPosting->title ?? 'N/A' }}</span>
                                    <div class="small text-muted mt-1">{{ $app->jobPosting->department ?? '' }}</div>
                                </td>
                                <td>
                                    <div class="small text-truncate" style="max-width: 200px;" title="{{ $app->cover_letter }}">
                                        {{ Str::limit($app->cover_letter ?? 'No cover letter provided', 60) }}
                                    </div>
                                </td>
                                <td>
                                    @php
                                        $isPdf = ($app->resume_mime === 'application/pdf') ||
                                            (stripos($app->resume_filename, '.pdf') !== false) ||
                                            (stripos($app->resume_path, '.pdf') !== false);
                                    @endphp

                                    @if($app->resume_filename || $app->resume_path)
                                        <a href="{{ route('admin.job-applications.download', $app->id) }}" target="_blank"
                                            class="btn-cv">
                                            @if($isPdf)
                                                <i class="fas fa-file-pdf"></i> View CV
                                            @else
                                                <i class="fas fa-file-download"></i> Download CV
                                            @endif
                                        </a>
                                    @else
                                        <span class="text-danger small">No File attached</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="small">{{ $app->created_at->format('M d, Y') }}</div>
                                    <div class="text-muted" style="font-size: 0.7rem;">{{ $app->created_at->diffForHumans() }}
                                    </div>
                                </td>
                                <td style="text-align: right;">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('admin.job-applications.show', $app->id) }}"
                                            class="btn btn-link text-primary p-0">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('admin.job-applications.destroy', $app->id) }}" method="POST"
                                            onsubmit="return confirm('Delete this application?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-danger p-0">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="fas fa-user-slash fa-3x text-light mb-3"></i>
                                    <p class="text-muted">No applications received yet.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($applications->hasPages())
                <div class="p-4 border-top">
                    {{ $applications->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection