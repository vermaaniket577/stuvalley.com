@extends('layouts.admin')

@section('content')
    <div class="admin-header-v2 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1><i class="fas fa-briefcase text-primary me-2"></i> Career Management</h1>
            <a href="{{ route('admin.careers.create') }}" class="btn btn-primary d-flex align-items-center">
                <i class="fas fa-plus me-2"></i> Post New Vacancy
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">Job Title</th>
                            <th>Department</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th>Vacancies</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jobs as $job)
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold text-dark">{{ $job->title }}</div>
                                    <div class="text-muted small">{{ $job->experience_level }}</div>
                                </td>
                                <td>{{ $job->department ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge bg-soft-info text-info">{{ $job->job_type }}</span>
                                </td>
                                <td>
                                    <i class="fas fa-map-marker-alt text-muted me-1 small"></i>
                                    <span class="small">{{ $job->location }}</span>
                                </td>
                                <td>
                                    <span class="fw-semibold">{{ $job->positions }}</span>
                                </td>
                                <td>
                                    @if($job->is_active)
                                        <span class="badge bg-soft-success text-success">
                                            <i class="fas fa-check-circle me-1"></i> Active
                                        </span>
                                    @else
                                        <span class="badge bg-soft-danger text-danger">
                                            <i class="fas fa-times-circle me-1"></i> Closed
                                        </span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.careers.edit', $job) }}" class="btn btn-sm btn-outline-warning"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.careers.destroy', $job) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Delete this vacancy?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="fas fa-folder-open fa-3x mb-3 opacity-25"></i>
                                        <p>No job vacancies found. Start hiring today!</p>
                                        <a href="{{ route('admin.careers.create') }}" class="btn btn-primary btn-sm mt-2">
                                            <i class="fas fa-plus me-1"></i> Post Vacancy
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($jobs->hasPages())
            <div class="card-footer bg-white py-3">
                {{ $jobs->links() }}
            </div>
        @endif
    </div>

    <style>
        .admin-header-v2 h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
        }

        .bg-soft-info {
            background-color: rgba(56, 189, 248, 0.1);
        }

        .bg-soft-success {
            background-color: rgba(16, 185, 129, 0.1);
        }

        .bg-soft-danger {
            background-color: rgba(239, 68, 68, 0.1);
        }

        .badge {
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .table thead th {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.025em;
            font-weight: 700;
            color: #64748b;
            border-bottom: 1px solid #f1f5f9;
            padding: 1rem 0.75rem;
        }

        .table tbody td {
            padding: 1rem 0.75rem;
            color: #475569;
        }

        .btn-group .btn {
            margin-left: 5px;
            border-radius: 6px !important;
        }
    </style>
@endsection