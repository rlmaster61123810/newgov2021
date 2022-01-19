@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">ข้อมูลสินค้า</a></li>
            <li class="breadcrumb-item active" aria-current="page">แก้ไขสินค้า</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">แก้ไขสินค้า</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update') }}" method="post">
                        @csrf
                        {{-- application_id --}}
                        <div class="form-group">
                            <label for="application_id">รหัสสินค้า</label>
                            <input type="text" class="form-control" id="application_id" name="application_id"
                                placeholder="รหัสสินค้า" value="{{ $product->application_id }}">
                            @error('application_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">ชื่อสินค้า</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="เพิ่มชื่อสินค้า" {{ $product->name }}>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">แก้ไขข้อมูลสินค้า</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
