@extends('layouts.admin')

@section('content')
    <div class="card">
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h2>Social Links</h2>
            <button onclick="document.getElementById('createForm').style.display='block'" class="btn btn-primary">Add
                New</button>
        </div>

        <!-- Create Form (Hidden) -->
        <div id="createForm"
            style="display:none; margin-bottom: 20px; background: #f9f9f9; padding: 15px; border-radius: 5px;">
            <form action="{{ route('social-links.store') }}" method="POST">
                @csrf
                <h3>Add Link</h3>
                <div class="form-group">
                    <label>Platform (e.g. Facebook)</label>
                    <input type="text" name="platform" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>URL</label>
                    <input type="url" name="url" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Icon Class (FontAwesome, e.g. fab fa-facebook)</label>
                    <input type="text" name="icon" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" onclick="document.getElementById('createForm').style.display='none'"
                    class="btn">Cancel</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Platform</th>
                    <th>URL</th>
                    <th>Icon</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($socialLinks as $link)
                    <tr>
                        <td>{{ $link->platform }}</td>
                        <td><a href="{{ $link->url }}" target="_blank">{{Str::limit($link->url, 30)}}</a></td>
                        <td><i class="{{ $link->icon }}"></i> {{ $link->icon }}</td>
                        <td>
                            <form action="{{ route('social-links.destroy', $link->id) }}" method="POST"
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