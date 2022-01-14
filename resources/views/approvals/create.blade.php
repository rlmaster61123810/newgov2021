@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{ route('approvals.index') }}">การอนุมัติ</a></li>
            <li class="breadcrumb-item active" aria-current="page">จัดการการอนุมัติ</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">จัดการการอนุมัติ</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div>
                        <h4>เอกสารที่แนบมาด้วย</h4>
                        <p>
                            {!! $application->has_idcard ? ' &check;' : ' &cross;' !!} สำเนาบัตรประชาชน
                        </p>
                        <p>
                            {!! $application->has_house_registration ? ' &check;' : ' &cross;' !!} สำเนาทะเบียนบ้าน
                        </p>
                        <p>
                            {!! $application->has_document ? ' &check;' : ' &cross;' !!} เอกสารประกอบอื่นๆ
                        </p>

                        <hr>

                        <h4>รายละเอียดผู้สมัคร</h4>

                        <p>
                            <strong> ชื่อ-สกุล :</strong><u> {{ $application->fullname }} </u> &nbsp;
                            <strong>ที่อยู่ :</strong><u>&nbsp; &nbsp; {{ $application->address }} &nbsp; </u> &nbsp;
                            {{-- phone --}}
                            <strong>เบอร์โทรศัพท์ :</strong><u> &nbsp; {{ $application->phone }}</u> &nbsp;
                            {{-- email --}}
                            @if ($application->group_name)
                                <strong>ซึ่งเป็นประธานกลุ่ม : </strong> {{ $application->group_name }}
                            @else
                                <strong>ซึ่งเป็นผู้ประกอบการผลิตภัณฑ์</strong>
                            @endif
                        </p>

                        <hr>

                        <h4>สินค้า</h4>
                        <p>
                            <strong>ประเภทสินค้า :</strong> {{ $application->product_type }} <br>

                        </p>
                        <strong>รายการสินค้า</strong>
                        <ul>
                            @foreach ($application->products as $product)
                                <li>
                                    {{ $product->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <hr>

                    <form action="{{ route('approvals.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="application_id" value="{{ $application->id }}">
                        <div class="form-group">
                            <label for="is_approve">การอนุมัติ</label>
                            <select name="status" id="is_approve" class="form-control">
                                <option value="approved" class="text-success">&check; อนุมัติ</option>
                                <option value="rejected" class="text-danger">&cross; ไม่อนุมัติ</option>
                            </select>
                        </div>
                        {{-- if approve show from below --}}
                        <div class="form-group" id="sale_area">
                            <label for="sale_area_id">สถานที่ขาย</label>
                            <select class="form-control" name="sale_area_id" id="sale_area_id">
                                @foreach ($sale_areas as $sale_area)
                                    <option value="{{ $sale_area->id }}">[{{ $sale_area->name }}]
                                        {{ $sale_area->location }} - {{ $sale_area->size }} ตารางวา,
                                        {{ $sale_area->price }} บาท
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <h4>รายละเอียดผู้อนุมัติ</h4>
                        <p class="p-2 border"><strong>ผู้อนุมัติ : </strong> {{ auth()->user()->name }} </p>
                        <div class="form-group">
                            <label for="comment">หมายเหตุ</label>
                            <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                            @error('comment')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">บันทึกผลการอนุมัติ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#is_approve').change(function() {
                if ($(this).val() == 'approved') {
                    $('#sale_area').show();
                } else {
                    $('#sale_area').hide();
                }
            });
        });
    </script>
@endsection
