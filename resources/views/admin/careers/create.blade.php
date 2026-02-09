@extends('layouts.admin')

@section('content')
    <div class="admin-header-v2 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1><i class="fas fa-edit text-primary me-2"></i> {{ isset($job) ? 'Edit' : 'Post' }} Job Vacancy</h1>
            <a href="{{ route('admin.careers.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Back to List
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4 p-md-5">
            <form action="{{ isset($job) ? route('admin.careers.update', $job) : route('admin.careers.store') }}"
                method="POST">
                @csrf
                @if(isset($job))
                    @method('PUT')
                @endif

                <!-- Basic Information -->
                <div class="form-section-title">
                    <i class="fas fa-info-circle me-2"></i> Basic Information
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-md-8">
                        <label for="title" class="form-label fw-bold">Job Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg" id="title" name="title"
                            value="{{ old('title', $job->title ?? '') }}" placeholder="e.g. Senior Software Engineer"
                            required>
                    </div>
                    <div class="col-md-4">
                        <label for="department" class="form-label fw-bold">Department</label>
                        <input type="text" class="form-control form-control-lg" id="department" name="department"
                            value="{{ old('department', $job->department ?? '') }}" placeholder="e.g. Engineering">
                    </div>
                    <div class="col-md-4">
                        <label for="location" class="form-label fw-bold">Location <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-map-marker-alt text-muted"></i></span>
                            <input type="text" class="form-control" id="location" name="location"
                                value="{{ old('location', $job->location ?? 'Head Office / Remote') }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="job_type" class="form-label fw-bold">Job Type <span class="text-danger">*</span></label>
                        <select class="form-select" id="job_type" name="job_type" required>
                            <option value="Full-time" {{ (old('job_type', $job->job_type ?? '') == 'Full-time') ? 'selected' : '' }}>Full-time</option>
                            <option value="Part-time" {{ (old('job_type', $job->job_type ?? '') == 'Part-time') ? 'selected' : '' }}>Part-time</option>
                            <option value="Contract" {{ (old('job_type', $job->job_type ?? '') == 'Contract') ? 'selected' : '' }}>Contract</option>
                            <option value="Internship" {{ (old('job_type', $job->job_type ?? '') == 'Internship') ? 'selected' : '' }}>Internship</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="experience_level" class="form-label fw-bold">Experience Level <span
                                class="text-danger">*</span></label>
                        <select class="form-select" id="experience_level" name="experience_level" required>
                            <option value="Entry Level" {{ (old('experience_level', $job->experience_level ?? '') == 'Entry Level') ? 'selected' : '' }}>Entry Level</option>
                            <option value="Mid Level" {{ (old('experience_level', $job->experience_level ?? '') == 'Mid Level') ? 'selected' : '' }}>Mid Level</option>
                            <option value="Senior Level" {{ (old('experience_level', $job->experience_level ?? '') == 'Senior Level') ? 'selected' : '' }}>Senior Level</option>
                            <option value="Lead/Manager" {{ (old('experience_level', $job->experience_level ?? '') == 'Lead/Manager') ? 'selected' : '' }}>Lead/Manager</option>
                        </select>
                    </div>
                </div>

                <!-- Job Content -->
                <div class="form-section-title mt-0">
                    <i class="fas fa-align-left me-2"></i> Role & Responsibilities
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-12">
                        <label for="description" class="form-label fw-bold">Brief Overview <span
                                class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description" rows="3" required
                            placeholder="High-level summary of the role...">{{ old('description', $job->description ?? '') }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="responsibilities" class="form-label fw-bold">Core Responsibilities</label>
                        <textarea class="form-control" id="responsibilities" name="responsibilities" rows="8"
                            placeholder="List the key tasks and goals...">{{ old('responsibilities', $job->responsibilities ?? '') }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="requirements" class="form-label fw-bold">Candidate Requirements</label>
                        <textarea class="form-control" id="requirements" name="requirements" rows="8"
                            placeholder="Skills, experience, and education needed...">{{ old('requirements', $job->requirements ?? '') }}</textarea>
                    </div>
                    <div class="col-12">
                        <label for="benefits" class="form-label fw-bold">Perks & Benefits</label>
                        <textarea class="form-control" id="benefits" name="benefits" rows="3"
                            placeholder="Why should they join? Medical, bonus, remote flexibility...">{{ old('benefits', $job->benefits ?? '') }}</textarea>
                    </div>
                </div>

                <!-- Vacancy Control -->
                <div class="form-section-title mt-0">
                    <i class="fas fa-cog me-2"></i> Vacancy Control
                </div>

                <div class="row g-4 align-items-center mb-5">
                    <div class="col-md-4">
                        <label for="salary_range" class="form-label fw-bold">Salary Information</label>
                        <input type="text" class="form-control" id="salary_range" name="salary_range"
                            value="{{ old('salary_range', $job->salary_range ?? '') }}"
                            placeholder="e.g. ₹5L - ₹10L or Not Disclosed">
                    </div>
                    <div class="col-md-2">
                        <label for="positions" class="form-label fw-bold">No. of Openings</label>
                        <input type="number" class="form-control" id="positions" name="positions"
                            value="{{ old('positions', $job->positions ?? 1) }}" min="1">
                    </div>
                    <div class="col-md-3">
                        <label for="application_deadline" class="form-label fw-bold">Deadline</label>
                        <input type="date" class="form-control" id="application_deadline" name="application_deadline"
                            value="{{ old('application_deadline', isset($job) && $job->application_deadline ? $job->application_deadline->format('Y-m-d') : '') }}">
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-light border-0">
                            <div class="card-body py-2 px-3">
                                <div class="form-check form-switch mb-0">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                        value="1" {{ old('is_active', $job->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold ms-2" for="is_active">Publish Now</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-5 opacity-10">

                <div class="d-flex justify-content-end gap-3">
                    <a href="{{ route('admin.careers.index') }}" class="btn btn-light px-4 py-2 border">Cancel</a>
                    <button type="submit" class="btn btn-primary px-5 py-2 fw-bold shadow-sm">
                        <i class="fas fa-save me-2"></i> {{ isset($job) ? 'Update Vacancy' : 'Post Vacancy' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .admin-header-v2 h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
        }

        .form-section-title {
            font-size: 0.9rem;
            font-weight: 700;
            color: #0284c7;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 2rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e0f2fe;
        }

        .form-control,
        .form-select {
            border: 1px solid #e2e8f0;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #38bdf8;
            box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.1);
        }

        .form-control-lg {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .form-label {
            font-size: 0.875rem;
            color: #475569;
            margin-bottom: 0.5rem;
        }

        .input-group-text {
            border: 1px solid #e2e8f0;
            border-right: none;
        }
    </style>
@endsection