@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{ route('applications.index') }}">รับรองผู้ประกอบการ</a></li>
            <li class="breadcrumb-item active" aria-current="page">เพิ่มผู้ประกอบการ</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>เพิ่มผู้ประกอบการ</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="has_idcard">เอกสารแนบสำเนาบัตรประชาชน</label>
                            <input type="file" class="form-control-file" id="has_idcard" name="has_idcard"
                                accept="image/*,application/pdf,application/msword,application/vnd.ms-excel,application/vnd.ms-powerpoint,text/plain">
                            @error('has_idcard')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="has_house_registration">เอกสารแนบสำเนาทะเบียนบ้าน</label>
                            <input type="file" class="form-control-file" id="has_house_registration"
                                name="has_house_registration"
                                accept="image/*,application/pdf,application/msword,application/vnd.ms-excel,application/vnd.ms-powerpoint,text/plain">
                            @error('has_house_registration')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="has_document">เอกสารแนบที่เกี่ยวข้อง</label>
                            <input type="file" class="form-control-file" id="has_document" name="has_document"
                                accept="image/*,application/pdf,application/msword,application/vnd.ms-excel,application/vnd.ms-powerpoint,text/plain">
                            @error('has_document')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">ชื่อผู้ประกอบการ</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product_type">ประเภทผลิตภัณฑ์</label>
                            <select id="product_type" class="form-control" name="product_type" required>
                                <option value="FOOD">อาหาร</option>
                                <option value="SOUVENIR">ของใช้ ของตกแต่ง ของที่ระลึก</option>
                                <option value="BEVERAGE">เครื่องดื่ม</option>
                                <option value="HERB">สมุนไพร ไม่ใช่อาหาร</option>
                                <option value="CLOTHES">เสื้อผ้าเครื่องแต่งกาย</option>
                                <option value="OTHER">อื่นๆ</option>
                            </select>
                        </div>
                        {{-- reason --}}
                        <div class="form-group">
                            <label for="reason">เหตุผลที่สมัคร</label>
                            <textarea class="form-control" id="reason" name="reason"
                                rows="3">{{ old('reason') }}</textarea>
                            @error('reason')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- fullname --}}
                        <div class="form-group">
                            <label for="fullname">ชื่อ-นามสกุล</label>
                            <input type="text" class="form-control" id="fullname" name="fullname"
                                value="{{ old('fullname') }}">
                            @error('fullname')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- address --}}
                        <div class="form-group">
                            <label for="address">ที่อยู่</label>
                            <textarea class="form-control" id="address" name="address"
                                rows="3">{{ old('address') }}</textarea>
                            @error('address')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- phone --}}
                        <div class="form-group">
                            <label for="phone">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- shop_address --}}
                        <div class="form-group">
                            <label for="shop_address">ที่อยู่ร้านค้า</label>
                            <textarea class="form-control" id="shop_address" name="shop_address"
                                rows="3">{{ old('shop_address') }}</textarea>
                            @error('shop_address')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- shop_name --}}
                        <div class="form-group">
                            <label for="shop_name">ชื่อร้านค้า</label>
                            <input type="text" class="form-control" id="shop_name" name="shop_name"
                                value="{{ old('shop_name') }}">
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
