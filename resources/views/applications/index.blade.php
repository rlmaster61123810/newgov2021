@extends('layouts.app')
@section('content')
    {{-- applications with breadscrumb --}}
    {{-- has_idcard , has_house_registration , has_document group_name , product_type , reason , fullname , address , phone , shop_address , shop_name --}}
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">รับรองผู้ประกอบการ</li>
            </ol>
        </nav>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>รายการรับรองผู้ประกอบการ</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-right">
                                        <a href="{{ route('applications.create') }}" class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            เพิ่มผู้ประกอบการ
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ชื่อ-นามสกุล</th>
                                                <th>ที่อยู่</th>
                                                <th>เบอร์โทร</th>
                                                <th>ที่อยู่ร้าน</th>
                                                <th>ชื่อร้าน</th>
                                                <th>ประเภทผลิตภัณฑ์</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($applications as $application)
                                                <tr>
                                                    <td>{{ $application->fullname }}</td>
                                                    <td>{{ $application->address }}</td>
                                                    <td>{{ $application->phone }}</td>
                                                    <td>{{ $application->shop_address }}</td>
                                                    <td>{{ $application->shop_name }}</td>
                                                    <td>{{ $application->product_type }}</td>
                                                    <td>{{ $application->reason }}</td>
                                                    <td>{{ $application->group_name }}</td>
                                                    <td>{{ $application->has_idcard }}</td>
                                                    <td>{{ $application->has_house_registration }}</td>
                                                    <td>{{ $application->has_document }}</td>
                                                    <td>
                                                        <a href="{{ route('applications.edit', $application->id) }}"
                                                            class="btn btn-primary btn-sm">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form
                                                            action="{{ route('applications.destroy', $application->id) }}"
                                                            method="POST" class="d-inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
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
    @endsection
