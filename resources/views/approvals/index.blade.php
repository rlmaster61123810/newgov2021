@extends('layouts.app')
@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">จัดการผู้รับรองผู้ประกอบการ</li>

            </ol>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>ผู้รับรองผู้ประกอบการ
                                <a href="{{ route('forms.create') }}"
                                    class="btn btn-primary float-right">เพิ่มผู้รับรองผู้ประกอบการ
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
                                                        ชื่อ-นามสกุล
                                                    </th>
                                                    <th>
                                                        ตำแหน่ง
                                                    </th>
                                                    <th>
                                                        เบอร์โทร
                                                    </th>
                                                    <th>
                                                        จัดการข้อมูล
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($forms as $form)
                                                    <tr>
                                                        <td>{{ $form->auditor_name }}</td>
                                                        <td>{{ $form->auditor_position }}</td>
                                                        <td>{{ $form->auditor_phone }}</td>
                                                        <td>
                                                            {{-- show --}}
                                                            <a href="{{ route('forms.show', $form->id) }}"
                                                                class="btn btn-info btn-sm">
                                                                แสดงข้อมูล
                                                            </a>
                                                            <a href="{{ route('forms.edit', $form->id) }}"
                                                                class="btn btn-primary btn-sm">
                                                                แก้ไข</a>
                                                            <form action="{{ route('forms.destroy', $form->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    onclick="return confirm('คุณต้องการลบผู้ใช้งานหรือไม่ ?')"
                                                                    class="btn btn-danger btn-sm">
                                                                    ลบ</button>
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
