@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Add New Partner</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Partner Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Logo (Image)</label>
                        <input type="file" name="logo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Website Link (Optional)</label>
                        <input type="url" name="link" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="0">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="is_active" id="isActive" checked>
                        <label class="form-check-label" for="isActive">Active</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Partner</button>
                </form>
            </div>
        </div>
    </div>
@endsection