@extends('layouts.app')
@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">รับรองผู้ประกอบการ</li>
            </ol>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>รายการรับรองผู้ประกอบการ
                                <a href="{{ route('applications.create') }}"
                                    class="btn btn-primary float-right">เพิ่มผู้ประกอบการ
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
                                        <table class="table table-striped table-hover">
                                            <thead class=" text-primary">
                                                <tr>
                                                    <th>
                                                        ชื่อ-นามสกุล
                                                    </th>
                                                    <th>
                                                        เบอร์โทร
                                                    </th>
                                                    <th>
                                                        ที่อยู่ร้าน
                                                    </th>
                                                    <th>
                                                        ชื่อร้าน
                                                    </th>
                                                    <th>
                                                        ประเภทผลิตภัณฑ์
                                                    </th>
                                                    <th>
                                                        จัดการข้อมูล
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($applications as $application)
                                                    <tr>
                                                        <td>{{ $application->fullname }}</td>
                                                        <td>{{ $application->phone }}</td>
                                                        <td>{{ $application->shop_address }}</td>
                                                        <td>{{ $application->shop_name }}</td>
                                                        <td>{{ $application->product_type }}</td>
                                                        <td>
                                                            <a href="{{ route('applications.edit', $application->id) }}"
                                                                class="btn btn-primary btn-sm">แก้ไข</a>
                                                            <form action="{{ route('applications.destroy', $application->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    onclick="return confirm('คุณต้องการลบผู้ใช้งานหรือไม่ ?')"
                                                                    class="btn btn-danger btn-sm">ลบ</button>
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
    </div>
@endsection
