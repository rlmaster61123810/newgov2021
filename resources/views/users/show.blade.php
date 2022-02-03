{{-- users/edit.blade.php translate to Thai language too --}}
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{-- breadscrumb --}}
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/users') }}">ผู้ใช้งาน</a></li>
                    <li class="breadcrumb-item active">แสดงข้อมูลผู้ใช้</li>
                </ol>
            </div>

            {{-- name, position, phone, email, password, role --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">แสดงข้อมูลผู้ใช้</div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/users/' . $user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">ชื่อ</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                        value="{{ $user->name }}" required autofocus disabled="name">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">ตำแหน่ง</label>
                                <div class="col-md-6">
                                    <input id="position" type="text"
                                        class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}"
                                        name="position" value="{{ $user->position }}" required autofocus disabled="position">
                                    @if ($errors->has('position'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('position') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">เบอร์โทรศัพท์</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                        class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                                        value="{{ $user->phone }}" required autofocus disabled="phone">
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">อีเมล์</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                        value="{{ $user->email }}" required disabled="email">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="p-2 border border-info mb-3">
                                {{-- alert info  --}}
                                <div class="alert alert-info" role="alert">
                                    <strong>คำแนะนำ!</strong> หากต้องการเปลี่ยนแปลงรหัสผ่านโปรดระบุทั้งสองช่องด้านล่างนี้
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">รหัสผ่าน</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password" disabled="password">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-right">ยืนยันรหัสผ่าน</label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" disabled="password_confirmation">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">สิทธิ์การใช้งาน</label>
                                <div class="col-md-6">
                                    <select id="role" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" disabled="role"
                                        name="role" required>
                                        <option value="">เลือกสิทธิ์การใช้งาน</option>
                                        <option value="admin" {{ $user->role == 'ADMIN' ? 'selected' : '' }}>ผู้ดูแลระบบ
                                        </option>
                                    </select>
                                    @if ($errors->has('role'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
