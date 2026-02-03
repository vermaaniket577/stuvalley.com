@extends('layouts.admin')

@section('content')
    <div class="admin-header-v2 mb-4">
        <h1><i class="fas fa-edit text-primary me-2"></i> Edit Team Member</h1>
    </div>

    <div class="card">
        <form action="{{ route('admin.team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $team->name }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Role</label>
                    <input type="text" name="role" class="form-control" value="{{ $team->role }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Profile Image</label>
                @if($team->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $team->image) }}" style="width: 100px; border-radius: 8px;">
                    </div>
                @endif
                <input type="file" name="image" class="form-control" accept="image/*">
                <small class="text-muted">Leave empty to keep current image.</small>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" class="form-control" value="{{ $team->linkedin_url }}"
                        placeholder="https://linkedin.com/in/...">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">X (Twitter) URL</label>
                    <input type="url" name="twitter_url" class="form-control" value="{{ $team->twitter_url }}"
                        placeholder="https://x.com/...">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ $team->sort_order }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="is_active" class="form-control">
                        <option value="1" {{ $team->is_active ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ !$team->is_active ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success">Update Member</button>
                <a href="{{ route('admin.team.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <style>
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
    </style>
@endsection