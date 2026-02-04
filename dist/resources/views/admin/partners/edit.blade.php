@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Partner</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Partner Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $partner->name }}" required>
                    </div>
                    <div class="form-group">
                        <label>Current Logo</label><br>
                        <img src="{{ asset('storage/' . $partner->logo) }}" width="100" class="mb-2">
                        <input type="file" name="logo" class="form-control">
                        <small class="text-muted">Leave blank to keep current logo</small>
                    </div>
                    <div class="form-group">
                        <label>Website Link (Optional)</label>
                        <input type="url" name="link" class="form-control" value="{{ $partner->link }}">
                    </div>
                    <div class="form-group">
                        <label>Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ $partner->sort_order }}">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="is_active" id="isActive" {{ $partner->is_active ? 'checked' : '' }}>
                        <label class="form-check-label" for="isActive">Active</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Partner</button>
                </form>
            </div>
        </div>
    </div>
@endsection