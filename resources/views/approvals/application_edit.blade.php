@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{ route('applications.index') }}">หนังสือรับรองผู้ประกอบการ</a></li>
            <li class="breadcrumb-item active" aria-current="page">แก้ไขหนังสือรับรองผู้ประกอบการ</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>หนังสือรับรองผู้ประกอบการ</h4>
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
                    <form action="{{ route('approvals.application.update', $application->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- has_idcard check box if have = 0 nothave = 1 --}}
                        <h4>เอกสารที่แนบมาด้วย</h4>
                        <hr>
                        <div class="form-group">
                            <label for="has_idcard">มีบัตรประชาชน</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="has_idcard" id="has_idcard" value="0"
                                    {{ $application->has_idcard == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="has_idcard">
                                    ไม่มีบัตรประชาชน
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="has_idcard" id="has_idcard" value="1"
                                    {{ $application->has_idcard == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="has_idcard">
                                    มีบัตรประชาชน
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="has_house_registration">มีทะเบียนบ้าน</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="has_house_registration"
                                    id="has_house_registration" value="0"
                                    {{ $application->has_house_registration == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="has_house_registration">
                                    ไม่มี
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="has_house_registration"
                                    id="has_house_registration" value="1"
                                    {{ $application->has_house_registration == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="has_house_registration">
                                    มี
                                </label>
                            </div>
                        </div>
                        {{-- has_document check box if have = 0 nothave = 1 --}}
                        <div class="form-group">
                            <label for="has_document">มีเอกสารประกอบ</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="has_document" id="has_document" value="0"
                                    {{ $application->has_document == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="has_document">
                                    ไม่มีเอกสารประกอบ
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="has_document" id="has_document" value="1"
                                    {{ $application->has_document == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="has_document">
                                    มีเอกสารประกอบ
                                </label>
                            </div>
                        </div>
                        <h4>รายละเอียดผู้สมัคร</h4>
                        <hr>
                        <div class="form-group">
                            <label for="fullname">ชื่อ-นามสกุล</label>
                            <input type="text" class="form-control" id="fullname" name="fullname"
                                value="{{ $application->fullname }}">
                            @error('fullname')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
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
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ $application->phone }}">
                            @error('phone')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- input type="radio" toggle is_entrepreneur --}}
                        <div class="form-group">
                            <label for="is_entrepreneur">ลักษณะของใบสมัคร</label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="toggle" id="is_entrepreneur_1" value="0"
                                    @if ($application->community) checked @endif>
                                <label class="form-check-label" for="is_entrepreneur_1">
                                    เป็นกลุ่มชุมชน
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="toggle" id="is_entrepreneur_2" value="1"
                                    @if (!$application->community) checked @endif>
                                <label class="form-check-label" for="is_entrepreneur_2"
                                    value="{{ $application->is_entrepreneur_2 }}">
                                    เป็นผู้ประกอบการ
                                </label>
                            </div>
                        </div>
                        <div id="is_group">
                            <div class="form-group">
                                <label for="groupname">ชื่อกลุ่ม</label>
                                <input type="text" class="form-control" name="group_name" id="group_name"
                                    placeholder="ชื่อกลุ่ม" value="{{ $application->group_name }}">
                                @error('group_name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div id="is_not_group">
                        </div>
                        <div class="form-group">
                            <label for="product_type">ประเภทผลิตภัณฑ์</label>
                            <select id="product_type" class="form-control" name="product_type" required
                                value={{ $application->product_type }} name="product_type" required>
                                <option value="FOOD" {{ $application->product_type == 'FOOD' ? 'selected' : '' }}>
                                    อาหาร
                                </option>
                                <option value="SOUVENIR"
                                    {{ $application->product_type == 'SOUVENIR' ? 'selected' : '' }}>
                                    ของใช้ ของตกแต่งของที่ระลึก
                                </option>
                                <option value="BEVERAGE"
                                    {{ $application->product_type == 'BEVERAGE' ? 'selected' : '' }}>
                                    เครื่องดื่ม
                                </option>
                                <option value="HERB" {{ $application->product_type == 'HERB' ? 'selected' : '' }}>
                                    สมุนไพรไม่ใช่อาหาร
                                </option>
                                <option value="CLOTHES" {{ $application->product_type == 'CLOTHES' ? 'selected' : '' }}>
                                    เสื้อผ้าเครื่องแต่งกาย
                                </option>
                                <option value="OTHER" {{ $application->product_type == 'OTHER' ? 'selected' : '' }}>
                                    อื่นๆ
                                </option>
                            </select>
                        </div>

                        {{-- reason --}}
                        <div class="form-group" id="reason_section">
                            <label for="reason">ระบุประเภทผลิตภัณฑ์</label>
                            <input type="text" class="form-control" name="reason" id="reason"
                                placeholder="ระบุประเภทผลิตภัณฑ์" value="{{ $application->reason }}">
                            @error('reason')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- product[] with add more button --}}
                        <div id="products_form">
                            <h4>รายการสินค้า <span class="text-danger"><small> * หากมีสินค้ามากกว่า 1
                                        รายการโปรดเลือกที่เพิ่มผลิตภัณฑ์อีก </small></span> </h4>
                            <hr>
                            <div class="form-group">
                                <label for="product">ชื่อผลิตภัณฑ์</label>
                            </div>
                            @foreach ($application->products as $product)
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="products[]" id="product"
                                            placeholder="ชื่อผลิตภัณฑ์" value="{{ $product->name }}">
                                        {{-- if last item show add button --}}
                                        @if ($loop->first)
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="add_product">
                                                    <i class="fas fa-plus"></i> เพิ่มผลิตภัณฑ์อีก
                                                </button>
                                            </div>
                                        @else
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="remove_product">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                    @error('product')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                        <h4>รายละเอียดที่ตั้งร้านค้า</h4>
                        <hr>
                        <div class="form-group">
                            <label for="shop_name">ชื่อร้านค้า</label>
                            <input type="text" class="form-control" id="shop_name" name="shop_name"
                                value="{{ $application->shop_name }}">
                            @error('shop_name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="shop_address">ที่อยู่ร้านค้า</label>
                            <textarea class="form-control" id="shop_address" name="shop_address"
                                rows="3">{{ $application->shop_address }}</textarea>
                            @error('shop_address')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">แก้ไขผู้ประกอบการ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- toggle toggle_entrepreneur_1 & toggle_entrepreneur_2 --}}
    <script>
        $(document).ready(function() {
            @if (!$application->community)
                $('#is_group').hide();
            @endif
            $('#is_not_group').hide();
            $('#is_entrepreneur_1').click(function() {
                $('#is_group').show();
                $('#is_not_group').hide();
            });
            $('#is_entrepreneur_2').click(function() {
                $('#is_group').hide();
                $('#is_not_group').show();
            });
        });
    </script>

    {{-- if product_type is OTHER show reason --}}
    <script>
        $(document).ready(function() {
            $('#reason_section').hide();
            $('#product_type').change(function() {
                if ($(this).val() == 'OTHER') {
                    $('#reason_section').show();
                } else {
                    $('#reason_section').hide();
                }
            });
        });
    </script>

    {{-- add more product --}}
    <script>
        $(document).ready(function() {
            var i = 1;
            $('#add_product').click(function() {
                i++;
                $('#products_form').append(
                    '<div class="form-group">' +
                    '<div class="input-group">' +
                    '<input type="text" class="form-control" name="products[]" id="product" placeholder="ชื่อผลิตภัณฑ์">' +
                    '<div class="input-group-append">' +
                    '<button class="btn btn-outline-secondary" type="button" id="remove_product">' +
                    '<i class="fas fa-minus"></i>' +
                    '</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                );
            });
            $('#products_form').on('click', '#remove_product', function() {
                $(this).parent().parent().parent().remove();
            });
        });
    </script>
@endsection
