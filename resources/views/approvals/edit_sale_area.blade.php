@extends('layouts.app')
@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="{{ route('approvals.salearea') }}">จัดสรรพื้นที่ขาย</a></li>
                <li class="breadcrumb-item active" aria-current="page">แก้ไขพื้นที่ขาย</li>
            </ol>
        </nav>
    </div>
    {{-- card title "แก้ไขพื้นที่ขาย" --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">แก้ไขพื้นที่ขาย</h3>
        </div>
        <div class="card-body">

            @if ($approval->sale_area != null)
                <p><strong>พื้นที่ขาย :</strong></p>
                {{ $approval->sale_area->name }} - {{ $approval->sale_area->location }} [<a
                    href="{{ route('sale-area.delete', $approval->id) }}" class="text-danger"
                    onclick="return confirm('คุณต้องการลบพื้นที่ขายนี้หรือไม่ ?')">x ลบ</a>]
                <hr>
            @endif
            <form action="/sale_area_edit/{{ $approval->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">พื้นที่ขาย</label>
                    <select name="sale_area_id" id="sale_area_id" class="form-control" @if ($saleAreas->count() == 0)  disabled @endif>
                        @if ($saleAreas->count() > 0)
                            @foreach ($saleAreas as $sale_area)
                                <option value="{{ $sale_area->id }}">{{ $sale_area->name }} -
                                    {{ $sale_area->location }}</option>
                            @endforeach
                        @else
                            <option value=""> ไม่มีพื้นที่ขายที่ว่างอยู่ </option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
@endsection
