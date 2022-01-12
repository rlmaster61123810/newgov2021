@extends('layouts.app')
@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">ข้อมูลผู้เข้าร่วมโครงการ</li>
            </ol>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>รายการข้อมูลผู้เข้าร่วมโครงการ
                                <a href="{{ route('attendee_details.create') }}" class="btn btn-primary float-right">เพิ่มข้อมูลผู้เข้าร่วมโครงการ
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
                                                        เบอร์โทร
                                                    </th>
                                                    <th>
                                                        อาหารฮาลาล
                                                    </th>
                                                    <th>
                                                        จำนวนเงิน
                                                    </th>
                                                    <th>
                                                        วิธีการชำระเงิน
                                                    </th>
                                                    <th>
                                                        หมายเหตุ
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($attendee_details as $attendee_detail)
                                                    <tr>
                                                        <td>
                                                            {{ $attendee_detail->attendee->name }}
                                                        </td>
                                                        <td>
                                                            {{ $attendee_detail->phone }}
                                                        </td>
                                                        <td>
                                                            @if ($attendee_detail->is_halal == 'attendee_detail')
                                                                <span class="badge badge-success">ใช่</span>
                                                            @elseif($attendee_detail->is_halal == 'yes')
                                                                <span
                                                                    class="badge badge-warning">ผู้ประกอบการ</span>
                                                            @elseif($attendee_detail->is_halal == 'no')
                                                                <span class="badge badge-danger">ไม่ใช่</span>
                                                            @endif
                                                        </td>

                                                        </td>
                                                            {{-- show --}}
                                                            <a href="{{ route('attendee_details.show', $attendee_detail->id) }}"
                                                                class="btn btn-info btn-sm">แสดงข้อมูล
                                                            </a>
                                                            <a href="{{ route('attendee_details.edit', $attendee_detail->id) }}"
                                                                class="btn btn-primary btn-sm">แก้ไข</a>
                                                            <form action="{{ route('attendee_details.destroy', $attendee_detail->id) }}"
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
