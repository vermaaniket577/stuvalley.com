@extends('layouts.admin')

@section('content')
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Manage Industries</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.industries.create') }}" class="btn btn-primary"
                style="background:var(--primary); border:none;">
                <i class="fas fa-plus"></i> Add New Industry
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Sort</th>
                        <th>Icon</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($industries as $industry)
                        <tr>
                            <td>{{ $industry->sort_order }}</td>
                            <td>
                                @if($industry->icon)
                                    <i class="{{ $industry->icon }}"></i>
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $industry->title }}</td>
                            <td>{{ Str::limit($industry->description, 50) }}</td>
                            <td>
                                @if($industry->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.industries.edit', $industry->id) }}"
                                    class="btn btn-sm btn-info text-white">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.industries.destroy', $industry->id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No industries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $industries->links() }}
        </div>
    </div>
@endsection