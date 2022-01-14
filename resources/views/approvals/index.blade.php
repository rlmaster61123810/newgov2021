@extends('layouts.app')
@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">การอนุมัติ</li>
            </ol>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>การอนุมัติ</h3>
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
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pending-tab" data-toggle="tab" href="#pending" role="tab"
                                        aria-controls="pending" aria-selected="true">รอตรวจสอบ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="rejected-tab" data-toggle="tab" href="#rejected"
                                        role="tab" aria-controls="rejected" aria-selected="false">ไม่อนุมัติ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="approved-tab" data-toggle="tab" href="#approved"
                                        role="tab" aria-controls="approved" aria-selected="false">อนุมัติ</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="pending" role="tabpanel"
                                    aria-labelledby="pending-tab">
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
                                                        <td>{{ $application->shop_name }}</td>
                                                        <td>{{ $application->product_type }}</td>
                                                        <td>
                                                            <a href="/approvals/create/{{ $application->id }}"
                                                                class="btn btn-sm btn-info">จัดการอนุมัติ</a>


                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover ">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                ชื่อผู้ประกอบการ
                                                            </th>
                                                            <th>
                                                                สถานที่ขาย
                                                            </th>
                                                            <th>
                                                                สถานะ
                                                            </th>
                                                            <th>
                                                                หมายเหตุ
                                                            </th>
                                                            <th>
                                                                จัดการข้อมูล
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($rejects as $reject)
                                                            <tr>
                                                                <td>
                                                                    {{ $reject->application->fullname }}
                                                                </td>
                                                                <td>
                                                                    {{ $reject->sale_area->location }}
                                                                </td>
                                                                <td>
                                                                    <span class="badge badge-danger">ไม่อนุมัติ</span>
                                                                <td>
                                                                    {{ $reject->comment }}
                                                                </td>
                                                                <td>
                                                                    {{-- show --}}
                                                                    <a href="{{ route('approvals.application.edit', $reject->application->id) }}"
                                                                        class="btn btn-info btn-sm">
                                                                        แก้ไขข้อมูล
                                                                    </a>
                                                                    <a href="{{ route('approvals.edit', $reject->id) }}"
                                                                        class="btn btn-primary btn-sm">
                                                                        แก้ไขการอนุมัติ
                                                                    </a>
                                                                    <form
                                                                        action="{{ route('approvals.destroy', $reject->id) }}"
                                                                        method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            onclick="return confirm('คุณต้องการลบผู้ใช้งานหรือไม่ ?')"
                                                                            class="btn btn-danger btn-sm">
                                                                            ลบ
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
                                <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover ">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                ชื่อผู้ประกอบการ
                                                            </th>
                                                            <th>
                                                                สถานที่ขาย
                                                            </th>
                                                            <th>
                                                                สถานะ
                                                            </th>
                                                            <th>
                                                                หมายเหตุ
                                                            </th>
                                                            <th>
                                                                จัดการข้อมูล
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($approves as $approve)
                                                            <tr>
                                                                <td>
                                                                    {{ $approve->application->fullname }}
                                                                </td>
                                                                <td>
                                                                    {{ $approve->sale_area->location }}
                                                                </td>
                                                                <td>
                                                                    @if ($approve->status == 'approved')
                                                                        <span class="badge badge-success">อนุมัติ</span>
                                                                    @elseif ($approve->status == 'rejected')
                                                                        <span class="badge badge-danger">ไม่อนุมัติ</span>
                                                                    @endif
                                                                <td>
                                                                    {{ $approve->comment }}
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('applications.edit', $approve->application->id) }}"
                                                                        class="btn btn-info btn-sm">
                                                                        แก้ไขข้อมูล
                                                                    </a>
                                                                    <a href="{{ route('approvals.edit', $approve->id) }}"
                                                                        class="btn btn-primary btn-sm">
                                                                        แก้ไขการอนุมัติ
                                                                    </a>
                                                                    <form
                                                                        action="{{ route('approvals.destroy', $approve->id) }}"
                                                                        method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            onclick="return confirm('คุณต้องการลบผู้ใช้งานหรือไม่ ?')"
                                                                            class="btn btn-danger btn-sm">
                                                                            ลบ
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
            </div>
        </div>
    </div>
@endsection
