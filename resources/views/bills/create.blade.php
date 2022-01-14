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
                    <h5 class="card-title">เพิ่มใบเสร็จ</h5>
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
                    <form action="{{ route('bills.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">ชื่อรายการ</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อรายการ"
                                value="{{ old('name') }}">
                        </div>
                        @foreach ($bills as $bill)
                            <option value="{{ $bill->id }}">{{ $bill->name }}</option>
                        @endforeach
                        {{-- approval_id --}}
                        <div class="form-group">
                            <label for="approval_id">ผู้อนุมัติ</label>
                            <select class="form-control" id="approval_id" name="approval_id">
                                <option value="">เลือกผู้อนุมัติ</option>
                                @foreach ($approvals as $approval)
                                    <option value="{{ $approval->id }}">{{ $approval->name }}</option>
                                @endforeach
                            </select>
                        </div>

