@extends('layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{ route('bills.index') }}">ใบเสร็จ</a></li>
            <li class="breadcrumb-item active" aria-current="page">เพิ่มใบชำระเงิน</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>เพิ่มใบชำระเงิน</h4>
                </div>
                <div class="card-body">
                    {{-- error any --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('bills.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">ชื่อ</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ old('name') ? old('name') : 'ใบชำระเงินใหม่' }}" id="inputName">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- approvals --}}
                        <div class="form-group">
                            <label for="">ผู้ประกอบการ</label>
                            <select name="approval_id" class="form-control" id="approval_id">
                                @foreach ($approvals as $approval)
                                    <option value="{{ $approval->id }}"
                                        {{ old('approval_id') == $approval->id ? 'selected' : '' }}>
                                        [{{ $approval->sale_area->name }}
                                        {{ $approval->sale_area->location }}] -
                                        {{ $approval->application->shop_name }}
                                        ({{ $approval->application->fullname }}) - {{ $approval->sale_area->price }}
                                        บาท
                                    </option>
                                @endforeach
                            </select>
                            @error('approval_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">ราคา</label>
                            <input type="text" readonly="readonly" class="form-control" name="price"
                                value="{{ old('price') }}" id="price">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">จำนวนเงิน</label>
                            <input type="number" class="form-control" id="amount" name="amount"
                                value="{{ old('amount') }}">
                            @error('amount')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- payment_method --}}
                        <div class="form-group">
                            <label for="">วิธีการชำระเงิน</label>
                            <select name="payment_method" class="form-control">
                                <option value="เงินสด">เงินสด</option>
                                <option value="โอนเงิน">โอนเงิน</option>
                            </select>
                            @error('payment_method')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- paid 0, 1 --}}
                        <div class="form-group">
                            <label for="">สถานะ</label>
                            <select name="paid" class="form-control">
                                <option value="0">ยังไม่ชำระ</option>
                                <option value="1">ชำระแล้ว</option>
                            </select>
                            @error('paid')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">หมายเหตุ</label>
                            <input type="text" class="form-control" name="comment" value="{{ old('comment') }}">
                            @error('comment')
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

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#approval_id').select2({
            theme: "bootstrap-5",
        });
    </script>
    <script>
        var firstPrice = $("#approval_id option:first").html();
        var price = firstPrice.match(/\d+/g);
        var lastPrice = price.pop();
        $('#price').val(lastPrice);
        $("#amount").val(lastPrice);

        // กรณีมีการเปลี่ยนแปลงค่าของ select จะทำการคำนวนราคาใหม่
        $('#approval_id').change(function() {
            var firstPrice = $("#approval_id option:selected").html();
            var price = firstPrice.match(/\d+/g);
            var lastPrice = price.pop();
            $('#price').val(lastPrice);
            $("#amount").val(lastPrice);
        });

        // focus inputName & select all
        $('#inputName').focus();
        $('#inputName').select();
    </script>
@endsection
