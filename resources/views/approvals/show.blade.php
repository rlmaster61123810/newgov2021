@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{ route('approvals.index') }}">แบบใบรับรองผู้ประกอบการ</a></li>
            <li class="breadcrumb-item active" aria-current="page">เพิ่มแบบใบรับรองผู้ประกอบการ</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">เพิ่มแบบใบรับรองผู้ประกอบการ</h5>
                </div>
                <div class="card-body">
                    {{-- has error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('approvals.update', $approval->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="application_id">ชื่อผู้ประกอบการ</label>
                            <select class="form-control" name="application_id" id="application_id">
                                @foreach ($applications as $application)
                                    <option value="{{ $application->id }}" disabled='application_id'
                                        {{ $application->id == $approval->application_id ? 'selected' : '' }}>
                                        {{ $application->fullname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sale_area_id">สถานที่ขาย</label>
                            <select class="form-control" name="sale_area_id" id="sale_area_id">
                                @foreach ($sale_areas as $sale_area)
                                    <option value="{{ $sale_area->id }}" disabled='sale_area_id'
                                        {{ $sale_area->id == $approval->sale_area_id ? 'selected' : '' }}>
                                        {{ $sale_area->location }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user_id">ผู้อนุมัติ</label>
                            <select class="form-control" name="user_id" id="user_id">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" disabled="user_id"
                                        {{ $user->id == $approval->user_id ? 'selected' : '' }}>
                                        {{ $user->name }}</option>

                                @endforeach
                            </select>
                        </div>
                        {{-- commet --}}
                        <div class="form-group">
                            <label for="comment">หมายเหตุ</label>
                            <textarea class="form-control" name="comment" id="comment" rows="3" disabled='comment'>{{ $approval->comment }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">สร้างแบบใบรับรองผู้ประกอบการ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
