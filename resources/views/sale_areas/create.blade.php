@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sale_areas.index') }}">พื้นที่ขาย</a></li>
            <li class="breadcrumb-item active" aria-current="page">เพิ่มพื้นที่ขาย</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">เพิ่มพื้นที่ขาย</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('sale_areas.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">ชื่อพื้นที่ขาย	</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อพื้นที่ขาย	">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="location">สถานที่ขาย</label>
                            <input type="text" class="form-control" id="location" name="location"
                                placeholder="เพิ่มสถานที่ขาย">
                            @error('location')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- size --}}
                        <div class="form-group">
                            <label for="size">ขนาดพื้นที่ขาย</label>
                            <input type="text" class="form-control" id="size" name="size" placeholder="เพิ่มขนาดพื้นที่ขาย	">
                            @error('size')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- price --}}
                        <div class="form-group">
                            <label for="price">ราคาเช่าพื้นที่</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="เพิ่มราคาเช่าพื้นที่">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">สร้างพื้นที่ขาย</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
