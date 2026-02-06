@extends('layouts.admin')

@section('content')
    <div class="admin-header-v2 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1><i class="fas fa-blog text-primary me-2"></i> Blog Management</h1>
            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Create New Post
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Views</th>
                            <th>Published</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td class="ps-4">{{ $post->id }}</td>
                                <td>
                                    <div class="fw-bold text-dark">{{ \Illuminate\Support\Str::limit($post->title, 50) }}</div>
                                </td>
                                <td>
                                    @if($post->category)
                                        <span class="badge bg-soft-info text-info">{{ $post->category }}</span>
                                    @else
                                        <span class="text-muted small">—</span>
                                    @endif
                                </td>
                                <td>{{ $post->author }}</td>
                                <td>
                                    @if($post->is_published)
                                        <span class="badge bg-soft-success text-success">
                                            <i class="fas fa-check-circle me-1"></i> Published
                                        </span>
                                    @else
                                        <span class="badge bg-soft-warning text-warning">
                                            <i class="fas fa-clock me-1"></i> Draft
                                        </span>
                                    @endif
                                </td>
                                <td>{{ number_format($post->views) }}</td>
                                <td>
                                    @if($post->published_at)
                                        <span class="small text-muted">{{ $post->published_at->format('d M, Y') }}</span>
                                    @else
                                        <span class="text-muted small">—</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.blog.edit', $post) }}" class="btn btn-sm btn-outline-warning"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.blog.destroy', $post) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Delete this post?')">
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
                                <td colspan="8" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="fas fa-inbox fa-3x mb-3 opacity-25"></i>
                                        <p>No blog posts yet. Start by creating your first post!</p>
                                        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary btn-sm mt-2">
                                            <i class="fas fa-plus me-1"></i> Create Post
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($posts->hasPages())
            <div class="card-footer bg-white py-3">
                <div class="admin-pagination">
                    {{ $posts->links('partials.pagination') }}
                </div>
            </div>
        @endif
    </div>

    <style>
        /* Admin Pagination Styling */
        .admin-pagination .pagination-tech {
            justify-content: center;
            margin-bottom: 0;
            gap: 8px;
        }

        .admin-pagination .page-item-tech a,
        .admin-pagination .page-item-tech span {
            width: 38px;
            height: 38px;
            border-radius: 8px;
            font-size: 0.85rem;
            background: #fff;
            border: 1px solid #e2e8f0;
            color: #475569;
        }

        .admin-pagination .page-item-tech.active span {
            background: #f36f21;
            /* Admin orange color */
            border-color: #f36f21;
            color: #fff;
            box-shadow: 0 4px 10px rgba(243, 111, 33, 0.2);
        }

        .admin-pagination .page-item-tech a:hover {
            border-color: #f36f21;
            color: #f36f21;
            background: rgba(243, 111, 33, 0.05);
        }

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

        .bg-soft-warning {
            background-color: rgba(245, 158, 11, 0.1);
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