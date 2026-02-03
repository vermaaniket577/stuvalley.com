@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white py-3 border-0">
                        <h4 class="mb-0 fw-bold"><i class="fas fa-plus-circle text-primary me-2"></i> Create Pricing Plan
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('admin.pricing.store') }}" method="POST">
                            @csrf

                            <div class="row g-3">
                                <div class="col-md-8">
                                    <label class="form-label fw-bold">Plan Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="e.g. Basic Website"
                                        required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Sort Order</label>
                                    <input type="number" name="sort_order" class="form-control" value="0">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Price</label>
                                    <input type="text" name="price" class="form-control"
                                        placeholder="e.g. 12,999 or Call Us" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Currency Symbol</label>
                                    <input type="text" name="currency" class="form-control" value="₹">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Tag Text (Top Badge)</label>
                                    <input type="text" name="tag_text" class="form-control"
                                        placeholder="e.g. EMI Available">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Theme & Highlight</label>
                                    <div class="form-check form-switch mt-2">
                                        <input class="form-check-input" type="checkbox" name="is_popular" id="is_popular">
                                        <label class="form-check-label" for="is_popular">Is Most Popular (Glow
                                            Effect)</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="is_light" id="is_light">
                                        <label class="form-check-label" for="is_light">Light Theme (White Card)</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold">Features</label>
                                    <div id="features-container">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fas fa-check"></i></span>
                                            <input type="text" name="features[]" class="form-control"
                                                placeholder="Feature description">
                                            <button type="button" class="btn btn-outline-danger remove-feature"><i
                                                    class="fas fa-times"></i></button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="add-feature-btn">
                                        <i class="fas fa-plus"></i> Add Feature
                                    </button>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Button Text</label>
                                    <input type="text" name="button_text" class="form-control" value="Get Started">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Button Link</label>
                                    <input type="text" name="button_link" class="form-control" value="#">
                                    <div class="form-text">Use '#' to trigger contact modal</div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <a href="{{ route('admin.pricing.index') }}" class="btn btn-light">Cancel</a>
                                <button type="submit" class="btn btn-primary px-4">Create Plan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.getElementById('features-container');
            const addBtn = document.getElementById('add-feature-btn');

            addBtn.addEventListener('click', function () {
                const div = document.createElement('div');
                div.className = 'input-group mb-2';
                div.innerHTML = `
                <span class="input-group-text"><i class="fas fa-check"></i></span>
                <input type="text" name="features[]" class="form-control" placeholder="Feature description">
                <button type="button" class="btn btn-outline-danger remove-feature"><i class="fas fa-times"></i></button>
            `;
                container.appendChild(div);
            });

            container.addEventListener('click', function (e) {
                if (e.target.closest('.remove-feature')) {
                    e.target.closest('.input-group').remove();
                }
            });
        });
    </script>
@endsection