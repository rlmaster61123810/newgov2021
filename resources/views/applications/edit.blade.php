@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{ route('applications.index') }}">รับรองผู้ประกอบการ</a></li>
            <li class="breadcrumb-item active" aria-current="page">แก้ไขผู้ประกอบการ</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>แก้ไขผู้ประกอบการ</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('applications.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- has_idcard check box if have = 0 nothave = 1 --}}
                        <div class="form-group">
                            <label for="has_idcard">มีบัตรประชาชน</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="has_idcard" id="has_idcard" value="0"
                                    checked>
                                <label class="form-check-label" for="has_idcard">
                                    ไม่มีบัตรประชาชน
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="has_idcard" id="has_idcard" value="1">
                                <label class="form-check-label" for="has_idcard">
                                    มีบัตรประชาชน
                                </label>
                            </div>
                        </div>
                        {{-- has_house_registration check box if have = 0 nothave = 1 --}}
                        <div class="form-group">
                            <label for="has_house_registration">มีทะเบียนบ้าน</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="has_house_registration"
                                    id="has_house_registration" value="0" checked>
                                <label class="form-check-label" for="has_house_registration">
                                    ไม่มีทะเบียนบ้าน
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="has_house_registration"
                                    id="has_house_registration" value="1">
                                <label class="form-check-label" for="has_house_registration">
                                    มีทะเบียนบ้าน
                                </label>
                            </div>
                        </div>
                        {{-- has_document check box if have = 0 nothave = 1 --}}
                        <div class="form-group">
                            <label for="has_document">มีเอกสารประกอบ</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="has_document" id="has_document" value="0"
                                    checked>
                                <label class="form-check-label" for="has_document">
                                    ไม่มีเอกสารประกอบ
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="has_document" id="has_document"
                                    value="1">
                                <label class="form-check-label" for="has_document">
                                    มีเอกสารประกอบ
                                </label>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name">ชื่อผู้ประกอบการ</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $application->name }}">
                            @error('name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product_type">ประเภทผลิตภัณฑ์</label>
                            <select id="product_type"
                                class="form-control {{ $errors->has('product_type') ? ' is-invalid' : '' }}"
                                name="product_type" required value={{ $application->product_type }} name="product_type"
                                required>
                                <option value="FOOD" {{ $application->product_type == 'FOOD' ? 'selected' : '' }}>
                                    อาหาร</option>
                                <option value="SOUVENIR"
                                    {{ $product_type->product_type == 'SOUVENIR' ? 'selected' : '' }}>
                                    ของใช้ ของตกแต่ง ของที่ระลึก</option>
                                <option value="BEVERAGE" {{ $application->product_type == 'BEVERAGE' ? 'selected' : '' }}>
                                    เครื่องดื่ม</option>
                                <option value="HERB" {{ $application->product_type == 'HERB' ? 'selected' : '' }}>
                                    สมุนไพร ไม่ใช่อาหาร</option>
                                <option value="CLOTHES" {{ $application->product_type == 'CLOTHES' ? 'selected' : '' }}>
                                    เสื้อผ้าเครื่องแต่งกาย</option>
                                <option value="OTHER" {{ $application->product_type == 'OTHER' ? 'selected' : '' }}>
                                    อื่นๆ</option>
                            </select>
                        </div>
                        {{-- reason --}}
                        <div class="form-group">
                            <label for="reason">เหตุผลที่สมัคร</label>
                            <textarea class="form-control" id="reason" name="reason"
                                rows="3">{{ $application->reason }}</textarea>
                            @error('reason')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- fullname --}}
                        <div class="form-group">
                            <label for="fullname">ชื่อ-นามสกุล</label>
                            <input type="text" class="form-control" id="fullname" name="fullname"
                                value="{{ $application->fullname }}">
                            @error('fullname')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- address --}}
                        <div class="form-group">
                            <label for="address">ที่อยู่</label>
                            <textarea class="form-control" id="address" name="address"
                                rows="3">{{ $application->address }}</textarea>
                            @error('address')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- phone --}}
                        <div class="form-group">
                            <label for="phone">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" id="phone" name="phone" value=" {{$application->phone}} ">
                            @error('phone')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- shop_address --}}
                        <div class="form-group">
                            <label for="shop_address">ที่อยู่ร้านค้า</label>
                            <textarea class="form-control" id="shop_address" name="shop_address"
                                rows="3">{{ $application->shop_address }}</textarea>
                            @error('shop_address')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- shop_name --}}
                        <div class="form-group">
                            <label for="shop_name">ชื่อร้านค้า</label>
                            <input type="text" class="form-control" id="shop_name" name="shop_name"
                                value="{{ $application->shop_name }}">
                            @error('shop_name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">สร้างผู้ประกอบการ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
