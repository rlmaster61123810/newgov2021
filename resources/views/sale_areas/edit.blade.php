@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sale_areas.index') }}">พื้นที่ขาย</a></li>
            <li class="breadcrumb-item active" aria-current="page">แก้ไขพื้นที่ขาย</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">แก้ไขพื้นที่ขาย</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('sale_areas.update', $sale_area->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">ชื่อพื้นที่ขาย</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $sale_area->name }}">
                            @error('name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- location input string --}}
                        <div class="form-group">
                            <label for="location">สถานที่ขาย</label>
                            <input type="text" class="form-control" id="location" name="location"
                                value="{{ $sale_area->location }}">
                            @error('location')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- size --}}
                        <div class="form-group">
                            <label for="size">ขนาดพื้นที่ขาย</label>
                            <input type="text" class="form-control" id="size" name="size"
                                value="{{ $sale_area->size }}">
                            @error('size')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">ราคาเช่าพื้นที่</label>
                            <input type="text" class="form-control" id="price" name="price"
                                value="{{ $sale_area->price }}">
                            @error('price')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">สร้างพื้นที่ขาย</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
