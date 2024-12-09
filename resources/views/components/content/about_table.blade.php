@extends('layouts.admin_app')
@section('content')
    <x-layouts.admin.modal.add-new :action="route('add.about')" title="About">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" required></textarea>
        </div>
    </x-layouts.admin.modal.add-new>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Blog Content
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <span></span>Overview <i
                                class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                        </li>
                    </ul>
                </nav>
            </div>
            <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#addModal"><i
                    class="fa fa-plus"></i> Add New</button>
            <br></br>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">About</h4>
                    </p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Title </th>
                                <th> Description </th>
                                <th> Content </th>
                                <th> Time Updated </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aboutEntries as $entry)
                                <tr>
                                    <td>{{ $entry->title }}</td>
                                    <td>{{ $entry->description }}</td>
                                    <td>{{ $entry->content }}</td>
                                    <td>{{ $entry->updated_at ? $entry->updated_at->format('Y-m-d H:i') : 'N/A' }}</td>
                                    <td>
                                        <!-- Example action buttons -->
                                        <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal" data-id="{{ $entry->id }}"
                                            data-title="{{ $entry->title }}" data-description="{{ $entry->description }}"
                                            data-content="{{ $entry->content }}"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('delete.about', $entry->id) }}" method="POST"
                                            class="delete-form" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm delete-btn"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <x-layouts.admin.modal.edit :action="route('update.about', $entry->id)" title="Edit About">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title"
                    value="{{ old('title', $entry->title) }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ old('description', $entry->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" required>{{ old('content', $entry->content) }}</textarea>
            </div>
        </x-layouts.admin.modal.edit>
@endsection
@section('scripts')
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const editModal = document.getElementById('editModal');

    // Listen for when the modal is shown
    editModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;  // Button that triggered the modal

        // Retrieve the data attributes from the button
        const id = button.getAttribute('data-id');
        const title = button.getAttribute('data-title');
        const description = button.getAttribute('data-description');
        const content = button.getAttribute('data-content');

        // Debugging: Log the values to the console
        console.log({ id, title, description, content });

        // Find the form inside the modal
        const form = editModal.querySelector('form');

        // Dynamically set the form action to the correct route
        form.action = `/update.about/${id}`;

        // Populate the modal's form fields
        editModal.querySelector('#title').value = title || '';
        editModal.querySelector('#description').value = description || '';
        editModal.querySelector('#content').value = content || '';
    });
});

    </script>
@endsection