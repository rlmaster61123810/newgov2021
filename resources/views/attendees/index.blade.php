@extends('layouts.app')
@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">ผู้เข้าร่วมโครงการ</li>
            </ol>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>รายการผู้เข้าร่วมโครงการ
                                <a href="{{ route('attendees.create') }}"
                                    class="btn btn-primary float-right">เพิ่มผู้เข้าร่วมโครงการ
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
                                                        รหัสผู้เข้าร่วมโครงการ
                                                    </th>
                                                    <th>
                                                        ประเภทผู้เข้าร่วมโครงการ
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($attendees as $attendee)
                                                    <tr>
                                                        <td>{{ $attendee->form_id }}</td>
                                                        <td>
                                                            @if ($attendee->type == 'community')
                                                                <span class="badge badge-success">ชุมชน</span>
                                                            @elseif($attendee->type == 'entrepreneur')
                                                                <span
                                                                    class="badge badge-warning">ผู้ประกอบการ</span>
                                                            @elseif($attendee->type == 'individual')
                                                                <span class="badge badge-danger">บุคคลธรรมดา</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('attendees.edit', $attendee->id) }}"
                                                                class="btn btn-primary btn-sm">แก้ไข</a>
                                                            <form action="{{ route('attendees.destroy', $attendee->id) }}"
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
