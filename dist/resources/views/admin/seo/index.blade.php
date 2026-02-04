@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">SEO Manager</h1>

        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Manage Page SEO</h6>
                    </div>
                    <div class="card-body">
                        <p class="mb-4">Select a page from the dropdown below to edit its SEO Meta Title, Description, and
                            Keywords.</p>

                        <form action="{{ route('admin.seo.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-4">
                                <label for="page_selector" style="font-weight: bold; font-size: 1.1rem;">Select Page</label>
                                <select id="page_selector" name="page_identifier"
                                    class="form-control form-control-lg border-primary">
                                    <option value="" disabled selected>-- Choose a Page --</option>
                                    @foreach($pages as $key => $label)
                                        <option value="{{ $key }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="seo_form_fields" style="display: none; transition: opacity 0.5s;">
                                <hr class="my-4">

                                <div class="form-group mb-3">
                                    <label>Meta Title</label>
                                    <input type="text" name="title" id="seo_title" class="form-control"
                                        placeholder="e.g. Best Web Development Company | Stuvalley">
                                    <small class="text-muted">Recommended length: 50-60 characters</small>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Meta Description</label>
                                    <textarea name="description" id="seo_description" class="form-control" rows="3"
                                        placeholder="A brief summary of the page content..."></textarea>
                                    <small class="text-muted">Recommended length: 150-160 characters</small>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Meta Keywords</label>
                                    <input type="text" name="keywords" id="seo_keywords" class="form-control"
                                        placeholder="e.g. web design, app development, seo">
                                    <small class="text-muted">Comma separated keywords</small>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Social Share Image (OG Image)</label>
                                    <br>
                                    <img id="current_image" src=""
                                        style="max-height: 100px; margin-bottom: 10px; display: none; border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="seo_image">
                                        <label class="custom-file-label" for="seo_image">Choose file...</label>
                                    </div>
                                    <small class="text-muted">Image displayed when sharing link on WhatsApp, Facebook,
                                        LinkedIn.</small>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg mt-3">
                                    <i class="fas fa-save"></i> Save SEO Settings
                                </button>
                            </div>

                            <div id="loading_indicator" class="text-center py-5" style="display: none;">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <p class="mt-2 text-muted">Fetching SEO Data...</p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Google Preview</h6>
                    </div>
                    <div class="card-body">
                        <!-- Google Preview Mock -->
                        <div style="font-family: Arial, sans-serif;">
                            <div class="mb-1" style="font-size: 14px; color: #202124;">
                                <span
                                    style="background: #f1f3f4; border-radius: 50%; display: inline-block; width: 16px; height: 16px; margin-right: 8px; vertical-align: middle;">
                                    <img src="{{ asset('favicon.jpg') }}"
                                        style="width: 100%; height: 100%; border-radius: 50%;">
                                </span>
                                <span style="vertical-align: middle; color: #202124;">stuvalley.com</span>
                                <span style="vertical-align: middle; color: #5f6368;"> › ...</span>
                            </div>
                            <h3 id="preview_title"
                                style="color: #1a0dab; font-size: 20px; font-weight: 400; margin: 0 0 4px 0; text-decoration: none; cursor: pointer;">
                                Your Page Title Appears Here
                            </h3>
                            <div id="preview_desc" style="color: #4d5156; font-size: 14px; line-height: 1.58;">
                                This is how your page description will appear in Google search results. Make it catchy to
                                improve click-through rates.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selector = document.getElementById('page_selector');
            const formFields = document.getElementById('seo_form_fields');
            const loader = document.getElementById('loading_indicator');

            const titleInput = document.getElementById('seo_title');
            const descInput = document.getElementById('seo_description');
            const imgPreview = document.getElementById('current_image');

            // Preview Elements
            const prevTitle = document.getElementById('preview_title');
            const prevDesc = document.getElementById('preview_desc');

            // Live Preview Logic
            titleInput.addEventListener('input', () => {
                prevTitle.textContent = titleInput.value || 'Your Page Title Appears Here';
            });

            descInput.addEventListener('input', () => {
                prevDesc.textContent = descInput.value || 'This is how your page description will appear in Google search results.';
            });

            selector.addEventListener('change', function () {
                const page = this.value;
                if (!page) return;

                // UI switching
                formFields.style.display = 'none';
                loader.style.display = 'block';

                // Fetch Data
                const url = "{{ route('admin.seo.data', ':page') }}".replace(':page', page);
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        // Populate fields
                        titleInput.value = data.title || '';
                        descInput.value = data.description || '';
                        document.getElementById('seo_keywords').value = data.keywords || '';

                        // Update Image Preview
                        if (data.image) {
                            imgPreview.src = `/storage/${data.image}`;
                            imgPreview.style.display = 'block';
                        } else {
                            imgPreview.style.display = 'none';
                        }

                        // Trigger input event to update visual preview
                        titleInput.dispatchEvent(new Event('input'));
                        descInput.dispatchEvent(new Event('input'));

                        loader.style.display = 'none';
                        formFields.style.display = 'block';
                        formFields.style.opacity = '1';
                    })
                    .catch(err => {
                        console.error('Error fetching SEO data:', err);
                        loader.style.display = 'none';
                        alert('Failed to load data. Please try again.');
                    });
            });
        });
    </script>
@endsection