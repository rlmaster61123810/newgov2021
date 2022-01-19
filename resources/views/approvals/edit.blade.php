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
                        @method('PUT')

                        <div class="form-group">
                            <label for="is_approve">การอนุมัติ</label>
                            <select name="status" id="is_approve" class="form-control">
                                <option value="approved" class="text-success" @if ($approval->status == 'approved')
                                    selected
                                    @endif
                                    >&check; อนุมัติ</option>
                                <option value="rejected" class="text-danger" @if ($approval->status == 'rejected')
                                    selected
                                    @endif
                                    >&cross; ไม่อนุมัติ</option>
                                >&cross; ไม่อนุมัติ</option>
                            </select>
                        </div>
                        <h4>รายละเอียดผู้อนุมัติ</h4>
                        <p class="p-2 border"><strong>ผู้อนุมัติ : </strong> {{ auth()->user()->name }} </p>
                        <div class="form-group">
                            <label for="comment">หมายเหตุ</label>
                            <textarea class="form-control" name="comment" id="comment"
                                rows="3">{{ $approval->comment }}</textarea>
                            @error('comment')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">แก้ไขข้อมูลการอนุมัติ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
