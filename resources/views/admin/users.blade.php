@extends('layouts.master')

@section('body')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <!-- Button trigger modal -->
                            <a href="/admin/export-ph-soil"><button type="button" class="btn btn-primary" style="margin-right: 10px;"><i class="fas fa-file-export"></i> Export Data User</button></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->level }}</td>
                                            <td>
                                                <div class="icon-container">
                                                <a href="/admin/delete-ph-soil-{{ $data->id }}" class="confirm-button" ><i class="fas fa-trash-alt" style="color: red"></i></a>
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


@endsection
