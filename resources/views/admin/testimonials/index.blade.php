@extends('layouts.admin')

@section('content')
    <div class="card">
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h2>Testimonials</h2>
            <button onclick="document.getElementById('createForm').style.display='block'" class="btn btn-primary">Add
                New</button>
        </div>

        <!-- Create Form (Hidden) -->
        <div id="createForm"
            style="display:none; margin-bottom: 20px; background: #f9f9f9; padding: 15px; border-radius: 5px;">
            <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h3>Add Testimonial</h3>
                <div class="form-group">
                    <label>Client Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Designation</label>
                    <input type="text" name="designation" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" class="form-control" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" onclick="document.getElementById('createForm').style.display='none'"
                    class="btn">Cancel</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonials as $testimonial)
                    <tr>
                        <td>
                            @if($testimonial->image)
                                <img src="{{ asset('storage/' . $testimonial->image) }}" width="50" style="border-radius:50%">
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $testimonial->name }}</td>
                        <td>{{ $testimonial->designation }}</td>
                        <td>{{ Str::limit($testimonial->message, 50) }}</td>
                        <td>
                            <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST"
                                onsubmit="return confirm('Delete?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    style="padding: 5px 10px; font-size: 0.8rem;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection