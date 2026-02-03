@extends('layouts.admin')

@section('content')
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Edit Industry: {{ $industry->title }}</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.industries.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="card p-4">
        <form action="{{ route('admin.industries.update', $industry->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control"
                        value="{{ old('title', $industry->title) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="icon" class="form-label">Icon (FontAwesome Class)</label>
                    <input type="text" name="icon" id="icon" class="form-control" value="{{ old('icon', $industry->icon) }}"
                        placeholder="fas fa-building">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control"
                        rows="3">{{ old('description', $industry->description) }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sort_order" class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" class="form-control"
                        value="{{ old('sort_order', $industry->sort_order) }}">
                </div>
                <div class="col-md-6 mb-3 d-flex align-items-center mt-4">
                    <div class="form-check">
                        <input class="form-check-input" type="hidden" name="is_active" value="0">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ $industry->is_active ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">
                            Active
                        </label>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary" style="background:var(--primary); border:none;">Update
                    Industry</button>
            </div>
        </form>
    </div>
@endsection