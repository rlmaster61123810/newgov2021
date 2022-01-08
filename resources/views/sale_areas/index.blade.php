@extends('layouts.app')
@section('content')
    {{-- sale_areas with breadscrumb --}}
    {{-- has name, location, size, price --}}
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">พื้นที่ขาย</li>
            </ol>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>พื้นที่ขาย
                                <a href="{{ route('sale_areas.create') }}"
                                    class="btn btn-primary float-right">เพิ่มพื้นที่ขาย</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead class=" text-primary">
                                                <tr>
                                                    <th>
                                                        ชื่อผู้ประกอบการ
                                                    </th>
                                                    <th>
                                                        สถานที่ขาย
                                                    </th>
                                                    <th>
                                                        ขนาดพื้นที่ขาย
                                                    </th>
                                                    <th>
                                                        ราคาเช่าพื้นที่
                                                    </th>
                                                    <th>
                                                        จัดการข้อมูล
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sale_areas as $sale_area)
                                                    <tr>
                                                        <td>{{ $sale_area->name }}</td>
                                                        <td>{{ $sale_area->location }}</td>
                                                        <td>{{ $sale_area->size }}</td>
                                                        <td>{{ $sale_area->price }}</td>
                                                        <td>
                                                            <a href="{{ route('sale_areas.edit', $sale_area->id) }}"
                                                                class="btn btn-primary btn-sm">แก้ไข</a>
                                                            <form
                                                                action="{{ route('sale_areas.destroy', $sale_area->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">ลบ</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
