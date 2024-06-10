@extends('layouts.admin.index')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Specialities</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Specialities</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Specialities</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($specialities as $speciality) 
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar"> 
                                                        {{ $speciality->name }} 
                                                    </h2>
                                                </td>
                                                <td>
                                                    {{ $speciality->description }} 
                                                </td>
                                
                                                <td>
                                                    <div class="actions">
                                                        {{-- Assuming you have a speciality edit route --}}
                                                        <a class="btn btn-sm bg-success-light" data-bs-toggle="modal"
                                                            href=""> 
                                                            <i class="fe fe-pencil"></i> Edit
                                                        </a>
                                                        {{-- Assuming you have a speciality delete route or can handle this via JavaScript --}}
                                                        <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                            href="#delete_modal" onclick="confirmDelete('{{ $speciality->id }}')"> 
                                                            <i class="fe fe-trash"></i> Delete
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
