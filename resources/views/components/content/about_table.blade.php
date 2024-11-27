@extends('layouts.admin_app')
@section('content')
    <x-layouts.admin.modal.add-new />
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
                                        <a href="#" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('delete.about', $entry->id) }}" method="POST" class="delete-form" style="display: inline-block;">
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
        <!-- content-wrapper ends -->


    @endsection
