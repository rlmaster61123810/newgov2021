@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{ route('communities.index') }}">ข้อมูลชุมชน</a></li>
            <li class="breadcrumb-item active" aria-current="page">แก้ไขข้อมูลชุมชน</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">แก้ไขข้อมูลชุมชน</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('communities.update', $community->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="code">รหัสชุมชน</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ $community->code }}">
                            {{-- help text --}}
                            @if ($errors->has('code'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('code') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="village">ชื่อหมู่บ้าน</label>
                            <input type="text" class="form-control" id="village" name="village"
                                value="{{ $community->village }}">
                            {{-- help text --}}
                            @if ($errors->has('village'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('village') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="moo">หมู่ที่</label>
                            <input type="text" class="form-control" id="moo" name="moo" value="{{ $community->moo }}">
                            {{-- help text --}}
                            @if ($errors->has('moo'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('moo') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="district">อำเภอ</label>
                            <input type="text" class="form-control" id="district" name="district"
                                value="{{ $community->district }}">
                            {{-- help text --}}
                            @if ($errors->has('district'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('district') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="sub_district">เลือกแขวง</label>
                            <select id="sub_district" class="form-control" name="sub_district" required>
                                <option value="NAKORNPING">นครพิงค์</option>
                                <option value="KAWILA">กาวิละ</option>
                                <option value="MENGRAI">เม็งราย</option>
                                <option value="SRIVICHAI">ศรีวิชัย</option>
                            </select>
                            {{-- help text --}}
                            @if ($errors->has('sub_district'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('sub_district') }}
                                </small>
                            @endif
                            {{-- submit --}}

                        </div>
                        <button type="submit" class="btn btn-primary">แก้ไขข้อมูลชุมชน</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
