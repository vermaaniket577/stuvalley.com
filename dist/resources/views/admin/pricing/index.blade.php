@extends('layouts.admin')

@section('content')
    <div class="admin-header-v2 mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h1><i class="fas fa-tags text-primary me-2"></i> Pricing Plans</h1>
            <div class="text-muted small fw-bold">Manage your pricing packages</div>
        </div>
        <a href="{{ route('admin.pricing.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Add New Plan
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">Title</th>
                            <th>Price</th>
                            <th>Tag</th>
                            <th>Status</th>
                            <th>Sort Order</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plans as $plan)
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold text-dark">{{ $plan->title }}</div>
                                    @if($plan->is_popular)
                                        <span class="badge bg-warning text-dark small">Most Popular</span>
                                    @endif
                                </td>
                                <td class="fw-bold">{{ $plan->currency }}{{ $plan->price }}</td>
                                <td>
                                    @if($plan->tag_text)
                                        <span class="badge bg-soft-info text-info">{{ $plan->tag_text }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($plan->is_light)
                                        <span class="badge bg-light text-dark border">Light Theme</span>
                                    @else
                                        <span class="badge bg-dark">Dark Theme</span>
                                    @endif
                                </td>
                                <td>{{ $plan->sort_order }}</td>
                                <td class="text-end pe-4">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.pricing.edit', $plan->id) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.pricing.destroy', $plan->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($plans->isEmpty())
                <div class="text-center py-5">
                    <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                    <p class="text-muted fw-bold">No pricing plans found.</p>
                    <a href="{{ route('admin.pricing.create') }}" class="btn btn-sm btn-primary">Create First Plan</a>
                </div>
            @endif
        </div>
    </div>
@endsection