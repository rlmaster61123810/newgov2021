@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{ route('bills.index') }}">ใบเสร็จ</a></li>
            <li class="breadcrumb-item active" aria-current="page">เพิ่มใบเสร็จ</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>เพิ่มใบเสร็จ</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('bills.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">รหัสใบเสร็จ</label>
                            <input type="text" class="form-control" name="code" value="{{ old('code') }}">
                            @error('code')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- approvals --}}
                        <div class="form-group">
                            <label for="">ผู้ประกอบการ</label>
                            <select name="approval_id" class="form-control">
                                @foreach ($approvals as $approval)
                                    <option value="{{ $approval->id }}">[{{ $approval->sale_area->name }} {{ $approval->sale_area->location }}] -
                                        {{ $approval->application->shop_name }}
                                        ({{ $approval->application->fullname }})</option>
                                @endforeach
                            </select>
                            @error('approval_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">วันที่</label>
                            <input type="date" class="form-control" name="date" value="{{ old('date') }}">
                            @error('date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">รายการ</label>
                            <input type="text" class="form-control" name="detail" value="{{ old('detail') }}">
                            @error('detail')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">จำนวนเงิน</label>
                            <input type="number" class="form-control" name="amount" value="{{ old('amount') }}">
                            @error('amount')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">รายละเอียด</label>
                            <textarea name="detail" id="" cols="30" rows="10"
                                class="form-control">{{ old('detail') }}</textarea>
                            @error('detail')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">สถานะ</label>
                            <select name="status" id="" class="form-control">
                                <option value="1">ชำระเงินแล้ว</option>
                                <option value="0">ยังไม่ได้ชำระเงิน</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">สร้างข้อมูลการชำระเงิน</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
