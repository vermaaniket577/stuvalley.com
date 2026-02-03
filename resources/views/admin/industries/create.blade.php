@extends('layouts.admin')

@section('content')
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Add Industry</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.industries.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="card p-4">
        <form action="{{ route('admin.industries.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="icon" class="form-label">Icon (FontAwesome Class)</label>
                    <input type="text" name="icon" id="icon" class="form-control" value="{{ old('icon') }}"
                        placeholder="fas fa-building">
                    <small class="text-muted">Example: fas fa-coins, fas fa-university (optional)</small>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control"
                        rows="3">{{ old('description') }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sort_order" class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" class="form-control"
                        value="{{ old('sort_order', 0) }}">
                </div>
                <div class="col-md-6 mb-3 d-flex align-items-center mt-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" checked>
                        <label class="form-check-label" for="is_active">
                            Active
                        </label>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary" style="background:var(--primary); border:none;">Save
                    Industry</button>
            </div>
        </form>
    </div>
@endsection