@extends('layouts.app')
@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">โครงการ</li>
            </ol>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>รายการโครงการ
                                <a href="{{ route('projects.create') }}" class="btn btn-primary float-right">เพิ่มโครงการ
                                </a>
                            </h3>
                        </div>
                        <div class="card-body">
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover ">
                                            <thead class=" text-primary">
                                                <tr>
                                                    <th>
                                                        ชื่อโครงการ
                                                    </th>
                                                    <th>
                                                        หน่วยงาน
                                                    </th>
                                                    <th>
                                                        สถานที่
                                                    </th>
                                                    <th>
                                                        จัดการข้อมูล
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($projects as $project)
                                                    <tr>
                                                        <td>{{ $project->name }}</td>
                                                        <td>{{ $project->department }}</td>
                                                        <td>{{ $project->location }}</td>
                                                        <td>{{ $project->created_at }}</td>
                                                        <td>{{ $project->updated_at }}</td>
                                                        <td>{{ $project->deleted_at }}</td>
                                                        <td>
                                                            @if ($project->status == 1)
                                                                <span class="badge badge-success">เปิดใช้งาน</span>
                                                            @else
                                                                <span class="badge badge-danger">ปิดใช้งาน</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('projects.edit', $project->id) }}"
                                                                class="btn btn-warning">แก้ไข</a>
                                                            <a href="{{ route('projects.destroy', $project->id) }}"
                                                                class="btn btn-danger">
                                                                ลบ
                                                            </a>
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
        </div>
    </div>
@endsection
