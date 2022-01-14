@extends('layouts.app')
@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">ใบเสร็จ</li>
            </ol>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>รายการใบเสร็จ
                                <a href="{{ route('bills.create') }}" class="btn btn-primary float-right">เพิ่มใบเสร็จ
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
                                                        ชื่อรายการ
                                                    </th>
                                                    <th>
                                                        จำนวนเงิน
                                                    </th>
                                                    <th>
                                                        ผู้อนุมัติ
                                                    </th>
                                                    <th>
                                                        สถานะการชำระเงิน
                                                    </th>
                                                    <th>
                                                        จัดการข้อมูล
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bills as $bill)
                                                    <tr>
                                                        <td>
                                                            {{ $bill->application->fullname }}
                                                        </td>
                                                        <td>
                                                            {{ $bill->price }}
                                                        </td>
                                                        <td>
                                                            {{ $approval->user->name }}
                                                        </td>
                                                        <td>
                                                            {{-- status  bills paid --}}
                                                            @if ($bill->paid == 0)
                                                                <span class="badge badge-danger">ยังไม่ชำระเงิน</span>
                                                            @elseif ($bill->paid == 1)
                                                                <span class="badge badge-success">ชำระเงินแล้ว</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{-- show --}}
                                                            <a href="{{ route('bills.show', $project->id) }}"
                                                                class="btn btn-info btn-sm">แสดงข้อมูล
                                                            </a>
                                                            <a href="{{ route('bills.edit', $project->id) }}"
                                                                class="btn btn-primary btn-sm">แก้ไข</a>
                                                            <form action="{{ route('bills.destroy', $project->id) }}"
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
